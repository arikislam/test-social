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

<!--begin::Head-->
<x-layouts.head :styles="$styles" :favicon="$favicon" :pageTitle="$pageTitle"/>

<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
{{--<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>--}}
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <x-partials.dashboard.top-bar/>
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
                <!--begin::Logo-->
                <!--end::Logo-->
            <x-partials.dashboard.side-bar/>

            <!--end::Sidebar-->
           {{$slot}}
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--begin::Javascript-->
@if($hasMessage)
    <x-partials.alert :class="$class" :messageBody="$messageBody" :message="$messageType" :icon="$icon"/>
@endif
<!--end::Root-->
<x-layouts.footer :scripts="$scripts" :hasMessage="$hasMessage"/>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>