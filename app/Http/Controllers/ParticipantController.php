<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantsExport;
use App\Models\Participant;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->only(['index', 'store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->expectsJson()) {
            return view('dashboard.sections.participants');
        }
        $session = [];
        $participants = Participant::select('*')->where(function ($q) use ($request) {
            if ($request->has('session_id'))
                $q->where('session_id', '=',  $request->session_id);

            if ($request->has('p_name'))
                $q->where('name', 'like',  "%$request->p_name%");
            if ($request->has('phone'))
                $q->where('phone', '=',  $request->phone);
        });
        if ($request->has('session_id')) {
            $session = Session::find($request->session_id);
        }

        $withPaging = $participants->offset($request->skip)
            ->limit($request->take)->orderBy('name', 'ASC')
            ->get();
        $session['participants'] = $withPaging;
        return $session;
    }
    public function getForm()
    {

        return view('usersForm');
    }

    /**
     * To record attendance of a student
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function match(Request $request)
    {
        $data = $request->validate([
            'info' => ['required'],
            'type' => ['required', Rule::in(['phone', 'email', 'id'])], //email or phone
            'session_id' => ['required'],
        ]);
        $participant = Participant::select('*')->where(function ($q) use ($data) {
            $q->where('session_id', '=',  $data['session_id']);
            if ($data['type'] === 'phone')
                $q->where('phone', 'like', "%" . $data['info']);
            else if ($data['type'] === 'email')
                $q->where('email', '=', $data['info']);
            else if ($data['type'] === 'id')
                $q->where('id', '=', $data['info']);
        })->get()->first();
        if ($participant !== null) {
            $participant->update(array('attendance' => true));
            return  response('Attendance recorded', 200);
        } else {
            return  response('Your information are not available in this session', 404);
        }
    }


    /// To cancel the attendance of the student
    public function unMatch(Request $request)
    {
        $data = $request->validate([
            'id' => ['required'],
            'session_id' => ['required'],
        ]);
        $participant = Participant::select('*')->where(function ($q) use ($data) {
            $q->where('session_id', '=',  $data['session_id']);
            $q->where('id', '=', $data['id']);
        })->get()->first();
        $participant->update(array('attendance' => false));
        return  response('Attendance Removed', 200);
    }

    public function export(Request $request)
    {
        return (new ParticipantsExport($request))->download('participants.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            Participant::StoreRules(),
            Participant::$messages
        );
        $participant = tap(new Participant($data))->save();

        return response($participant, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Participant::destroy($id);
    }
}