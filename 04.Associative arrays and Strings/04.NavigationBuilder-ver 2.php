<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navigation Builder</title>
</head>
<body>

<form>
    <div>
        Categories: <input type="text" name="categories" required>
    </div>
    <div>
        Tags: <input type="text" name="tags" required>
    </div>
    <div>
        Months: <input type="text" name="months" required>
    </div>
    <div>
        <input type="submit" value="Generate" name="button">
    </div>
</form>

<?php
if (isset($_GET['categories']) &&
    isset($_GET['tags']) &&
    isset($_GET['months'])
) {
    $categories = explode(", ", $_GET['categories']);
    $tags = explode(", ", $_GET['tags']);
    $months = explode(", ", $_GET['months']);
    $categoryList = '';
    $tagList = '';
    $monthList = '';
    foreach ($categories as $category) {
        $categoryList .= "<li>{$category}</li>";
    }
    foreach ($tags as $tag) {
        $tagList .= "<li>{$tag}</li>";
    }
    foreach ($months as $month) {
        $monthList .= "<li>{$month}</li>";
    }
    echo "<h2>Categories</h2><ul>{$categoryList}</ul>" .
        "<h2>Tags</h2><ul>{$tagList}</ul>" .
        "<h2>Months</h2><ul>{$monthList}</ul>";
}
?>

</body>
</html>