<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return JobResource::collection(Job::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        return new JobResource(Job::create($request->validated()));
    }

    public function show(Job $job)
    {
        return new JobResource($job);
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $job->update($request->validated());

        return new JobResource($job);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return response()->json();
    }
}
