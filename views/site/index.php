<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php if (!User::checkLogged()): ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div><!--sign up form-->
                <h2>Вход на сайт</h2>
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Username" value=""/>
                    <input type="password" name="password" placeholder="Password" value=""/>
                    <input type="submit" name="check_log" value="Вход" />
                </form>
            </div><!--/sign up form-->
        <?php else: ?>
            <?= User::getUserById($_SESSION['user_id'])['username']; ?>
            <a href="/logout/">Выйти</a>
            <a href="/edit/">Создать</a>
        <?php endif; ?>
        <table>
            <?php foreach ($advtList as $advt): ?>
                <tr>
                    <td><?= $advt['id'] ?></td>
                    <td><a href="/<?= $advt['id'] ?>"><?= $advt['title'] ?></a></td>
                    <td><?= $advt['description'] ?></td>
                    <td><?= $advt['creation_date'] ?></td>
                    <?php if($advt['user_id'] == User::getUserById($_SESSION['user_id'])['id']):?>
                    <td><a href="delete/<?= $advt['id'] ?>">del</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
