<?php

namespace EquilibrioFinanceiro\Controllers;

use Twig\Environment as Twig;
use EquilibrioFinanceiro\Controllers\AbstractController;

class PoliticaDePrivacidade extends AbstractController
{
    private object $post_model;

    public function __construct(Twig $twig, $post_model)
    {
        $this->post_model = $post_model;
        parent::__construct($twig);
    }

    public function enqueueStyles($versao): void
    {
        // toDo - Minify CSS
        wp_enqueue_style("politica-de-privacidade-css", "{$this->path_views}/css/src/politica-de-privacidade.css", [], $versao);
        $this->enqueueStylesComum($versao);
    }

    public function enqueueScripts($versao): void
    {
        $this->enqueueScriptsComum($versao);
    }

    public function render(): void
    {
        echo $this->twig->render("politica-de-privacidade.html", [
            "path_views" => $this->path_views,
            "post"       => $this->post_model
        ]);
    }
}