<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }

    public function create()
    {
        return view('todo.create');
    }

    public function edit()
    {
        return view('todo.edit');
    } 
}
