<div>
    <style>
        nav {
            text-align: center !important;
        }

        nav svg {
            height: 10px !important;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    {{-- <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Category</span></li>
                <li class="item-link"><span>{{ $category_name }}</span></li>
            </ul>
        </div>
    </div> --}}
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                All Products
                            </div>
                           
                            <div class="col-md-4">
                                <a href="{{ route('admin.add-product') }}" class="pull-right btn btn-primary">Add
                                    Product</a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Regular Price</th>
                                        <th>Sale Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $item->image }}" alt="" class="img-fluid" width="120"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->stock_status }}</td>
                                        <td>₹{{ $item->regular_price }}</td>
                                        <td>₹{{ $item->sale_price }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-product', ['product_slug'=>$item->slug]) }}"
                                                class="btn btn-transparent"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="" class="btn btn-transparent"
                                                wire:click.prevent="deleteProduct({{ $item->id }})"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>