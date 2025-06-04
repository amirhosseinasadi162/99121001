<?php
require_once 'config/database.php';
require_once 'app/models/Post.php';


class PostController
{  // This was the error - you had } instead of {
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    
        $user_id = $_SESSION['user']['id'];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
    
        $postModel = new Post();
        $totalPosts = $postModel->countByUser($user_id);
        $posts = $postModel->getByUser($user_id, $limit, $offset);
        $totalPages = ceil($totalPosts / $limit);
    
        $viewFile = 'app/views/posts.php';
        include 'app/views/layout.php';
    }
    

    public function create()
{
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?controller=auth&action=login");
        exit;
    }

    $viewFile = 'app/views/post_create.php';
    include 'app/views/layout.php';
}

public function store()
{
    if (!isset($_SESSION['user'])) exit;

    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $user_id = $_SESSION['user']['id'];

    $postModel = new Post();
    $postModel->create($user_id, $title, $content);

    header("Location: index.php?controller=post&action=index");
    exit;
}
public function edit()
{
    if (!isset($_SESSION['user'])) exit;

    $id = $_GET['id'] ?? null;
    $user_id = $_SESSION['user']['id'];

    $postModel = new Post();
    $post = $postModel->get($id, $user_id);

    if (!$post) {
        echo "پست پیدا نشد یا متعلق به شما نیست.";
        exit;
    }

    $viewFile = 'app/views/post_edit.php';
    include 'app/views/layout.php';
}


public function update()
{
    if (!isset($_SESSION['user'])) exit;

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user']['id'];

    $postModel = new Post();
    $postModel->update($id, $user_id, $title, $content);

    header("Location: index.php?controller=post&action=index");
    exit;
}

public function delete()
{
    if (!isset($_SESSION['user'])) exit;

    $id = $_GET['id'] ?? null;
    $user_id = $_SESSION['user']['id'];

    $postModel = new Post();
    $postModel->delete($id, $user_id);

    header("Location: index.php?controller=post&action=index");
    exit;
}



}

