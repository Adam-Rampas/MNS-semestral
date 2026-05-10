<!DOCTYPE html>
<html>
<head>
    <title>Jezdci</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
        h1 { color: #333; margin-top: 0; }
        .btn-add { display: inline-block; padding: 10px 20px; background-color: #4a90e2; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
        .driver-num { background: #eee; padding: 5px 10px; border-radius: 5px; font-weight: bold; font-size: 14px; margin-right: 10px; }
        .team-tag { font-size: 13px; color: #7f8c8d; background: #f1f2f6; padding: 4px 8px; border-radius: 4px; }
        .back-link { display: inline-block; margin-top: 20px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jezdci</h1>
        <a href="/drivers/create" class="btn-add">+ Přidat jezdce</a>
        
        <table>
            <thead>
                <tr>
                    <th>Číslo a jméno</th>
                    <th>Tým</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drivers as $driver): ?>
                <tr>
                    <td>
                        <span class="driver-num"><?php echo $driver->number; ?></span>
                        <strong><?php echo $driver->name; ?></strong>
                    </td>
                    <td><span class="team-tag"><?php echo $driver->team_name ?? 'Bez týmu'; ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <a href="/" class="back-link"> Zpět na Dashboard</a>
    </div>
</body>
</html>
