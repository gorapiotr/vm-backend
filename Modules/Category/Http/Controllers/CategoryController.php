<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Presenters\CategoryCollectionPresenter;

/**
 * Class CategoryController
 * @package Modules\Category\Http\Controllers
 */
class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse|CategoryCollectionPresenter
     */
    public function index()
    {
        $cats = Category::orderBy('id', 'asc')->get();

        if ($cats->isNotEmpty()) {
            return new CategoryCollectionPresenter($cats);
        } else {
            return response()->json(['msg' => 'Not found cats']);
        }
    }
}
