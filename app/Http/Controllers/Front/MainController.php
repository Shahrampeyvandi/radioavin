<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class MainController extends Controller
{
    public function index()
    {

        $newSeries = Post::where('type','series')->latest()->get();
        $data['newseries'] = $newSeries;
        return view('Front.index',$data);
    }
}
