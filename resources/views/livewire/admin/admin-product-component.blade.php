<div>
    <div class="container" style="padding:30px 0">
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-md-6">                                
                                 All Product
                             </div>
                             <div class="col-md-6">
                                 <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add New Product</a>
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
                                     <th>ID</th>
                                     <th>Image</th>
                                     <th>Name</th>
                                     <th>Stock</th>
                                     <th>Price</th>
                                     <th>Category</th>
                                     <th>Date</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($products as $product)
                                     <tr>
                                         <td>{{$product->id}}</td>
                                         <td><img src="{{asset('assets')}}/images/products/{{$product->image}}" alt="{{$product->name}}" width="60px"></td>
                                         <td>{{$product->name}}</td>
                                         <td>{{$product->stock_status}}</td>
                                         <td>{{$product->regular_price}}</td>
                                         <td>{{$product->category->name}}</td>
                                         <td>{{$product->created_at}}</td>
                                         <td>
                                             <a href="" class="btn btn-success">Edit</a>
                                             <a href="#" class="btn btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                             {{$products->links('pagination-links')}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 