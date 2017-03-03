<?php
class Fibonacci{
    private $list = array();
    function getSequence($n)
    {
        $a = 0;
        $b = 1;
        $this->list = [$a,$b];
        for($i=1;$i<$n;$i++)
        {
            $this->list[] = $this->list[$i]+$this->list[$i-1];
        }
        return $this->list;
    }
    public function getNumbersInRange(int $start, int $end){
        $numberInRange = array_slice($this->list, $start, $end - $start);
        return implode(", ", $numberInRange);
    }
}
$start = trim(fgets(STDIN));
$end = trim(fgets(STDIN));
$fibonacci = new Fibonacci();
$fibonacci->getSequence($end);
echo $fibonacci->getNumbersInRange($start, $end);