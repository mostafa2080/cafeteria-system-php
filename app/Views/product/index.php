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
                        <a href="/product/edit?id=<?php echo $product->id; ?>"><i class="fas fa-edit action"></i></a>
                        <a type="button" data-toggle="modal" data-target="#deleteModal<?php echo $product->id; ?>"><i class="fas fa-trash action"></i></a>
                        <a href="/product/show?id=<?php echo $product->id; ?>"><i class="fas fa-info-circle action"></i></a>
                    </td>
                </tr>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $product->id; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel<?php echo $product->id; ?>">Confirm Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this product?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a href="/product/delete?id=<?php echo $product->id; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<style>
   .action{
  display: inline-block;
  padding: 5px 10px;
  background-color: #007bff;
  color: #fff;
  border-radius: 5px;
  text-decoration: none;
}

.action:hover {
  background-color: #0069d9;
  color: #fff;
}

</style>
<?php
include 'app/Views/Layout-bot.php';
?>
