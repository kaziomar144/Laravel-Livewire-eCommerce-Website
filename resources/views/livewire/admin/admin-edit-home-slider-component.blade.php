<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('msg'))
							<div class="alert alert-{!! Session::get('msg-type') !!} ">
								{{Session::get('msg')}}
							</div>
						@endif
                        <form class="form-horizontal" wire:submit.prevent="updateSlider" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Title" class="form-control input-md" wire:model="title">
                                    @error('title')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle" class="form-control" wire:model="subtitle">
                                    @error('subtitle')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control" wire:model="price">
                                    @error('price')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Link:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link" class="form-control" wire:model="link">
                                    @error('link')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status:</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Actice</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Slider Image:</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="newImage">
                                    @error('image')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                    @if ($newImage)
                                    <img src="{{$newImage->temporaryUrl()}}" width="120">
                                    @else 
                                    <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120"  alt="{{$title}}">
                                    @endif
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
