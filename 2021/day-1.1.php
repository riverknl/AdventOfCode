<?php
class AdventOfCode
{
    public $testData = true;
    public $oldRow;
    public $answer = 0;

    public function handle()
    {
        $i = 0;

        $input = ($this->testData) ? 'test-input-day-1.txt' : 'input-day-1.txt';

        if ($file = fopen($input, "r")) {

            while (!feof($file)) {
                $line = fgets($file);
                
                if ($i > 0) {
                    if ($line > $this->oldRow) {
                        $this->answer++;
                    }
                    $this->oldRow = $line;
                } else {
                    $this->oldRow = $line;
                }

                $i++;
            }
            fclose($file);
        }

        return $this->answer;
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();
