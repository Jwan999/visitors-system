<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Imports\ParticipantsImport;
use Maatwebsite\Excel\Facades\Excel;

class SessionController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!$request->expectsJson()) {
            return view('dashboard.sections.sessions');
        }
        $sessions = Session::select('*')->where(function ($q) use ($request) {
            if ($request->has('day'))
                $q->whereDay('date', $request->day);
            if ($request->has('title'))
                $q->where('title', 'like',  "%$request->name%");
        });
        $count = $sessions->count();
        $withPaging = $sessions->withCount("participants")
            ->offset($request->skip)
            ->limit($request->take)->orderBy('date', 'ASC')
            ->get();
        return [
            "count" => $count,
            "results" => $withPaging,
        ];
    }

    public function createForm()
    {
        return view('dashboard.sections.createSession');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            Session::StoreRules(),
            Session::$messages
        );
        $session = tap(new Session($data))->save();

        if ($request->file != null) {
            $data = $request->validate([
                'file' => 'required',
                'file.*' => 'mimes:xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
            $_REQUEST['session_id'] = $session->id;
            Excel::import(new ParticipantsImport, $data['file']);
        }

        return response($session, 200);
    }

    public function import(Request $request)
    {
        try {
            $data = $request->validate([
                'file' => ["required"],
                'file.*' => 'mimes:xlsx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                "session_id" => ["required"],
            ]);
            Excel::import(new ParticipantsImport, $data['file']);

            return response('تم رفع المشاركين بنجاح');
        } catch (\Throwable $th) {
            return response('حدث خطا اثناء رفع المشاركين', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::destroy($id);
        return response('تم حذف الورشة بنجاح', 203);
    }
}