<?php
include 'app/Views/Layout-top.php';
?>
<div class="container p-4">
    <h2>Categories List</h2>
    <br>
    <table id="categoryList" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Delete Category</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->name ?></td>
                <td class="d-flex justify-content-around">
                    <a href="/categories/delete/?id=<?php echo $category->id ?>" title="Delete" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
        <tfoot>

        </tfoot>
    </table>

</div>

<?php
include 'app/Views/Layout-bot.php';
?>
