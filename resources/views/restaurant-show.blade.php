<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurant->name }} - Restaurant</title>
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
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        
        .back-link:hover {
            text-decoration: underline;
        }
        
        .restaurant-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .restaurant-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background: #e0e0e0;
        }
        
        .restaurant-content {
            padding: 40px;
        }
        
        .restaurant-content h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 36px;
        }
        
        .restaurant-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .price {
            font-size: 28px;
            color: #667eea;
            font-weight: bold;
            margin-bottom: 30px;
        }
        
        .actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-danger {
            background: #ff6b6b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🍽️ Restaurant Details</h1>
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
        <a href="{{ route('restaurants.index') }}" class="back-link">← Terug naar restaurants</a>
        
        <div class="restaurant-card">
            @if($restaurant->img)
                <img src="{{ $restaurant->img }}" alt="{{ $restaurant->name }}" class="restaurant-image">
            @else
                <div class="restaurant-image" style="display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-size: 100px;">
                    🍽️
                </div>
            @endif
            
            <div class="restaurant-content">
                <h1>{{ $restaurant->name }}</h1>
                <p>{{ $restaurant->beschrijving }}</p>
                <div class="price">€ {{ number_format((float)$restaurant->prijs, 2, ',', '.') }}</div>
                
                @auth
                    <div class="actions">
                        <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">✏️ Bewerk</a>
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit restaurant wilt verwijderen?')">🗑️ Verwijder</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
