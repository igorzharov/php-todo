<?php
require_once 'connect.php';

$query = "INSERT INTO `posts` (user, email, text, mark) VALUES ('" . $_POST['user'] . "', '" . $_POST['email'] . "', '" . $_POST['text'] . "', 0)";

mysqli_query($connect, $query);

$limit = 3;

$query_count = "SELECT COUNT(*) FROM posts";
$count_posts = mysqli_fetch_row(mysqli_query($connect, $query_count));
$count_pages = ceil($count_posts[0] / $limit);

header('Location: ./?page=' . $count_pages);
