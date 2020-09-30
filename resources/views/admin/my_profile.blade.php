@extends('layouts.app')
@section('content')
<div class="container">
    @csrf
    <div class="row">
      <div class="col-sm-1">

      </div>
      <div class="col">
        <form action="">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="E.g Tim Baron" value="{{$user->name}}">
            </div>

        </form>
      </div>
      <div class="col-sm-1">

      </div>
    </div>
</div>
@endsection
