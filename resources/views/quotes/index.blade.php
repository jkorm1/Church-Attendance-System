<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        grayish: '#7d7d7d', // Define a custom greyish color
                        dim: '#333333', // Define a custom dim color for highlighting
                    },
                    fontSize: {
                        'icon-size': '24px', // Adjust the icon size as needed
                    },
                }
            }
        }
    </script>
    <script>
        function editQuote(id, author, quote) {
            const form = document.getElementById('quoteForm');
            const formTitle = document.getElementById('formTitle');
            form.action = `/quotes/${id}`;
            document.getElementById('author').value = author;
            document.getElementById('quote').value = quote;
            document.getElementById('quoteMethod').value = 'PUT';

            // Highlight the form and change the title
            formTitle.innerText = 'Edit Quote';
            form.classList.add('', '');

            // Dim all cards
            document.querySelectorAll('.quote-card').forEach(card => {
                card.classList.add('opacity-50');
            });

            // Highlight the selected card
            document.getElementById(`quote-card-${id}`).classList.remove('opacity-50');
        }

        function resetForm() {
            const form = document.getElementById('quoteForm');
            const formTitle = document.getElementById('formTitle');
            form.action = '{{ route('quotes.store') }}';
            form.reset();
            document.getElementById('quoteMethod').value = 'POST';

            // Reset form highlighting
            formTitle.innerText = 'Add a New Quote';
            form.classList.remove('bg-dim', 'text-white');

            // Reset card opacity
            document.querySelectorAll('.quote-card').forEach(card => {
                card.classList.remove('opacity-50');
            });
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
        <h1 class="text-4xl font-bold text-white mb-8 text-center">Discover Quotes</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Add/Edit Quote Form -->
        <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg p-6 rounded-lg w-full max-w-lg mx-auto mb-8" id="quoteFormContainer">
            <h2 class="text-2xl font-bold text-white mb-4" id="formTitle">Add a New Quote</h2>
            <form id="quoteForm" action="{{ route('quotes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" id="quoteMethod" value="POST">
                <div class="mb-4">
                    <label for="author" class="block text-white mb-2">Author</label>
                    <input type="text" name="author" id="author" class="w-full p-2 rounded bg-white bg-opacity-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
                </div>
                <div class="mb-4">
                    <label for="quote" class="block text-white mb-2">Quote</label>
                    <textarea name="quote" id="quote" class="w-full p-2 rounded bg-white bg-opacity-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-500" required></textarea>
                </div>
                <button type="submit" class="bg-pink-400  hover:bg-pink-600  font-bold py-2 px-4 rounded transition duration-300">
                    <x-akar-save class="w-6 h-6" />save
                </button>
                <button type="button" onclick="resetForm()" class=" hover:bg-gray-600 text-black font-bold py-2 px-4 rounded transition duration-300 ml-2">
                  <x-eos-cancel-o class="w-6 h-6"  />cancel
                </button>
            </form>
        </div>

        <!-- Quotes Display Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($quotes as $quote)
                <div class="quote-card bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105" id="quote-card-{{ $quote->id }}">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $quote->quote }}</h2>
                        <span class="block text-pink-300 mt-2">- {{ $quote->author }}</span>
                        <button onclick="editQuote({{ $quote->id }}, '{{ $quote->author }}', '{{ $quote->quote }}')" class=" hover:bg-pink-600 font-bold py-2 px-4 rounded transition duration-300 mt-4">
                            <x-akar-edit class="w-6 h-6" />
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
