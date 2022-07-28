<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'bibliotheque',
        'DB_USER' => 'root',
        'DB_PSWD' => '',
    ],
    'app' => [
        'name' => 'Bibliotheque',
        'projectBaseUrl' => 'http://localhost/php/12_start_mvc'
    ]
];

/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */
const BASE_DIR = __DIR__ . '\\..\\';
const BASE_PATH = CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
const PUBLIC_FOLDER = BASE_DIR . 'public\\';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';
const PHOTO = BASE_DIR.'public\\upload\\';
const COVER = '../../public/upload/';

// Initialiser la session d'erreurs

$_SESSION["erreurs"] = "";

/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    ''                  => ['AppController', 'index'],
    '/inscription'      => ['UserController', 'inscription'],
    '/inscriptions'      => ['UserController', 'inscription'],
    '/liste-livres'      => ['BookController', 'liste_livres'],




];


