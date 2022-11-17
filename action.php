<?php

if (!isset($_GET["query"])) {
    die("No query provided");
}

$query = $_GET["query"];
$queryAccepted = true;

if (preg_match("/<script.*>.*<\/.*script.*>/", strtolower($query)))
    $queryAccepted = false;

if (preg_match("/order *:/", strtolower($query)))
    $queryAccepted = false;

if ($queryAccepted) {
    $content = file_get_contents("content.txt");
    file_put_contents("content.txt", $content . "\n" . $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS attack <?= $queryAccepted ? "" : "not " ?>sent</title>
</head>
<body>
    <p>You sent the following content:</p>
    <code style="display: block;"><?=htmlspecialchars($query)?></code>
    <?=$queryAccepted ? "<p>Your query has been accepted.</p>" : "<p><span style='color: red;'>Your query <b>has been rejected</b> because it doesn't comply with the rules.</span> Read the doc at <a href='manual'>/manual</a>.</p>"?>
    <hr>
    <p><a href=".">Back to home</a></p>
</body>
</html>