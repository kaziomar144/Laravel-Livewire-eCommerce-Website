<div>
    <div class="container" style="padding:30px 0">
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-md-6">                                
                                 All Slider
                             </div>
                             <div class="col-md-6">
                                 <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New Slider</a>
                             </div>
                         </div>
                     </div>
                     <div class="panel-body">
                         @if (Session::has('msg'))
                             <div class="alert alert-{!! Session::get('msg-type') !!} ">
                                 {{Session::get('msg')}}
                             </div>
                         @endif
                         <table class="table table-striped">
                             <thead>
                                 <tr>
                                     <th>SL</th>
                                     <th>Image</th>
                                     <th>Title</th>
                                     <th>Subtitle</th>
                                     <th>Price</th>
                                     <th>Link</th>
                                     <th>Status</th>
                                     <th>Date</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if ($sliders->count() > 0)
                                  @php
                                      $cnt = 1;
                                  @endphp
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{$cnt}}</td>
                                            <td><img src="{{asset('assets')}}/images/sliders/{{$slider->image}}" alt="{{$slider->name}}" width="60px"></td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->subtitle}}</td>
                                            <td>{{$slider->price}}</td>
                                            <td>{{$slider->link}}</td>
                                            <td>{{$slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.edithomeslider',[$slider->id])}}" class="btn btn-success">Edit</a>
                                                <a wire:click.prevent="deleteSlider({{$slider->id}})" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @php
                                            $cnt++;
                                        @endphp
                                    @endforeach
                                 @else
                                 <tr>
                                     <td colspan="9"><h3 class="text-center">No item</h3></td>
                                 </tr>
                                 @endif
                             </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                             {{-- {{$sliders->links('pagination-links')}} --}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 