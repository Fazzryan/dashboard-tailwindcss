<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::paginate(10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'progress' => 'required|integer|min:0|max:100',
            'client' => 'nullable|string|max:255',
            'priority' => 'required|string',
            'deadline' => 'nullable|date',
        ]);

        $project = Project::create($validated);
        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'progress' => 'required|integer|min:0|max:100',
            'client' => 'nullable|string|max:255',
            'priority' => 'required|string',
            'deadline' => 'nullable|date',
        ]);

        $project->update($validated);
        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->noContent();
    }
}
