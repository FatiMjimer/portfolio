@extends('admin.layouts.admin')

@section('title', 'Messages reçus')

@section('content')
<section class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">

        <!-- HEADER TITRE -->
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-4">
                <div class="w-12 h-1 bg-amber-800 rounded-full"></div>
                <h2 class="text-4xl font-bold text-gray-900">Messages reçus</h2>
            </div>
        </div>

        <!-- TABLEAU DES MESSAGES -->
        <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 border-b border-gray-300">
                    <tr>
                        <th class="p-4 text-gray-700 font-semibold">#</th>
                        <th class="p-4 text-gray-700 font-semibold">Nom</th>
                        <th class="p-4 text-gray-700 font-semibold">Email</th>
                        <th class="p-4 text-gray-700 font-semibold">Message</th>
                        <th class="p-4 text-gray-700 font-semibold">Statut</th>
                        <th class="p-4 text-gray-700 font-semibold">Reçu le</th>
                        <th class="p-4 text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($messages as $msg)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">{{ $msg->id }}</td>

                        <td class="p-4 text-gray-800 font-medium">
                            {{ $msg->name }}
                        </td>

                        <td class="p-4 text-gray-600">{{ $msg->email }}</td>

                        <td class="p-4 text-gray-600 truncate max-w-xs">
                            {{ Str::limit($msg->message, 40) }}
                        </td>

                        <td class="p-4">
                            @if ($msg->is_read)
                                <span class="text-green-700 font-semibold">Lu</span>
                            @else
                                <span class="text-red-600 font-semibold">Non lu</span>
                            @endif
                        </td>

                        <td class="p-4 text-gray-600">
                            {{ $msg->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td class="p-4 flex gap-4">

                            <!-- Voir -->
                            <a href="{{ route('admin.messages.show', $msg->id) }}"
                               class="text-amber-800 font-semibold hover:underline">
                                Voir
                            </a>

                            <!-- Marquer comme lu -->
                            @if (!$msg->is_read)
                            <form action="{{ route('admin.messages.markRead', $msg->id) }}"
                                  method="POST">
                                @csrf
                                <button class="text-blue-600 font-semibold hover:underline">
                                    Marquer lu
                                </button>
                            </form>
                            @endif

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500 text-lg">
                            Aucun message pour le moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $messages->links() }}
        </div>

    </div>
</section>
@endsection
