<?php

namespace Application\DataStructures;

use Exception;
use Application\Iterator\LargeFile;
use Application\Cli\CommandLine;

class MathProblem
{

    protected $a = [];
    protected $b = [];
    protected $c = [];

    protected $count = 0;
    protected $value_number;

    protected $k;
    protected $t;

    protected $process = [];
    protected $maximum = [];
    protected $minimum;

    protected $path = '';
    protected $file = null;
    protected $cli = null;

    public function __construct($path)
    {
        try {
            $this->file = (new LargeFile($path))->getIterator();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        $this->cli = new CommandLine();
        $this->doMathEquation();
    }

    protected function equation($ai, $bi, $ci) {
        return (($ai + $this->t) % $this->k)
            + (($bi + $this->t) % $this->k)
            + (($ci + $this->t) % $this->k);
    }

    protected function max(array $data) {
        return max($data);
    }

    protected function min(array $data) {
        return min($data);
    }

    public function stdin() {
        return $this->cli->stdin();
    }

    public function doMathEquation() {
        foreach ($this->file as $data) {
            $data = explode(" ", trim($data));
            if (count($data) == 2) {
                $this->value_number = $data[0];
                $this->k = $data[1];
            } else {
                $this->setArrays($data);
                $this->buildData();
            }
        }
        $this->minimum = $this->min($this->maximum);
    }

    protected function processing(): void
    {
        for ($i = 0; $i < count($this->a); $i++) {

            $this->process[$i] = $this->equation(
                (int)$this->a[$i],
                (int)$this->b[$i],
                (int)$this->c[$i]);
        }
    }

    public function getMaximum() {
        return $this->maximum;
    }

    public function getMinimum() {
        return $this->minimum;
    }

    protected function setArrays(array $data): void
    {
        if ($this->count == 0) {
            $this->a = $data;
            $this->count++;
        } else if ($this->count == 1) {
            $this->b = $data;
            $this->count++;
        } else if ($this->count == 2) {
            $this->c = $data;
            $this->count++;
        }
    }

    protected function buildData(): void
    {
        if ($this->count == 3) {
            $this->getAdditionNumber();
            $this->processing();
            $this->maximum[] = $this->max($this->process);
            $this->process = [];
            $this->count = 0;
        }
    }

    private function echoProccess() {
        foreach ($this->process as $process) {
            echo "Equ: " . $process . PHP_EOL;
        }
    }

    protected function getAdditionNumber(): void
    {
        echo "Please enter addition number(t)" . PHP_EOL;
        $this->t = (int)$this->stdin();
    }

}