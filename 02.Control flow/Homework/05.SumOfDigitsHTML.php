<form method="get">
    <div>
        Input string:
        <input type="text" name="inputString">
        <input type="submit" name="calculate" value="Submit">
    </div>
</form>
<?php if (isset($outputArray)){ ?>
    <table border="1" cellpadding="3">
        <tbody>
        <?php foreach ($outputArray as $key => $value){ ?>
            <tr>
                <td><?= $key; ?></td>
                <td align="center"><?= $value; ?></td>
            </tr>
        <?php }; ?>
        </tbody>
    </table>
<?php } ?>