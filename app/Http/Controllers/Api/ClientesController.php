<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\CNPJInvalidoException;
use GuzzleHttp\Exception\RequestException;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function read()
    {
        $response =  Clientes::all();
        return response()->json(['message'=>__('messages.api_success'), 'data'=>$response]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cnpjSemPontos = str_replace(['.', '-', '/'], '', $request->cnpj);
        $client = new Client();
        $url = "https://brasilapi.com.br/api/cnpj/v1/{".$cnpjSemPontos."}";

        try {
            $response = $client->get($url);

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);
    
                if (isset($data['error'])) {
                    return json_encode($data);
                }
    
                $return = $request->all();
                Clientes::create($return);

                return response()->json(['message'=>__('messages.api_store'), 'data'=>$return]);  
            } else {
                return response()->json(['error'=>__('messages.api_unavailable')]);  
            }
        } catch (\Exception $e) {
            return response()->json(['error'=>__('messages.api_cnpj_invalido')]);  
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes, $id)
    {

        $response = Clientes::find($id);

        return response()->json(['message'=>__('messages.api_success'), 'data'=>$response]);  

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $clientes, $id)
    {
        try {
            $responseRequest = $request->all();
            $response = Clientes::findOrFail($id);

            if($response){
                $response->update($responseRequest);
                return response()->json(['message'=>__('messages.api_update'), 'data'=>$response]);  
            }else{
                return response()->json(['message' => __('messages.api_no_found')], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => __('messages.unexpected')], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes, $id)
    {
        try {
            $response = Clientes::find($id);
            if ($response) {
                $response->delete();
                return response()->json(['message' => __('messages.api_delete')]);
            } else {
                return response()->json(['message' => __('messages.api_no_found')], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => __('messages.unexpected')], 500);
        }

    }
}
