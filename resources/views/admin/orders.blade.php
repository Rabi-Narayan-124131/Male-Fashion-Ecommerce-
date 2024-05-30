<x-adminheader title="Orders" />
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Orders</h4>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>User Status</th>
                                        <th>Bill</th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>Order Status</th>
                                        <th>
                                            Order Date
                                        </th>
                                        <th>
                                            Order Items
                                        </th>

                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($orders as $order)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            {{ $order->email }}
                                        </td>
                                        <td><label
                                                class="badge @if($order->userStatus == 'Active') badge-success @else badge-danger @endif">{{ $order->userStatus }}</label>
                                        </td>
                                        <td>${{ $order->bill }}</td>
                                        <td>
                                            {{ $order->phone }}
                                        </td>
                                        <td>${{ $order->address }}</td>

                                        <td><label
                                                class="badge @if($order->status == 'Paid' || $order->status == 'Accepted') badge-success @elseif($order->status == 'Pending') badge-warning @elseif($order->status == 'Delivered') badge-info @else badge-danger @endif">{{ $order->status }}</label>
                                        </td>
                                        <td>
                                            {{ $order->created_at }}
                                        </td>
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
                                                            <h4 class="modal-title">Ordered Products</h4>
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
                                                                                    @foreach ($orderItems as $orderItem)
                                                                                    @if ($order->id == $orderItem->orderId)
                                                                                    <tr>
                                                                                        <td class="py-1">
                                                                                            <img src="{{ asset('admin/product/'.$orderItem->image)}}"
                                                                                                height="100px"
                                                                                                width="100px">
                                                                                            {{ $orderItem->title }}
                                                                                        </td>
                                                                                        <td>{{ $orderItem->quantity }}</td>
                                                                                        <td>${{ $orderItem->price }}</td>
                                                                                        <td><label
                                                                                                class="badge badge-info">${{ $orderItem->price * $orderItem->quantity}}</label>
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
                                        <td>
                                            @if ($order->status == 'Pending' || $order->status == 'Paid')
                                            <a type="button" class="btn btn-sm btn-inverse-info"
                                                href="{{ url('orderStatus/Accepted',$order->id) }}">Accept</a>
                                            <a type="button" class="btn btn-sm btn-inverse-danger"
                                                href="{{ url('orderStatus/Rejected',$order->id) }}">Reject</a>

                                            @elseif ($order->status == 'Accepted')
                                            <a type="button" class="btn btn-sm btn-inverse-success"
                                                href="{{ url('orderStatus/Delivered',$order->id) }}">Complete</a>
                                            @elseif ($order->status == 'Delivered')
                                            Completed
                                            @else
                                            <a type="button" class="btn btn-sm btn-inverse-info"
                                                href="{{ url('orderStatus/Accepted',$order->id) }}">Accept</a>
                                            @endif


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

    <!-- content-wrapper ends -->
    <x-adminfooter />
