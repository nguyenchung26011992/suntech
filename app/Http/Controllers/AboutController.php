<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $data = [];

        return view('pages.about', $data);
    }
}
