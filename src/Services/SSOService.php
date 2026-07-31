<?php

namespace Vertex\SupportWidget\Services;


use Illuminate\Support\Facades\Http;



class SSOService
{


    public function generate()
    {


        $user = auth()->user();



        $response = Http::timeout(10)
            ->post(

            config('vertex-support.endpoint'),

            [

                'api_key'=>
                    config('vertex-support.api_key'),


                'email'=>
                    $user->email,


                'name'=>
                    $user->name,

            ]

        );



        return $response->json();

    }


}