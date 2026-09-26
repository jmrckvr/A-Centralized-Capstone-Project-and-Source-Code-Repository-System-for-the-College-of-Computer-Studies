<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('projects.index', ['projects' => Project::with(['category', 'technologies', 'members'])->latest()->paginate(12)]);
    }

    public function show(Project $project): View
    {
        $project->load(['category', 'technologies', 'members', 'owner', 'files', 'reviews.reviewer']);
        return view('projects.show', compact('project'));
    }
}
