<?php

$connect = mysqli_connect("localhost", "igorzharov_todo", "ZtlSq&Y3", "igorzharov_todo");


if (!$connect) {
	die('Error connect to DataBase');
}
