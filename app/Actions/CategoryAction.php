<?php

namespace App\Actions;

use Genocide\Radiocrud\Services\ActionService\ActionService;
use App\Models\CategoryModel;
use App\Http\Resources\CategoryResource;

class CategoryAction extends ActionService
{
    public function __construct()
    {
        $this
            ->setModel(CategoryModel::class)
            ->setResource(CategoryResource::class);
        parent::__construct();
    }
}
