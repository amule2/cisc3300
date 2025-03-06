<?php

namespace phpmar6\models;
class Post {
    public function getPosts(): array {
        return [
            [
                'title' => 'First Post',
                'description' => 'This is my first post description'
            ],
            [
                'title' => 'Second Post',
                'description' => 'This is my second post description'
            ]
        ];
    }
}