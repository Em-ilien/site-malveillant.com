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
        }
    </style>
</head>
<body>
    <?= file_get_contents("content.txt") ?>
</body>
</html>