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
            'type' => 'required',
            'days_of_week' => 'required_if:type,2',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'user_id');
            $data['user_id'] = auth()->user()->id;
            if ($data['type'] == 2)
                $data['days_of_week'] = json_encode($data['days_of_week']);
            else
                $data['days_of_week'] = null;
            $event = Event::create($data);
            foreach ($request->user_id as $user_id) {
                $event_user_data['event_id'] = $event->id;
                $event_user_data['user_id'] = $user_id;
                EventUser::create($event_user_data);
            }
            DB::commit();
            $event = Event::with('project')->where('id', $event->id)->first();
            return response()->json(['success' => __('header.added_successfully', ['name' => __('header.event')]), 'event' => $event]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
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
            'type' => 'required',
            'days_of_week' => 'required_if:type,2',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'user_id');
            if ($data['type'] == 2)
                $data['days_of_week'] = json_encode($data['days_of_week']);
            else
                $data['days_of_week'] = null;
            $event->update($data);
            EventUser::where('event_id', $event->id)->delete();
            foreach ($request->user_id as $user_id) {
                $event_user_data['event_id'] = $event->id;
                $event_user_data['user_id'] = $user_id;
                EventUser::create($event_user_data);
            }
            DB::commit();
            $event = Event::with('project')->where('id', $event->id)->first();
            return response()->json(['success' => __('header.updated_successfully', ['name' => __('header.event')]), 'event' => $event]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    public function updateEvent(Request $request) {
        $this->validate($request, [
            'id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $event = Event::find($data['id']);
            $event->update($data);
            DB::commit();
            return response()->json(['success' => __('header.updated_successfully', ['name' => __('header.event')])]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event) {
        try {
            $id = $event->id;
            DB::beginTransaction();
            EventUser::where('event_id', $id)->delete();
            $event->delete();
            DB::commit();
            return response()->json(['success' => __('header.deleted_successfully', ['name' => __('header.event')]), 'id' => $id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }
}
