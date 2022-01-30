<div>
    <div class="container" style="padding:30px 0">
         <div class="row">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">                               
                        All Orders
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
                                     <th>OrderId</th>
                                     <th>Subtotal</th>
                                     <th>Discount</th>
                                     <th>Tax</th>
                                     <th>Total</th>
                                     <th>Name</th>
                                     <th>Mobile</th>
                                     <th>Email</th>
                                     <th>Zipcode</th>
                                     <th>Status</th>
                                     <th>Order Date</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($orders as $order)
                                     <tr>
                                         <td>{{$order->id}}</td>
                                         <td>${{$order->subtotal}}</td>
                                         <td>${{$order->discount}}</td>
                                         <td>${{$order->tax}}</td>
                                         <td>${{$order->total}}</td>
                                         <td>{{$order->firstname .' '.$order->lastname}}</td>
                                         <td>{{$order->mobile}}</td>
                                         <td>{{$order->email}}</td>
                                         <td>{{$order->zipcode}}</td>
                                         <td>{{$order->status}}</td>
                                         <td>{{$order->created_at}}</td>
                                         <td>
                                             <a href="{{route('user.orderdetails',['order_id' => $order->id])}}" class="btn btn-info">Detalis</a>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         <div class="wrap-pagination-info">
                             {{$orders->links('pagination-links')}}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
 </div>
 