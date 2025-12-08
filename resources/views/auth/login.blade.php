<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">
            Connexion Admin
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <label class="text-gray-600 font-semibold">Email</label>
                <input type="email" name="email"
                       class="w-full mt-1 p-3 border rounded-lg focus:ring focus:ring-amber-300"
                       required>
            </div>

            <div class="mb-6">
                <label class="text-gray-600 font-semibold">Mot de passe</label>
                <input type="password" name="password"
                       class="w-full mt-1 p-3 border rounded-lg focus:ring focus:ring-amber-300"
                       required>
            </div>

            <button class="w-full bg-amber-700 text-white py-3 rounded-lg font-semibold hover:bg-amber-800">
                Se connecter
            </button>
        </form>

    </div>
</div>

</body>
</html>
