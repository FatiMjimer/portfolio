@extends('admin.layouts.admin')

@section('title', 'Modifier une compétence')

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-3xl mx-auto">

        <div class="flex items-center gap-4 mb-12">
            <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
            <h2 class="text-4xl font-bold text-gray-900">Modifier la compétence</h2>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200">
            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nom -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Nom de la compétence</label>
                    <input type="text" name="name" value="{{ $skill->name }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-800 focus:border-amber-800">
                </div>

                <!-- Niveau -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Niveau (0 à 100)</label>
                    <input type="number" name="level" value="{{ $skill->level }}" min="0" max="100" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-800 focus:border-amber-800">
                </div>

                <div class="flex items-center gap-4 mt-8">
                    <button class="px-6 py-3 bg-amber-800 text-white rounded-lg font-semibold hover:bg-amber-900 shadow-md">
                        Mettre à jour
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="text-gray-600 hover:underline">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
