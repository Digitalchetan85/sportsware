{{-- <div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add Sale Setting
                            </div>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Status</label>
                                <div class="col-md-4">
                                   
                                        <select class="form-control" wire:model='status'>
                                           <option value="0">Inactive</option>
                                           <option value="1">Active</option>
                                        </select>
                                   
                                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Sale Date</label>
                                <div class="col-md-4">
                                   
                                    <input type="text" id="sale-date" placeholder="yyyy/mm/dd H:M:S" class="form-control input-md" wire:model='sale_date' />
                                   
                                    @error('sale_date') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Update</button>
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
</div> --}}
{{-- @push('scripts')
<script>
    $(function(){
        $('#sale_date').datetimepicker({
            format:'Y-MM-DD h:m:s', 
        })
        .on('dp.change',function(ev){
            var data = $('#sale_date').val();
            @this.set('sale_date',data);
        });
    });
</script>
@endpush --}}

<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Sale
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <form wire:submit.prevent='updateSale'>
                            <div class="form-group row">
                                <label for="" class="col-md-4 text-right">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 text-right">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale_date" class="form-control" placeholder="yyyy/mm/dd h:m:s" wire:model='sale_date'>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 text-right"></label>
                                <div class="col-md-4">
                                    <button class="btn-sm btn-dark" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('#sale_date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
                inline : true,
                sideBySide: true,
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-check',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
            }
            })
            .on('dp.change', function(ev){
                var data = $('#sale_date').val();
                @this.set('sale_date',data);
            });
        });
    </script>
@endpush

