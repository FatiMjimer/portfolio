@extends('admin.layouts.admin')

@section('title', 'Message de ' . $message->name)

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- HEADER TITRE -->
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-4">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">
                    Message de {{ $message->name }}
                </h2>
            </div>

            <a href="{{ route('admin.messages') }}"
               class="text-gray-700 font-medium hover:text-amber-800 transition">
               ← Retour
            </a>
        </div>

        <!-- CARTE DU MESSAGE -->
        <div class="bg-white shadow-md rounded-xl border border-gray-200 p-8 mb-10">

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Nom :</span> {{ $message->name }}</p>
                    <p class="text-gray-600 mt-2"><span class="font-semibold text-gray-800">Email :</span> {{ $message->email }}</p>
                </div>

                <div>
                    <p class="text-gray-600">
                        <span class="font-semibold text-gray-800">Envoyé le :</span>
                        {{ $message->created_at->format('d/m/Y H:i') }}
                    </p>

                    <p class="mt-2">
                        @if($message->is_read)
                            <span class="text-green-700 font-semibold">Déjà lu</span>
                        @else
                            <span class="text-red-600 font-semibold">Non lu</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- MESSAGE -->
            <div class="mt-8 border-t pt-6">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Contenu du message</h3>

                <p class="text-gray-700 leading-relaxed whitespace-pre-line text-lg">
                    {{ $message->message }}
                </p>
            </div>

            <!-- BOUTON MARQUER COMME LU -->
            @unless($message->is_read)
            <form action="{{ route('admin.messages.markRead', $message->id) }}" method="POST" class="mt-8">
                @csrf
                <button class="px-5 py-3 bg-amber-800 text-white rounded-lg shadow hover:bg-amber-900 transition">
                    ✔ Marquer comme lu
                </button>
            </form>
            @endunless
        </div>

        <!-- FORMULAIRE DE RÉPONSE -->
        <div class="bg-white shadow-md rounded-xl border border-gray-200 p-8">
            <h3 class="text-2xl font-semibold text-gray-900 mb-6">Répondre à {{ $message->name }}</h3>

            <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                @csrf

                <textarea
                    name="reply"
                    rows="6"
                    required
                    class="w-full border border-gray-300 rounded-lg p-4 focus:ring focus:ring-amber-200 text-gray-800"
                    placeholder="Votre réponse…"
                ></textarea>

                <button
                    type="submit"
                    class="mt-6 px-5 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
                >
                    ✉ Envoyer la réponse
                </button>
            </form>
        </div>

    </div>
</section>
@endsection
