@props([
    'label' => '',
    'name' => '',
    'required' => false,
    'placeholder' => '',
    'focus' => false,
    'readonly' => false,
    'type' => 'text',
    'max' => false,
    'min' => false,
    'step' => false,
    'maxlength' => false,
    'minlength' => false,
    'disabled' => '',
    'inputClass' => '',
    'labelClass' => '',
    'inputId' => false,
    "value" => '',
    "readonly" => '',
    'customMessage' => false,
    'inputTooltip' => '',
    'dataTest' => '',
])

@php
    $inputValue = !blank(old($name)) ? old($name): $value ;
@endphp
        <!--Input text-->
<div {{$attributes->merge(['class' => ''])}}>
    @if(!blank($label))
        <label for="{{blank($inputId)? $name: $inputId}}"> {{$label}}</label>
        <!--Label placeholder for now-->
    @endif
    <input type="{{$type}}"
           name="{{$name}}"
           id="{{blank($inputId)? $name: $inputId}}"
           class="form-control{{' '.$inputClass}} @error($name) is-invalid @enderror"
           placeholder="{{blank($placeholder)? $label : $placeholder}}"
           value="{!! $inputValue !!}"
           @if($required) required @endif
           autocomplete="{{$name}}"
           @if($max) max="{{$max}}" @endif
           @if($min) min="{{$min}}" @endif
           @if($step) step="any" @endif
           @if($maxlength) maxlength="{{$maxlength}}" @endif
           @if($minlength) minlength="{{$minlength}}" @endif
           @if($focus) autofocus @endif
           @if(!blank($readonly)) readonly @endif />
    @error($name)
    <div class="fv-plugins-message-container invalid-feedback">
        <strong>{{$message}}</strong>
    </div>
    @enderror
    <span class="{{'custom-message-'. blank($inputId)? $name: $inputId}}"></span>
</div>