@props([
    'scripts' => [],
    'hasMessage' => false
])

@stack('pre-scripts')
<script>
    var hostUrl = "{{asset("assets/")}}";

</script>
@if(isset($scripts) && !blank($scripts))
    @foreach($scripts as $scr)
        <script src="{{$scr}}"></script>
    @endforeach
@endif
@if($hasMessage)
    <script>
        const toastElement = document.getElementById('kt_docs_toast_toggle');
        const toast = bootstrap.Toast.getOrCreateInstance(toastElement);
        toast.show();
    </script>
@endif
@stack('scripts')
