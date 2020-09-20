@extends('layouts.auth')
@section('content')
<div class="margin">
    <div class="container-fluid" style="margin-top: 4%;">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive" >
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted" >
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" >Quantity</th>
                                    <th scope="col" >Price</th>
                                    <th scope="col" class="text-right d-none d-md-block"></th>
                                </tr>
                            </thead>
                            <tbody>   
                            @forelse($items as $item)
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">
                                            </div>
                                            <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{$item->name}}</a>
                                                <p class="text-muted small">SIZE: L <br> Brand: MAXTRA</p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> 
                                        <form action="" method="post" accept-charset="utf-8">
                                             <input type="number" value="{{$item->qty}}" name="quantity" value="" class="form-control">
                                         </form> 
                                    </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price">${{$item->price}}</var></div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a href="{{route('chart.remove', $item->rowId)}}" class="btn btn-danger" data-abc="true"> Remove</a> 
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="3" rowspan="3" headers="">
                                        no one can choose!!<h4><a href="{{route('product.index')}}" title="">enjoy shopping</a></h4>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">$69.97</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">- $10.00</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                        </dl>
                        <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a> <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
asdasdsad
@foreach($photo as $data)
{{$data->id}}
@endforeach
@endsection