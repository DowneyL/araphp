<?php
use NoahBuscher\Macaw\Macaw;

Macaw::get('', 'App\Http\Controllers\HomeController@home');

Macaw::dispatch();
