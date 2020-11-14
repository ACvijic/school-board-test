<?php

$router instanceof AltoRouter;

$router->map('GET', '/', function () {
    echo 'Hello from School Board!';
});

$router->map('GET', '/students/[i:id]', 'App\Controller\StudentsController#find');
