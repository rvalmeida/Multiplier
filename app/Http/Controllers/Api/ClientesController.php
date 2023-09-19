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

        $response = $request->all();
        Clientes::create($response);

        return response()->json(['message'=>__('messages.api_store'), 'data'=>$response]);  

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
