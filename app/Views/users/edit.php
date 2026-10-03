<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
    <h1>Edit User</h1>

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

    <?php if (!empty($user['avatar'])): ?>
        <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" width="100"><br><br>
    <?php endif; ?>

    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= esc($user['username']) ?>"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($user['full_name']) ?>"><br><br>

        <label>Role:</label><br>
        <select name="role">
            <?php foreach (['Admin', 'Manager', 'Cashier', 'Staff'] as $r): ?>
                <option value="<?= $r ?>" <?= ($user['role'] ?? '') === $r ? 'selected' : '' ?>><?= $r ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Avatar (JPG/PNG, max 2MB):</label><br>
        <input type="file" name="avatar"><br><br>

        <button type="submit">Update User</button>
    </form>

    <br>
    <a href="<?= base_url('users') ?>">Back to User Accounts</a>
</body>
</html>