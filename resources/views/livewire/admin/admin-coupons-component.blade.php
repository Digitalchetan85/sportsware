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
                            <div class="col-md-6">
                                All Coupons
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-coupon') }}" class="pull-right btn btn-primary">Add
                                    Coupon</a>
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
                                        <th>Coupon Code</th>
                                        <th>Coupon Type</th>
                                        <th>Coupon Value</th>
                                        <th>Cart Value</th>
                                        <th>Expiry Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->type }}</td>
                                        @if($item->type == 'fixed')
                                        <td>₹{{ $item->value }}</td>
                                        @else
                                            <td>{{ $item->value }}%</td>
                                        @endif
                                        <td>₹{{ $item->cart_value }}</td>
                                        {{-- <td>{{ $item->cart_value }}</td> --}}
                                        <td>{{ $item->expiry_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-coupon', ['coupon_id'=>$item->id]) }}"
                                                class="btn btn-transparent"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="" class="btn btn-transparent"
                                                wire:click.prevent="deleteCoupon({{ $item->id }})"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer justify-content-center">
                        {{ $coupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>