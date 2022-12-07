<div>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent='addCoupon'>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Coupon Code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Coupon Code" wire:model='code'/>
                                    @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Select Coupon Type</label>
                                <div class="col-md-4">
                                    <select id="" class="form-control" wire:model='type'>
                                        <option value="">Select Coupon Type</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Coupon Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Coupon Value" wire:model='value'/>
                                    @error('value') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable text-right">Cart Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Cart Value" wire:model='cart_value'/>
                                    @error('cart_value') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 text-right">Expiry Date</label>
                                <div class="col-md-4">
                                    <input type="text" id="expiry_date" class="form-control" placeholder="yyyy/mm/dd h:m:s" wire:model='expiry_date'>
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
@push('scripts')
    <script type="text/javascript">
        $(function(){
            $('#expiry_date').datetimepicker({
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
                var data = $('#expiry_date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush
