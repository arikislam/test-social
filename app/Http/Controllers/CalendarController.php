<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    // Get all calendar entries
    public function getAll()
    {
        // Retrieve the calendar entries from the database
        $calendar = Calendar::with('keyword')
            ->where('user_id', Auth::user()->id)
            ->get();
        $data = [];

        foreach ($calendar as $item) {
            $data[$item->date->toDateString()][] = data_get($item, 'keyword.keyword');
        }


        // Return the calendar entries as a JSON response


        return view('content_calendar', compact('data'));
    }

    // Get the calendar entries for a specific day
    public function getDay(Request $request, $day)
    {
        // Retrieve the calendar entries for the specified day from the database
        $entries = Calendar::where('day', $day)->where('user_id', $request->user()->id)->get();

        // Return the calendar entries as a JSON response
        return response()->json($entries);
    }

    public function create(Request $request)
    {
        // Get the user information from the request
        $user = $request->user();

        // Get the last entry for the user
        $keywordId = $request->get('keyword_id');
        $time      = '12:00:00';


        // If there is no last entry, create a new entry for tomorrow
        if (!$lastEntry = Calendar::where('user_id', $user->id)->orderBy('date', 'desc')->first()) {
            $day = Carbon::tomorrow();
        } else {
            // If there is a last entry, create a new entry for the next day
            $day = $lastEntry->date->addDay();

        }

        $entry = Calendar::create([
            'user_id'    => $user->id,
            'date'       => $day,
            'time'       => $time,
            'keyword_id' => $keywordId,
        ]);
        // Return the newly created entry as a JSON response
        return redirect()->to('/calendar');
    }

    public function update(Calendar $calendar, Request $request)
    {
        // Retrieve the calendar entry to be updated

        $calendar->fill([
            'date' => $request->input('day'),
            'time' => $request->input('time'),
            'topic_outline_id' => $request->input('topic_outline_id'),
            'content_body_id' => $request->input('content_body_id'),
            'platform_id' => $request->input('platform_id'),
            'content_title_id' => $request->input('content_title_id'),
        ]);
        $calendar->save();

        // Return the updated entry as a JSON response
        return redirect()->back();
    }


    public function softDelete(Calendar $calendar)
    {
        $calendar->delete();

        return redirect()->back();
    }


}
