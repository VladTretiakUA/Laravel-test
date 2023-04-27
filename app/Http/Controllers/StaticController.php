<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StaticController extends Controller
{


    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(3);
        return view('static/index')->with('articles', $articles);
    }



    // public function index()
    // {
    //     $title = 'Main page';
    //     return view('static/index', compact('title'));
    // }



    // public function about()
    // {
    //     $title = 'Про нас';
    //     return view('static/about')->with('header', $title);
    // }

    public function about()
    {
        $data = [
            'title' => 'Про нас',
            'params' => ['BMW', 'Mersedes', 'Audi']
        ];
        return view('static/about')->with($data);
    }
}
