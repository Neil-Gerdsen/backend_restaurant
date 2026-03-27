@extends('layouts.app')

@section('title', 'Menu - Gerechten')

@section('styles')
<style>
    .btn-add {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 30px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: inline-block;
        text-decoration: none;
        font-weight: bold;
        transition: transform 0.2s;
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
    }
    
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #e0e0e0;
    }
    
    .card-empty-img {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-size: 80px;
    }
    
    .card-content {
        padding: 20px;
    }
    
    .card-content h3 {
        color: #333;
        margin-bottom: 10px;
        font-size: 20px;
    }
    
    .card-content p {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 10px;
    }
    
    .price {
        font-size: 18px;
        color: #667eea;
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .card-actions {
        display: flex;
        gap: 10px;
    }
    
    .btn-small {
        flex: 1;
        padding: 8px 12px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        font-weight: bold;
        transition: transform 0.2s;
        text-align: center;
    }
    
    .btn-small:hover {
        transform: scale(1.05);
    }
    
    .btn-edit {
        background: #667eea;
        color: white;
    }
    
    .btn-show {
        background: #4CAF50;
        color: white;
    }
    
    .btn-delete {
        background: #ff6b6b;
        color: white;
    }
    
    .empty {
        text-align: center;
        padding: 40px;
        background: white;
        border-radius: 10px;
        color: #999;
    }
    
    .success {
        background: #c8e6c9;
        color: #2e7d32;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<h1 style="margin-bottom: 20px; color: #333;">🍽️ Menu - Gerechten</h1>

@if (session('success'))
    <div class="success">✓ {{ session('success') }}</div>
@endif

@auth
    <a href="{{ route('gerechten.create') }}" class="btn-add">➕ Nieuw Gerecht</a>
@endauth

@if($gerechten->count() > 0)
    <div class="grid">
        @foreach($gerechten as $gerecht)
            <div class="card">
                @if($gerecht->img)
                    <img src="{{ $gerecht->img }}" alt="{{ $gerecht->naam }}" class="card-img">
                @else
                    <div class="card-empty-img">🍽️</div>
                @endif
                
                <div class="card-content">
                    <h3>{{ $gerecht->naam }}</h3>
                    <p>{{ substr($gerecht->beschrijving, 0, 80) }}...</p>
                    <div class="price">€ {{ number_format($gerecht->prijs, 2, ',', '.') }}</div>
                    
                    <div class="card-actions">
                        <a href="{{ route('gerechten.show', $gerecht->id) }}" class="btn-small btn-show">👁️ Bekijk</a>
                        @auth
                            <a href="{{ route('gerechten.edit', $gerecht->id) }}" class="btn-small btn-edit">✏️ Bewerk</a>
                            <form action="{{ route('gerechten.destroy', $gerecht->id) }}" method="POST" style="display: inline; flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-small btn-delete" onclick="return confirm('Verwijderen?')" style="width: 100%;">🗑️ Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty">
        <p>Geen gerechten gevonden.</p>
        @auth
            <a href="{{ route('gerechten.create') }}" style="color: #667eea; text-decoration: underline;">Maak een nieuw gerecht!</a>
        @endauth
    </div>
@endif
@endsection
