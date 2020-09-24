@extends('layouts.app')
@section('content')
<?php
    $candidates = $polldetail->candidates;
    $exploded_candidates =  explode(',',$candidates);
    $i = 0;
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">

            <h5 class="card-title">{{$polldetail->office}}</h5>
            <div class="card-text">
            <form action="{{route('submit.result',$polldetail->id)}}" method="GET">
                @csrf
                @foreach ($exploded_candidates as $exploded_candidate)
                    <div class="custom-control custom-radio border p-3">
                        <input type="radio" id="customRadio1.{{$i+1}}" name="candidate" value="{{$exploded_candidate}}" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1.{{$i+=1}}">{{$exploded_candidate}}</label>
                      </div>
                @endforeach
                <div class="justify-content-center pt-2">
                    <button type="submit" class="btn btn-primary pt-2">Vote</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection
