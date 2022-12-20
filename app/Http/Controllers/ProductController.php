<?php

namespace App\Http\Controllers;

use App\Actions\ProductAction;
use App\Models\ProductModel;
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
            (new ProductAction())
                ->setRelations(['category'])
                ->makeEloquent()
                ->getById($id)
        );
    }

    public function store (Request $request)
    {
        return response()->json([
            'message' => 'ok',
            'data' => (new ProductAction())
                ->setRequest($request)
                ->setValidationRule('store')
                ->storeByRequest()
        ]);
    }

    public function deleteById (string $id)
    {
        return response()->json([
            'message' => 'ok',
            'data' => (new ProductAction())->deleteById($id)
        ]);
    }

    public function updateById (string $id, Request $request)
    {
        return response()->json([
            'message' => 'ok',
            'data' => (new ProductAction())
                ->setRequest($request)
                ->setValidationRule('update')
                ->updateByIdAndRequest($id)
        ]);
    }
}
