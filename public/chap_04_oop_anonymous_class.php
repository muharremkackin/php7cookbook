<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');
use Application\Traits\IdTrait;
use Application\Traits\NameTrait;

$a = new class (123.45, 'TEST') {
    public $total = 0;
    public $test = '';
    public function __construct($total, $test)
    {
        $this->total = $total;
        $this->test = $test;
    }
};

$b = new ArrayIterator(range(10,100,10));
$f = new class($b, 50) extends FilterIterator {
    public $limit = 0;
    public function __construct(Iterator $iterator, $limit)
    {
        $this->limit = $limit;
        parent::__construct($iterator);
    }
    public function accept()
    {
        return ($this->current() <= $this->limit);
    }
};

define('MAX_COLORS', 256**3);
$d = new class () implements Countable {

    public $current = 0;
    public $maxRows = 16;
    public $maxCols = 64;

    public function cycle() {
        $row = '';
        $max = $this->maxRows * $this->maxCols;
        for ($x = 0; $x < $this->maxRows; $x++) {
            $row .= '<tr>';
            for ($y = 0; $y < $this->maxCols; $y++) {
                $row .= sprintf('<td style="background-color:#%06X;', $this->current);
                $row .= sprintf('title = "#%06X">&nbsp;</td>', $this->current);
                $this->current++;
                $this->current = ($this->current > MAX_COLORS ? 0 : $this->current);
            }
            $row .= '</tr>';
        }
        return $row;
    }

    public function count()
    {
        return MAX_COLORS;
    }

};

$e = new class() {
    use IdTrait, NameTrait{
       NameTrait::setKey insteadof IdTrait;
       IdTrait::setKey as setKeyDate;
    }
};

echo PHP_EOL . 'Anonymous Class' . PHP_EOL;
echo $a->total . PHP_EOL;
echo $a->test . PHP_EOL;

echo PHP_EOL . 'Anonymous Class with FilterIterator' . PHP_EOL;
foreach ($f as $item) {
    echo $item . ' ';
}
echo PHP_EOL;

$d->current = $_GET['current'] ?? 0;
$d->current = hexdec($d->current);
$factor = ($d->maxCols * $d->maxRows);
$next = $d->current + $factor;
$prev = $d->current - $factor;
$next = ($next < MAX_COLORS) ? $next : MAX_COLORS - $factor;
$prev = ($prev >= 0) ? $prev : 0;
$next = sprintf('%06X', $next);
$prev = sprintf('%06X', $prev);

?>

<h1>Total Possible Color Combinations: <?= count($d); ?></h1>
<hr>
<table>
    <?= $d->cycle(); ?>
</table>
<a href="?current=<?= $prev ?>">PREV</a>
<a href="?current=<?= $next ?>">NEXT</a>