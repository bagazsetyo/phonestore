@extends('layouts.default')
@section('content')
 <section class="content" style="margin-top: 10px;">
      <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body card-block">
        <form action="{{route('phone.update', $items->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name" class="form-control-label">Brand</label>
                <select class="form-control" required name="brand">
                        <option>select brand</option>
                    @foreach($brand as $brand)
                        <option value="{{$brand->id}}" 
                                @if($brand->id == $brand->id) selected='selected' @endif>
                                {{$brand->name}}
                        </option>
                    @endforeach
                </select>
                @error('judul')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">name</label>
                <input type="text" 
                        name="name" 
                        value="{{$items->name}}" 
                        class="form-control @error('name') is-invalid @enderror" />
                @error('name')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="release" class="form-control-label">rilis</label>
                <input type="date" 
                        name="release" 
                        value="{{$items->release}}" 
                        class="form-control @error('release') is-invalid @enderror" />
                @error('release')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="chipset" class="form-control-label">chipshet</label>
                <input type="text" 
                        name="chipset" 
                        value="{{$items->chipset}}" 
                        class="form-control @error('chipset') is-invalid @enderror" />
                @error('chipset')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">quantity</label>
                <input type="number" 
                        name="quantity" 
                        value="{{$items->quantity}}" 
                        class="form-control @error('quantity') is-invalid @enderror" />
                @error('quantity')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-control-label">price</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" 
                         name="price" 
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{$items->price}}">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                @error('price')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Update barang</button>
            </div>
        </form>
    </div>
            </div>
    </section>
@endsection