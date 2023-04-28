
<div class="container p-4">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <!--<td><img src="<?= $user->image ?>" alt="" width="50px" height="50px"></td>-->
                <td><img src="public/assets/img/avatar.png" alt="" width="50px" height="50px"></td>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td class="d-flex justify-content-around">
                    <a href="#" class="btn btn-outline-info">
                        <i class="fas fa-info"></i>
                    </a>
                    <a href="#" class="btn btn-outline-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-outline-danger w-25" data-toggle="modal" data-target="#deleteModal{{$order['id']}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
        <tfoot>

        </tfoot>
    </table>

</div>
<a href="#" class="btn btn-primary d-flex justify-content-center align-items-center rounded-circle shadow-lg" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000;width: 50px;height: 50px">
    <i class="fas fa-plus"></i>
</a>
