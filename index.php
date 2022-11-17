<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS - malveillant.com</title>
</head>
<body style="display: flex; flex-direction: column; margin: 0 8px; height: 100vh;">
    <header>
        <div>
            <h1>site-malveillant.com</h1>
            <p>Here you can publish content using XSS attack. Read the doc at <a target="_blank" href="manual">/manual</a>.</p>
        </div>
        <form style="margin-bottom: 1em;" action="action.php">
            <input style="width: 30em; padding: 0.5em 1em; border-color: #888; border-radius: 5px;" type="text" name="query" placeholder="'Enter your<b>'; favorite query here --</b> name please'">
            <input style="display: inline-block; height: 100%;" type="submit" value="Send XSS query">
        </form>
    </header>
    <iframe src="xss.php" style="width: 100%; flex-grow: 1; margin: 1em 0;"></iframe>
</body>
</html>