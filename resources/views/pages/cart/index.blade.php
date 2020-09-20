@extends('layouts.auth')
@include('includes.cart')
@section('content')
    <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>

                        @forelse($items as $item)
                          <tr>
                            <td class="p-4">
                              <div class="media align-items-center">
                                <img src="{{url($item->photo)}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div class="media-body">
                                  <a href="#" class="d-block text-dark"></a>
                                  <small>
                                    <span class="text-muted">Name : </span>{{$item->thiscartphone->name}}
                                    <br>
                                    <span class="text-muted">Release : </span> {{$item->thiscartphone->release}}
                                  </small>
                                </div>
                              </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">$ {{$item->thiscartphone->price}}</td>
                            <td class="align-middle p-4">
                                <form action="{{route('cart.update',$item->id)}}" method="post">
                                    @csrf @method('put')
                                    <input type="text" name="qty" class="form-control text-center" value="{{$item->qty}}"></td>
                                </form>
                            <td class="text-right font-weight-semibold align-middle p-4">$ {{$item->thiscartphone->price * $item->qty}}</td>
                            <td class="text-center align-middle px-0">
                                <form action="{{route('cart.destroy',$item->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</button>
                                            </form></td>

                          </tr>
                        @empty
                        <tr>
                            <td colspan="5" rowspan="" headers="">
                                empty data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <!-- / Shopping cart table -->
            
                <div class="float-right">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                  <div class="d-flex">
                    <div class="text-right mt-4">
                      <label class="text-muted font-weight-normal m-0">Total price</label>
                      <div class="text-large"><strong>
                        @php $subtotal = 0; foreach($items as $item){ @endphp
                            @php 
                                $total = $item->thiscartphone->price * $item->qty;
                                $subtotal = $subtotal + $total;
                            @endphp
                        @php } @endphp
                       $ {{$subtotal}}
                      </strong></div>
                    </div>
                  </div>
                </div>
                    

            {{-- <form action="{{route('transaction.store')}}" method="post">
                    @csrf
                        @foreach($items as $item)
                            <input type="hidden" name="pesan" value="{{$item->qty}}">
                        @endforeach
                            <input type="hidden" name="transaction_total" value="{{$subtotal}}">
                        <button type="button" value="submit" class="btn btn-lg btn-primary mt-2">Checkout</button>
                </div>
            </form> --}}
            <form action="{{route('transaction.store')}}" method="post" accept-charset="utf-8">
                @csrf
                <a href="{{route('/')}}" title="">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
                    </a>
                    @foreach($items as $item)
                        <input type="hidden" name="products_id[]" value="{{$item->transaction_id}}">
                        <input type="hidden" name="pesan[]" value="{{$item->qty}}">
                        <input type="hidden" name="transaction_total" value="{{$subtotal}}">
                    @endforeach
                   @if($items->count() > 0)
                   <button type="submit" name="submit" value="submit"class="btn btn-lg btn-primary mt-2">Checkout</button>
                   @endif
                        
            </form>
          </div>
      </div>
  </div>
@endsection