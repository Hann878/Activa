<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Services\TeacherService;

class TeacherController extends Controller
{
    public function __construct(
        private TeacherService $teacherService
    ) {}

    public function index()
    {
        $teachers = $this->teacherService->getAll();

        return view('admin.teachers', compact('teachers'));
    }

    public function create()
    {
        return view('admin.add-teacher');
    }

    public function store(TeacherRequest $request)
    {
        $this->teacherService->create($request->validated());

        return back()->with('success', 'Teacher berhasil ditambahkan');
    }

    public function update(
        TeacherRequest $request,
        int $id
    ) {
        $this->teacherService->update(
            $id,
            $request->validated()
        );

        return back()->with('success', 'Teacher berhasil diupdate');
    }

    public function destroy(int $id)
    {
        $this->teacherService->delete($id);

        return back()->with('success', 'Teacher berhasil dihapus');
    }
}
