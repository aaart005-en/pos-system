<!DOCTYPE html>
<html>
<head><title>New Customer</title></head>
<body>
    <h1>New Customer</h1>

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

    <form action="<?= base_url('customers/create') ?>" method="post">
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($old['full_name'] ?? '') ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= esc($old['email'] ?? '') ?>"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= esc($old['phone'] ?? '') ?>"><br><br>

        <button type="submit">Save Customer</button>
    </form>

    <br>
    <a href="<?= base_url('customers') ?>">Back to Customer Accounts</a>
</body>
</html>