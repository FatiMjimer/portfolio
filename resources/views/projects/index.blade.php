@extends('admin.layouts.admin')

@section('title', 'Mes Projets')

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-4">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">Mes Projets</h2>
            </div>

            <a href="{{ route('admin.projects.create') }}"
               class="px-6 py-3 bg-amber-800 text-white font-semibold rounded-lg hover:bg-amber-900 shadow-md">
                + Ajouter un projet
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse ($projects as $project)
                <article class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                    <div class="relative h-56 bg-gray-100 overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $project->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No image</div>
                        @endif
                    </div>

                    <div class="p-6 space-y-3">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $project->title }}</h3>

                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($project->description, 140) }}
                        </p>

                        <div class="flex flex-wrap gap-2 pt-2">
                            @if($project->technologies)
                                @foreach(explode(',', $project->technologies) as $tech)
                                    <span class="text-xs px-2 py-1 bg-amber-100 text-amber-800 rounded">{{ trim($tech) }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="pt-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                @if($project->github)
                                    <a href="{{ $project->github }}" target="_blank" class="text-gray-600 hover:text-gray-900 text-sm">GitHub</a>
                                @endif
                                @if($project->demo)
                                    <a href="{{ $project->demo }}" target="_blank" class="text-gray-600 hover:text-gray-900 text-sm">Démo</a>
                                @endif
                                @if($project->video_path)
                                    <button onclick="document.getElementById('v-{{ $project->id }}').classList.remove('hidden')"
                                            class="text-gray-600 hover:text-gray-900 text-sm">Voir vidéo</button>
                                @endif
                            </div>

                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-amber-800 font-semibold">Modifier</a>

                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 font-semibold">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Video modal simple --}}
                    @if($project->video_path)
                        <div id="v-{{ $project->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4">
                            <div class="bg-white rounded-lg max-w-3xl w-full p-4 relative">
                                <button onclick="document.getElementById('v-{{ $project->id }}').classList.add('hidden')"
                                        class="absolute top-3 right-3 text-gray-600">✕</button>
                                <video controls class="w-full rounded">
                                    <source src="{{ asset('storage/' . $project->video_path) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la vidéo.
                                </video>
                            </div>
                        </div>
                    @endif
                </article>
            @empty
                <div class="text-center text-gray-500 mt-16 text-lg">Aucun projet pour le moment.</div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
</section>
@endsection
