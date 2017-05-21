<?php
$inputArray = array_map('intval', explode(' ', fgets(STDIN)));
$inputCommands = array_map('trim', explode(' ', fgets(STDIN)));
$command = $inputCommands[0];
$outputResult = [];
$outputArray = "";
while ($command != 'print') {
    switch ($inputCommands[0]){
        case "add":
            $index = $inputCommands[1];
            $element = $inputCommands[2];
            array_splice($inputArray, $index, 0, $element);
            $outputArray = "[" . implode(", ", $inputArray) . "]";
            //array_splice($outputResult, 0, 0, $output);
            break;
        case "addMany":
            $index = $inputCommands[1]; //Вземаме позицията от която ще вмъкваме
            array_splice($inputCommands, 0, 2); //Премахваме първите два елемента от масива с командата за изпълнение
            array_splice($inputArray, $index, 0, $inputCommands);//Към входния масив добавяме другия масив
            $outputArray = "[" . implode(", ", $inputArray) . "]";//Форматирам начина на показване на новополучения масив
            break;
        case "contains":
            $element = intval($inputCommands[1]);
            $position = array_search($element, $input);
            if ($position !== false) {
                echo $position . "\n";
            } else {
                echo "-1\n";
            }
            break;
        case "remove":
            $index = $inputCommands[1];
            array_splice($inputArray, $index, 1);//Премахваме един елемент на позиция "$index"
            $outputArray = "[" . implode(", ", $inputArray) . "]";
            break;
        case "shift":
            $positionsToRotate = intval($inputCommands[1]);
            for ($i = 0; $i < $positionsToRotate; $i++) { //В този цикъл вземаме първия елемент от масива и го слагаме на последно място
                $element = array_shift($inputArray);
                array_push($inputArray, $element);
            }
            //print_r($inputArray);
            $outputArray = "[" . implode(", ", $inputArray) . "]";
            break;
        case "sumPairs":
            if (count($inputArray) % 2 != 0){
                array_push($inputArray, 0);
            }
            $count = count($inputArray);
            $tempArray = [];
            for ($i = 0; $i < $count / 2; $i++) {
                $tempArray[$i] = $inputArray[0] + $inputArray[1];
                array_splice($inputArray, 0, 2);
                //print_r($inputArray);
            }
            $inputArray = $tempArray;
            $outputArray = "[" . implode(", ", $inputArray) . "]";
            break;
    }
    $inputCommands = array_map('trim', explode(' ', fgets(STDIN)));
    $command = $inputCommands[0];
}
foreach ($outputResult as $item) {
    echo $item . "\n";
}
echo $outputArray . "\n";

