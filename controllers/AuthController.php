<?php

namespace impresja\controllers;

use impresja\impresja\Application;
use impresja\impresja\Controller;
use impresja\impresja\middlewares\AuthMiddleware;
use impresja\impresja\Request;
use impresja\impresja\Response;
use impresja\models\User;
use impresja\models\LoginForm;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $this->setLayout('auth');
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Dziękuję za rejestrację');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', ['model' => $user]);
        }
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
