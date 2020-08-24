<?php
$query_count = "SELECT COUNT(*) FROM posts";
$count_posts = mysqli_fetch_row(mysqli_query($connect, $query_count));
$count_pages = ceil($count_posts[0] / $limit);
?>

<div class="pagination">
	<a <?php echo ($page != 1) ? 'href="./?sort=' . $_GET['sort'] . '&page=1"' : 'class="no-pagination"' ?>><i class="fas fa-angle-double-left"></i></a>
	<a <?php echo ($page != 1) ? 'href="./?sort=' . $_GET['sort'] . '&page=' . ($page - 1) . '"' : 'class="no-pagination"' ?>><i class="fas fa-angle-left"></i></a>
	<a><?php echo $page ?></a>
	<a <?php echo ($page != $count_pages) ? 'href="./?sort=' . $_GET['sort'] . '&page=' . ($page + 1) . '"' : 'class="no-pagination"' ?>><i class="fas fa-angle-right"></i></a>
	<a <?php echo ($page != $count_pages) ? 'href="./?sort=' . $_GET['sort'] . '&page=' . $count_pages . '"' : 'class="no-pagination"' ?>><i class="fas fa-angle-double-right"></i></a>
</div>