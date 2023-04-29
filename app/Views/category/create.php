<?php
include 'app/Views/Layout-top.php';
?>
<div class="container d-flex justify-center p-5">
    <form method="POST" action="/categories/store" class="col-12">
        <div class="row d-flex justify-content-start">
            <div class="form-group col col-4 mx-3">
                <label for="userName">Category Name</label>
                <input type="text" required="required" pattern="^[A-Za-z ]+$" name="name" class="form-control" id="categoryName">
            </div>
            <div class="row d-flex col-4 justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary col font-weight-bold mx-3">Add</button>
                <a href="/categories" class="btn btn-danger col font-weight-bold">Back to List</a>
            </div>
        </div>
        
    </form>
</div>
<?php
include 'app/Views/Layout-bot.php';
?>