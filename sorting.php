<?php
if ($_GET['sort'] == "status") $order = " ORDER BY mark DESC";
if ($_GET['sort'] == "name") $order = " ORDER BY user";
if ($_GET['sort'] == "email") $order = " ORDER BY email";
?>

<nav class="sorting">
	<p>Сортировать по:</p>
	<ul>
		<li><a <?php echo ($_GET['sort'] == "") ? 'class="sorting-active"' : '' ?> href="./?page=<?php echo $_GET['page'] ?>">Без сортировки</a></li>
		<li><a <?php echo ($_GET['sort'] == "status") ? 'class="sorting-active"' : '' ?> href="./?sort=status&page=<?php echo $_GET['page'] ?>">Статусу</a></li>
		<li><a <?php echo ($_GET['sort'] == "name") ? 'class="sorting-active"' : '' ?> href="./?sort=name&page=<?php echo $_GET['page'] ?>">Имени</a></li>
		<li><a <?php echo ($_GET['sort'] == "email") ? 'class="sorting-active"' : '' ?> href="./?sort=email&page=<?php echo $_GET['page'] ?>">Email</a></li>
	</ul>
</nav>