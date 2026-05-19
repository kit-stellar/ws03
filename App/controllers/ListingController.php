<?php 

namespace App\Controllers;
use Framework\Database;
use Framework\Validation;

class ListingController {
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $db = new Database($config);

        $this->db = new Database($config);
    }

    public function index() {
        $listings = $this->db->Query('SELECT * FROM listings') -> fetchAll();
        
        loadView('listings/index', [
            'listings' => $listings
        ]);
    }

    public function create() {
        loadView('listings/create');
    }

    public function show($params) {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->Query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        //Check if listing exist
        if(!$listing) {
            ErrorController::notFound('Listing not found');
            return;
        }

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }

    /**
     * Store data in database
     * 
     * @return void
     */
    public function store($params = []) {
        $allowedFields = [
            'title', 'description', 'salary', 'tags',
            'company', 'address', 'city', 'state',
            'phone', 'email', 'requirements', 'benefits'
        ];

        $newListingData = array_intersect_key(
            $_POST,
            array_flip($allowedFields)
        );

        $newListingData['user_id'] = Session::get('user')['id'];

        foreach ($newListingData as $field => $value) {
            if ($value === '') {
                //COnvert empty strings to null
                $newListingData[$field] = null;
            }
        }

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field]) ||
                !Validation::string($newListingData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            //Reload view with errors
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => (object) $newListingData
            ]);
        } else {
            $fields = implode(', ', array_keys($newListingData));
            $values = ':' . implode(', :', array_keys($newListingData));

            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";
            $this->db->Query($query, $newListingData);

            Session::setFlashMessage('success_message', 'Listing created successfully!');
            redirect('/listings');
        }
    }
    /**
     * Delete a listing
     * @param array $params
     * @return void
     */
    public function destroy($params) {
        $id = $params['id'];

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if(!listing) {
            ErrorController::notFound('Listing not found');
            return;
        }
        $this->db->Query('DELETE FROM listings WHERE id = :id', $params);

        //Set flash message
        $_SESSION['success_message'] = 'Listing deleted successfully';
    }
}

?>