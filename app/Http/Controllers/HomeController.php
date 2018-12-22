<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 16:49
 */

namespace App\Http\Controllers;

use App\Http\Models\Articles;
use Services\View;

class HomeController extends Controller
{
    public function home()
    {
        $this->view = View::make('home.view')
            ->with('article', Articles::first())
            ->withTitle('Article');
    }
}