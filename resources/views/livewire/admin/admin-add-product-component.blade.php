<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='addProduct'>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Product Name" wire:model='name' wire:keyup='generateSlug'/>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="slug" wire:model='slug'/>
                                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Short Description</label>
                                <div class="col-md-4">
                                    <textarea placeholder="Short Description" id="" rows="5" class="form-control" wire:model='s_description'></textarea>
                                    @error('s_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Description</label>
                                <div class="col-md-4">
                                    <textarea placeholder="Short Description" id="" rows="5" class="form-control" wire:model='description'></textarea>
                                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="price" wire:model='reg_price'/>
                                    @error('reg_price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Sale Price" wire:model='sale_price'/>
                                    @error('sale_price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="SKU" wire:model='sku'/>
                                    @error('sku') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Stock Status</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control" wire:model='stock_status'>
                                        <option value="">Select</option>
                                        <option value="instock">Instock</option>
                                        <option value="outofstock">Out of stock</option>
                                    </select>
                                    @error('stock_status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Featured Product</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control" wire:model='featured'>
                                        <option value="">Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Quantity" wire:model='qty'/>
                                    @error('qty') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model='image'/>
                                    @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="120" class="img-fluid">
                                    @endif
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Select Category</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control" wire:model='category'>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
