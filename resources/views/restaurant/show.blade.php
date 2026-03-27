<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>{{ $restaurant->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-2xl mx-auto p-10">
        
        <!-- Back Button -->
        <a href="{{ route('restaurants.index') }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">
            ← Terug naar restaurants
        </a>

        <!-- Restaurant Detail -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            
            @if($restaurant->img)
                <img src="{{ $restaurant->img }}" alt="{{ $restaurant->name }}" class="w-full h-96 object-cover">
            @else
                <div class="w-full h-96 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500 text-lg">Geen afbeelding beschikbaar</span>
                </div>
            @endif

            <div class="p-8">
                
                <h1 class="text-4xl font-bold mb-4">{{ $restaurant->name }}</h1>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2 text-gray-700">Beschrijving</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $restaurant->beschrijving }}</p>
                </div>

                <div class="mb-8 pb-8 border-b">
                    <h2 class="text-2xl font-bold text-blue-600">€ {{ number_format((float)$restaurant->prijs, 2, ',', '.') }}</h2>
                </div>

                <div class="flex gap-4">
                    <a 
                        href="{{ route('restaurants.edit', $restaurant->id) }}" 
                        class="flex-1 bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 transition font-medium text-center"
                    >
                        Bewerken
                    </a>
                    <form 
                        action="{{ route('restaurants.destroy', $restaurant->id) }}" 
                        method="POST" 
                        class="flex-1"
                        onsubmit="return confirm('Weet je het zeker?');"
                    >
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition font-medium"
                        >
                            Verwijderen
                        </button>
                    </form>
                </div>

                <!-- Metadata -->
                <div class="mt-8 pt-8 border-t text-sm text-gray-500">
                    <p>ID: {{ $restaurant->id }}</p>
                    <p>Aangemaakt: {{ $restaurant->created_at?->format('d-m-Y H:i') ?? 'N/A' }}</p>
                    <p>Bijgewerkt: {{ $restaurant->updated_at?->format('d-m-Y H:i') ?? 'N/A' }}</p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
