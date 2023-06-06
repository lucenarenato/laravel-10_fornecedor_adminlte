<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function getByName($nome_estado)
    {
        try {
            $estado = State::where('uf', $nome_estado)->get('id');
            $cidades = City::where('state_id', $estado[0]->id)->get();
            \Log::debug($estado);
            \Log::debug($cidades);
            return new JsonResponse($cidades, Response::HTTP_OK);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
