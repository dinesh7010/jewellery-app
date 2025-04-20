<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    
    <div style="display: flex; justify-content: space-between;">
        <h2>Product Dashboard</h2>
        <div><span>Welcome to Dashboard</span>
        <span>User ID: <?= session()->get('user_id') ?><a href="<?= site_url('/logout') ?>" class="btn btn-danger">Logout</a>
        </span></div>
    </div>
    <a href="<?= site_url('product/create') ?>" class="btn btn-success mb-3">Add Product</a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $prod): ?>
            <tr>
                <td><?= $prod['id'] ?></td>
                <td><?= $prod['product_name'] ?></td>
                <td><?= $prod['description'] ?></td>
                <td><?= $prod['price'] ?></td>
                <td><?= $prod['category'] ?></td>
                <td><img src="<?= base_url('uploads/'.$prod['image']) ?>" width="50"></td>
                <td>
                    <a href="<?= site_url('product/edit/'.$prod['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="<?= site_url('product/delete/'.$prod['id']) ?>" onclick="return confirm('Delete this product?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
