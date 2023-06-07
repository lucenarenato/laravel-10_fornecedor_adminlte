<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contato;
use App\Models\ContatoAdicional;
use App\Models\Fornecedor;
use App\Models\State;
use App\Repositories\FornecedorRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FornecedorController extends Controller
{
    protected $repository;
    protected $permission = 'valores';

    /**
     * ValoresController constructor.
     * @param FornecedorRepository $repository
     */
    public function __construct(FornecedorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $fornecedor = Fornecedor::orderBy('created_at', 'asc')->paginate(5);
        return view('fornecedor.fornecedores')->with('fornecedores', $fornecedor);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $estados = State::all();
        $cidades = City::all();

        $rows = [];
        foreach ($cidades as $cidade) {
            $row = [
                'id' => intval($cidade->id),
                'municipio' => $cidade->title,
            ];
            array_push($rows, $row);
        }

        $result = [
            'estados' => $estados,
            'cidades' => $rows,
        ];

        return view('fornecedor/cadastro', [
            'dados' => $result,
        ]);
    }

    public function store(Request $request)
    {
        try {
            if ($request->tipo_cliente == 'pj') {
                $validator = Validator::make($request->all(), [
                    'cnpj' => ['required|cnpj|formato_cnpj'],
                ]);

            } else {
                $validator = Validator::make($request->all(), [
                    'cpf' => ['required|cpf|formato_cpf'],
                ]);
            }

            if ($validator->fails()) {

                $validator->errors();

                $validator->errors()->toJson();
            }

            $resposta = $this->repository->store($request);

            return redirect('fornecedores')->with('flash_message', $resposta['mensagem']);
        } catch (Exception $e) {
            $error = $e->getMessage();

            return response()->json(compact('error'));
        }
    }

    public function view($id)
    {
        $fornecedor = DB::table('fornecedores')
            ->where('fornecedores.id', $id)
            ->leftJoin("contatos", "contatos.fornecedor_id", "=", "fornecedores.id")
            ->first();

        return view('fornecedor/view', ['fornecedores' => $fornecedor]);
    }

    public function editar($id)
    {
        $fornecedor = DB::table('fornecedores')
            ->where('fornecedores.id', $id)
            ->leftJoin("contatos", "contatos.fornecedor_id", "=", "fornecedores.id")
            ->first();

        return view('fornecedor/editar', ['fornecedores' => $fornecedor]);
    }

    public function update(Request $request, $id)
    {
        try {
            $fornecedor = Fornecedor::find($id);

            if (!$fornecedor) {
                throw new ModelNotFoundException;
            }

            $fornecedor->update($request->all());
            return redirect()->back();
        } catch (Exception $error) {
            throw new Exception("Falha ao atualizar fornecedor com ID {$id}: " . $error->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContatoAdicional::where('fornecedor_id', '=', $id)->delete();
        Contato::where('fornecedor_id', '=', $id)->delete();
        Fornecedor::destroy($id);

        return redirect('fornecedores')->with('flash_message', 'Student deleted!');
    }
}
