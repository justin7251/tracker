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

    }

    public function registerAction()
    {

        // Store and check for errors
        $success = $this->save(
            $this->request->getPost(),
            [
                "username",
                "email",
            ]
        );

        if ($success) {
             $this->flash->success(
                "Thanks for registering!"
            );
        } else {
            echo "Sorry, the following problems were generated: ";

            $messages = $this->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        return $this->dispatcher->forward(
            [
                "controller" => "signup",
                "action"     => "index",
            ]
        );
    }
}

