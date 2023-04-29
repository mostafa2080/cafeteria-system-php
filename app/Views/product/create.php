<?php

$errors = []; // array to store validation errors

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // validate name field 
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    }

    // validate image field
    if (empty($_FILES['image']['tmp_name'])) {
        $errors[] = 'Image is required';
    } else {
        $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $errors[] = 'Only JPG, JPEG, PNG images are allowed';
        }
    }

    // validate price field
    if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
        $errors[] = 'Price is required and should be a number';
    }

    // validate status field
    if (empty($_POST['status'])) {
        $errors[] = 'Status is required';
    }

    // validate category ID field
    if (empty($_POST['categoryID']) || !is_numeric($_POST['categoryID'])) {
        $errors[] = 'Category ID is required and should be a number';
    }

    // if there are no validation errors, proceed with form submission
    if (empty($errors)) {
        // do something with the form data, e.g. save to database
        // ...
        // redirect to success page
        header('Location: /success');
        exit;
    }
}

// if there are validation errors, display them to the user
if (!empty($errors)) {
    echo '<div class="alert alert-danger">';
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}







include 'app/Views/Layout-top.php';
?>
<form action="/product/store" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

   
    <div class="form-group">
        <label for="price">Price:</label>
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" class="form-control" name="price" id="price" step="0.01" required>
        </div>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" name="status" id="status" required>
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select>
    </div>

    <div class="form-group">
        <label for="categoryID">Category ID:</label>
        <input type="number" class="form-control" name="categoryID" id="categoryID" required>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control-file" name="image" id="image" required>
    </div>


    <button type="submit" class="btn btn-primary">Create Product</button>
</form>


<style>
    form {
        margin-left: 15px;
    }
</style>

<?php
include 'app/Views/Layout-bot.php';
?>