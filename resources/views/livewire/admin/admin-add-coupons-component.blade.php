<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All Coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="storeCoupon">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Code:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code">
                                    @error('code')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Type:</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Select</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Value:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value">
                                    @error('value')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cart Value:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value">
                                    @error('cart_value')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Expiry Date:</label>
                                <div class="col-md-4">
                                    <div wire:ignore>
                                        <input type="text" id="expiry-date" placeholder="Expiry Date" class="form-control input-md" wire:model="expiry_date">
                                    </div>
                                    @error('expiry_date')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        $(function(){
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(ev){
                let data = $(this).val();
                @this.set('expiry_date',data);
            })
        })
    </script>
@endpush