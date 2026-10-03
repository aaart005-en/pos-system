<!DOCTYPE html>
<html>
<head><title>New User</title></head>
<body>
    <h1>New User</h1>

    <?php if (isset($validation)): ?>
        <?php if (is_array($validation)): ?>
            <ul style="color:red;">
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <?= $validation->listErrors() ?>
        <?php endif; ?>
    <?php endif; ?>

    <form action="<?= base_url('users/create') ?>" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= esc($old['username'] ?? '') ?>"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($old['full_name'] ?? '') ?>"><br><br>

        <label>Role:</label><br>
        <select name="role">
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Cashier">Cashier</option>
            <option value="Staff">Staff</option>
        </select><br><br>

        <button type="submit">Save User</button>
    </form>

    <br>
    <a href="<?= base_url('users') ?>">Back to User Accounts</a>
</body>
</html>