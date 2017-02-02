<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <span class="row">
            <a href="/" class="btn btn-primary btn-xs">Advertisement List</a>                              
        </span>
        <h2>Edit Advertisement</h2>        
        <div>   
            <form action="" method="post">
                <input type="text" name="title" placeholder="Title"
                       value="<?= $advt['title'] ?>" required />
                <input type="text" name="description" placeholder="Description"
                       value="<?= $advt['description'] ?>" required />
                <input type="hidden" name="user_id"
                       value="<?= $advt['user_id'] ?>" />
                <input type="hidden" name="id"
                       value="<?= $advt['id'] ?>" />
                <input type="submit" name="edit" value="Edit" />
            </form>
        </div>
    </div>
</div>
<?php include_once ROOT . '/views/site/layouts/footer.php'; ?>