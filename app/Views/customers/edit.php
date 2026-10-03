<!DOCTYPE html>
<html>
<head><title>Edit Customer</title></head>
<body>
    <h1>Edit Customer</h1>

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

    <form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= esc($customer['full_name']) ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= esc($customer['email']) ?>"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= esc($customer['phone'] ?? '') ?>"><br><br>

        <button type="submit">Update Customer</button>
    </form>

    <br>
    <a href="<?= base_url('customers') ?>">Back to Customer Accounts</a>
</body>
</html>