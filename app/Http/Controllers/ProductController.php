<?php

namespace App\Http\Controllers;

use App\Actions\ProductAction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get (Request $request)
    {
        return response()->json(
            (new ProductAction())
                ->setRequest($request)
                ->setValidationRule('getQuery')
                ->setRelations(['category'])
                ->makeEloquentViaRequest()
                ->getByRequestAndEloquent()
        );
    }

    public function getById (string $id)
    {
        return response()->json(
            (new ProductAction())->getById($id)
        );
    }
}
