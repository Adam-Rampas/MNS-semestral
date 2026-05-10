<!DOCTYPE html>
<html>
<head>
    <title>Výběr závodu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 600px; position: relative; }
        h1 { text-align: center; margin-bottom: 40px; }
        
        .form-grid { display: flex; justify-content: space-between; gap: 40px; }
        .column { flex: 1; }
        
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; }
        .form-group select, .form-group input { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        
        .audit-log { margin-top: 30px; }
        .audit-log textarea { width: 100%; height: 80px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        
        .actions { display: flex; justify-content: center; gap: 20px; margin-top: 40px; }
        .btn { padding: 12px 30px; border: none; border-radius: 8px; color: white; cursor: pointer; font-weight: bold; text-decoration: none; }
        .btn-back { background-color: #e74c3c; } 
        .btn-next { background-color: #4a90e2; } 
        

    </style>
</head>
<body>

<div class="container">


    <h1>Výběr závodu</h1>

    <form method="POST">
        <div class="form-grid">
            <!-- Levý sloupec -->
            <div class="column">
                <div class="form-group">
                    <label>Sezóna:</label>
                    <select name="season_id">
                        <?php foreach($seasons as $s): ?>
                            <option value="<?= $s->id ?>"><?= $s->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Typ závodu:</label>
                    <select name="type">
                        <option value="Hlavní závod">Hlavní závod</option>
                        <option value="Sprint">Sprint</option>
                    </select>
                </div>
            </div>

            <!-- Pravý sloupec -->
            <div class="column">
                <div class="form-group">
                    <label>Lokace a název:</label>
                    <input type="text" name="name" placeholder="např. GP Monaka" required>
                </div>
                <div class="form-group">
                    <label>Datum konání:</label>
                    <input type="date" name="date" required>
                </div>
                <!-- Skryté pole pro lokaci, aby se zachovala funkčnost repository -->
                <input type="hidden" name="location" value="Okruh">
            </div>
        </div>

        <div class="audit-log">
            <label><strong>Audit log</strong></label>
            <textarea name="note" placeholder="Poznámka k závodu..."></textarea>
        </div>

        <div class="actions">
            <a href="/" class="btn btn-back">Zpět</a>
            <button type="submit" class="btn btn-next">Pokračovat</button>
        </div>
    </form>
</div>

</body>
</html>
