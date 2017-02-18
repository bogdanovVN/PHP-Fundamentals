<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Mapping</title>
    <style>
        table {
            border: 1px solid;
            padding: 1px;
            margin-left: 80px;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid;
            padding: 3px;
            text-align: left;
            width: auto;
        }
    </style>
</head>
<body>
<form>
    <div>
        <textarea name="input" rows="2" cols="50" required></textarea>
    </div>
    <div>
        <input type="submit" value="Count words" name="countBtn">
    </div>
</form>


<?php
if (isset($_GET['input'])):
    $input = $_GET['input'];
    $words = array_filter(preg_split("/[^a-z]+/i", $input));
    $words = array_map('strtolower', $words);
    $occurrences = array_count_values($words);
    $table = '';
    foreach ($occurrences as $word => $count) {
        $table .= "<tr><td>$word</td><td>$count</td></tr>";
    }
    ?>
    <table border='2'><?= $table ?></table>

<?php endif; ?>

</body>
</html>