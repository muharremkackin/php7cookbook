<?php

include __DIR__ . "/chap_03_developing_functions_iterators_library.php";
include __DIR__ . "/../Application/Web/Hoover.php";

$url    = trim(strip_tags($_GET['url'] ?? ''));
$filter = trim(strip_tags($_GET['filter'] ?? ''));
$limit  = (int) ($_GET['limit'] ?? 10);
$page   = (int) ($_GET['page'] ?? 0);

$next = $page + 1;
$prev = $page > 0 ? $page - 1 : 0 ;
$base = '?url=' . htmlspecialchars($url)
    . '&filter=' . htmlspecialchars($filter)
    . '&limit=' . $limit
    . '&page=';

$vac = new \Application\Web\Hoover();
$list = $vac->getAttribute($url, 'href');

?>

<form action="">
    <label for="url">URL : </label>
    <input type="text" name="url" id="url" value="<?= htmlspecialchars($url) ?>">
    <label for="filter">Filter</label>
    <input type="text" name="filter" id="filter" value="<?= htmlspecialchars($filter) ?>">
    <label for="limit">Limit</label>
    <input type="text" name="limit" id="limit" value="<?= htmlspecialchars($limit) ?>">
    <input type="submit">
</form>
<div class="page_buttons">
    <a href="<?= $base . $prev ?>">Previous</a>
    <a href="<?= $base . $next ?>">Next</a>
</div>
<div class="queries">
    <?= htmlListForeach(filteredResultsGenerator($list, $filter, $limit, $page)) ?>
</div>