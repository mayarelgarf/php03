<?php
define('BASE_PATH', './');
require_once('./logic/cart.php');
require_once('./logic/products.php');
require_once('./logic/colors.php');
require_once('./logic/sizes.php');
$cart_items = getCart();
var_dump(getCart());
require_once('./layouts/header.php');
?>

<div class="container-fluid">
  <div class="row px-xl-5">
    <div class="col-lg-8 table-responsive mb-5">
      <table class="table table-light table-borderless table-hover text-center mb-0">
        <thead class="thead-dark">
          <tr>
            <th>Products</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Remove</th>
          </tr>
        </thead>

        <?php foreach ($cart_items as $cart_item) { ?>
          <tbody class="align-middle" id="products">
            <tr>
              <td class="align-middle">
                <img src="<?= $cart_item['product']['image_url'] ?>" alt="" style="width: 50px" />
                <?= $cart_item['product']['name'] ?>
              </td>
              <td class="align-middle">
                <?= $cart_item['product']['price'] ?>
              </td>
              <td class="align-middle">
                <div class="input-group quantity mx-auto" style="width: 100px">
                  <div class="input-group-btn">
                    <a class="decBtn btn btn-sm btn-primary btn-minus" type="button"
                      href="dec-quantity.php?id=<?= $cart_item['product']['id'] ?>&process=decFromCart">
                      <i class="fa fa-minus"></i>

                    </a>

                  </div>
                  <input type="text" class="quantityVal form-control form-control-sm bg-secondary border-0 text-center"
                    value="<?= $cart_item['quantity'] ?>" />
                  <div class="input-group-btn">
                    
                    <button type="button" class="incBtn btn btn-sm btn-primary btn-plus">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <?= $cart_item['quantity'] * $cart_item['product']['price'] ?>
              </td>
              <td class="align-middle">
                <button class="btn btn-sm btn-danger" type="button">
                  <i class="fa fa-times"></i>
                </button>
              </td>
            </tr>

            </tr>
          </tbody>
        <?php } ?>

      </table>
    </div>
    <div class="col-lg-4">
      <form class="mb-30" action="">
        <div class="input-group">
          <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code" />
          <div class="input-group-append">
            <button class="btn btn-primary">Apply Coupon</button>
          </div>
        </div>
      </form>
      <h5 class="section-title position-relative text-uppercase mb-3">
        <span class="bg-secondary pr-3">Cart Summary</span>
      </h5>
      <div class="bg-light p-30 mb-5">
        <div class="border-bottom pb-2">
          <div class="d-flex justify-content-between mb-3">
            <h6>subtotal</h6>
            <h6 id="sub-total">
              <?= subtotal() ?>
            </h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium" id="shipping">20$</h6>
          </div>
        </div>
        <div class="pt-2">
          <div class="d-flex justify-content-between mt-2">
            <h5>Total</h5>
            <h5 id="total"><?= total() ?></h5>
          </div>
          <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">
            Proceed To Checkout
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once('./layouts/footer.php');
?>