<x-homeheader title="Cart" description="Male_Fashion Cart" keywords="Male_Fashion, unica, creative, E-commerce,Cart" menu="Cart active"/>
<style>
    .continue__btn.update__btn button {
        color: #ffffff;
        background: #111111;
        border-color: #111111;
    }

    .continue__btn button {
        color: #111111;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        border: 1px solid #e1e1e1;
        padding: 14px 35px;
        display: inline-block;
    }

</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total=0;
                            @endphp
                            @foreach ($cartItems as $item)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ asset('admin/product/'. $item->image ) }}" width="100px" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $item->title }}</h6>
                                        <h5>${{ $item->price }}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <form action="{{ url('updateCart',$item->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control" style="width: 41.5% !important;"
                                                    name="quantity" type="number" min="1" max="{{ $item->pQuantity }}"
                                                    value="{{ $item->quantity }}">
                                            </div>

                                    </div>
                                </td>
                                <td class="cart__price">$ {{ $item->price * $item->quantity}}</td>
                                <td class="cart__close"><a href="{{ url('delete_cart_item',$item->id) }}"
                                        onclick="confirmation(event)"><i class="fa fa-close"></i></a></td>
                            </tr>
                            @php
                            $total+= ( $item->price * $item->quantity);
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ url('/') }}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <button type="submit"><i class="fa fa-spinner"></i> Update cart</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{ $total }}</span></li>
                        <li>Total <span>$ {{ $total }}</span></li>
                    </ul>
                    <form action="{{ url('stripe') }}">
                        <div class="form-group">
                            <label for="name">Enter Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" maxlength="10" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Current Address</label>
                            <textarea class="form-control mb-2" id="address" name="address"
                                placeholder="Current Address" rows="4" required></textarea>
                        </div>
                        <input type="hidden" name="bill" value="{{ $total }}">
                        <button type="submit" class="primary-btn mt-2 btn-block">Proceed to checkout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); // Get the URL from the link that was clicked
        console.log(urlToRedirect);
        swal({
                title: "Are you sure?",
                text: "Once Delete, you will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancle) => {
                if (willCancle) {
                    window.location.href = urlToRedirect;
                } else {
                    swal("Your Product is safe!");
                }
            });

    }

    // Call the refreshPage function after an item is removed from the cart
    Swal.fire({
        title: 'Product Deleted Successfully!',
        text: 'Go to view product!',
        icon: 'info',
        confirmButtonText: 'OK',
    }).then(function () {
        location.reload();
    });

</script>
<x-homefooter />
