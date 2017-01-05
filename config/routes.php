<?php

use IntMag\Library\Route;

return  array(
    // site routes
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
    'products' => new Route('/products', 'product', 'list')
);