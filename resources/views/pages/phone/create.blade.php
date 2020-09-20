@extends('layouts.default')
@section('content')
 <section class="content" style="margin-top: 10px;">
      <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body card-block">
        <form action="{{route('phone.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Brand</label>
                <select class="form-control" required name="brand">
                        <option>select brand</option>
                    @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('judul')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">name</label>
                <input type="text" 
                        name="name" 
                        value="{{old('name')}}" 
                        class="form-control @error('name') is-invalid @enderror" />
                @error('name')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="release" class="form-control-label">rilis</label>
                <input type="date" 
                        name="release" 
                        value="{{old('release')}}" 
                        class="form-control @error('release') is-invalid @enderror" />
                @error('release')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="chipset" class="form-control-label">chipshet</label>
                <input type="text" 
                        name="chipset" 
                        value="{{old('chipset')}}" 
                        class="form-control @error('chipset') is-invalid @enderror" />
                @error('chipset')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">quantity</label>
                <input type="number" 
                        name="quantity" 
                        value="{{old('quantity')}}" 
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
                        value="{{old('price')}}">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>
                @error('price')<div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <!-- class -> ck editor scripnya ada di view/includes/script -->
           {{--  <div class="form-group">
                <label for="synopsis" class="form-control-label">synopsis barang</label>
                <textarea name="synopsis" 
                            class="form-control @error('synopsis') is-invalid @enderror ckeditor">{{old('synopsis')}}</textarea>
                @error('synopsis')<div class="text-muted">{{ $message }}</div> @enderror
            </div> --}}
            <div class="form-group">
                <button class="btn btn-primary " type="submit">Tambah barang</button>
            </div>
        </form>
    </div>
            </div>
    </section>
@endsection
{{-- 
@push('after-script')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '.ckeditor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                     </script>
@endpush
 --}}