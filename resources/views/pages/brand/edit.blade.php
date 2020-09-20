@extends('layouts.default')
@section('content')
 <section class="content" style="margin-top: 10px;">
      <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Brands</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body card-block">
        <form action="{{route('brand.update', $items->id)}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="brand" class="form-control-label">Brand</label>
                <input type="text" 
                        name="name" 
                        value="{{$items->name}}" 
                        placeholder="Example Brand" 
                        class="form-control @error('brand') is-invalid @enderror" />
                @error('brand')<div class="text-muted">{{ $message }}</div> @enderror
            </div> 
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Tambah barang</button>
            </div>
        </form>
    </div>
            </div>
    </section>
@endsection