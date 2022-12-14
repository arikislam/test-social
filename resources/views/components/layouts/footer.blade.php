@props([
    'scripts' => []
])

@stack('pre-scripts')

@if(isset($scripts) && !blank($scripts))
    @foreach($scripts as $scr)
        <script src="{{$scr}}"></script>
    @endforeach
@endif

@stack('scripts')
