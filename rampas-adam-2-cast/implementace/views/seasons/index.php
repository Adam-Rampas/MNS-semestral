<!DOCTYPE html>
<html>
<head>
    <title>Sezóny</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
        h1 { color: #333; margin-top: 0; }
        .btn-add { display: inline-block; padding: 10px 20px; background-color: #4a90e2; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; color: #666; text-transform: uppercase; font-size: 12px; }
        tr:hover { background-color: #fcfcfc; }
        .back-link { display: inline-block; margin-top: 20px; color: #666; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sezóny</h1>
        <a href="/seasons/create" class="btn-add">+ Vytvořit novou sezónu</a>
        
        <table>
            <thead>
                <tr>
                    <th>Rok</th>
                    <th>Název sezóny</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seasons as $season): ?>
                <tr>
                    <td><strong><?php echo $season->year; ?></strong></td>
                    <td><?php echo $season->name; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <a href="/" class="back-link"> Zpět na Dashboard</a>
    </div>
</body>
</html>
