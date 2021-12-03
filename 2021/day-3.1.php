<?php
class AdventOfCode
{
    private $testData = false;
    private $gammaRate;
    private $epsilonRate;

    public function handle()
    {
        $input = $this->testData ? explode(chr(10), file_get_contents('test-input-day-3.txt')) : explode(chr(10), file_get_contents('input-day-3.txt'));

        $length = strlen($input[0]) -1;

        $i = 0;

        while ($i <= $length) {

            $characters = '';

            foreach ($input as $row) {
                $characters .= substr($row, $i, 1);
            }

            $countOnes = substr_count($characters, 1, 0); // count 1's
            $countZeroes = substr_count($characters, 0, 0); // count 0's

            $this->gammaRate .= ($countOnes > $countZeroes) ? 1 : 0;
            $this->epsilonRate .= ($countOnes < $countZeroes) ? 1 : 0;
            
            $i++;
        }
    
        return bindec($this->gammaRate) * bindec($this->epsilonRate);
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();