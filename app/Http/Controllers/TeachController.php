<?php

namespace App\Http\Controllers;

use App\Models\Teach;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeachController extends Controller
{
    // direct create page
    public function createPage(){
        $teachers = Teacher::get();
        $subjects = Subject::get();
        return view('admin.teach.create', compact('teachers', 'subjects'));
    }

    // create teach data
    public function create(Request $request){
        Validator::make($request->all(), [
            'teacher_id' => 'required|unique:teaches,teacher_id',
        ])->validate();

        $teacherId = $request->teacher_id;
        $subjectIds = $request->input('subjects'); // Attach subjects and instructors to the course

        foreach ($subjectIds as $subjectId) { 
            // Skip 'Choose Subject' value
            if ($subjectId['id'] === '') {
                continue;
            }     
            Teach::create([
                'teacher_id' => $teacherId,
                'subject_id' => $subjectId['id'],
            ]);
        }
        // dd(Teach::get()->toArray());
        return redirect()->route('admin.teacher')->with(['success' => 'Created Class Successfully!']);
    }

    // edit teach data page
    public function edit($id){
        $data = Teacher::where('id', $id)
                    ->with(['subjects' => function ($query) {
                        $query->select('subjects.*')->distinct();
                    }])
                    ->first();
        $subjects = Subject::get();
        // dd($data->toArray());
        return view('admin.teach.edit', compact('data', 'subjects'));
    }

    // update teach data
    public function update(Request $request){
        $teacherId = $request->teacher_id;
        $subjectIds = $request->input('subjects'); // Attach subjects and instructors to the course

        // dd($request->all()); 

        // delete all data
        Teach::where('teacher_id', $teacherId)->delete();

        foreach ($subjectIds as $subjectId) { 
            // Skip 'Choose Subject' value
            if ($subjectId['id'] === '') {
                continue;
            }     
            Teach::create([
                'teacher_id' => $teacherId,
                'subject_id' => $subjectId['id'],
            ]);
        }
        // dd(Teach::get()->toArray());
        return redirect()->route('admin.teacher')->with(['success' => 'Update Related teach Successfully!']);
    }

    // delet teach data
    public function delete($id){
        Teach::where('teacher_id', $id)->delete();
        return redirect()->route('admin.teacher')->with(['success' => 'Deleted Teach Data Successfully!']);
    }
}
