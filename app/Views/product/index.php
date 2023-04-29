<?php
include 'app/Views/Layout-top.php';
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="my-4">View Products</h1>
        <button type="button" class="btn btn-success" onclick="window.location.href='/product/create';">Create Product</button>
    </div>
    <table id="example1" class="table table-bordered table-striped">
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
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product->name; ?></td>
                    <td style="width: 100px; height: 100px; overflow: hidden;"><img src="/public/images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" style="width: 50px; height: 50px;"></td>
                    <td>$<?php echo $product->price; ?></td>
                    <td>
                        <?php if ($product->status) : ?>
                            <span class="badge badge-success">Available</span>
                        <?php else : ?>
                            <span class="badge badge-danger">Not Available</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $product->categoryID; ?></td>
                    <td>
                        <a href="/product/edit?id=<?php echo $product->id; ?>"><i class="fas fa-edit"></i></a>
                        <a href="/product/delete?id=<?php echo $product->id; ?>"><i class="fas fa-trash"></i></a>
                        <a href="/product/show?id=<?php echo $product->id; ?>"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
include 'app/Views/Layout-bot.php';
?>