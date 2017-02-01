<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <h2>Edit Advertisement</h2>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Title" value="<?= $advt['title'] ?>" required></input>
            <input type="text" name="description" placeholder="Description" value="<?= $advt['description'] ?>" required></input>
            <input type="hidden" name="user_id" value="<?= $advt['user_id'] ?>"></input>
            <input type="hidden" name="id" value="<?= $advt['id'] ?>"></input>
            <input type="submit" name="edit" value="Edit"></input>
        </form>
