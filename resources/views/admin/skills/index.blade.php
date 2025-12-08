@extends('admin.layouts.admin')

@section('title', 'Mes Compétences')

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER TITRE + BOUTON -->
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-4">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">Mes Compétences</h2>
            </div>

            <a href="{{ route('admin.skills.create') }}"
               class="px-6 py-3 bg-amber-800 text-white font-semibold rounded-lg hover:bg-amber-900 shadow-md">
                + Ajouter une compétence
            </a>
        </div>

        <!-- TABLEAU DES COMPÉTENCES -->
        <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 border-b border-gray-300">
                    <tr>
                        <th class="p-4 text-gray-700 font-semibold">#</th>
                        <th class="p-4 text-gray-700 font-semibold">Compétence</th>
                        <th class="p-4 text-gray-700 font-semibold">Niveau</th>
                        <th class="p-4 text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($skills as $skill)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-600">{{ $skill->id }}</td>
                            <td class="p-4 text-gray-800 font-medium">{{ $skill->name }}</td>
                            <td class="p-4 text-gray-600">{{ $skill->level }}</td>
                            <td class="p-4 flex gap-4">
                                <a href="{{ route('admin.skills.edit', $skill->id) }}"
                                   class="text-amber-800 font-semibold hover:underline">
                                    Modifier
                                </a>

                                <form action="{{ route('admin.skills.destroy', $skill->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer cette compétence ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 font-semibold hover:underline">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-6 text-center text-gray-500 text-lg">
                                Aucune compétence pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
