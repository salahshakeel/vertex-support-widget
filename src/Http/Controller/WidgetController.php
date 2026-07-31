<?php

namespace Vertex\SupportWidget\Http\Controllers;


use Illuminate\Routing\Controller;
use Vertex\SupportWidget\Services\SSOService;


class WidgetController extends Controller
{


    public function __invoke(
        SSOService $service
    )
    {

        if(!auth()->check())
        {

            return response()->json([

                'error'=>'Unauthenticated'

            ],401);

        }



        return response()->json(

            $service->generate()

        );

    }

}