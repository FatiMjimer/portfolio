<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // LISTE
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    // FORMULAIRE CREATION
    public function create()
    {
        return view('projects.create');
    }

    // STOCKAGE
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'slug' => 'required|string|unique:projects',
        'description' => 'required|string',
        'technologies' => 'nullable|string',
        'image' => 'nullable|image',
        'github' => 'nullable|string',
        'demo' => 'nullable|string',
        'video_path' => 'nullable|mimes:mp4,webm|max:50000', // 50MB
    ]);
    // 📌 Upload de l'image
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('projects', 'public');
    }
    // Upload de la vidéo
    if ($request->hasFile('video_path')) {
        $validated['video_path'] = $request->file('video_path')->store('videos', 'public');
    }

    Project::create($validated);

    return redirect()->back()->with('success', 'Projet ajouté !');
}


    // EDIT
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // UPDATE
    public function update(Request $request, Project $project)
    {
       // dd($request->file('video_path'));

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:4096',
            'video_path' => 'nullable|mimes:mp4,webm|max:50000',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($project->image && \Storage::disk('public')->exists($project->image)) {
                \Storage::disk('public')->delete($project->image);
            }

            $project->image = $request->file('image')->store('projects', 'public');
        }
 // update video if provided
        if ($request->hasFile('video_path')) {
            // delete old video
            if ($project->video_path && \Storage::disk('public')->exists($project->video_path)) {
            \Storage::disk('public')->delete($project->video_path);
            }
            $project->video_path = $request->file('video_path')->store('videos', 'public');
        }
       
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->github = $request->github;
        $project->demo = $request->demo;

        $project->save();

        

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour');
    }

    // DELETE
    public function destroy(Project $project)
    {
        if ($project->image && file_exists(public_path('projects/'.$project->image))) {
            unlink(public_path('projects/'.$project->image));
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé');
    }



}

