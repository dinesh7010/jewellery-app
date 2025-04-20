<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Add Product</h2>

<form action="<?= site_url('product/store') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="product_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category" class="form-control" required>
            <option value="">Select</option>
            <option value="Bag">Bag</option>
            <option value="Dress">Dress</option>
            <option value="Shoes">Shoes</option>
            <option value="Ring">Ring</option>
            <option value="Earrings">Earrings</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</body>
</html>
