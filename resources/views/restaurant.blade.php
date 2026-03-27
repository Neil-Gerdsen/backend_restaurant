<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar h1 {
            font-size: 24px;
        }
        
        .navbar-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .navbar a, .navbar button {
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 14px;
        }
        
        .navbar a:hover, .navbar button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🍽️ Restaurants</h1>
        <div class="navbar-buttons">
            @guest
                <a href="{{ route('login') }}">🔐 Inloggen</a>
            @else
                <span>Welkom, {{ Auth::user()->name }}</span>
                <a href="/admin">📊 Admin</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: inline;">
                    @csrf
                    <button type="submit">🚪 Uitloggen</button>
                </form>
            @endguest
        </div>
    </div>
    
    <div class="container">

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Restaurants Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            @if($restaurants->count() > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Beschrijving</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prijs</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($restaurants as $restaurant)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $restaurant->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ Str::limit($restaurant->beschrijving, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    € {{ number_format((float)$restaurant->prijs, 2, ',', '.') }}
                                </td>
                               
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="p-6 text-center text-gray-500">
                    <p>Geen restaurants gevonden. <a href="{{ route('restaurants.create') }}" class="text-blue-600 hover:underline">Maak er een aan!</a></p>
                </div>
            @endif
        </div>

        <!-- Grid View (Optional) -->
        @if($restaurants->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6">Overzicht</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($restaurants as $restaurant)
                        <a href="{{ route('restaurants.show', $restaurant->id) }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                            @if($restaurant->img)
                                <img src="{{ $restaurant->img }}" alt="{{ $restaurant->name }}" class="w-full h-48 object-cover rounded mb-4">
                            @endif
                            <h3 class="text-xl font-bold mb-2">{{ $restaurant->name }}</h3>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($restaurant->beschrijving, 100) }}</p>
                            <p class="text-blue-600 font-bold">€ {{ number_format((float)$restaurant->prijs, 2, ',', '.') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

</body>

</html>