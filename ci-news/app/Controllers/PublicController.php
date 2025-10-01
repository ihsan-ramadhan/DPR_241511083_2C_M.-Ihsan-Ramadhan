<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PublicController extends BaseController
{
    public function index()
    {
        return view('public/dashboard'); 
    }
}