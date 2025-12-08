@extends('admin.layouts.admin')

@section('title', 'Ajouter un projet')

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-10 flex items-center gap-4">
            <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
            <h2 class="text-4xl font-bold text-gray-900">Ajouter un projet</h2>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Titre</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" rows="5" required
                              class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Technologies (séparées par des virgules)</label>
                    <input type="text" name="technologies" value="{{ old('technologies') }}"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Image (jpg, png)</label>
                    <input type="file" name="image" accept="image/*" class="w-full">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Vidéo (mp4 ou webm)</label>
                    <input type="file" name="video_path" accept="video/mp4,video/webm" class="w-full">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Lien GitHub</label>
                    <input type="url" name="github" value="{{ old('github') }}"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Lien Demo</label>
                    <input type="url" name="demo" value="{{ old('demo') }}"
                           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-800">
                </div>

                <button type="submit" class="w-full py-3 bg-amber-800 text-white font-semibold rounded-lg hover:bg-amber-900">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
