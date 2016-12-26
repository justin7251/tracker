<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        $this->tag->prependTitle('Tracker | ');
        $this->view->setTemplateAfter('main');
        $this->assets->addCss("css/main.css");
    }

    public function prr($data, $name)
    {
    	$this->view->disable();
    	echo "<pre>" . ($name ? $name . " = " : "" ) . print_r($data,TRUE) . "</pre>";
    }
}
