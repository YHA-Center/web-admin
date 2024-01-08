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
        $this->validation($request);
        $teacherId = $request->teacher_id;
        // Attach subjects and instructors to the course
        $subjectIds = $request->input('subjects');

        foreach ($subjectIds as $subjectId) {
            // Create a new CourseSubjectInstructor instance
            Teach::create([
                'teacher_id' => $teacherId,
                'subject_id' => $subjectId['id'],
                // Add other attributes if needed
            ]);
        }
        // dd(Teach::get()->toArray());
        return redirect()->route('admin.teacher')->with(['success' => 'Created Class Successfully!']);
    }

    // edit teach data page
    public function edit($id){
        $data = Teacher::where('id', $id)
                    ->whereHas('subjects') // Assumes subjects is the relationship method
                    ->with('subjects')
                    ->first();
        $subjects = Subject::get();
        // dd($data->toArray());
        return view('admin.teach.edit', compact('data', 'subjects'));
    }

    // update teach data
    public function update(Request $request){

    }

    // delet teach data
    public function delete($id){
        Teach::where('teacher_id', $id)->delete();
        return redirect()->route('admin.teacher')->with(['success' => 'Deleted Teach Data Successfully!']);
    }


    // validation
    private function validation($request){
        Validator::make($request->all(), [
            'teacher_id' => 'required',
            'subject_id' => 'required',
        ])->validate();
    }
}
