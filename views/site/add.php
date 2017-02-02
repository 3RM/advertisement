<?php include_once ROOT . '/views/site/layouts/header.php'; ?>       
<div class="container pull-left">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <span class="row">
            <a href="/" class="btn btn-primary btn-xs">Advertisement List</a>                              
        </span>
        <h2>Add Advertisement</h2>        
        <div>   
            <form action="" method="post">
                <input type="text" name="title" placeholder="Title" required />
                <input type="text" name="description" placeholder="Description" required />
                <input type="hidden" name="author_name"
                       value="<?= $user['username'] ?>" />
                <input type="hidden" name="user_id"
                       value="<?= $user['id'] ?>" />
                <input type="submit" name="create" value="Create" />
            </form>
        </div>
    </div>
</div>
<?php include_once ROOT . '/views/site/layouts/footer.php'; ?>  
