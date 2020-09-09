<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ModelQueryTrait as ModelQueries;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use ModelQueries;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        $header_categories = $this->getCategoriesForHeader();

        return view('admin.home', compact('header_categories'));
    }

}
