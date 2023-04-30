<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../../../public/assets/front/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../../public/assets/front/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="../../../public/assets/front/css/styles.css"
    />

  </head>

  <body>

    <main>
      <section class="main-padding">
        <div class="container">
          <div class="row">
            <!-- orders-panel -->
            <div class="col-md-4">
              <form action="">
                <div class="orders-panel">
                  <!-- choosen-items -->
                  <div class="choosen-items">
                    <ul class="list-unstyled"></ul>
                  </div>
                  <!-- ./choosen-items -->
                  <!-- items-notes -->
                  <div class="items-notes">
                    <label>Notes</label>
                    <textarea name="notes"></textarea>
                  </div>
                  <!-- ./items-notes -->
                  <!-- room -->
                  <div class="room">
                    <label>Room</label>
                    <select>
                      <option value="CompoBox">CompoBox</option>
                      <option value="test1">hot drinks</option>
                      <option value="test2">cold drinks</option>
                    </select>
                  </div>
                  <!-- ./room -->
                  <!-- total-price -->
                  <div class="total-price">
                    <span>EGP <span>0</span></span>
                    <input type="text" name="amount" value="" hidden />
                  </div>
                  <!-- ./total-price -->
                  <!-- confirm -->
                  <div class="confirm">
                    <button type="submit" class="btn btn-success">
                      confirm
                    </button>
                  </div>
                  <!-- confirm -->
                </div>
              </form>
            </div>
            <!-- ./orders-panel -->

            <!-- all-products -->
            <div class="col-md-8">
              <div class="all-products">
                <!-- latest-orders -->
                <div class="latest-orders">
                  <h3>Latest Orders</h3>
                  <div class="row">
                    <!-- each-order -->
                    <div class="col-sm-3">
                      <div class="each-order">
                        <img
                          src="https://via.placeholder.com/100"
                          class="w-100"
                          width="100"
                          height="100"
                          alt=""
                        />
                        <h5>tea</h5>
                        <input type="text" name="tea" hidden />
                      </div>
                    </div>
                    <!-- each-order -->
                    <div class="col-sm-3">
                      <div class="each-order">
                        <img
                          src="https://via.placeholder.com/100"
                          class="w-100"
                          width="100"
                          height="100"
                          alt=""
                        />
                        <h5>cofee</h5>
                        <input type="text" name="cofee" hidden />
                      </div>
                    </div>
                    <!-- each-order -->
                    <div class="col-sm-3">
                      <div class="each-order">
                        <img
                          src="https://via.placeholder.com/100"
                          class="w-100"
                          width="100"
                          height="100"
                          alt=""
                        />
                        <h5>cofee</h5>
                        <input type="text" name="cofee" hidden />
                      </div>
                    </div>
                  </div>
                </div>
                <!-- latest-orders -->
                <!-- products -->
                <div class="products">
                  <h3>Products</h3>
                  <div class="row">
                    <!-- each-order -->
                    <?php foreach ($products as $product) : ?>
                    <div class="col-sm-3">
                      <div class="each-order">
                        <img
                        src="/public/images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>"
                          class="w-100"
                          width="100"
                          height="100"
                        />
                        <h5><?php echo $product->name; ?></h5>
                        <input type="text" name="<?php echo $product->name; ?>" value="<?php echo $product->price; ?>" hidden />
                        <span><?php echo $product->price; ?></span>
                      </div>
                      
                    </div>
        <?php endforeach; ?>

                  </div>
                </div>
                <!-- products -->
              </div>
              <!-- ./all-products -->
            </div>
          </div>
          <!-- ./row -->
        </div>
        <!-- ./container -->
      </section>
    </main>

    <script src="../../../public/assets/front/js/jquery-3.3.1.js"></script>
    <script src="../../../public/assets/front/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../public/assets/front/js/popper.min.js"></script>
    <script src="../../../public/assets/front/js/modules/order.js"></script>
  </body>
</html>
