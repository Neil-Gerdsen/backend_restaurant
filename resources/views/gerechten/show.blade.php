<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gerecht->naam }}</title>
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
            max-width: 700px;
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
        
        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background: #e0e0e0;
        }
        
        .card-empty-img {
            width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 150px;
        }
        
        .card-content {
            padding: 30px;
        }
        
        .card-content h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 32px;
        }
        
        .card-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .price {
            font-size: 28px;
            color: #667eea;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
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
        
        .btn-edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-back {
            background: #ddd;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🍽️ Gerecht Details</h1>
        <div class="navbar-buttons">
            @auth
                <span>Welkom, {{ Auth::user()->name }}</span>
                <a href="/admin">📊 Admin</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: inline;">
                    @csrf
                    <button type="submit">🚪 Uitloggen</button>
                </form>
            @endauth
        </div>
    </div>
    
    <div class="container">
        <a href="{{ route('gerechten.index') }}" class="back-link">← Terug naar gerechten</a>
        
        <div class="card">
            @if($gerecht->img)
                <img src="{{ $gerecht->img }}" alt="{{ $gerecht->naam }}" class="card-img">
            @else
                <div class="card-empty-img">🍽️</div>
            @endif
            
            <div class="card-content">
                <h1>{{ $gerecht->naam }}</h1>
                <p>{{ $gerecht->beschrijving }}</p>
                <div class="price">€ {{ number_format($gerecht->prijs, 2, ',', '.') }}</div>
                
                @auth
                    <div class="actions">
                        <a href="{{ route('gerechten.edit', $gerecht->id) }}" class="btn btn-edit">✏️ Bewerk</a>
                        <a href="{{ route('gerechten.index') }}" class="btn btn-back">← Terug</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
