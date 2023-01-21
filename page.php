<?php
include('db.php');
$thisNewsID = $_GET['id'];
$result = mysqli_query($connection,"SELECT * FROM `news` WHERE `id` = '$thisNewsID'");
$thisNews = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>News</title>
</head>
<body>
    <div class="container">
        <h1 class='newsPage-header'><?php print_r($thisNews["title"]);?></h1>
        <div class='newsPage-body'><?php print_r($thisNews["content"]);?></div>
        <a class='backLink' onclick="javascript:history.back(); return false;">Все новости &gt;&gt;</a>
    </div>
</body>
</html>