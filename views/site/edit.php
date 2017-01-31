<form action="" method="post">
    <input type="text" name="title" placeholder="Title" value="<?= $advt['title']?>" required></input>
    <input type="text" name="description" placeholder="Description" value="<?= $advt['description']?>" required></input>
    <input type="hidden" name="user_id" value="<?= $advt['user_id'] ?>"></input>
    <input type="hidden" name="id" value="<?= $advt['id'] ?>"></input>
    <input type="submit" name="edit" value="Edit"></input>
</form>
