<table>
    <th>ID</th>
    <th>TITLE</th>
    <th>DESCRIPTION</th>
    <th>CREATION DATE</th>
    <th>USER ID</th>
    <?php if (User::getUserById($_SESSION['user_id'])['id'] == $advt['user_id']): ?>
        <th>action</th>
    <?php endif; ?>
    <tr>
        <td><?= $advt['id'] ?></td>
        <td><?= $advt['title'] ?></td>
        <td><?= $advt['description'] ?></td>
        <td><?= $advt['creation_date'] ?></td>
        <td><?= $advt['user_id'] ?></td>        
        <?php if ($advt['user_id'] == User::getUserById($_SESSION['user_id'])['id']): ?>
            <td><a href="edit/<?= $advt['id'] ?>">edit</td>    
            <td><a href="delete/<?= $advt['id'] ?>">del</a></td>
        <?php endif; ?>
    </tr>
</table>

