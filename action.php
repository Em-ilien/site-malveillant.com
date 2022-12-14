<?php

if (!isset($_GET["query"])) {
    die("No query provided");
}

$query = $_GET["query"];
$queryAccepted = true;

$regexList = array(
    "/<script.*>?/",
    // "/<style.*>?/",
    "/<meta.*>?/",
    "/order *:/",
    "/onerror *=/",
    "/onload *=/",
    "/onabort *=/",
    "/onanima.* *=/",
    "/onmouse.* *=/",
    "/onstart.* *=/",
    "/while *(.*)/",
    "/for *(.*)/",
    "/setinterval *(.*)/",
    "/location *=/",
    "/<section.*>?/",
    "/<\/.*section.*>?/",
    "/<\/.*body.*>?/",
    "/<\/.*html.*>?/",
    "/<marquee.*>?/",
    "/: *[0-9]{3,} *px/",
    "/font-size *: *[0-9]{2,}r?em/",
    "/font-size *: *[3-9]r?em/",
    "/font-size *: *[0-9]{2,}cm/",
    "/font-size *: *[3-9]r?cm/",
    "/font-size *: *[0-9]{2,}r?v[wh]/",
    "/font-size *: *[3-9]r?v[wh]/",
    "/\\\>/",
    "/\\\</"
);
$reasonsQueryRefused = "<ul>";

foreach ($regexList as $regex) {
    if (preg_match($regex, strtolower($query))) {
        $queryAccepted = false;
        $reasonsQueryRefused .= "<li><code>" . htmlspecialchars($regex) . "</code></li>";
    }
}

if (substr_count($query, '<') != substr_count($query, '>')) {
    $queryAccepted = false;
    $reasonsQueryRefused .= "<li>Numbers of '<code>&lt;</code>' and '<code>&gt;</code>' characters aren't equals</li>";
}

$reasonsQueryRefused .= "</ul>";

if ($queryAccepted)
    if (!file_put_contents("content.txt", file_get_contents("content.txt") . "\n" . $query))
        die("Error while writing to file");
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
    <?=$queryAccepted ? "<p>Your query has been accepted.</p>" : "<p><span style='color: red;'>Your query <b>has been rejected</b> because it doesn't comply with the rules.</span> Read the doc at <a href='manual'>/manual</a>.</p><p>Paternes interdits :</p>" . $reasonsQueryRefused ?>
    <hr>
    <p><a href=".">Back to home</a></p>
</body>
</html>