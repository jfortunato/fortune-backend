<?php

use Slim\Slim;
use Symfony\Component\Yaml\Yaml;
use Fortune\ResourceFactory;

require_once __DIR__ . '/../backend/bootstrap/bootstrap.php';

// instantiate a new slim application
$app = new Slim;

/**
 * Fortune needs 2 things to run.
 * 1) A configuration for all resources.
 * 2) A database connection.
 *
 */
$config = Yaml::parse(file_get_contents(CONFIG_DIR . '/resources.yml'));
$database = require_once CONFIG_DIR . '/database/database.php';

/**
 * Give the Fortune Factory the $config and $database,
 * and it will automatically generate the necessary
 * routes needed to access resources.
 */
$factory = new ResourceFactory($database, $config);
$factory->generateSlimRoutes($app);


// get the root route and any other user defined routes
require_once PROJECT_ROOT . '/backend/routes.php';


// run the slim application
$app->run();
