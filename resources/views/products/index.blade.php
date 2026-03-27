<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
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
        
        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 12px 30px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        th {
            background: #f0f0f0;
            padding: 15px;
            text-align: left;
            font-weight: bold;
            color: #333;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        tr:hover {
            background: #f9f9f9;
        }
        
        .btn-small {
            padding: 6px 12px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin-right: 5px;
        }
        
        .btn-edit {
            background: #667eea;
            color: white;
        }
        
        .btn-delete {
            background: #ff6b6b;
            color: white;
        }
        
        .empty {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>🛍️ Producten</h1>
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
        <a href="{{ route('products.create') }}" class="btn-add">➕ Nieuw Product</a>
        
        @if($products->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Beschrijving</th>
                        <th>Prijs</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name ?? '-' }}</td>
                            <td>{{ substr($product->description ?? '-', 0, 50) }}</td>
                            <td>€ {{ number_format($product->price ?? 0, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn-small btn-edit">✏️ Bewerk</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-small btn-delete" onclick="return confirm('Verwijderen?')">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">
                <p>Geen producten gevonden. <a href="{{ route('products.create') }}">Maak er een!</a></p>
            </div>
        @endif
    </div>
</body>
</html>