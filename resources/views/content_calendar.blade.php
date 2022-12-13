@extends('layout')

@section('title', 'Content Calendar')

@section('content')
    <h1>Content Calendar</h1>

    <div class="calendar">
        <div class="timeline">
            <!-- Loop through the days in the calendar -->
            @foreach($data as $day => $items)
                <div class="day">
                    <h2>{{ $day }}</h2>
                    <ul>
                        <!-- Loop through the items for this day in the calendar -->
                        @foreach($items as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection