@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if (count($polls) == 0)
            <div class="container">
                <p class="text-default text-lg">
                    No Poll created under this User
                </p>
            </div>

        @else
            @foreach ($polls as $poll)

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{$poll->office}}</h5>
                    <p class="card-text">
                        <?php
                        $candidates = $poll->candidates;
                        $exploded_candidates =  explode(',',$candidates);

                        // Vote interval to start
                        $current_date =  date_create(date('Y-m-d'));
                        $start_date  = date_create($poll->start_date);
                        $diff_to_start = date_diff($current_date,$start_date);
                        $interval_to_start =  $diff_to_start->format("%R%a day(s)");
                        echo $poll->office;
                        // Vote interval to end
                        $start_date = date_create($request->start_date);
                        $end_date = date_create($request->end_date);
                        $diff_to_end = date_diff($start_date,$end_date);
                        $interval_to_end = $diff_to_end->format("%R%a day(s)");

                        ?>
                        {{-- {{$explode}} --}}
                        {{-- {{$exploded_candidates}} --}}
                        <ul>

                        @foreach ($exploded_candidates as $exploded_candidate)
                            <li>{{$exploded_candidate}}</li>
                        @endforeach
                        </ul>
                    </p>
                        <hr>
                            <span>{{$interval_to_start . " Left to Start. "}}</span><br>
                            <span>{{$interval_to_end . " Left to End. "}}</span><br>

                        <hr>
                        {{-- {{$collection = Str::of('foo bar baz')->explode(' ');}}
                        {{dd($collection)}} --}}
                    <div>
                        <a href="{{route('poll.show',$poll->id)}}" class="card-link">Edssit Poll</a>
                        <a href="#" class="card-link" onclick="event.preventDefault();
                            if(confirm('Are you Sure?')){
                                document.getElementById('poll-delete-{{$poll->id}}').submit()}"
                            }

                        ">Delete Poll</a>
                    </div>
                    </div>
                    <form action="{{route('poll.destroy',$poll->id)}}" id="{{'poll-delete-'.$poll->id}}" method="post" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
                {{-- &ThickSpace; --}}
                {{-- &NonBreakingSpace; --}}
                &ThickSpace;
            @endforeach

        @endif
        </div>
    </div>
@endsection
