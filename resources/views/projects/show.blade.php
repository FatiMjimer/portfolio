@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">

    {{-- Bouton retour --}}
    <a href="{{ url('/') }}" 
       class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 mb-6">
        ← Retour
    </a>

    {{-- Card principale --}}
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        
        {{-- Image du projet --}}
        @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" 
             alt="{{ $project->title }}"
             class="w-full h-72 object-cover">
        @endif

        <div class="p-6 space-y-4">

            {{-- Titre --}}
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $project->title }}
            </h1>

            {{-- Technologies --}}
            @if($project->technologies)
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $project->technologies) as $tech)
                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm">
                    {{ trim($tech) }}
                </span>
                @endforeach
            </div>
            @endif

            {{-- Description --}}
            <p class="text-gray-700 leading-relaxed">
                {{ $project->description }}
            </p>

            {{-- Liens supplémentaires --}}
            <div class="pt-4 flex items-center gap-4">

                {{-- Lien GitHub --}}
                @if($project->github)
                <a href="{{ $project->github }}" target="_blank"
                   class="text-blue-600 font-semibold hover:underline">
                    Voir sur GitHub →
                </a>
                @endif

                {{-- Demo live --}}
                @if($project->demo)
                <a href="{{ $project->demo }}" target="_blank"
                   class="text-green-600 font-semibold hover:underline">
                    Demo live →
                </a>
                @endif

                {{-- Vidéo --}}
                @if($project->video_path)
                <a href="{{ asset('storage/' . $project->video_path) }}" 
                   target="_blank"
                   class="text-purple-600 font-semibold hover:underline">
                    Voir la vidéo →
                </a>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
