<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <h2>Advertisement</h2>

        <?php if (!$user): ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div><!--sign up form-->                            
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Username" value=""/>
                    <input type="password" name="password" placeholder="Password" value=""/>
                    <input type="submit" name="check_log" value="Вход" />
                </form>
            </div><!--/sign up form-->

        <?php else: ?>        

            <span class="pull-right"><strong><?= $user['username']; ?></strong>, <a href="/logout/"><span class="logout-lnk">logout</span></a></span>

            <a href="/edit/" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new advertisement</a>
        <?php endif; ?>

        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Creation date</th>
                    <?php foreach ($advtList as $advt): ?>
                        <?php if ($advt['user_id'] == $user['id']): ?>
                            <th>Actions</th>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <?php foreach ($advtList as $advt): ?>
                <tr>
                    <td><?= $advt['id'] ?></td>
                    <td><a href="<?= $advt['id'] ?>"><?= $advt['title'] ?></a></td>
                    <td><?= $advt['description'] ?></td>                            
                    <td><?= $advt['author_name'] ?></td>
                    <td><?= $advt['creation_date'] ?></td>
                    <?php if ($advt['user_id'] == $user['id']): ?>						
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="edit/<?= $advt['id'] ?>">
                                <span class="glyphicon glyphicon-edit"></span>Edit
                            </a>
                            <a href="delete/<?= $advt['id'] ?>" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove"></span>Del
                            </a>
                        </td>

                    <?php else: ?>
                        <td class="text-center"></td>
                    <?php endif; ?>               
                </tr>    
            <?php endforeach; ?>
        </table>
        <div class="pagination">
            <?= $pagination->get() ?>
        </div>
    </div>

</div>

</body>
</html>
