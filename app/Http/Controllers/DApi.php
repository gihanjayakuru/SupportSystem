<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DApi extends Controller
{
    function getData()
    {
        return ['name' => 'ggg'];
    }
}