<?php
require_once 'connect.php';

$id = $_POST['id'];
$text = $_POST['text'];
$mark = $_POST['mark'];

$query = "UPDATE `posts` SET `text` = '$text', `mark` = '$mark' WHERE `posts`.`id` = '$id'";

mysqli_query($connect, $query);

$limit = 3;

$query_count = "SELECT COUNT(*) FROM posts";
$count_posts = mysqli_fetch_row(mysqli_query($connect, $query_count));
$count_pages = ceil($count_posts[0] / $limit);

header('Location: ./');
