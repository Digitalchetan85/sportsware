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
        .sclist{
            list-style="none";    
        }
        .sclist li{
            line-height:33px;
            border-bottom:1px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;
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
                                All Attributes
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-attribute') }}" class="pull-right btn btn-primary">Add
                                    Attributes</a>
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
                                        <th>Attribute Name</th>
                                        <th>Created At</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pattributes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-attribute', ['attribute_id'=>$item->id]) }}"
                                                class="btn btn-transparent"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="#" onclick="confirm('Are you sure,You want to delete the attribute?')" class="btn btn-transparent"
                                                wire:click.prevent="deleteAttribute({{ $item->id }})"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer justify-content-center">
                        {{ $pattributes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>