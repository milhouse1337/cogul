<?php

Route::get(config('cogul.url'), 'Milhouse1337\Cogul\CogulController@validateToken')->middleware(config('cogul.middleware'));
