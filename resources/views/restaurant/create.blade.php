<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Nieuw Restaurant</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            
            <h1 class="text-3xl font-bold mb-6">Nieuw Restaurant Toevoegen</h1>
fff
            <!-- Error Messages -->
             {{ dd($errors) }}
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('restaurants.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Naam *</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="Voer restaurant naam in"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                        required
                    >
                </div>

                <div>
                    <label for="beschrijving" class="block text-sm font-medium text-gray-700 mb-1">Beschrijving *</label>
                    <textarea 
                        name="beschrijving" 
                        id="beschrijving"
                        rows="4"
                        placeholder="Voer beschrijving in"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('beschrijving') border-red-500 @enderror"
                        required
                    >{{ old('beschrijving') }}</textarea>
                </div>

                <div>
                    <label for="prijs" class="block text-sm font-medium text-gray-700 mb-1">Prijs *</label>
                    <div class="flex items-center">
                        <span class="mr-2 text-gray-600">€</span>
                        <input 
                            type="number" 
                            name="prijs" 
                            id="prijs"
                            value="{{ old('prijs') }}"
                            placeholder="0.00"
                            step="0.01"
                            min="0"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('prijs') border-red-500 @enderror"
                            required
                        >
                    </div>
                </div>

                <div>
                    <label for="img" class="block text-sm font-medium text-gray-700 mb-1">Afbeelding URL</label>
                    <input 
                        type="url" 
                        name="img" 
                        id="img"
                        value="{{ old('img') }}"
                        placeholder="https://example.com/image.jpg"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('img') border-red-500 @enderror"
                    >
                </div>

                <div class="flex gap-3 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-medium"
                    >
                        Opslaan
                    </button>
                    <a 
                        href="{{ route('restaurants.index') }}" 
                        class="flex-1 bg-gray-300 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-400 transition font-medium text-center"
                    >
                        Annuleren
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
