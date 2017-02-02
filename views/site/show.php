<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <span class="row">
            <a href="/" class="btn btn-primary btn-xs">Advertisement List</a>                              
        </span>
        <h2>View Advertisement</h2>        
        <div>   
            <table class="table table-striped custab">
                <thead>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>AUTHOR</th>
                <th>CREATION DATE</th>
                <?php if ($user['id'] == $advt['user_id']): ?>
                    <th>ACTIONS</th>
                <?php endif; ?>
                </thead>
                <tr>
                    <td><?= $advt['id'] ?></td>
                    <td><?= $advt['title'] ?></td>
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
                    <?php endif; ?>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php include_once ROOT . '/views/site/layouts/footer.php'; ?>