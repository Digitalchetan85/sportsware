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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.add-categories') }}" class="pull-right btn btn-primary">Add
                                    Category</a>
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
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Sub Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach($item->subCategories as $scategory)
                                                <li> <i class="fa fa-caret-right"></i>{{ $scategory->name }} <a href="{{ route('admin.edit-category',['category_id'=> $category->slug, 'scategory_id'=> $scategory->slug]) }}"> <i class="fa fa-edit"></i> </a> </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit-categories', ['category_slug'=>$item->slug]) }}"
                                                class="btn btn-transparent"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="" class="btn btn-transparent"
                                                wire:click.prevent="deleteCategory({{ $item->id }})"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>