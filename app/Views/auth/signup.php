<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container pt-5">

    <h2>Signup</h2>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('auth/register') ?>" method="post">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirm" class="form-control" required />
        </div>
        <button class="btn btn-primary">Register</button>
        <p class="mt-3">Already have an account? <a href="<?= site_url('login') ?>">Login</a></p>
    </form>

</body>
</html>
