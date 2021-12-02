<?php
class AdventOfCode
{
    private $testData = false;
    private $horizontal = 0;
    private $depth = 0;
    private $aim = 0;

    public function handle()
    {
        $input = $this->testData ? explode(chr(10), file_get_contents('test-input-day-2.txt')) : explode(chr(10), file_get_contents('input-day-2.txt'));

        // $this->dd($input);
        foreach ($input as $row) {

            $action = explode(chr(32), $row);
            
            switch ($action[0]) {
                case 'forward':
                    $this->horizontal = $this->horizontal + $action[1];
                    if ($this->aim !== 0) {
                        $this->depth = $this->depth + ($this->aim * $action[1]);
                    }
                    break;
                case 'up':
                    $this->aim = $this->aim - $action[1];
                    break;
                case 'down':
                    $this->aim = $this->aim + $action[1];
                    break;
            }
        }

        return ($this->horizontal * $this->depth);
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();
