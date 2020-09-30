@extends('layouts.app')
@section('content')
<div class="jumbotron bg-dark">
    <div class="flex">
        <h1 class="display-4 text-center">BVOTE <span><h6><i>"every vote counts..."</i></h6></span></h1>
    </div>
        <p class="lead">Bvote is a Web Application Voting platform, which allows people to cast votes anonymously.</p>

    <div class="row justify-content-center">
        <a class="btn btn-primary btn-lg" href="{{route('poll.create')}}" role="button">Create</a>&ThickSpace;
        <a class="btn btn-primary btn-lg" href="{{route('poll.search')}}" role="button">Submit</a>
    </div>
</div>
@endsection
