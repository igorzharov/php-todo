<?php
session_start();
require_once "connect.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 3;

$offset = $limit * ($page - 1);

$query = "SELECT * FROM posts" . $order . " LIMIT $limit OFFSET $offset";

$result = mysqli_query($connect, $query);

$lenght = mysqli_num_rows($result);

for ($i = 0; $i < $lenght; ++$i) :
	$rows = mysqli_fetch_row($result);
?>

	<div class="post" data-post-id="<?= $rows[0] ?>" data-post-user="<?= $rows[1] ?>" data-post-email="<?= $rows[2] ?>" data-post-text="<?= $rows[3] ?>" data-post-mark="<?= $rows[4] ?>">
		<h3 class="h3"><?= $rows[1] ?><span><?= $rows[2] ?></span></h3>
		<p class="text"><?= $rows[3] ?></p>
		<?php echo ($rows[4] == 1) ? '<i class="far fa-check-circle status-true"></i>' : '<i class="far fa-check-circle status-false"></i>'; ?>
		<?php echo ($_SESSION['user']) ? '<div class="wrap"><a class="open-popup button-editpost" href="#edit-post"><i class="fas fa-pen"></i></a></div>' : ''; ?>
	</div>

<?php endfor; ?>

<!-- Невидимое попап окно редактирования данных -->

<div id="edit-post" class="zoom-anim-dialog mfp-hide">

	<h1>Редактировать данные:</h1>

	<form class="form-edit-post" action="editpost.php" method="post">

		<h3 class="h3">Имя</h3>

		<label>Задача:</label>
		<textarea name="text" rows="5" maxlength="500"></textarea>

		<div class="post-status"><i class="far fa-check-circle"></i></div>

		<!-- Hide input -->
		<input name="id" type="hidden">
		<input name="mark" type="hidden">

		<button class="button" type="submit">Применить изменения</button>

	</form>

</div>
<!-- add-new-post -->