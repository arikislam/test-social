@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calendar Item</div>

                <div class="card-body">
                    <ul>
                        <li>Date: {{ $calendar->date }}</li>
                        <li>Time: {{ $calendar->time }}</li>
                        <li>Keyword: {{ $calendar->keyword->keyword }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection