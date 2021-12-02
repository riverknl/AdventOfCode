<?php
class AdventOfCode
{
    public $testData = false;
    public $oldLine;
    public $answer = 0;

    public function handle()
    {
        $i = 0;

        $input = $this->testData ? explode(chr(10), file_get_contents('test-input-day-1.txt')) : explode(chr(10), file_get_contents('input-day-1.txt'));
        
        foreach ($input as $line) {
            if ($i > 0) {
                if ($line > $this->oldLine) {
                    $this->answer++;
                }
                $this->oldLine = $line;
            } else {
                $this->oldLine = $line;
            }

            $i++;
        }

        return $this->answer;
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();
