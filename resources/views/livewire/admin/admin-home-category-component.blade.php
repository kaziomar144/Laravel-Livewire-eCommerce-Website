<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add Home Category
                            </div>
                            <div class="col-md-6">
                                {{-- <a wire:click.prevent="updateHomeCategory" class="btn btn-success pull-right">All Category</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('msg'))
							<div class="alert alert-{!! Session::get('msg-type') !!} ">
								{{Session::get('msg')}}
							</div>
						@endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No of Products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberofproducts">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
        $(document).ready(function () {
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function (e) {
                let data = $(this).select2("val");
                // console.log(data);
                @this.set('selected_categories',data);
                
            });
        });
    </script>
@endpush