<?php

namespace App\Actions;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductModel;
use Genocide\Radiocrud\Services\ActionService\ActionService;

class ProductAction extends ActionService
{
    public function __construct()
    {
        $this
            ->setModel(ProductModel::class)
            ->setResource(ProductResource::class)
            ->setValidationRules([
                'getQuery' => [
                    'category_id' => ['string', 'max:100']
                ]
            ])
            ->setQueryToEloquentClosures([
                'category_id' => function (&$eloquent, $query)
                {
                    $eloquent = $eloquent->where('category_id', $query['category_id']);
                }
            ]);

        parent::__construct();
    }
}
