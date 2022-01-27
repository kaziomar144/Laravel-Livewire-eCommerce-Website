<div>
    <div class="container" style="padding:30px 0">
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-md-6">                                
                                 All Coupon
                             </div>
                             <div class="col-md-6">
                                 <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right">Add New Coupon</a>
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
                                     <th>Coupon Code</th>
                                     <th>Coupon Type</th>
                                     <th>Coupon Value</th>
                                     <th>Cart Value</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($coupons as $coupon)
                                     <tr>
                                         <td>{{$coupon->id}}</td>
                                         <td>{{$coupon->code}}</td>
                                         <td>{{$coupon->type}}</td>
                                         @if ($coupon->type == 'fixed')
                                         <td>${{$coupon->value}}</td>
                                         @else
                                         <td>{{$coupon->value}} %</td>
                                         @endif
                                         <td>{{$coupon->cart_value}}</td>
                                         <td>
                                             <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}" class="btn btn-success">Edit</a>
                                             <a href="#" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" class="btn btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 