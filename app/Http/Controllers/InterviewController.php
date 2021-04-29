<?php

namespace App\Http\Controllers;

use App\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        return Interview::all();
    }

    public function show(Interview $interview)
    {
        return $interview;
    }

    public function store(Request $request)
    {
        $interview = Interview::create($request->all());

        return response()->json($interview, 201);
    }

    public function update(Request $request, Interview $interview)
    {
        $interview->update($request->all());

        return response()->json($interview, 200);
    }

    public function delete(Interview $interview)
    {
        $interview->delete();

        return response()->json(null, 204);
    }
}
