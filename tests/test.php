<?php

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

$content = file_get_contents("data.txt");

$contentSaved = "";
$contentDeleted = "";

$lines = explode("\n", $content);
foreach ($lines as $line) {
    $queryAccepted = true;

    foreach ($regexList as $regex) {
        if (preg_match($regex, strtolower($line))) {
            $queryAccepted = false;
        }
    }

    if (substr_count($line, '<') != substr_count($line, '>')) {
        $queryAccepted = false;
    }

    if ($queryAccepted) {
        $contentSaved .= $line . "\n";
    } else {
        $contentDeleted .= $line . "\n";
    }
}


$fileInput1 = file_put_contents("data_saved.txt", $contentSaved);
$fileInput2 = file_put_contents("data_deleted.txt", $contentDeleted);

echo ($fileInput1 && $fileInput2) ? "<p>Success<p><p><a href='data_saved.txt'>Données qui passent le filtre</a></p><p><a href='data_deleted.txt'>Données supprimées par le filtre</a></p>" : "Error";