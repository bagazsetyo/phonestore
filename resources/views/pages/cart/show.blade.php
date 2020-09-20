@extends('layouts.auth')
@section('content')
    <div class="card mt-5">
    <div class="row">
        <aside class="col-sm-5 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  <div class="photo">
        @foreach($items as $item)
            @forelse($item->galleries as $i)
                @if($i->is_default === 1)
                    <img src="{{url($i->photo)}}" class="pt-2 pl-3" width="100%" height="100%">
                @endif
            @empty
                <img src="https://picsum.photos/200/300" class="pt-2 pl-3" width="100%" height="100%">
            @endforelse
        @endforeach
    </div>
</div> <!-- slider-product.// -->
</article> <!-- gallery-wrap .end// -->
</aside>
<aside class="col-sm-7">
        
    <form action="{{route('cart.store')}}" method="post" accept-charset="utf-8">
        @csrf
        @foreach($items as $item)
            @forelse($item->galleries as $i)
                @if($i->is_default === 1)
                    <input type="hidden" name="photo" value="{{url($i->photo)}}">
                @endif
            @empty
                <input type="hidden" name="photo" value="https://picsum.photos/200/300">
            @endforelse
        @endforeach
        <article class="card-body p-5">
             <h3 class="title mb-3">{{$data->name}}</h3>
                <p class="price-detail-wrap"> 
                     <span class="price h3 text-warning"> 
                        <span class="currency">US $</span><span class="num">{{$data->price}}</span>
                     </span> 
                </p> <!-- price-detail-wrap .// -->
            <dl class="item-property">
                 <dt>Description</dt>
                    <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco </p>
                    </dd>
            </dl>
            <dl class="param param-feature">
                <dt>cipshet</dt>
                <dd>{{$data->chipset}}</dd>
            </dl>  <!-- item-property-hor .// -->
            <dl class="param param-feature">
                <dt>Color</dt>
                <dd>Black and white</dd>
            </dl>  <!-- item-property-hor .// -->

<hr>
    <div class="row">
        <div class="col-sm-5">
            <dl class="param param-inline">
              <dt>Quantity: </dt>
              <dd>
                <select name="qty" class="form-control form-control-sm" style="width:70px;">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                </select>
              </dd>
            </dl>  <!-- item-property .// -->
        </div> <!-- col.// -->
    </div> <!-- row.// -->
    <hr>
    <input type="hidden" name="transaction_id" value="{{$data->id}}">
    <button type="submit" class="btn btn-lg btn-primary text-uppercase">add to cart</button>
    {{-- <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a> --}}
</form>
</article> <!-- card-body.// -->

        </aside> <!-- col.// -->
    </div> <!-- row.// -->
</div> <!-- card.// -->
@endsection