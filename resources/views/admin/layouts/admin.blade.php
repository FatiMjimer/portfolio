<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0C1B2A] text-white min-h-screen py-8 px-6 flex flex-col">
        <h1 class="text-2xl font-bold mb-10">Admin Dashboard</h1>

        <nav class="flex-1 space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-orange-400">Accueil</a>
            <a href="{{ route('admin.projects.index') }}" class="block hover:text-orange-400">Projets</a>
            <a href="{{ route('admin.skills.index') }}" class="block hover:text-orange-400">Compétences</a>
            <a href="{{ route('admin.messages') }}" class="block hover:text-orange-400">Messages</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded text-white">
                Déconnexion
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1">


        <div class="max-w-6xl mx-auto">

            @yield('content')

        </div>

    </main>

</body>
</html>
