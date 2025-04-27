<?php

class Post extends Controller
{
    public function index()
    {
        $postModel = $this->model('PostModel');
        $posts = $postModel->getAll();
        $this->view('post/index', ['posts' => $posts]);
    }


    public function create()
    {
        $this->view('post/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            if (!empty($title) && !empty($content)) {
                $this->model('PostModel')->create($title, $content);
                header("Location: index.php");
                exit;
            } else {
                echo "Judul dan Konten wajib diisi.";
            }
        }
    }

    public function edit($id)
    {
        $post = $this->model('PostModel')->findById($id);
        $this->view('post/edit', ['post' => $post]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $this->model('PostModel')->update($id, $title, $content);
            header("Location: index.php");
            exit;
        }
    }

    public function delete($id)
    {
        $this->model('PostModel')->delete($id);
        header("Location: index.php");
        exit;
    }
}
