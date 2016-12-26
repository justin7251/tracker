<?php

class ControlPanelBase extends ControllerBase
{
    protected function initialize()
    {
        $this->tag->prependTitle('Tracker Panel | ');
        $this->view->setTemplateAfter('control_panel');
        $this->assets->addCss("css/control_panel.css");
    }
}