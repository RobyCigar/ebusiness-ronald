<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_attendance = Attendance::where('user_id', $id)->get();

        return response()->json($user_attendance);
    }
}
