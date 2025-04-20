<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form method="post" action="<?= site_url('product/update/'.$product['id']) ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?= $product['product_name'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" value="<?= $product['category'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image (Leave blank to keep current)</label>
            <input type="file" name="image" class="form-control">
            <br>
            <img src="<?= base_url('uploads/'.$product['image']) ?>" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
