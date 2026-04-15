<?php

function basePath($path = '') {
    return __DIR__ . '/' . $path;
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
    require basePath ("views/partials/{$name}.php");
}

$partialPath = basePath('views/partials/{$name}.php');
if (file_exists($partialPath)) {
    require $partialPath;
} else {
    echo "Partial '{$name}' not found!";
}

?>