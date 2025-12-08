@extends('layouts.main')

@section('title', 'Accueil')

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section py-20 md:py-32 px-4 md:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
            <!-- Hero Text Content -->
            <div class="md:w-1/2 space-y-6 animate-fadeInLeft">
                <div class="space-y-2">
                       <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900">
                        Bonjour, je suis 
                        <span class="bg-gradient-to-r from-amber-800 to-amber-600 bg-clip-text text-transparent">
                            Fatima-Ezzahra MJIMER
                        </span>
                    </h1>
                </div>

                <p class="text-lg text-gray-600 leading-relaxed">
                    Ingénieure en Développement Logiciel et technologies de l'information.
                 Spécialisée en développement Web, Mobile & Data — créant des applications modernes, performantes et intuitives, avec une forte sensibilité à la data et à l’expérience utilisateur.</p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#projects"
                       class="group relative inline-flex items-center justify-center px-8 py-3 bg-amber-800 text-white font-semibold rounded-lg transition-all duration-300 hover:bg-amber-900 hover:shadow-lg transform hover:-translate-y-1">
                        Voir mes projets
                        <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="#contact"
                       class="inline-flex items-center justify-center px-8 py-3 border-2 border-gray-800 text-gray-800 font-semibold rounded-lg transition-all duration-300 hover:bg-gray-50">
                        Me Contacter
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-bold text-amber-800">3+</p>
                        <p class="text-sm text-gray-600">Années d'expérience</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-bold text-amber-800">10+</p>
                        <p class="text-sm text-gray-600">Projets réalisés</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-bold text-amber-800">100%</p>
                        <p class="text-sm text-gray-600">Satisfaction clients</p>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="md:w-1/2 flex justify-center animate-fadeInRight">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-200 to-amber-100 rounded-3xl blur-2xl opacity-40 animate-pulse"></div>
                    <img src="{{ asset('images/profile.png') }}"
                         class="relative rounded-3xl shadow-2xl w-72 h-72 md:w-96 md:h-96 object-cover border-4 border-white transition-transform duration-300 hover:scale-105"
                         alt="Fatima-Ezzahra MJIMER">
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-20 bg-gray-50 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-4 mb-12 animate-fadeIn">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">À propos de moi</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="space-y-6 animate-slideInUp">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Passionnée par le développement logiciel depuis plusieurs années, j'aime créer des applications modernes, performantes et intuitives qui résolvent des problèmes réels.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        J'ai travaillé sur plusieurs projets en Java, Spring Boot, React et React Native, ce qui m'a permis de développer une solide expertise en stack full-stack.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Mon approche combine rigueur technique, attention au détail et compréhension profonde des besoins utilisateurs pour livrer des solutions exceptionnelles.
                    </p>
                </div>

                <div class="space-y-4 animate-slideInUp animation-delay-200">
                    <div class="group p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-amber-800 cursor-pointer transform hover:-translate-y-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">🎓 Formation</h3>
                        <p class="text-gray-600">Ingénieure en Développement Logiciel et Technologies de l'information</p>
                    </div>
                    <div class="group p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-amber-800 cursor-pointer transform hover:-translate-y-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">💼 L'expérience</h3>
                        <p class="text-gray-600">Développement full-stack, architecture logicielle et gestion de projets</p>
                    </div>
                    <div class="group p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-amber-800 cursor-pointer transform hover:-translate-y-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">🚀 Approche</h3>
                        <p class="text-gray-600">Innovation, qualité et performance au cœur de chaque projet</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SKILLS SECTION -->
<section id="skills" class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-4 mb-12 animate-fadeIn">
            <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
            <h2 class="text-4xl font-bold text-gray-900">Compétences</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($skills as $skill)
                <div class="p-6 bg-white rounded-xl shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <div class="flex justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-900">{{ $skill->name }}</h3>
                        <span class="text-amber-800 font-semibold">{{ $skill->level }}%</span>
                    </div>

                    <!-- Progress bar -->
                    <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-700 rounded-full transition-all duration-700"
                             style="width: {{ $skill->level }}%">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="py-20 bg-gray-50 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-4 mb-12">
            <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
            <h2 class="text-4xl font-bold text-gray-900">Mes Projets</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
                <div class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                    
                    <!-- Image du projet -->
                    <img 
                        src="{{ asset('storage/' . $project->image) }}" 
                        class="h-56 w-full object-cover group-hover:scale-105 transition-transform duration-300"
                    >

                    <div class="p-6 space-y-3">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $project->title }}</h3>
                        <p class="text-gray-600">{{ Str::limit($project->description, 120) }}</p>

                        <!-- Button -->
                        <a href="{{ route('projects.show', $project->id) }}"
   class="inline-flex items-center text-amber-800 font-semibold hover:underline">
   Voir détails →
</a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- CALL TO ACTION -->
    <section id="contact" class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 px-4 md:px-8">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <div class="space-y-4 animate-fadeIn">
                <h2 class="text-4xl md:text-5xl font-bold text-white">
                    Prêt pour un nouveau projet ?
                </h2>
                <p class="text-xl text-gray-300">
                    Parlons de votre prochaine idée ou projet qui nécessite expertise et innovation.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-6">
               <button onclick="toggleContactForm()"
   class="group inline-flex items-center justify-center px-8 py-4 bg-amber-700 text-white font-semibold rounded-lg transition-all duration-300 hover:bg-amber-800 hover:shadow-lg transform hover:-translate-y-1">
    Commencer un projet
    <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
    </svg>
</button>

 
            </div><div id="contactForm" class="hidden mt-10 max-w-xl mx-auto bg-white p-8 shadow-lg rounded-xl border">
    <h3 class="text-2xl font-bold mb-4 text-gray-800">Contactez-moi</h3>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">Votre nom :</label>
            <input type="text" name="name" class="w-full border rounded-lg p-3" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Votre email :</label>
            <input type="email" name="email" class="w-full border rounded-lg p-3" required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Votre message :</label>
            <textarea name="message" rows="4" class="w-full border rounded-lg p-3" required></textarea>
        </div>

        <button class="w-full bg-amber-700 text-white py-3 rounded-lg font-semibold hover:bg-amber-800">
            Envoyer
        </button>
    </form>
</div>
        </div>
    </section>
<script>
function toggleContactForm() {
    document.getElementById('contactForm').classList.toggle('hidden');
}
</script>

@endsection
