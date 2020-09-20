@extends('layouts.default')
    @push('after-style')
    <style type="text/css" media="screen">
        .row
        {
            margin-top: 10px;
        }
        .phone:hover,
        .phone
        {
            text-decoration: none;
            color: #212529;
        }
    </style>
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  @endpush
@section('content')
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
        </div>
         <div class="card">
              <div class="card-header">
                    Phone name : <a class="phone" href="{{route('galleries.show', $items->id)}}">{{$items->name}}</a>
                    <form action="{{route('galleries.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="products_id" value="{{$items->id}}" class="form-control">
                        <label for="photo">photo</label>
                        <input type="file" 
                                accept="image/*" 
                                name="photo"  
                                value="{{old('photo')}}" 
                                class="form-control @error('photo') is-invalid @enderror" />
                                @error('photo')<div class="text-muted">{{ $message }}</div> @enderror
                        <label for="">id default</label>
                        <select name="is_default" class="form-control">
                            <option name="is_default" value="0">0</option>
                            <option name="is_default" value="1">1</option>
                        </select>
                        <div class="mt-2">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
              </div>
            </div>
    </section>
@endsection


@push('after-script')
<script src="{{asset('../../plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush