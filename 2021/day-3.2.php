<?php
class AdventOfCode
{
    private $testData = false;
    private $oxygenRating = 0;
    private $co2Rating = 0;

    public function handle()
    {
        $input = $this->testData ? explode(chr(10), file_get_contents('test-input-day-3.txt')) : explode(chr(10), file_get_contents('input-day-3.txt'));

        $this->generateCo2Rating($input);
        $this->generateOxygenRating($input);

        return $this->oxygenRating * $this->co2Rating;
    }

    public function generateCo2Rating($input)
    {
        $length = strlen($input[0]) - 1;
        $i = 0;

        while ($i <= 11) {

            if (count($input) == 1) {
                break;
            }

            $characters = '';

            foreach ($input as $row) {
                $characters .= substr($row, $i, 1);
            }

            $countOnes = substr_count($characters, 1, 0); // count 1's
            $countZeroes = substr_count($characters, 0, 0); // count 0's

            if ($countOnes > $countZeroes) {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 1) {
                        unset($input[$key]);
                    }
                }
            } elseif ($countOnes == $countZeroes) {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 1) {
                        unset($input[$key]);
                    }
                }
            } else {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 0) {
                        unset($input[$key]);
                    }
                }
            }

            $i++;
        }

        $this->co2Rating = bindec(array_values($input)[0]);
    }

    public function generateOxygenRating($input)
    {
        $length = strlen($input[0]) - 1;
        $i = 0;

        while ($i <= $length) {

            if (count($input) == 1) {
                break;
            }

            $characters = '';

            foreach ($input as $row) {
                $characters .= substr($row, $i, 1);
            }

            $countOnes = substr_count($characters, 1, 0); // count 1's
            $countZeroes = substr_count($characters, 0, 0); // count 0's

            if ($countOnes > $countZeroes) {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 0) {
                        unset($input[$key]);
                    }
                }
            } elseif ($countOnes == $countZeroes) {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 0) {
                        unset($input[$key]);
                    }
                }
            } else {
                foreach ($input as $key => $value) {
                    if (substr($value, $i, 1) == 1) {
                        unset($input[$key]);
                    }
                }
            }

            $i++;
        }

        $this->oxygenRating = bindec(array_values($input)[0]);
    }
}

$aoc = new AdventOfCode();
echo $aoc->handle();