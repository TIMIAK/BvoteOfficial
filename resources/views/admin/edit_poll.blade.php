@extends('layouts.app')
@section('content')
        {{-- {{$poll->candidates}} --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-1">

            </div>
            <div class="col">
            <form action="{{route('poll.update',$poll->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="office">Office:</label>
                    <input type="text" name="office" class="form-control" id="office" placeholder="E.g Class Govenor" value="{{$poll->office}}">
                </div>
                <div class="form-group">
                    <label for="candidates">Candidates:</label> <small style="color: red">If more than one seperate with a coma " , "</small>
                    <input type="text" name="candidates" class="form-control" id="candidates" placeholder="E.g Daniel,Timothy,John" value="{{$poll->candidates}}" >
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                <input type="Date" name="start_date" class="form-control" id="start_date" value="{{$poll->start_date}}">
                    <label for="end_date">End Date:</label>
                <input type="Date" name="end_date" class="form-control" id="end_date" value="{{$poll->end_date}}">
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                <input type="Time" name="start_time" class="form-control" id="start_time" value="{{$poll->start_time}}">
                    <label for="end_time">End Time:</label>
                <input type="Time" name="end_time" class="form-control" id="end_time" value="{{$poll->end_time}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
            </div>
            <div class="col-sm-1">

            </div>
        </div>
    </div>
@endsection
