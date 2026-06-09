<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;
          
class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Students::with(['user', 'class'])
            ->where('user_id', auth()->id())
            ->first();

        $classmates = collect();

        if ($student && $student->class_id) {
            $classmates = Students::with('user')
                ->where('class_id', $student->class_id)
                ->get();
        }

        return view('student.classes', compact(
            'student',
            'classmates'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required'
        ]);

        Classes::create($request->all());
        return redirect('admin/classes')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        $request->validate([
            'name' => 'required',
            'major' => 'required'
        ]);

        $classes->update($request->all());
        return redirect('admin/classes')->with('success', 'Kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
        return redirect('admin/classes')->with('success', 'Kelas berhasil dihapus.');
    }
}
