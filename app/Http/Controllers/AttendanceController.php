<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\Students;

class AttendanceController extends Controller
{
    public function index()
    {
        $student = Students::where(
            'user_id',
            auth()->id()
        )->first();

        $attendances = Attendances::where(
            'student_id',
            $student->id
        )
        ->latest('date')
        ->get();

        $todayAttendance = Attendances::where(
            'student_id',
            $student->id
        )
        ->whereDate('date', today())
        ->first();

        return view(
            'student.attendance',
            compact(
                'student',
                'attendances',
                'todayAttendance'
            )
        );
    }

    public function checkIn()
    {
        $student = Students::where(
            'user_id',
            auth()->id()
        )->first();

        $attendance = Attendances::firstOrCreate(
            [
                'student_id' => $student->id,
                'date' => today()
            ],
            [
                'status' => 'Hadir',
                'check_in_time' => now()->format('H:i:s')
            ]
        );

        return back()->with(
            'success',
            'Absen masuk berhasil.'
        );
    }

    public function checkOut()
    {
        $student = Students::where(
            'user_id',
            auth()->id()
        )->first();

        $attendance = Attendances::where(
            'student_id',
            $student->id
        )
        ->whereDate('date', today())
        ->first();

        if (!$attendance) {
            return back()->with(
                'error',
                'Silakan absen masuk terlebih dahulu.'
            );
        }

        if ($attendance->check_out_time) {
            return back()->with(
                'error',
                'Anda sudah absen pulang.'
            );
        }

        $attendance->update([
            'check_out_time' => now()->format('H:i:s')
        ]);

        return back()->with(
            'success',
            'Absen pulang berhasil.'
        );
    }
}