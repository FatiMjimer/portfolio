<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques de base
        $totalProjects = Project::count();
        $totalSkills   = Skill::count();
        // Si tu n'as pas de column 'role' dans users, adapte la requête ou mets 1 par défaut
       // $totalAdmins   = User::where('role', 'admin')->count() ?? User::count();
       $totalAdmins = User::count();   // total utilisateurs (simple)

       $visits        = 0; // placeholder (remplace par vrai tracking si tu veux)

        // Statistiques mensuelles (ex : projets créés par mois)
        $months = ['Jan','Fev','Mar','Avr','Mai','Jun','Jul','Aou','Sep','Oct','Nov','Dec'];

        $projectsPerMonth = [];
        $visitsPerMonth   = [];

        for ($m = 1; $m <= 12; $m++) {
            $projectsPerMonth[] = Project::whereMonth('created_at', $m)->count();
            // visites : données factices pour l'instant
            $visitsPerMonth[] = rand(10, 200);
        }

        return view('admin.dashboard', compact(
            'totalProjects',
            'totalSkills',
            'totalAdmins',
            'visits',
            'months',
            'projectsPerMonth',
            'visitsPerMonth'
        ));
    }
}
