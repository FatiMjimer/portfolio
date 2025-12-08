<?php

namespace App\Http\Controllers;

use App\Models\Project;

class UserProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('welcome', compact('projects'));
    }

public function show(Project $project)
{
    //dd($project);   // test important
    return view('projects.show', compact('project'));
}


}
