@props([
    'styles' => [
        'https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700',
        asset('assets/css/style.bundle.css'),
        asset('assets/plugins/global/plugins.bundle.css')
    ],
    'favicon' =>  asset('assets/media/logos/favicon.ico'),
    'scripts' => [
        asset('assets/plugins/global/plugins.bundle.js'),
        asset('assets/js/scripts.bundle.js'),
        asset('assets/js/custom/authentication/sign-in/general.js')
    ],
    'pageTitle' => ''
])
@php
    use App\Enums\FlashMessageEnum;
    $flashMessageTypes = array_column(FlashMessageEnum::cases(), 'value');
    $hasMessage = false;
    $messageBody = '';
    $messageType = null;
    $class = '';
    $icon = null;
    foreach ($flashMessageTypes as $message) {
        $hasMessage = session()->has($message);
        if($hasMessage) {
           $messageBody = session()->get($message);
           $messageType  =  FlashMessageEnum::from($message);
           $class = $messageType->class();
           $icon = $messageType->icon();
            break;
        }

    }
@endphp

<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<x-layouts.head :styles="$styles" :favicon="$favicon" :pageTitle="$pageTitle"/>
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank">
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    {{$slot}}
</div>

@if($hasMessage)
    <x-partials.alert :class="$class" :messageBody="$messageBody" :message="$messageType" :icon="$icon"/>
@endif
<!--end::Root-->
<x-layouts.footer :scripts="$scripts" :hasMessage="$hasMessage"/>
</body>
<!--end::Body-->
</html>
