<?php
include('db.php');
$articleCount = mysqli_query($connection, 'SELECT count(*) AS value FROM `news`');
$r1 = mysqli_fetch_assoc($articleCount);
$activePage =  array_pop($_GET);
if($activePage == false){
    $activePage = 1;
}

$result = mysqli_query($connection,"SELECT `idate` FROM `news` WHERE `id` BETWEEN  '$activePage' * 5 - 4 AND  '$activePage' * 5");
$dates = mysqli_fetch_all($result);
$sortDates =  checkDates($dates);
function checkDates($dates){
    for ($j = 0; $j < count($dates) - 1; $j++) {
        for ($i = 0; $i < count($dates) - $j - 1; $i++) {
            $elem1 = $dates[$i];
            $elem2 = $dates[$i + 1];
            if ($elem1 > $elem2) {
                $dates[$i] = $elem2;
                $dates[$i + 1] = $elem1;
            }
        }
    }
    return $dates;
}

$articleDate = $sortDates[0];
$article1 = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `news` WHERE `idate` = '$articleDate[0]' * 1 AND `id` BETWEEN  '$activePage' * 5 - 4 AND '$activePage' * 5"));
$articleDate = $sortDates[1];
$article2 = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `news` WHERE `idate` = '$articleDate[0]' * 1 AND `id` BETWEEN  '$activePage' * 5 - 4 AND '$activePage' * 5"));
$articleDate = $sortDates[2];
$article3 = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `news` WHERE `idate` = '$articleDate[0]' * 1 AND `id` BETWEEN  '$activePage' * 5 - 4 AND '$activePage' * 5"));
$articleDate = $sortDates[3];
$article4 = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `news` WHERE `idate` = '$articleDate[0]' * 1 AND `id` BETWEEN  '$activePage' * 5 - 4 AND '$activePage' * 5"));
$articleDate = $sortDates[4];
$article5 = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM `news` WHERE `idate` = '$articleDate[0]' * 1 AND `id` BETWEEN  '$activePage' * 5 - 4 AND '$activePage' * 5"));

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>News</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="h1">Новости</h1>
        </header> 
        <div class="items">
            <div class="news-item">
                <div class="news-item_head">
                    <p class="item-date"><?php echo date('d.m.Y', ($article1["idate"])); ?></p>
                    <a href='page.php/?id=<?php print_r($article1['id']); ?>' class="item-title"><?php print_r($article1["title"]); ?></a>
                </div>
                <div class="news-item_body">
                    <p class="item-text"><?php print_r($article1["announce"]); ?></p>
                </div>
            </div>
            <div class="news-item">
                <div class="news-item_head">
                    <p class="item-date"><?php echo date('d.m.Y', ($article2["idate"])); ?></p>
                    <a href='page.php/?id=<?php print_r($article2['id']); ?>' class="item-title"><?php print_r($article2["title"]); ?></a>
                </div>
                <div class="news-item_body">
                    <p class="item-text"><?php print_r($article2["announce"]); ?></p>
                </div>
            </div>
            <div class="news-item">
                <div class="news-item_head">
                    <p class="item-date"><?php echo date('d.m.Y', ($article3["idate"])); ?></p>
                    <a href='page.php/?id=<?php print_r($article3['id']); ?>' class="item-title"><?php print_r($article3["title"]); ?></a>
                </div>
                <div class="news-item_body">
                    <p class="item-text"><?php print_r($article3["announce"]); ?></p>
                </div>
            </div>
            <div class="news-item">
                <div class="news-item_head">
                    <p class="item-date"><?php echo date('d.m.Y', ($article4["idate"])); ?></p>
                    <a href='page.php/?id=<?php print_r($article4['id']); ?>' class="item-title"><?php print_r($article4["title"]); ?></a>
                </div>
                <div class="news-item_body">
                    <p class="item-text"><?php print_r($article4["announce"]); ?></p>
                </div>
            </div>
            <div class="news-item">
                <div class="news-item_head">
                    <p class="item-date"><?php echo date('d.m.Y', ($article5["idate"])); ?></p>
                    <a href='page.php/?id=<?php print_r($article5['id']); ?>' class="item-title"><?php print_r($article5["title"]); ?></a>
                </div>
                <div class="news-item_body">
                    <p class="item-text"><?php print_r($article5["announce"]); ?></p>
                </div>
            </div>
        </div>
        <footer class="footer">
            <h2 class="h2">Страницы:</h2>
            <form class="pages-container" action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
            </form>
        </footer>
    </div>
    <script>let id = <?php print_r($r1['value']); ?></script>
    <script>let activePage = <?php echo $activePage; ?></script>
    <script src="/main.js"></script>
</body>

</html>