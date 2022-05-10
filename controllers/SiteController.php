<?php

namespace impresja\controllers;

use impresja\impresja\Controller;
use impresja\impresja\Request;
use impresja\impresja\Application;

class SiteController extends Controller
{
    public function start()
    {
        Application::$app->view->title = "T jest tedst";
        $params = [
            'name' => 'Radek'
        ];
        return $this->render('start', $params);
    }

    public static function handleStart(Request $request)
    {
        $body = $request->getBody();
        print_r($body);
    }
}
