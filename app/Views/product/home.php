<?php
include 'app/Views/Layout-top.php';
?>
<style>
.menu {
    margin: 20px;
}

.menu-item {
    display: inline-block;
    margin-right: 20px;
    margin-bottom: 20px;
    width: 200px;
    text-align: center;
}

.menu-item-image {
    width: 150px;
    height: 150px;
    margin-bottom: 10px;
}

.menu-item-details {
    font-size: 14px;
}

.menu-item-name {
    font-weight: bold;
    margin-bottom: 5px;
}

.menu-item-price {
    margin-bottom: 5px;
}

.menu-item-status {
    margin-bottom: 5px;
}

.place-order-btn {
    display: block;
    margin-top: 20px;
}
</style>

<div class="menu">
    <?php foreach ($products as $product) : ?>
        <div class="menu-item">
            <div class="menu-item-image"><img src="/public/images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" style="width: 150px; height: 150px;"></div>
            <div class="menu-item-details">
                <div class="menu-item-name"><?php echo $product->name; ?></div>
                <div class="menu-item-price">$<?php echo $product->price; ?></div>
                <div class="menu-item-status">
                    <?php if ($product->status) : ?>
                        <span class="badge badge-success">Available</span>
                    <?php else : ?>
                        <span class="badge badge-danger">Not Available</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <a href="/order" class="btn btn-primary place-order-btn">Place an Order</a>
</div>


<?php
include 'app/Views/Layout-bot.php';
?>