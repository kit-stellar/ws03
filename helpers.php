<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path = '') {
    return BASE_DIR . '/' . $path;
}

/**
 * load Q view
 * 
 * @param string $name
 * @return void
 * 
 */
function loadView($name) {
    require basePath ("views/{$name}.view.php");
}

/**
 * load A partial
 * 
 * @param string $name
 * @return void
 * 
 */
function loadPartial($name) {
    $partialPath = basePath("views/partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found!";
    }
}

?>