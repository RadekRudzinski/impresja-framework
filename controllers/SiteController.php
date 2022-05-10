<?php

namespace impresja\controllers;

use impresja\impresja\Controller;
use impresja\impresja\Request;
use impresja\impresja\Application;

class SiteController extends Controller
{
    public function start()
    {
        Application::$app->view->title = "Impresja 4";
        $params = [
            'name' => 'My name'
        ];
        return $this->render('start', $params);
    }

    public static function handleStart(Request $request)
    {
        $body = $request->getBody();
        print_r($body);
    }
}
