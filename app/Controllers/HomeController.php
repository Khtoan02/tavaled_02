<?php
namespace App\Controllers;

use App\Models\PostModel;

class HomeController {
    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->getLatestPosts(10);
        
        // Pass data to view
        view('home', [
            'posts' => $posts,
            'title' => 'Welcome to Tavaled 02 (MVC)'
        ]);
    }
}
