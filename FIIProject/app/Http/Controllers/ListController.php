<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista;

class ListController extends Controller
{
    public function index(){
        $lists = Lista::all();
        return view('lists', ['lists' => $lists]);
    }
}
