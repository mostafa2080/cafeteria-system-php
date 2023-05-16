<?php require_once ('app/Views/CafeteriaUI/Layout-top.php'); ?>

    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Register</h1>
        </div>
    </div>


    <div class="container-fluid py-5">
        <div class="container">
            <form method="POST" action="/users/add" enctype="multipart/form-data">
                <?php if (isset($_SESSION['create_error'])): ?>
                    <div class="alert alert-danger col-12" role="alert">
                        <?php echo $_SESSION['create_error']; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="userName">User Name</label>
                        <input type="text" name="name" class="form-control" id="userName">
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group col-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group col-6">
                        <label for="image">image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
                <div class="raw d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/users" class="btn btn-danger ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </div>

<?php require_once ('app/Views/CafeteriaUI/Layout-bot.php'); ?>