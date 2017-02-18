<?php
if (isset($_GET['input'])) {
    $inputText = trim($_GET['input']);
    $inputArray = explode(" ", $inputText);
    $outputString = implode("", $inputArray);
    $count = strlen($outputString);
    ?>
    <?php for ($i = 0; $i < $count; $i++) {
        $color = 'blue';
        if (ord($outputString[$i]) % 2 == 0) {
            $color = 'red';
        }?>
        <font color='<?= $color?>'><?= $outputString[$i]?> </font>
    <?php }?>
<?php }?>