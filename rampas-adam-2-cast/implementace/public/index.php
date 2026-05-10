<?php

require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Controllers/SeasonController.php';
require_once __DIR__ . '/../app/Controllers/TeamController.php';
require_once __DIR__ . '/../app/Controllers/ResultController.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/DriverController.php';
require_once __DIR__ . '/../app/Controllers/StandingsController.php';

$router = new Router();

$router->get('/', function() {
    (new HomeController())->index();
});


$router->get('/seasons', function() {
    (new SeasonController())->index();
});

$router->get('/seasons/create', function() {
    (new SeasonController())->create();
});

$router->post('/seasons/create', function() {
    (new SeasonController())->create();
});

$router->get('/teams', function() {
    (new TeamController())->index();
});

$router->get('/teams/create', function() {
    (new TeamController())->create();
});

$router->post('/teams/create', function() {
    (new TeamController())->create();
});

$router->get('/drivers', function() {
    (new DriverController())->index();
});
$router->get('/drivers/create', function() {
    (new DriverController())->create();
});
$router->post('/drivers/create', function() {
    (new DriverController())->create();
});

$router->get('/standings', function() {
    (new StandingsController())->index();
});

$router->get('/results/select', function() { (new ResultController())->selectRace(); });
$router->post('/results/select', function() { (new ResultController())->selectRace(); });
$router->get('/results/enter', function() { (new ResultController())->enterResults(); });
$router->post('/results/enter', function() { (new ResultController())->enterResults(); });

$router->dispatch($_SERVER['REQUEST_URI'] ?? '/', $_SERVER['REQUEST_METHOD'] ?? 'GET');
