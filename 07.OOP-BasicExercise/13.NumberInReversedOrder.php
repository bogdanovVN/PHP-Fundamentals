<?php
class decimalNumber {
    private $number;
    public function __construct(string $number)
    {
        $this->number = $number;
    }
    public function printReversed()
    {
        echo strrev($this->number);
    }
}
$input= trim(fgets(STDIN));
$number = new decimalNumber($input);
$number->printReversed();