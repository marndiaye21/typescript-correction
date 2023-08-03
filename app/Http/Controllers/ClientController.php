<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClientByTelOrNumCompte(string $keySearch){
        $data=explode("_",$keySearch);
        if(count($data)==1  && strlen($data[0])==9){
      
            $client = Client::clientByTel($data[0])->first();
            $message = "";
            if(!$client)
            {
                $message = "Le numero ne correspond pas à un client";

            }
            return response()->json(["message"=>$message,
            "data"=>
                Client::clientByTel($data[0])->first()
            ]);
        }
        if(count($data)==2  && strlen($data[1])==9 && strlen($data[0])==2){
            
             $client= Client::clientByTel($data[1])->first();
             if($client){
                
                $fournisseur=Compte::where('client_id',$client->id)
                ->where('fournisseur',$data[0])->first();
                if($fournisseur){
                    return response()->json(["message"=>"",
                    "data"=>
                        $client
                    ]);
                }
                return response()->json(["message"=>"ce client ne dispose pas de compte pour ce fourniseeur",
            "data"=>[]]);

             }
             return response()->json(["message"=>"ce client existe pas",
            "data"=>[]]);
            

        }
          
     

    }
}
