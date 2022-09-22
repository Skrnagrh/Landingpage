<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Startup;

class NewsController extends Controller
{
    public function index(){

        
        // $title = '';
        // if(request('category')){
        //     $category = Category::firstWhere('slug', request('category'));
        //     $title = ' in ' . $category->name;
        // }
        
        return view('news', [
            "title" => "News",
            "active" => 'news',
            "news" => News::latest()->fillter(request(['search', 'category']))->paginate(15)->withQueryString()
            
            // "startup" => Startup::all()

            // "news" => News::latest()->filter(request(['category']))->paginate(5)->withQueryString()
        ]);

    }

    public function show(News $news)
    {
    return view('news_single', [
        "title" => "Detail News",
        "active" => 'news', 
        "news" => $news
    ]);
    }
}

