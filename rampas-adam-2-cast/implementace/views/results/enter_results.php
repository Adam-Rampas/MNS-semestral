<!DOCTYPE html>
<html>
<head>
    <title>Zadání výsledků závodu</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .container { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 700px; position: relative; }
        h1 { text-align: center; margin-bottom: 40px; }
        
        .main-content { display: flex; justify-content: space-between; gap: 30px; }
        .results-entry { flex: 1.5; }
        .sidebar { flex: 1; }
        
        /* Tabulka pořadí */
        .entry-row { display: flex; align-items: center; margin-bottom: 10px; }
        .pos-num { width: 40px; font-weight: bold; }
        .driver-select { flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        
        /* Box s body */
        .points-box { border: 1px solid #ddd; padding: 15px; border-radius: 8px; background: #fafafa; }
        .points-box h3 { margin-top: 0; font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .point-item { display: flex; justify-content: space-between; padding: 3px 0; font-size: 14px; }
        
        /* Nejrychlejší kolo */
        .fastest-lap { margin-bottom: 30px; }
        .fastest-lap select { width: 100%; padding: 8px; border: 1px solid #000; border-radius: 4px; background: #fff; }

        /* Tlačítka */
        .actions { display: flex; justify-content: center; gap: 20px; margin-top: 40px; }
        .btn { padding: 12px 40px; border: none; border-radius: 8px; color: white; cursor: pointer; font-weight: bold; text-decoration: none; }
        .btn-back { background-color: #e74c3c; }
        .btn-save { background-color: #4a90e2; }

    </style>
</head>
<body>

<div class="container">

    <h1>Zadání výsledků závodu</h1>

    <form method="POST">
        <div class="main-content">
            <div class="results-entry">
                <div style="display: flex; margin-bottom: 10px; font-weight: bold;">
                    <div style="width: 70px;">Pořadí</div>
                    <div>Jezdec</div>
                </div>
                
                <?php for($i=1; $i<=10; $i++): ?>
                    <div class="entry-row">
                        <div class="pos-num"><?= $i ?>.</div>
                        <select name="positions[<?= $i ?>]" class="driver-select">
                            <option value="">-- vybrat jezdce --</option>
                            <?php foreach($drivers as $d): ?>
                                <option value="<?= $d->id ?>"><?= $d->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="sidebar">
                <div class="fastest-lap">
                    <label><strong>Nejrychlejší kolo:</strong></label>
                    <select name="fastest_driver_id">
                        <option value="">-- vybrat jezdce --</option>
                        <?php foreach($drivers as $d): ?>
                            <option value="<?= $d->id ?>"><?= $d->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="points-box">
                    <h3>Přidělené body:</h3>
                    <?php 
                    $pts = [1 => 25, 2 => 18, 3 => 15, 4 => 12, 5 => 10, 6 => 8, 7 => 6, 8 => 4, 9 => 2, 10 => 1];
                    foreach($pts as $pos => $p): ?>
                        <div class="point-item">
                            <span><?= $pos ?>. místo</span>
                            <strong><?= $p ?>b</strong>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="/results/select" class="btn btn-back">Zpět</a>
            <button type="submit" class="btn btn-save">Uložit</button>
        </div>
    </form>
</div>

</body>
</html>
