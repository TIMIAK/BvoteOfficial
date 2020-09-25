@foreach ($results as $result)
    @if ($exploded_candidate == $result->candidate)
    <?php
        $votes += 1;
    ?>
    @endif
    {{-- {{$exploded_candidate = 0}} --}}
@endforeach
