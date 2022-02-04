<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Update Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('msg'))
							<div class="alert alert-{!! Session::get('msg-type') !!} ">
								{{Session::get('msg')}}
							</div>
						@endif
                        <form class="form-horizontal" wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="product_name" wire:keyup="generateSlug">
                                    @error('product_name')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description:</label>
                                <div class="col-md-4">
                                    <div wire:ignore>
                                        <textarea placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                                    </div>
                                    @error('short_description')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description:</label>
                                <div class="col-md-4">
                                    <div wire:ignore>
                                        <textarea placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price" class="form-control" wire:model="regular_price">
                                    @error('regular_price')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price" class="form-control" wire:model="sale_price">
                                    @error('sale_price')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control" wire:model="sku">
                                    @error('sku')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock Status:</label>
                                <div class="col-md-4">
                                    <select wire:model="stock_status" class="form-control">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured:</label>
                                <div class="col-md-4">
                                    <select wire:model="featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control" wire:model="qty">
                                    @error('qty')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image:</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="newImage">
                                    @error('newImage')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                    @if ($newImage)
                                        <img src="{{$newImage->temporaryUrl()}}" width="120">
                                    @else 
                                        <img src="{{asset('assets/images/products')}}/{{$product_image}}" width="120"  alt="{{$product_name}}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Gallery:</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="newImages" multiple>
                                    @error('newImages')
                                        <div class="invalid-feedback" style="color: crimson">{{$message}}</div>
                                    @enderror
                                    @if ($newImages)
                                       @foreach ($newImages as $Images)
                                        @if ($Images)
                                            <img src="{{$Images->temporaryUrl()}}" width="120">
                                        @endif
                                       @endforeach
                                       @else
                                      @if ($product_images)
                                        @foreach ($product_images as $image)
                                        @if($image)
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"  alt="{{$product_name}}">
                                        @endif
                                        @endforeach
                                      @endif
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category:</label>
                                <div class="col-md-4">
                                    <select wire:model="product_category" class="form-control">
                                        <option value="">Select Category</option>
                                        @php
                                            $categories = App\Models\Category::all();
                                        @endphp
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach                                        
                                    </select>
                                    @error('product_category')
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
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        let sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        let sd_data = $('#description').val();
                        @this.set('description',sd_data);
                    });
                }
            });
        });
    </script>
@endpush