<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $eventData = Event::select('id','subject','desc_text','held_at','user_attend')->get();
        // return response()->json([
        //     'status' => 'success',
        //     'event' => $event,
        // ]);
        return view('dashboard', [
            'eventData' => $eventData
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required','string','max:255'],
            'desc_text' => ['required','string','max:255'],
            'held_at' => ['required','date'],
        ]);
        $event = Event::create([
            'subject' => $request->subject,
            'desc_text' => $request->desc_text,
            'users_id' => Auth::user()->id,
            'held_at' => $request->held_at,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Event Successfully Created',
            'event' => $event,
        ]);
    }

    public function show($id)
    {
        $event = Event::find($id);
        return response()->json([
            'status' => 'success',
            'event' => $event,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => ['required','string','max:255'],
            'desc_text' => ['required','string','max:255'],
            'held_at' => ['required','date'],
            'updated_at' => ['date'],
        ]);

        $event = Event::find($id);
        $event->subject = $request->subject;
        $event->desc_text = $request->desc_text;
        $event->held_at = $request->held_at;
        $event->updated_at = $request->updated_at;
        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Event Successfully Updated',
            'event' => $event,
        ]);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Event Successfully Deleted',
            'event' => $event,
        ]);
    }

    public function attend($id)
    {
        $event = Event::find($id);

        $user = Auth::user()->fullname;
        $attendee = $event->user_attend;

        if (empty($attendee)) {
            $event->user_attend = $user;
        } else {
            $event->user_attend .= ', ' . $user;
        }

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'You are attending the event',
            'event' => $event,
        ]);
    }
}
