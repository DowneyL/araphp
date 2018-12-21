<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 16:49
 */

namespace App\Http\Controllers;

use App\Http\Models\Articles;

class HomeController extends Controller
{
    public function home()
    {
        $article = Articles::first();
        echo $article->title, $article->content;
    }
}