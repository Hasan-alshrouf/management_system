<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/login/styles.css">
    <title> Login</title>
</head>

<body>
    <div class="log-form">
        <h2>Login to your account</h2>
        <form method="POST" action="/authenticate">
            <input type="email" title="email" placeholder="email" name="email" />
            <input type="password" title="password" placeholder="password" name="password" />
            <button type="submit" class="btn">Login</button>

        </form>
        <br>
        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class="error">
            <?= $_SESSION['error'] ?>
        </div>
        <?php
                $_SESSION['error'] = null;
                endif; 
                ?>

    </div>

</body>

</html>