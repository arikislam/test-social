@props([
    'class' => null,
    'messageBody' => null,
    'message' => null,
    'icon' => null
])
    <!--begin::Toast-->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div id="kt_docs_toast_toggle" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                <i class="{{$icon}}"></i>
            </span>
            <strong class="me-auto">{{strtoupper($message->value)}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body {{$class}}">
           {{$messageBody}}
        </div>
    </div>
</div>
<!--end::Toast-->