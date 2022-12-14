@extends('layout')

@section('title', 'Content Calendar')

@section('content')
    <h1>Content Calendar</h1>

    <div class="calendar">
        <div class="timeline">
            <!-- Loop through the days in the calendar -->
            @foreach($data as $date => $items)
                <div class="day">
                    <h2>{{ $date }}</h2>
                    <ul>
                        <!-- Loop through the items for this day in the calendar -->
                        @foreach($items as $item)
                            <li><a href="/calendar/{{$item->id}}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection