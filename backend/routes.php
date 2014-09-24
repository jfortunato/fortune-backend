<?php

/**
 * Create a route for the homepage, if you are creating a
 * single page application with javascript this is where
 * you want to use the main html template.
 *
 */
$app->get('/', function () use ($app) {
    $app->render('main.html');
});


/**
 * You can define other routes here if you wish
 *
 * ============================================
 */


//$app->get('/example', function () {
    //echo 'an example route';
//});
