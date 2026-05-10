<!DOCTYPE html>
<html>
<head>
    <title>Přidat tým</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; }
        h1 { text-align: center; margin-bottom: 30px; color: #333; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #666; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-save { width: 100%; padding: 12px; background-color: #4a90e2;; border: none; border-radius: 5px; color: white; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nový tým</h1>
        <form method="POST" action="/teams/create">
            <div class="form-group">
                <label>Název týmu:</label>
                <input type="text" name="name" placeholder="např. Red Bull Racing" required>
            </div>
            <button type="submit" class="btn-save">Uložit tým</button>
        </form>
        <a href="/" class="back-link"> Zpět na seznam</a>
    </div>
</body>
</html>
