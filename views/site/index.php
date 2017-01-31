<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<link rel="stylesheet" href="/template/css/style.css">
		<script src="/template/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
		<div class="container">
		<div class="row col-md-6 col-md-offset-2 custyle">
			<div class="pull-right">
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
        
				<strong><?= User::getUserById($_SESSION['user_id'])['username']; ?></strong>, <a href="/logout/"><span class="logout-lnk">logout</span></a>
			</div>
			<a href="/edit/" class="btn btn-primary btn-xs pull-left"><b>+</b> Add new advertisement</a>
        <?php endif; ?>
			<table class="table table-striped custab">
				<thead>
					
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Creation date</th>
					</tr>
				</thead>
				<?php foreach ($advtList as $advt): ?>
    
				<tr>
					<td><?= $advt['id'] ?></td>
					<td><a href="<?= $advt['id'] ?>"><?= $advt['title'] ?></a></td>
					<td><?= $advt['description'] ?></td>
					<td><?= $advt['creation_date'] ?></td>
					<?php if($advt['user_id'] == User::getUserById($_SESSION['user_id'])['id']):?>						
						<td class="text-center">
							<a class='btn btn-info btn-xs' href="#">
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
    </div>
</div>
				<?= $pagination->get() ?>
    </body>
</html>
