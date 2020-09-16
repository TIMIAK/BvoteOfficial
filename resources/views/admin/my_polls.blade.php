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
                        {{-- {{$collection = Str::of('foo bar baz')->explode(' ');}}
                        {{dd($collection)}} --}}
                    <div>
                        <a href="{{route('poll.show',$poll->id)}}" class="card-link">Edit Poll</a>
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
