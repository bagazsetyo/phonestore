@extends('layouts.auth')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <a href="{{route('/')}}" >
                        <i class="fa fa-arrow-left"></i>
                    </a>              
                    My Shoping
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>uuid</th>
                                <th>Email</th>
                                <th>Price</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i = 0; @endphp
                        @foreach($items as $item)
                            <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$item->uuid}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>$ {{$item->transaction_total}}</td>
                                    <td>
                                        @if($item->transaction_status == 'pending')
                                            <span class="badge badge-info">
                                        @elseif($item->transaction_status == 'success')
                                            <span class="badge badge-success">
                                        @elseif($item->transaction_status == 'failed')
                                            <span class="badge badge-danger">
                                        @else
                                            <span class="badge badge-dark">
                                        @endif
                                            {{$item->transaction_status}}
                                            </span>
                                    </td> 
                                    <td><a 
                                            href="#mymodal"
                                            data-remote="{{ route('transaction.show', $item->id) }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Detail Transaction {{$item->uuid}}" class="btn-default">
                                            show
                                        </a>
                                    </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection