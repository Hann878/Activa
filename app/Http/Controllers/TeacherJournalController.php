<?php

namespace App\Http\Controllers;

use App\Models\Journals;

class TeacherJournalController extends Controller
{
    public function index()
    {
        $journals = Journals::with('student.user')
            ->latest()
            ->paginate(10);

        return view(
            'teacher.journals',
            compact('journals')
        );
    }
}