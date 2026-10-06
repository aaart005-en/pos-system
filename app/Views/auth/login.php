<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?= esc($error) ?></p>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>