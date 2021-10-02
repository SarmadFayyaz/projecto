<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'project_id' => 'required',
            'user_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'user_id');
            $data['user_id'] = auth()->user()->id;
            $event = Event::create($data);
            foreach ($request->user_id as $user_id) {
                $event_user_data['event_id'] = $event->id;
                $event_user_data['user_id'] = $user_id;
                EventUser::create($event_user_data);
            }
            DB::commit();
            return response()->json(['success' => 'Event created successfully', 'event' => $event]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event) {
        $event = Event::with('project', 'eventUser')->where('id', $event->id)->first();
        return view('backend.user.dashboard.calendar.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event) {
        $event = Event::with('eventUser')->where('id', $event->id)->first();
        return response()->json(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event) {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'project_id' => 'required',
            'user_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'user_id');
            $data['user_id'] = auth()->user()->id;
            $event->update($data);
            EventUser::where('event_id', $event->id)->delete();
            foreach ($request->user_id as $user_id) {
                $event_user_data['event_id'] = $event->id;
                $event_user_data['user_id'] = $user_id;
                EventUser::create($event_user_data);
            }
            DB::commit();
            return response()->json(['success' => 'Event Updated successfully', 'event' => $event]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event) {
        //
    }
}
