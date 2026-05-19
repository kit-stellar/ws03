<?php 

namespace App\Controllers;
use Framework\Database;

class HomeController {
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $db = new Database($config);

        $this->db = new Database($config);
    }

    public function index() {
        $listings = $this->db->Query('SELECT * FROM listings LIMIT 6') -> fetchAll();
        loadView('home', [
            'listings' => $listings
        ]);
    }
}

?>