<h2>Edit Post</h2>
<form action="?controller=post&action=update&id=<?= $data['post']['id'] ?>" method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($data['post']['title']) ?>" required><br><br>
    <textarea name="content" required><?= htmlspecialchars($data['post']['content']) ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
<a href="?controller=post&action=index">← Kembali</a>
