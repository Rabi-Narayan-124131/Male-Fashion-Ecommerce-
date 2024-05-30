<x-adminheader title="Products" />
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#addProductModal">
                            Add New
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="addProductModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="forms-sample" action="{{ url('addProduct') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="image">Image Upload</label>
                                                <input type="file" name="image" id="image" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                        placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary"
                                                            type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity"
                                                    placeholder="Quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="form-control" id="category" name="category">
                                                    <option selected disabled>Category</option>
                                                    <option value="Clothes">Clothes</option>
                                                    <option value="Shoes">Shoes</option>
                                                    <option value="Accessories">Accessories</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select class="form-control js-example-basic-multiple" id="type"
                                                    name="type[]" multiple="multiple" style="width: 100% !important">
                                                    <option value="Best Sellers">Best Sellers</option>
                                                    <option value="New Arrivals">New Arrivals</option>
                                                    <option value="Hot Sales">Hot Sales</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description"
                                                    placeholder="Description" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $product)

                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('admin/product/'.$product->image)}}">
                                        </td>
                                        <td>
                                            {{ $product->title }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            {{ $product->quantity }}
                                        </td>
                                        <td>
                                            <label class="badge badge-success">{{ $product->category }}</label>
                                        </td>
                                        <td>
                                            <label class="badge badge-info">{{ $product->type }}</label>
                                        </td>
                                        <td>

                                            <a type="button" class="btn btn-sm btn-inverse-info"
                                                href="{{ url('updateProduct',$product->id) }}">Update</a>
                                            <a type="button" class="btn btn-sm btn-inverse-danger"
                                                href="{{ url('deleteProduct',$product->id) }}" onclick="confirmation(event)">Delete</a>

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
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(function () {
            location.reload();
        });

    </script>
    <!-- content-wrapper ends -->
    <x-adminfooter />
