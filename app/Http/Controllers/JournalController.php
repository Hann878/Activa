<?php

namespace App\Http\Controllers;

use App\Services\JournalService;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function __construct(
        private JournalService $journalService
    ) {}

    public function index()
    {
        $data = $this->journalService
            ->getStudentJournal();

        return view(
            'student.journal',
            $data
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'activity' => 'required|max:255',
            'note' => 'nullable'
        ]);

        $this->journalService
            ->createJournal($request->all());

        return back()->with(
            'success',
            'Jurnal berhasil ditambahkan.'
        );
    }
}