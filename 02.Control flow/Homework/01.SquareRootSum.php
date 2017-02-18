<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Square Root Sum</title>
    <style>
        table{
            border: 1px solid;
            padding: 1px;
        }
        th, td{
            border: 1px solid;
            padding: 1px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>

    <?php
    $sum = 0;
    for ($i = 0; $i <= 100; $i += 2 ){
        $root = round(sqrt($i), 2);
        $sum += $root;
        echo "<tr><td>{$i}</td><td>{$root}</td></tr>";
    }
    ?>

    <tr>
        <td><b>Total:</b></td>
        <td><?php echo $sum ?></td>
    </tr>
</table>
</body>
</html>

