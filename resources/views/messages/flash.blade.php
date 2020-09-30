@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
    @endforeach
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{{session('error')}}</li>
        </ul>
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{session('success')}}</li>
        </ul>
    </div>
@endif  
