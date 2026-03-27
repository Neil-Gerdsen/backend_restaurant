<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Restaurant App')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        
        nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }
        
        nav a:hover {
            opacity: 0.8;
        }
        
        nav a.active {
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-menu form {
            margin: 0;
        }
        
        .user-menu button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .user-menu button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .user-menu a {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .user-menu a:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            min-height: calc(100vh - 200px);
        }
        
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <div class="header-container">
            <a href="/" class="logo">🍽️ Restaurant App</a>
            <nav>
                <a href="/" class="@if(request()->is('/')) active @endif">Homepage</a>
                <a href="/gerechten" class="@if(request()->is('gerechten*')) active @endif">Menu</a>
                <a href="/contact" class="@if(request()->is('contact')) active @endif">Contact</a>
            </nav>
            <div class="user-menu">
                @if(Auth::check())
                    <span>{{ Auth::user()->name }}</span>
                    <a href="/admin">Admin</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Inloggen</a>
                @endif
            </div>
        </div>
    </header>
    
    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>&copy; 2026 Restaurant App. All rights reserved.</p>
    </footer>
</body>
</html>
