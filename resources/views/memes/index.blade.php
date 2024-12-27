<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-purple-600 to-blue-500 min-h-screen flex flex-col items-center p-4">
    <header class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-white hover:text-pink-200 transition">MemeQuote</a>
            <nav>
                <a href="/memes" class="text-white hover:text-pink-200 transition mr-4">Memes</a>
                <a href="/quotes" class="text-white hover:text-pink-200 transition">Quotes</a>
            </nav>
            <div class="flex items-center space-x-2 text-white">
                @auth
                    <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-pink-500 hover:text-pink-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-white hover:text-gray-200">Sign Up</a>
                @endauth
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-bold text-white mb-8 text-center">Explore Memes</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($memes as $meme)
                <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105">
                    <img src="{{ $meme->image_url }}" alt="{{ $meme->title }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $meme->title }}</h2>
                        <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Edit Meme
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
