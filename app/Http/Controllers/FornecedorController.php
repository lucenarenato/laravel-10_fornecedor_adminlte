<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\ContatoAdicional;
use App\Models\Contato;
use App\Models\Fornecedor;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\FornecedorRepository;

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
        $fornecedor = Fornecedor::all();

        return view('fornecedor/fornecedores', ['fornecedores' => $fornecedor]);
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
            'cidades' => $rows
        ];


        return view('fornecedor/cadastro', [
            'dados' => $result
        ]);
    }

    public function store(Request $request)
    {
        $resposta = $this->repository->store($request);

        return redirect('fornecedores')->with('flash_message', $resposta['mensagem'] );
    }

    public function view($id)
    {
        $fornecedor = DB::table('fornecedores')
                ->where('fornecedores.id', $id)
                ->leftJoin("contatos", "contatos.fornecedor_id", "=", "fornecedores.id")
                ->first();

        return view('fornecedor/view', ['fornecedores' => $fornecedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContatoAdicional::where('fornecedor_id', '=',$id)->delete();
        Contato::where('fornecedor_id', '=', $id)->delete();
        Fornecedor::destroy($id);

        return redirect('fornecedores')->with('flash_message', 'Student deleted!');
    }
}
