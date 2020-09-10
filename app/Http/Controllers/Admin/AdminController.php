<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
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
        $users = User::count();
        $tags = Tag::count();

        return view('admin.home', compact('header_categories', 'users', 'tags'));
    }
}
