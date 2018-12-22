<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/21
 * Time: 16:48
 */

namespace App\Http\Controllers;

use Services\View;

class Controller
{
    protected $view;

    public function __construct()
    {
        //do something
    }

    public function __destruct()
    {
        $view = $this->view;
        if ($view instanceof View) {
            extract($view->data);
            require $view->view;
        }
    }
}