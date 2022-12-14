<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Attribute
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.attribute') }}" class="btn btn-success pull-right">All Attribute</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="updateAttribute">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Attribute Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Attribute Name" wire:model='name' />
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
