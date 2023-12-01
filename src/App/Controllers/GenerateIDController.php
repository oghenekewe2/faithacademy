<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class GenerateIDController
{
    private TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    public function generateIDView()
    {
        echo $this->view->render('generateID.php', [
            'title' => 'Generate Student ID'
        ]);
    }
}
