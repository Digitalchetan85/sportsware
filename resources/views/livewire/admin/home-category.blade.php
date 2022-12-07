<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Home Categories
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='updateHomeCategory'>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Choose Categories</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control sel_categories" name="categories[]" multiple="multiple" wire:model="sel_categories">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('sel_categories') <small class="text-danger">{{ $message }}</small> @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">No of Products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="No of Products" wire:model="no_of_products"/>
                                    {{-- @error('no_of_products') <small class="text-danger">{{ $message }}</small> @enderror --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
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

{{-- @push('scripts')

<script>
    $(doccument).ready(function() {
        $('.sel_categories').select2();
    });
</script>


@endpush --}}