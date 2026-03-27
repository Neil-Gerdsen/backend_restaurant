<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar h1 {
            font-size: 24px;
        }
        
        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .navbar a:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .welcome-card h2 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .welcome-card p {
            color: #666;
            line-height: 1.6;
        }
        
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .admin-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
        
        .admin-card h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .admin-card p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .admin-card a {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: transform 0.2s;
        }
        
        .admin-card a:hover {
            transform: scale(1.05);
        }
        
        .status-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            margin-bottom: 20px;
        }
        
        .status-box p {
            color: #667eea;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🔐 Admin Panel</h1>
        <div class="user-info">
            <span>Welkom, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" style="background: rgba(255, 255, 255, 0.2); color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; transition: background 0.3s;">
                    Uitloggen
                </button>
            </form>
        </div>
    </div>
    
    <div class="container">
        @if (session('status'))
            <div class="status-box">
                <p>✓ {{ session('status') }}</p>
            </div>
        @endif
        
        <div class="welcome-card">
            <h2>Welkom op het Admin Dashboard!</h2>
            <p>Dit is je privé admin pagina. Hier kun je je applicatie beheren.</p>
        </div>
        
        <div class="admin-grid">
            <div class="admin-card">
                <h3>� Mijn Profiel</h3>
                <p>{{ Auth::user()->email }}</p>
                <p style="font-size: 14px; margin-top: 10px;">Welkom, {{ Auth::user()->name }}</p>
            </div>
            
            <div class="admin-card">
                <h3>🍽️ Gerechten</h3>
                <p>Beheer alle gerechten in je menu.</p>
                <a href="{{ route('gerechten.index') }}">Alle gerechten</a>
                <a href="{{ route('gerechten.create') }}" style="margin-top: 10px;">+ Nieuw gerecht</a>
            </div>
            
            <div class="admin-card">
                <h3>🏠 Dashboard</h3>
                <p>Terug naar homepage.</p>
                <a href="/">← Terug naar Home</a>
            </div>
        </div>
    </div>
</body>
</html>
