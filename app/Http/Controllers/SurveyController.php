<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        return view("user.survey");
    }

    public function store(SurveyRequest $request)
    {
        auth()->user()->survey()->create($request->validated());
        return redirect()->route("user.home");
    }
}