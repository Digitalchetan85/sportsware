<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.sliders') }}" class="btn btn-success pull-right">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='updateSlide'>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md " placeholder="Title" wire:model='title'/>
                                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Subtitle" wire:model='subtitle'/>
                                    @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="price" wire:model='price'/>
                                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Link" wire:model='link'/>
                                    @error('link') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model='newimage'/>
                                    @if($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120" class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $image }}" alt="" width="120" class="img-fluid">
                                    @endif
                                    @error('newimage') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Status</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control" wire:model='status'>
                                        <option value="">Select</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
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
