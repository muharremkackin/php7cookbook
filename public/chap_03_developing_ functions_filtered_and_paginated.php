<?php

define('DB_CONFIG_FILE', '/../data/config/db.config.php');
define('ITEMS_PER_PAGE', [5,10,15,20]);
include __DIR__ . '/chap_03_developing_functions_iterators_library.php';
include __DIR__ . '/../Application/Database/Connection.php';

$name   = strip_tags($_GET['name'] ?? '');
$limit  = (int) ($_GET['limit'] ?? 10);
$page   = (int) ($_GET['page'] ?? 0);
$offset = $page * $limit;
$prev = ($page > 0) ? $page -1 : 0;
$next = $page + 1;

try {
    $connection = new \Application\Database\Connection(
        include __DIR__ . DB_CONFIG_FILE
    );
    $sql = 'SELECT * FROM iso_country_codes';
    $arrayIterator = fetchCountryName($sql, $connection);
    $filteredIterator = nameFilterIterator($arrayIterator, $name);
    $limitIterator = pagination($filteredIterator, $offset, $limit);
} catch (Throwable $throwable) {
    echo $throwable->getMessage();
}

?>

<form action="">
    Country Name: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    Items Per Page:
    <select name="limit" id="">
        <?php foreach (ITEMS_PER_PAGE as $item) : ?>
            <option<?= ($item == $limit) ? ' selected' : '' ?>>
                <?= $item ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit">
</form>

<a href="?name=<?= $name ?>&limit=<?= $limit ?>&page=<?= $prev ?>">&lt; Prev</a>
<a href="?name=<?= $name ?>&limit=<?= $limit ?>&page=<?= $next ?>">&gt; Next</a>

<?= htmlListForeach($limitIterator); ?>

<?php
    try {
        $connection = new Application\Database\Connection(
            include __DIR__ . DB_CONFIG_FILE);
        $sql = 'SELECT * FROM iso_country_codes';
        $iterator = fetchAllAssoc($sql, $connection);
        $shallow = new RecursiveArrayIterator($iterator);
        foreach ($shallow as $item) echo var_dump($item) . '<br>' ;
        $deep = new RecursiveIteratorIterator($shallow);
        foreach ($deep as $item) echo var_dump($item) . '<br>' ;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
?>