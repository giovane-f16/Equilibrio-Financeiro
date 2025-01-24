<?php

namespace EquilibrioFinanceiro\Providers;

use EquilibrioFinanceiro\Models\Post as PostModel;

class Post
{
    private $destaques;

    public function getDestaques(): array
    {
        if (isset($this->destaques)) {
            return $this->destaques;
        }

        $posts = get_posts([
            "numberposts" => 3
        ]);

        if (!$posts) {
            return [];
        }

        $this->destaques = array_map(function ($post) {
            return new PostModel($post);
        }, $posts);

        return $this->destaques;
    }
}