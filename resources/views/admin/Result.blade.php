@extends('layouts.app')
@section('content')
<?php
    $candidates = $poll_detail->candidates;
    $exploded_candidates =  explode(',',$candidates);
?>
<div class="row">
    @foreach ($exploded_candidates as $exploded_candidate)
    <?php
      $votes = 0;
    ?>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$exploded_candidate}}</h5>
              <p class="card-text">
                @foreach ($results as $result)
                    @if ($exploded_candidate == $result->candidate)
                    <?php
                        $votes += 1;
                    ?>
                    @endif
                @endforeach
                <h4><i>{{$votes." Vote(s)"}}</i></h4>
              </p>
            </div>
          </div>
        </div>
        @endforeach
</div>
@endsection
