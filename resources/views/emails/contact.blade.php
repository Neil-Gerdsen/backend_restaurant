<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .header {
            background-color: #667eea;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #999;
        }
        .sender-info {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nieuw Contact Bericht</h2>
        </div>
        
        <div class="content">
            <div class="sender-info">
                <strong>Van:</strong> {{ $name }}<br>
                <strong>Email:</strong> {{ $email }}
            </div>
            
            <h3>Bericht:</h3>
            <p>{!! nl2br(e($messageText)) !!}</p>
            
            <div class="footer">
                <p>Dit bericht is verzonden via het contactformulier van je Restaurant App.</p>
            </div>
        </div>
    </div>
</body>
</html>
