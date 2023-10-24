<?php

namespace App\Http\Controllers;

use App\Http\Resources\DivisionResource;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        return DivisionResource::collection(Division::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        return new DivisionResource(Division::create($request->validated()));
    }

    public function show(Division $division)
    {
        return new DivisionResource($division);
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $division->update($request->validated());

        return new DivisionResource($division);
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return response()->json();
    }
}
