<?php
    $router->get('/', 'HomeController@index');
    $router->get('/listings', 'ListingController@index');

    // Search (must be above {id} route)
    $router->get('/listings/search', 'ListingController@search');

    // Auth required routes
    $router->get('/listings/create', 'ListingController@create', ['auth']);
    $router->post('/listings', 'ListingController@store', ['auth']);
    $router->get('/listings/edit/{id}', 'ListingController@edit', ['auth']);
    $router->put('/listings/{id}', 'ListingController@update', ['auth']);
    $router->delete('/listings/{id}', 'ListingController@destroy', ['auth']);

    // Show single listing (public)
    $router->get('/listings/{id}', 'ListingController@show');

    // Guest only routes
    $router->get('/register', 'UserController@create', ['guest']);
    $router->post('/register', 'UserController@store', ['guest']);
    $router->get('/login', 'UserController@login', ['guest']);
    $router->post('/login', 'UserController@authenticate', ['guest']);

    // Logout
    $router->post('/logout', 'UserController@logout', ['auth']);
?>