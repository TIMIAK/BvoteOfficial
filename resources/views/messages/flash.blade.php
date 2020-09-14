@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
    @endforeach
@endif
{{-- @if ('error')
    <div class="alert alert-danger">
        <ul>
            <li>{{$error}}</li>
        </ul>
    </div>
@endif
@if ('success')
    <div class="alert alert-danger">
        <ul>
            <li>{{$error}}</li>
        </ul>
    </div>
@endif --}}
