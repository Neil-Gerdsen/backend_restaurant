<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
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
        
        .narrator-buttons {
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
            max-width: 600px;
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-card h1 {
            margin-bottom: 20px;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
        }
        
        button, .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s;
            display: inline-block;
        }
        
        button:hover, .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-cancel {
            background: #ddd;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>➕ Product Toevoegen</h1>
        <div class="narrator-buttons">
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
        <div class="form-card">
            <h1>Nieuw Product</h1>
            
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Productnaam *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">Prijs *</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                
                <div class="btn-group">
                    <button type="submit" class="btn btn-submit">💾 Opslaan</button>
                    <a href="{{ route('products.index') }}" class="btn btn-cancel">Annuleren</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>