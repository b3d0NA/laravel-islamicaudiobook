<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VirtualLibraryController extends Controller
{
    public function index(){
        return view("admin.vlib");
    }
}