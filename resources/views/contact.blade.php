@extends('layouts.app')

@section('title', 'Contact - Restaurant App')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h1 style="color: #333; margin-bottom: 20px;">Contact</h1>
    <p style="color: #666; margin-bottom: 30px;">Heb je vragen? Neem gerust contact met ons op!</p>
    
    <form method="POST" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Naam</label>
            <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">E-mailadres</label>
            <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #333;">Bericht</label>
            <textarea name="message" rows="5" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
        </div>
        
        <button type="submit" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer;">
            Verstuur
        </button>
    </form>
</div>
@endsection
