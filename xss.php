<?php
$content = file_get_contents("content.txt");
$lines = explode("\n", $content);

$content = "";
foreach ($lines as $line) {
    $content .= "<section>" . $line . "</section>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 10px;
            display: flex;
            flex-direction: column-reverse;
        }
    </style>
</head>
<body>
    <?=$content?>
</body>
</html>