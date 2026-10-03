<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>
    <h1>User Accounts</h1>

    <a href="<?= base_url('users/new') ?>">+ Add New User</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?php if (!empty($user['avatar'])): ?>
                    <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" width="50" height="50">
                <?php else: ?>
                    <div style="width:50px;height:50px;background:#ccc;display:flex;align-items:center;justify-content:center;font-size:10px;">No Avatar</div>
                <?php endif; ?>
            </td>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td><?= esc($user['role'] ?? '') ?></td>
            <td><a href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> |
        <a href="<?= base_url('about') ?>">About</a> |
        <a href="<?= base_url('customers') ?>">Customer Accounts</a> |
        <a href="<?= base_url('users') ?>">User Accounts</a>
    </nav>
</body>
</html>