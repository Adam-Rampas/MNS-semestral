<!DOCTYPE html>
<html>
<head>
    <title>Týmy</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto; }
        h1 { color: #333; margin-top: 0; }
        .btn-add { display: inline-block; padding: 10px 20px; background-color: #e67e22; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-bottom: 20px; }
        .team-item { padding: 15px; border-bottom: 1px solid #eee; display: flex; align-items: center; }
        .team-item:last-child { border-bottom: none; }
        .team-name { font-size: 18px; font-weight: bold; color: #2c3e50; }
        .back-link { display: inline-block; margin-top: 20px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seznam týmů</h1>
        <a href="/teams/create" class="btn-add" style="background-color: #4a90e2;">+ Přidat nový tým</a>
        
        <div class="team-list">
            <?php foreach ($teams as $team): ?>
            <div class="team-item">
                <span class="team-name"><?php echo $team->name; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        
        <a href="/" class="back-link">Zpět na Dashboard</a>
    </div>
</body>
</html>
