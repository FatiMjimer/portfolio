@extends('admin.layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="py-10 px-8">
<div class="flex items-center justify-between mb-12">
    <div class="flex items-center gap-4">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">Tableau de bord</h2>
                
            </div>
</div>
    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- PROJETS -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <p class="text-gray-600 text-sm">Total Projets</p>
            <h2 class="text-3xl font-bold text-amber-800">{{ $totalProjects }}</h2>
        </div>

        <!-- COMPETENCES -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <p class="text-gray-600 text-sm">Compétences</p>
            <h2 class="text-3xl font-bold text-amber-800">{{ $totalSkills }}</h2>
        </div>

        <!-- UTILISATEURS -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <p class="text-gray-600 text-sm">Admins</p>
            <h2 class="text-3xl font-bold text-amber-800">{{ $totalAdmins }}</h2>
        </div>

        <!-- VISITEURS -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <p class="text-gray-600 text-sm">Visites du site</p>
            <h2 class="text-3xl font-bold text-amber-800">{{ $visits }}</h2>
        </div>

    </div>

    <!-- CHARTS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Bar chart -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-xl font-bold mb-4">Projets ajoutés par mois</h3>
            <canvas id="projectsChart"></canvas>
        </div>

        <!-- Line chart -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-xl font-bold mb-4">Visites du site</h3>
            <canvas id="visitsChart"></canvas>
        </div>
    </div>

</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Projects chart
    const projectsCtx = document.getElementById('projectsChart').getContext('2d');
    new Chart(projectsCtx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Projets',
                data: @json($projectsPerMonth),
                borderWidth: 1,
                backgroundColor: "#b45309",
            }]
        }
    });

    // Visits chart
    const visitsCtx = document.getElementById('visitsChart').getContext('2d');
    new Chart(visitsCtx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Visites',
                data: @json($visitsPerMonth),
                borderColor: "#b45309",
                borderWidth: 2
            }]
        }
    });
</script>
@endsection
