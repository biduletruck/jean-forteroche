<?php

namespace Core\Lib;


class Controller
{

    protected $template = TEMPLATE;

    protected function render($repository, $view, $variables = []){
        ob_start();
        $dossier = ucfirst($repository);
        $fichier = ucfirst($view);
        extract($variables);
        require (ROOT . '/Web/' . $dossier . '/View/View' . $fichier . '.php');
        $content = ob_get_clean();
        require($this->template);
    }

}