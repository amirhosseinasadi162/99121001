<?php
require_once 'config/database.php';

class Post
{
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getByUser($user_id, $limit, $offset)
    {
        $stmt = $this->pdo->prepare("
            SELECT posts.id, posts.title, users.name as author
            FROM posts
            JOIN users ON posts.user_id = users.id
            WHERE posts.user_id = :user_id
            ORDER BY posts.id DESC
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countByUser($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchColumn();
    }

    public function get($id, $user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $user_id]);
        return $stmt->fetch();
    }

    public function create($user_id, $title, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        return $stmt->execute([$user_id, $title, $content]);
    }

    public function update($id, $user_id, $title, $content)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$title, $content, $id, $user_id]);
    }

    public function delete($id, $user_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $user_id]);
    }
}
