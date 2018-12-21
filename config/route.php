<?php
use NoahBuscher\Macaw\Macaw;

Macaw::get('', 'App\Http\Controllers\HomeController@home');

Macaw::get('(:any)', function ($route) {
    throw new Exception("没有匹配到 {$route} 这个路由选项");
});

Macaw::dispatch();
