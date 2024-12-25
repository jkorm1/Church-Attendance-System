<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MemeQuote</title>
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
<body class="bg-gradient-to-br from-purple-600 to-blue-500 min-h-screen flex items-center justify-center p-4">
    <div class="absolute top-4 right-4">
        @auth
            <div class="flex items-center space-x-2 text-white">
                <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-pink-500 hover:text-pink-700">Logout</button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
            <a href="{{ route('register') }}" class="ml-4 text-white hover:text-gray-200">Sign Up</a>
        @endauth
    </div>
    <div class="max-w-md w-full space-y-8 text-center">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-8 animate-fade-in-down">
            Welcome to MemeQuote
        </h1>
        <div class="space-y-4">
            <a href="{{ url('/memes') }}" class="block w-full py-3 px-6 text-white bg-pink-500 hover:bg-pink-600 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">
                Explore Memes
            </a>
            <a href="{{ url('/quotes') }}" class="block w-full py-3 px-6 text-white bg-teal-500 hover:bg-teal-600 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">
                Discover Quotes
            </a>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }
    </style>

    <script>
        // Add a simple particle effect
        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = `${x}px`;
            particle.style.top = `${y}px`;
            particle.style.width = '5px';
            particle.style.height = '5px';
            particle.style.background = 'rgba(255, 255, 255, 0.5)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            document.body.appendChild(particle);

            const animation = particle.animate([
                { transform: 'translate(0, 0)', opacity: 1 },
                { transform: `translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px)`, opacity: 0 }
            ], {
                duration: 1000 + Math.random() * 1000,
                easing: 'cubic-bezier(0, .9, .57, 1)',
            });

            animation.onfinish = () => particle.remove();
        }

        document.body.addEventListener('mousemove', (e) => {
            if (Math.random() < 0.1) {
                createParticle(e.clientX, e.clientY);
            }
        });
    </script>
</body>
</html>
