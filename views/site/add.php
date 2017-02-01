<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <h2>Add Advertisement</h2>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Title" required></input>
            <input type="text" name="description" placeholder="Description" required></input>
            <input type="hidden" name="author_name" value="<?= $user['username'] ?>"></input>
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>"></input>
            <input type="submit" name="create" value="Create"></input>
        </form>
