<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status()
    {
        return response()->json(
        [
            'status'=> 'ok',
            'message'=> 'API is running ok!'
        ],
        200
    );
    }
    


    public function clients()
    {
        $clients = Client::paginate(5);
        return response()->json(
            [
                'status'=> 'ok',
                'message'=> 'all Clients',
                'data' => $clients
            ],
            200
        );
    }

    public function client(Request $request)
    {
        //check if id is provided
        if(!$request->id)
        {
            return response()->json(
                [
                    'status'=> 'error',
                    'message'=> 'Client id is required',
                
                ],
                400
            );   

            
        }

        $client = Client::find($request->id);

        return response()->json([
            'status'=> 'ok',
            'message'=> 'Success',
            'data' => $client        

        ],200
    );

    }

    public function addClient(Request $request)
    {
        //create a new client
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

        return response()->json(
            [
                'status'=> 'ok',
                'message'=> 'Success',
                'data' => $client
            ],
            200
        );

    }

    public function updateClient(Request $request)
    {
        //check if id is provider
        if(!$request->id)
        {
            return response()->json(
                [
                    'status'=> 'error',
                    'message'=> 'Client id is required',
                
                ],
                400
            );   

            
        }

        //update client

        $client = Client::find($request->id);  
        $client->name = $request->name;
        $client->email = $request->email; 
        $client->save();     

    }

    public function DeleteClient($id)
    {
         // get client data by id
         $client = Client::find($id);
         $client->delete();
 
         return response()->json(
            [
                'status'=> 'ok',
                'message'=> 'Client is removed',
            
            ],
            200
        );

    }
}
