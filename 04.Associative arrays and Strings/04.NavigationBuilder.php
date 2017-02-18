<?php
if (isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])){
    $inputCategories = preg_split('/[, ]+/', $_GET['categories']);
    $inputTags = preg_split('/[,]+/', $_GET['tags']);
    $outputTags = [];
    foreach ($inputTags as $inputTag) {
        $inputTag = trim($inputTag);
        $outputTags[] = $inputTag;
    }
    $inputMonths = preg_split('/[, ]+/', $_GET['months']);
    $output = ['Categories' => $inputCategories, 'Tags' => $outputTags, 'Months' => $inputMonths];
    //echo "<pre>";
    //print_r($output);
    //echo "</pre>";
    //print_r($inputCategories);
    //$inputText = trim($inputText);
    //$inputArray = explode(" ", $inputText);
    ?>
    <?php foreach ($output as $key => $value) {?><h2><?= $key?></h2><ul><?php foreach ($value as $item){?><li><?= $item?></li><?php }?></ul><?php }?><?php }?>