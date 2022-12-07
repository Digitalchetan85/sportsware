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
                                All Sliders
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-slider') }}" class="pull-right btn btn-primary">Add
                                    Slider</a>
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
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subtitle }}</td>
                                        <td><img src="{{ asset('assets/images/sliders') }}/{{ $item->image }}" alt="" class="img-fluid" width="120"></td>
                                        <td>₹{{ $item->price }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-slider', ['id'=>$item->id]) }}"
                                                class="btn btn-transparent"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="" class="btn btn-transparent"
                                                wire:click.prevent="deleteSlider({{ $item->id }})"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer justify-content-center">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>