<?php
include 'app/Views/Layout-top.php';
?>
<div class="container d-flex justify-center p-5">
    <form method="POST" action="/users/store">
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
                <input type="text" name="image" class="form-control" id="image">
            </div>
        </div>
        <div class="raw d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/users" class="btn btn-danger ml-3">Cancel</a>
        </div>
    </form>
</div>
<?php
include 'app/Views/Layout-bot.php';
?>