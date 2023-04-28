<?php
include 'app/Views/Layout-top.php';
?>
<form action="/product/store" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="text" class="form-control" name="image" id="image" required>
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

    <button type="submit" class="btn btn-primary">Create Product</button>
</form>

<?php
include 'app/Views/Layout-bot.php';
?>