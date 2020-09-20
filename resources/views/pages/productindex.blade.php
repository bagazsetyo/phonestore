@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-3 mt-2">
                 <div class="card">
                      <div class="card-header">
                        {{$item->thisphone->name}} {{$item->name}}
                      </div>
                      <div class="card-body">
                        @foreach($item->galleries as $i)
                            @if($i->is_default == 1)
                                 <img src="{{url($i->photo)}}" style="width: 100%;">
                            @endif
                        @endforeach
                      </div>
                      <div class="card-footer">
                          <form action="{{route('product.create')}}" method="post" accept-charset="utf-8">
                            @method('put')
                            @csrf
                            <button class="btn btn-success">add to cart</button>
                          </form>
                      </div>
                  </div>
            </div>
        @endforeach
    </div>
</div> --}}

  <!-- Page Content -->
  <div class="container mt-5">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Phone Store</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Oppo</a>
          <a href="#" class="list-group-item">Samsung</a>
          <a href="#" class="list-group-item">Asus</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        

        <div class="row">
            
            @foreach($items as $item)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#">
                    @forelse($item->galleries as $i)
                        @if($i->is_default === 1)
                            <img src="{{url($i->photo)}}"  width="100%" height="100%">
                        @endif
                    @empty
                        <img src="https://picsum.photos/200/300" width="100%" height="100%">
                    @endforelse
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">{{$item->thisphone->name}} {{$item->name}}</a>
                    </h4>
                    <h5>$24.99</h5>
                  </div>
                  <div class="card-footer">
                    {{-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> --}}
                    <a href="{{route('cart.show',$item->id)}}" title="">
                        <button type="submit" name="submit" class="btn btn-success">buy</button>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection