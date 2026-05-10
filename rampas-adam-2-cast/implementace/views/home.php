<!DOCTYPE html>
<html>
<head>
    <title>Správa sportovních výsledků</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 40px; }
        .dashboard { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 1000px; margin: 0 auto; }
        .card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 1px solid #ddd; }
        .card h2 { margin-top: 0; color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .item-list { list-style: none; padding: 0; }
        .item { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f9f9f9; }
        .btn { background: #4a90e2; color: white; padding: 6px 12px; text-decoration: none; border-radius: 5px; font-size: 13px; }
        .btn-add { display: inline-block; margin-top: 15px; background: #27ae60; }
        .btn-action { background: #e67e22; width: 100%; text-align: center; margin-top: 20px; padding: 12px; display: block; box-sizing: border-box; }
        nav { text-align: center; margin-bottom: 30px; }
        nav a { margin: 0 10px; text-decoration: none; color: #666; font-weight: bold; }
    </style>
</head>
<body>
    <nav>
        <a href="/standings" style="color: #e67e22;">Průběžné výsledky (veřejné)</a>
    </nav>
    <h1 style="text-align: center;">Správa sportovních výsledků</h1>
    <div class="dashboard">
        <div class="card">
            <h2>Sezóny</h2>
            <div class="item-list">
                <?php foreach(array_slice($seasons, 0, 2) as $s): ?>
                    <div class="item">
                        <span><?= $s->year ?> | <?= $s->name ?></span>
                        <a href="/seasons" class="btn">Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="/seasons/create" class="btn btn-add">Vytvořit sezónu</a>
        </div>
        <div class="card">
            <h2>Jezdci</h2>
            <div class="item-list">
                <?php foreach(array_slice($drivers, 0, 2) as $d): ?>
                    <div class="item">
                        <span><?= $d->name ?></span>
                        <a href="/drivers" class="btn">Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="/drivers/create" class="btn btn-add">Přidat jezdce</a>
        </div>
        <div class="card">
            <h2>Týmy</h2>
            <div class="item-list">
                <?php foreach(array_slice($teams, 0, 2) as $t): ?>
                    <div class="item">
                        <span><?= $t->name ?></span>
                        <a href="/teams" class="btn">Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="/teams/create" class="btn btn-add">Přidat tým</a>
        </div>
        <div class="card">
            <h2>Poslední výsledky</h2>
            <div class="item-list">
                <?php foreach($results as $r): ?>
                    <div class="item">
                        <span><?= $r['name'] ?> | <?= $r['position'] ?>. místo</span>
                        <strong><?= $r['points'] ?>b</strong>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="/results/select" class="btn btn-add btn-action">Zadat výsledek</a>
        </div>
    </div>
</body>
</html>