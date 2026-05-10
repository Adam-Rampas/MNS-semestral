<!DOCTYPE html>
<html>
<head>
    <title>Pořadí šampionátu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; padding: 40px; }
        .leaderboard-container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h1 { text-align: center; color: #1a1a1a; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #f8f9fa; color: #666; text-align: left; padding: 15px; border-bottom: 2px solid #eee; }
        td { padding: 15px; border-bottom: 1px solid #eee; }
        tr:nth-child(1) td:first-child { font-weight: bold; color: #f1c40f; } 
        .points-pill { background: #4a90e2; color: white; padding: 5px 12px; border-radius: 20px; font-weight: bold; }
        .team-tag { color: #888; font-size: 0.9em; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #4a90e2; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="leaderboard-container">
    <h1> Průběžné pořadí F1</h1>
    
    <table>
        <thead>
            <tr>
                <th>Pozice</th>
                <th>Jezdec / Tým</th>
                <th style="text-align: right;">Body celkem</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($standings as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?>.</td>
                    <td>
                        <strong><?= $row['driver_name'] ?></strong><br>
                        <span class="team-tag"><?= $row['team_name'] ?></span>
                    </td>
                    <td style="text-align: right;">
                        <span class="points-pill"><?= $row['total_points'] ?> b</span>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($standings)): ?>
                <tr><td colspan="3" style="text-align: center;">Zatím nebyly odjeté žádné závody.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/" class="back-link">Zpět na Dashboard (admin)</a>
</div>

</body>
</html>
