<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerContato extends ClassRender implements InterfaceView{
    public function __construct()
    {
        $this->setTitle("Página Iniciala");
        $this->setDescription("Lucas");
        $this->setKeywords("MVC Avaliação");
        $this->setDir("home");
        $this->renderLayout();
    }
}