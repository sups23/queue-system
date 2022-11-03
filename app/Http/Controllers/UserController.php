<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $depts = \App\Models\Dept::all();
        $apps = $request->user()->appointments;
        $date = now()->toDateString();
        $today_apps = \App\Models\App::where('user_id', $request->user()->id)
                                    ->where('date', $date)
                                    ->get();
        $in_queue_count = \App\Models\App::where('date', $date)
                                        ->where('status', 'Paid')
                                        ->count();

        return view('users.dashboard', compact('depts', 'apps', 'today_apps', 'in_queue_count'));
    }

    public function availability(Request $request)
    {
        $doctors_data = [];
        $doctors = \App\Models\User::role('Doctor')->where('dept_id', $request->dept_id)->get();
        $date = $request->date;

        $packed = \App\Models\App::where('user_id', $request->user()->id)
                                            ->where('date', $date)
                                            ->count() >=2;

        foreach ($doctors as $doctor) {
            $doc_t = \App\Models\DoctorTime::where('user_id', $doctor->id)->first();

            array_push($doctors_data, [
                'id' => $doctor->id,
                'dept_id' => $doctor->dept_id,
                'name' => $doctor->name,
                'start' => $doc_t->start,
                'end' => $doc_t->end,
                'date' => $date,
                'expected_time' => \App\Models\App::getExpectedTime($date, $doctor->id)
            ]);
        }

        return view('users.availability', compact('doctors_data', 'packed'));
    }

    public function createAppointment(Request $request)
    {
        $doctor = \App\Models\User::find($request->doctor_id);
        $date = $request->date;

        \App\Models\App::create([
            'expected_time' => $request->expected_time,
            'date' => $date,
            'user_id' => $request->user()->id,
            'doctor_id' => $doctor->id,
            'dept_id' => $doctor->dept_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Appointment booked successfully.');
    }
}
