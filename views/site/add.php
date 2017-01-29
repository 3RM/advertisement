<?php if(User::checkLogged()): ?>
<form action="" method="post">
    <input type="text" name="title" placeholder="Title" required></input>
    <input type="text" name="description" placeholder="Description" required></input>
    <input type="hidden" name="user_id" value="<?= User::getUserById($_SESSION['user_id'])['id'] ?>"></input>
    <input type="submit" name="create" value="Create"></input>
</form>
<?php else: ?>
    
<?php endif; ?>
