<?php

// app/Http/Controllers/ProjectController.php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->with('tasks')->get();
        return Inertia::render('Projects/Index', ['projects' => $projects]);
    }

    public function store(Request $request)
    {
        $project = Auth::user()->projects()->create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));
        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès');
    }

    public function show(Project $project)
    {
        return Inertia::render('Projects/Show', ['project' => $project->load('tasks')]);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));
        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès');
    }

    public function destroy(Project $project)
    {z
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès');
    }
}