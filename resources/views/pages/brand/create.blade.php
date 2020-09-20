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
        <form action="{{route('brand.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Brand</label>
                <input type="text" 
                        name="name" 
                        value="{{old('name')}}" 
                        placeholder="Example Brand" 
                        class="form-control @error('name') is-invalid @enderror" />
                @error('name')<div class="text-muted">{{ $message }}</div> @enderror
            </div> 
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Tambah barang</button>
            </div>
        </form>
    </div>
            </div>
    </section>
@endsection