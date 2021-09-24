<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        $naam = "Boaz van Welsenis";
        return view('test')
            ->with('naam', $naam);
    }
}