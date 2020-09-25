@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col col-md-8 pt-5"> 
        <form class="form-inline" action="{{route('submit.search')}}" method="GET">
                <div class="form-group mb-2">
                    {{-- <label for="inputVoteId">Vote ID</label> --}}
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Enter Vote ID">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <input type="text" name="voteid" class="form-control" id="inputVoteId" placeholder="E.g BV535">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
              </form>
        </div>
    </div>
@endsection
