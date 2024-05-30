<x-homeheader title="Order" description="Male_Fashion Order" keywords="Male_Fashion, unica, creative, E-commerce,Order" menu="Order active"/>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Order</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ url('/index') }}">Home</a>
                        <span>Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 grid-margin stretch-card mx-auto ">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Information</span>
                        <h2>My Orders</h2>

                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Total Bill</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>View Product</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach ($orders as $order)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>${{ $order->bill }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td><label
                                                class="badge @if($order->status == 'Pending') badge-warning @elseif ($order->status == 'Paid') badge-success @else badge-danger @endif">{{ $order->status }}</label>
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <!-- Button to Open the Modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#ProductsModal{{ $i }}">
                                                Products
                                            </button>

                                            <!-- The Modal -->
                                            <div class="modal" id="ProductsModal{{ $i }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Product</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="col-lg-12 grid-margin stretch-card">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Product</th>
                                                                                        <th>Quantity</th>
                                                                                        <th>Price</th>
                                                                                        <th>Sub Total</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($items as $item)
                                                                                    @if ($order->id == $item->orderId)
                                                                                    <tr>
                                                                                        <td class="py-1">
                                                                                            <img src="{{ asset('admin/product/'.$item->image)}}" height="100px" width="100px">
                                                                                            {{ $item->title }}
                                                                                        </td>
                                                                                        <td>{{ $item->quantity }}</td>
                                                                                        <td>${{ $item->price }}</td>
                                                                                        <td><label
                                                                                                class="badge badge-info">${{ $item->price * $item->quantity}}</label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        {{-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<x-homefooter />
