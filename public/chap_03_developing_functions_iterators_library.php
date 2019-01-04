<?php

$array = [
  "Home",
  "Forum",
  "About",
  "Contact"
];

$iterator = new ArrayIterator($array);

function htmlListWhile($iterator) {
    $output = '<ul>';
    while ($value = $iterator->current()) {
        $output .= '<li>' . $value . '</li>';
        $iterator->next();
    }
    $output = '</ul>';
    return $output;
}

function htmlListForeach($iterator) {
    $output = '<ul>';
    foreach ($iterator as $value) {
        $output .= '<li>' . $value . '</li>';
    }
    $output .= '</ul>';
    return $output;
}

function fetchCountryName($sql, $connection) {
    $iterator = new ArrayIterator();
    $stmt = $connection->pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $iterator->append($row['name']);
    }
    return $iterator;
}

function nameFilterIterator($innerIterator, $name) {
    if (!$name) return $innerIterator;
    $name = trim($name);
    $iterator = new CallbackFilterIterator($innerIterator,
        function ($current, $key, $iterator) use ($name) {
            $pattern = '/' . $name . '/i';
            return (bool) preg_match($pattern, $current);
        });
    return $iterator;
}

function pagination($iterator, $offset, $limit) {
    return new LimitIterator($iterator, $offset, $limit);
}

function fetchAllAssoc($sql, $connection) {
    $iterator = new ArrayIterator();
    $stmt = $connection->pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $iterator->append($row['name']);
    }
    return $iterator;
}

function arrayToIterator($array) {
    return new ArrayIterator($array);
}

function arrayToList(array $array) {
    return htmlListForeach(arrayToIterator($array));
}

function filteredResultsGenerator(array $array, $filter, $limit = 10, $page = 0) {
    $max = count($array);
    $offset = $page * $limit;
    foreach ($array as $key => $value) {
        if (!stripos($value, $filter) !== false) continue;
        if (--$offset >= 0) continue;
        if (--$limit <= 0) break;
        yield $value;
    }
}

