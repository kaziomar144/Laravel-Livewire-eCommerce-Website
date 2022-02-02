<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Settings
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" wire:submit.prevent="saveSetting">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Email" class="form-control input-md" wire:model="email">
                                    @error('email')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone1:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Phone1" class="form-control" wire:model="phone1">
                                    @error('phone1')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone2:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Phone2" class="form-control" wire:model="phone2">
                                    @error('phone2')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Address" class="form-control" wire:model="address">
                                    @error('address')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Map:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Map" class="form-control" wire:model="map">
                                    @error('map')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Twitter:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Twitter" class="form-control" wire:model="twitter">
                                    @error('twitter')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Facebook" class="form-control" wire:model="facebook">
                                    @error('facebook')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pinterest:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Pinterest" class="form-control" wire:model="pinterest">
                                    @error('pinterest')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Instagram:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Instagram" class="form-control" wire:model="instagram">
                                    @error('instagram')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Youtube" class="form-control" wire:model="youtube">
                                    @error('youtube')
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
