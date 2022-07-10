<?php
/* Autoload for pagination class, you can remove this function and manually include or require */
spl_autoload_register(function ($class) {
    if (is_file($class . '.php')) {
        require_once($class . '.php');
    }
});

use Pagination\Pagination;


/*
 * I don't recommend to use directly GET method to get page index.
 * Check value types and values cleanly before the calling function to prevent Fatal Error
*/

// Simple check to get Current Page Number
if (isset($_GET['page']))
    $currentIndex = $_GET['page'];
if (!isset($currentIndex) || !preg_match("/^[0-9]*$/", $currentIndex))
    $currentIndex = 1;

$itemsPerPage = 10;
$totalItems = 70;
$maxPaginationItems = 5;
$link = "?page=";

/* If you dont want to test just remove faker and related lines from code */
require_once 'fakeData.php';
$fakes = getFakeData($itemsPerPage);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagination Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table class="users">
    <tr>
        <th>Name</th>
        <th>Lastname</th>
    </tr>
    <?php foreach ($fakes as $fake): ?>
        <tr>
            <td><?= $fake['name']; ?></td>
            <td><?= $fake['lastname']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= Pagination::paginate($currentIndex, $itemsPerPage, $totalItems, $maxPaginationItems, $link); ?>
</body>
</html>