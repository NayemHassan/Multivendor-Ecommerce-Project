@extends('vendor.vendor_dashboard')
@section('vendor')
<div class="page-content">
<div class="card-body">
     <h4>Vendor Password Change Page</h4><hr>
    <form action="{{route('vendor.update.password')}}" method ="post">
        @csrf
 @if(session('status'))
<div class="alert alert-success" role="alert">
        {{session('status')}}
</div>
 @elseif(session('error'))
 <div class="alert alert-danger" role="alert">
        {{session('error')}}
</div>
 @endif
    <input class="form-control  @error('old_password') is-invalid  @enderror" type="password"  id="old_password"  name="old_password" placeholder="Old Password" aria-label="default input example">
    @error('old_password')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <input class="form-control mt-3 @error('new_password') is-invalid  @enderror" type="password" id ="new_password" name="new_password" placeholder="New Password" aria-label="default input example">
    @error('new_password')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <input class="form-control mt-3" type="password" id ="new_password_confirmation" name="new_password_confirmation" placeholder="Confirn Password" aria-label="default input example">
  
    <input type="submit" class="btn btn-info mt-3" value="Update Password">

    </form>
    
</div>
</div>

@endsection