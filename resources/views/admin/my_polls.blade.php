@extends('layouts.app')
@section('content')
    @foreach ($polls as $poll)
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$poll->office}}</h5>
              <?php
                $poll_candidates = $poll->candidates;

              ?>
              <p class="card-text">
               
              </p>
                <hr>
              <div>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
