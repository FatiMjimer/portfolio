<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class AdminSkillController extends Controller
{
   
    public function index()
    {
        $skills = Skill::orderBy('name')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        Skill::create([
            'name'  => $request->name,
            'level' => $request->level,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Compétence ajoutée avec succès !');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        $skill->update([
            'name'  => $request->name,
            'level' => $request->level,
        ]);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Compétence mise à jour !');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Compétence supprimée !');
    }
}
