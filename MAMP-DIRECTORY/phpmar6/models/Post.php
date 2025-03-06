<?php

namespace phpmar6\models;
class Post {
    public function getPosts(): array {
        return [
            [
                'title' => 'Annie 1',
                'description' => 'Annie 1 description'
            ],
            [
                'title' => 'Annie 2',
                'description' => 'Annie 2 description'
            ]
        ];
    }
}