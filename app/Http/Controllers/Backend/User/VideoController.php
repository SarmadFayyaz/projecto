<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Artisan;

use App\Events\Screenshared;
use Spatie\GoogleCalendar\Event;

class VideoController extends Controller {
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;

    public function __construct() {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    public function index() {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

            $rooms = array_map(function ($room) {
                return $room->uniqueName;
            }, $allRooms);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('index', ['rooms' => $rooms]);
    }

    public function indexx() {

        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

            $rooms = array_map(function ($room) {
                return $room->uniqueName;
            }, $allRooms);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('roomsList', ['rooms' => $rooms]);
    }

    // Meeting Mode
    public function createRoom(Request $request) {
        $project = Projects::where('id', $request->projectID)->first();

        $client = new Client($this->sid, $this->token);
        if ($project != null && $project->count() > 0) {
            if (in_array(Auth::user()->id, explode(',', $project->team_members)) || $project->project_leader == Auth::user()->id) {
                //                  $exists = $client->video->rooms->read([ 'uniqueName' => 'meeting_'.$project->name]);
                //
                //                  if (empty($exists)) {
                //                      $client->video->rooms->create([
                //                          'uniqueName' => 'meeting_'.$project->name,
                //                          'type' => 'group',
                //                          'recordParticipantsOnConnect' => false
                //                      ]);
                //
                //                      \Log::debug("created new room: ".'meeting_'.$project->name);
                //                  }

                return redirect()->action('VideoRoomsController@joinRoom', [
                    'roomName' => 'meeting_' . $project->name,
                    'projectID' => $project->id
                ]);
            } else {
                return redirect()->back()->with('toastr', 'You are not a member of this team');
            }
        } else {
            // Toastr::error('Project Not Found');
            return redirect()->back()->with('toastr', 'Project or team not found');;
        }
    }

    public function joinRoom($roomName, $projectID) {
        $tasks = Tasks::where('proj_id', $projectID)->with('getActions', 'responsible_user')->get();
        $proj = Projects::where('id', $projectID)->with('group', 'leader')->first();
        $notes = UserNotes::where('project', $projectID)
            ->where('user', Auth::user()->id)
            ->with('getUser', 'getProject', 'getTask')
            ->orderBy('id', 'desc')
            ->get();
        // A unique identifier for this user
        $identity = Auth::user()->name;

        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        $token->addGrant($videoGrant);

        // return $roomName.$identity;
        // exit();

        return view('meetings.index', [
            'accessToken' => $token->toJWT(),
            'roomName' => $roomName,
            'tasks' => $tasks,
            'proj' => $proj,
            'notes' => $notes
        ]);
    }

    // General Mode
    public function createCall(Request $request) {
        $client = new Client($this->sid, $this->token);

        $exists = $client->video->rooms->read(['uniqueName' => $request->roomName]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName' => $request->roomName,
                'type' => 'group',
                'recordParticipantsOnConnect' => false
            ]);

            \Log::debug("created new room for GM: " . $request->roomName);
        }
        $accessToken = $this->joinCall($request->roomName);
        return response()->json([
            'accessToken' => $accessToken,
            'roomName' => $request->roomName
        ]);
    }

    public function joinCall(Request $request) {
        // A unique identifier for this user
        $identity = Auth::user()->id;

        \Log::debug("joined with identity in GM: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($request->roomName);

        $token->addGrant($videoGrant);

        return response()->json([
            'accessToken' => $token->toJWT(),
            'roomName' => $request->roomName
        ]);
        //return view('meetings.index', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ]);

    }

    public function screenShare() {
        //create a new event
        $event = new Event;

        $event->name = 'Test Event';
        $event->startDateTime = \Carbon\Carbon::now();
        $event->endDateTime = \Carbon\Carbon::now()->addHour();
        $event->addAttendee(['email' => 'muhammad.arslan4527@gmail.com']);
        $event->addAttendee(['email' => 'muhammad.arslan4527@gmail.com']);

        $event->save();
        return view('screenshare.index');
    }

    public function screenShared(Request $request) {
        $user = Auth::user();
        $project = Project::whereId($request->projectID)->with('projectLeader', 'projectUser')->first();
        broadcast(new Screenshared($project, $user->id, $request->status));
        return response()->json($user);
    }
}
