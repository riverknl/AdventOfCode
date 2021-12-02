<?php
class AdventOfCode
{
    public $testData = false;
    public $oldRow;
    public $oldSum;
    public $answer = 0;

    public function handle()
    {
        $i = 0;
        $j = 0;

        $input = $this->testData ? explode(chr(10), file_get_contents('test-input-day-1.txt')) : explode(chr(10), file_get_contents('input-day-1.txt'));
        foreach ($input as $row) {
            if ($i > 0) {
                $sum = $row + $input[$i + 1] + $input[$i + 2];

                if ($sum > $this->oldSum) {
                    $this->answer++;
                }

                $this->oldSum = $sum;
            } else {
                $this->oldSum = $row + $input[$i + 1] + $input[$i + 2];
            }

            $i++;
        }

        return $this->answer;
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();