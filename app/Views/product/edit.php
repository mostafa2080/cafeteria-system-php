<?php
include 'app/Views/Layout-top.php';
?>
<div class="container">
	<h1>Edit Product</h1>
	<form method="POST" action="/product/update" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $product->id ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo $product->name ?>">
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" value="<?php echo $product->price ?>">
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<select class="form-control" name="status">
				<option value="available" <?php if ($product->status == 'available') echo 'selected' ?>>Available</option>
				<option value="unavailable" <?php if ($product->status == 'unavailable') echo 'selected' ?>>Unavailable</option>
			</select>
		</div>
		<div class="form-group">
			<label for="categoryID">Category ID</label>
			<input type="number" class="form-control" name="categoryID" value="<?php echo $product->categoryID ?>">
		</div>
		<div class="form-group">
			<label for="image">Image:</label>
			<input type="file" class="form-control-file" name="image" id="image" required>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
		<a href="/products" class="btn btn-secondary">Cancel</a>
	</form>
	<?php
	if (!empty($errors)) {
		echo '<div class="alert alert-danger">';
		echo '<ul>';
		foreach ($errors as $error) {
			echo '<li>' . $error . '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
	?>
</div>
<?php
include 'app/Views/Layout-bot.php';
?>