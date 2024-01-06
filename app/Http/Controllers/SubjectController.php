<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    // direct create new subject page
    public function createPage(){
        return view('admin.subject.create');
    }

    // create new subject
    public function create(Request $request){
        $this->validation($request);
        $data = $this->get_request_data($request);
        Subject::create($data);
        return redirect()->route('admin.course')->with(['success' => 'Added subject '.$data['name']]);
    }

    // edit subject
    public function edit($id){
        $data = Subject::where('id', $id)->first();
        return view('admin.subject.edit', compact('data'));
    }

    // update subject
    public function update(Request $request){
        $this->validation($request);
        $data = $this->get_request_data($request);
        $id = $request->id;
        Subject::where('id', $id)->update($data);
        return redirect()->route('admin.course')->with(['success' => 'Updated subject '.$request->name.' successfully']);
    }

    // delete subject
    public function delete($id){
        $name = Subject::where('id', $id)->first();
        Subject::where('id', $id)->delete();
        return redirect()->route('admin.course')->with(['success' => 'Deleted subject '.$name->name]);
    }

    // get request data
    private function get_request_data($request){
        $array = [
            'name' => $request->name,
        ];
        return $array;
    }
    // validation the request data
    private function validation($request){
        $rule = [
            'name' => 'required|min:3|unique:subjects,name,'.$request->id,
        ];
        $message = [
            'name.required' => 'Subject name is required.',
            'name.min' => 'Subject name must have upper 3 letters!',
            'name.unique' => 'Subject name have been taken!',
        ];
        Validator::make($request->all(), $rule, $message)->validate();
    }
}
