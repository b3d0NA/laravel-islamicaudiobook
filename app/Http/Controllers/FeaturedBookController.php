<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturedBookController extends Controller
{
    public function index()
    {
        return view("admin.featuredbooks");
    }
}