<?php
include 'app/Views/Layout-top.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <!-- Include the Bootstrap CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">View Products</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Category ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['image']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td>
                            <?php if ($product['status']): ?>
                                <span class="badge badge-success">Available</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Not Available</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $product['categoryID']; ?></td>
                        <td>
                            <a href="/product/edit?id=<?php echo $product['id']; ?>"><i class="fas fa-edit"></i></a>
                            <a href="/product/delete?id=<?php echo $product['id']; ?>"><i class="fas fa-trash"></i></a>
                            <a href="/product/show?id=<?php echo $product['id']; ?>"><i class="fas fa-info-circle"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Include the Bootstrap JS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include 'app/Views/Layout-bot.php';
?>