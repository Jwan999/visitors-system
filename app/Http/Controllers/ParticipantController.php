<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class ParticipantController extends Controller
{
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
        $sessions = Participant::select('*')->where(function ($q) use ($request) {
            if ($request->has('session_id'))
                $q->where('session_id', '=',  $request->session_id);
            if ($request->has('p_name'))
                $q->where('name', 'like',  "%$request->p_name%");
            if ($request->has('phone'))
                $q->where('phone', '=',  $request->phone);
        });
        $count = $sessions->count();
        $withPaging = $sessions->offset($request->skip)
            ->limit($request->take)
            ->get();
        return [
            "count" => $count,
            "results" => $withPaging,
        ];
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
            'type' => ['required', Rule::in(['phone', 'email'])], //email or phone
            'session_id' => ['required'],
        ]);
        $participant = Participant::select('*')->where(function ($q) use ($data) {
            $q->where('session_id', '=',  $data['session_id']);
            if ($data['type'] === 'phone')
                $q->where('phone', '=', $data['info']);
            else if ($data['type'] === 'email')
                $q->where('email', '=', $data['info']);
        })->get()->first;

        if ($participant !== null) {
            $participant->update(array('attendance' => true));
            response('تم تسجيل حضورك', 200);
        } else {
            response('معلوماتك غير متوفره بالورشة', 404);
        }
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
    public function destroy(Participant $participant)
    {
        //
    }
}