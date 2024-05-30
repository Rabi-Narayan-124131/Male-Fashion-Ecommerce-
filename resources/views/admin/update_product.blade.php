<x-adminheader title="Update Product" />
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        <form class="forms-sample" action="{{ url('updateProduct',$products->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group row">
                                <div class=" col-lg-6">
                                    <label for="image">Old Image</label>
                                </div>
                                <div class=" col-lg-6">
                                    <img src="{{ asset('admin/product/'.$products->image)}}" height="75px" width="75px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Image Upload</label>
                                <input type="file" name="image" id="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $products->title }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{$products->price}}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{ $products->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">

                                    <option value="Clothes" {{ $products->type === 'Clothes' ? 'selected' : '' }}>Clothes</option>
                                    <option value="Shoes" {{ $products->type === 'Shoes' ? 'selected' : '' }}>Shoes</option>
                                    <option value="Accessories" {{ $products->type === 'Accessories' ? 'selected' : '' }}>Accessories</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control js-example-basic-multiple" id="type" name="type[]"
                                    multiple="multiple" style="width: 100% !important">
                                    <option value="Best Sellers" {{ in_array('Best Sellers', explode(',', $products->type)) ? 'selected' : '' }}>
                                        Best Sellers
                                    </option>

                                    <option value="New Arrivals"
                                    {{ in_array('New Arrivals', explode(',', $products->type)) ? 'selected' : '' }}>
                                        New Arrivals
                                    </option>
                                    <option value="Hot Sales"
                                    {{ in_array('Hot Sales', explode(',', $products->type)) ? 'selected' : '' }}>
                                        Hot Sales</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Description" rows="4">{{ $products->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- content-wrapper ends -->
    <x-adminfooter />
