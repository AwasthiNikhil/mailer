<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>PHP Mail</title>
</head>
<body>
    <div class="main">
    <div class="mail-area">
        <h1>PHP Mail</h1>
        <form method="post" action="sendmail.php" enctype="multipart/form-data">
            <input type="email" name="email" class="input" placeholder="Email Id" required>
            <input type="text" name="subject" class="input" placeholder="Subject" required>

            <textarea class="input" name="message" placeholder="Message" required></textarea>
            <input type="file" name="attachment" class="up">
            <input class="input btn" type="submit" name="send" value="Send">
        </form>
    </div>
    </div>
</body>
</html>