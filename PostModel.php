<?php

class PostModel extends Model
{
    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM post ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($title, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO post (title, content) VALUES (?, ?)");
        $stmt->execute([$title, $content]);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM post WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content)
    {
        $stmt = $this->pdo->prepare("UPDATE post SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM post WHERE id = ?");
        $stmt->execute([$id]);
    }
}
