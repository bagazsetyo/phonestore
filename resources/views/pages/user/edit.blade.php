@extends('layouts.auth')
@section('content')
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <i class="fa fa-user"></i>
                    update
                </div>            
                <div class="card-body">
                    <div class="form">
                        <form action="{{route('user.update',Auth::user()->id)}}" method="post">
                          @csrf
                          @method('put')
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="name">Name</label>
                              <input type="name" 
                                        name="name" 
                                        required 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        id="name" 
                                        placeholder="name" 
                                        value="{{Auth::user()->name}}">
                               @error('name')<div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">age</label>
                              <input type="number" 
                                        name="age" 
                                        required 
                                        value="{{Auth::user()->age}}" 
                                        class="form-control @error('age') is-invalid @enderror" 
                                        id="inputPassword4" 
                                        placeholder="12">
                               @error('age')<div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" 
                                     name="address" 
                                     required value="{{Auth::user()->address}}" 
                                     class="form-control @error('address') is-invalid @enderror"  
                                     id="inputAddress" 
                                     placeholder="1234 Main St">
                             @error('address')<div class="text-muted">{{ $message }}</div> @enderror
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Number</label>
                              <input type="number" 
                                        name="number" 
                                        required value="{{Auth::user()->number}}" 
                                        class="form-control @error('number') is-invalid @enderror" 
                                        id="inputCity" 
                                        placeholder="0812345678912">
                               @error('number')<div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputState">gender</label>
                              <select name="gender" id="inputState" class="form-control">
                                <option value="N/A" @if(Auth::user()->gender === 'N/A') selected @endif>N/A</option>
                                <option value="Male" @if(Auth::user()->gender === 'Male') selected @endif>Male</option>
                                <option value="Female" @if(Auth::user()->gender === 'Female') selected @endif>Female</option>
                              </select>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>                    
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection