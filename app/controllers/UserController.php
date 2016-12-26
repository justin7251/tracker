<?php

class UserController extends ControllerBase
{
    private function _registerSession($user)
    {
        $this->session->set(
            "auth",
            [
                "id"   => $user->id,
                "name" => $user->name,
            ]
        );
    }
    
    public function indexAction()
    {

    }
    
    public function sign_outAction()
    {
        
    }

    public function sign_inAction()
    {
       if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = Users::findFirst(array(
                "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                'bind' => array('email' => $email, 'password' => sha1($password))
            ));
            if ($user != false) {
                // $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->name);

                return $this->dispatcher->forward(
                    [
                        "controller" => "index",
                        "action"     => "index",
                    ]
                );
            }
            $this->flash->error('Wrong email/password');
        }
    }

    public function registerAction()
    {
        $this->tag->setTitle('Register');
        if ($this->request->isPost()) {
            $name = $this->request->getPost('name', array('string', 'striptags'));
            $username = $this->request->getPost('username', 'alphanum');
            $email = $this->request->getPost('email', 'email');
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            if ($password != $repeatPassword) {
                $this->flash->error('Passwords are different');
                return false;
            }

            $user = new Users();
            $user->username = $username;
            $user->password = sha1($password);
            $user->name = $name;
            $user->email = $email;
            $user->created_at = new Phalcon\Db\RawValue('now()');
            $user->active = 'Y';
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->tag->setDefault('email', '');
                $this->tag->setDefault('password', '');
                $this->flash->success('Thanks for sign-up, please log-in to start generating invoices');

                return $this->dispatcher->forward(
                    [
                        "controller" => "index",
                        "action"     => "index",
                    ]
                );
            }
        }
        $this->view->form = new RegisterForm();
    }
}

