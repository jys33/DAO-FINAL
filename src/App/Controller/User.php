<?php namespace App\Controller;

use App\Flash;

class User {

    protected $userDao;
    protected $view;
    protected $config;

    public function __construct()
    {
        $this->config = \App\Config::get('site');
        $this->userDao = new \App\UserDao();
        $this->view = new \App\View();
    }

    protected function render($view, $data = [])
    {
        $this->config = \App\Config::get('site');

        $this->view->render($this->config['view_path'] . "/" . $view, $data);
    }

    public function loginAction(){

        if (isset($_POST) && sizeof($_POST) > 0) {
            
        }

        $this->render("../views/users/signin-form", ['title' => 'Sign in']);
    }

    public function password_resetAction() {

        $this->render("../views/users/password-reset", ['title' => 'Forgot your password?']);
    }

    public function listAction()
    {

        $users = $this->userDao->getAll();

        $this->render("../views/users/list", ['users' => $users, 'title' => 'List of users']);
    }

    public function registerAction()
    {
        if (isset($_POST) && count($_POST) > 0) {

            if(!array_key_exists('created',$_POST)) {
                $_POST['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified',$_POST)) {
                $_POST['modified'] = date("Y-m-d H:i:s");
            }
            $_POST['password'] = password_hash($_POST['password'] . 'Nh-Tw3M-cRW)', PASSWORD_DEFAULT);
            if ($this->userDao->add($_POST)) {
                Flash::addFlash('El registro se realizó correctamente.');
                header("Location: /");
                exit;
            }
        }

        $this->render("../views/users/signup-form", ['title' => 'Sign up']);
    }

    public function editAction()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $data = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'modified' => date("Y-m-d H:i:s")
            ];
            if (! empty($_POST['password']) ) {
                $data['password'] = password_hash($_POST['password'] . 'Nh-Tw3M-cRW)', PASSWORD_DEFAULT);
            }

            if ($this->userDao->update($_POST['id'], $data)) {
                header("Location: /index.php");
                exit;
            } else {
                echo "An error occurred";
                exit;
            }
        }

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "You did not pass in an ID.";
            exit;
        }

        $user = $this->userDao->findById($_GET['id']);

        if ($user === false) {
            echo "User not found!";
            exit;
        }

        $this->render("../views/users/edit", ['title' => 'Edit user', 'user' => $user]);
    }

    public function deleteAction()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "You did not pass in an ID.";
            exit;
        }

        /* Por ahora prescindimos de esté bloque de código
        $user = $userDao->findById($_GET['id']);

        if ($user === false) {
            echo "User not found!";
            exit;
        }
        */

        if ($this->userDao->delete($_GET['id'])) {
            header("Location: /");
            exit;
        } else {
            echo "An error occurred";
        }
    }
}