<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatima-Ezzahra MJIMER | Portfolio</title>
    <meta name="description" content="Portfolio professionnel de Fatima-Ezzahra MJIMER - Ingénieure Développement Logiciel">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Geist', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-900">
    <!-- NAVIGATION HEADER -->
    <header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm animate-slideInDown">
        <nav class="max-w-7xl mx-auto px-4 md:px-8 py-4 flex items-center justify-between">
            <div class="text-2xl font-bold">
                <a href="/" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-amber-800 to-amber-600 rounded-lg"></div>
                    <span class="hidden md:inline text-gray-900">FEM</span>
                </a>
            </div>

            <div class="hidden md:flex gap-8">
                <a href="#about" class="text-gray-700 hover:text-amber-800 font-medium transition-colors">À propos</a>
                <a href="#skills" class="text-gray-700 hover:text-amber-800 font-medium transition-colors">Compétences</a>
                <a href="#projects" class="text-gray-700 hover:text-amber-800 font-medium transition-colors">Projets</a>
                <a href="#contact" class="text-gray-700 hover:text-amber-800 font-medium transition-colors">Contact</a>
            </div>

            <button class="md:hidden flex flex-col gap-1.5 p-2">
                <span class="w-6 h-0.5 bg-gray-900 transition-all"></span>
                <span class="w-6 h-0.5 bg-gray-900 transition-all"></span>
                <span class="w-6 h-0.5 bg-gray-900 transition-all"></span>
            </button>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-12 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">À propos</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Ingénieure en développement logiciel et technologies de l'information.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Navigation</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#about" class="hover:text-amber-600 transition-colors">À propos</a></li>
                        <li><a href="#skills" class="hover:text-amber-600 transition-colors">Compétences</a></li>
                        <li><a href="#projects" class="hover:text-amber-600 transition-colors">Projets</a></li>
                        <li><a href="#contact" class="hover:text-amber-600 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Réseaux</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="https://www.linkedin.com/in/fatima-ezzahra-mjimer-2ab878246/" class="hover:text-amber-600 transition-colors">LinkedIn</a></li>
                        <li><a href="https://github.com/FatiMjimer" class="hover:text-amber-600 transition-colors">GitHub</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <p class="text-gray-400 text-sm">
                        <a href="mailto:fatimaezzahra.mjimer@gmail.com" class="hover:text-amber-600 transition-colors">fatimaezzahra.mjimer@gmail.com</a>
                    </p>
                </div>
            </div>

           
        </div>
    </footer>
</body>
</html>
