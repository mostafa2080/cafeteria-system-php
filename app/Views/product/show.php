
<?php
include 'app/Views/Layout-top.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
</head>
<body>
	<div class="container">
		<h1>Product Details</h1>
		<hr>
		<?php if ($product): ?>
			<h3><?= $product->name ?></h3>
			<p><strong>Price:</strong> $<?= $product->price ?></p>
			<img src="public/images/<?= $product->image ?>" alt="<?= $product->name ?>"/>
			<p><strong>Category:</strong> <?= $product->categoryID ?></p>
		<?php else: ?>
			<p>Product not found</p>
		<?php endif; ?>
		<a href="/products" class="btn btn-primary">Back to Products</a>
	</div>

</body>
</html>

<?php
include 'app/Views/Layout-bot.php';
?>