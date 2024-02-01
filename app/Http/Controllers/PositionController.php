<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller 
{
    // direct create new subject page
    public function createPage(){
        return view('admin.position.create');
    }

    // create new subject
    public function create(Request $request){
        $this->validation($request);
        $data = $this->get_request_data($request);
        Position::create($data);
        return redirect()->route('admin.teacher')->with(['success' => 'Added position '.$data['name']]);
    }

    // edit position
    public function edit($id){
        $data = Position::where('id', $id)->first();
        return view('admin.position.edit', compact('data'));
    }

    // update position
    public function update(Request $request){
        $this->validation($request);
        $data = $this->get_request_data($request);
        $id = $request->id;
        Position::where('id', $id)->update($data);
        return redirect()->route('admin.teacher')->with(['success' => 'Updated position '.$request->name.' successfully']);
    }

    // delete position
    public function delete($id){
        $name = Position::where('id', $id)->first();
        Position::where('id', $id)->delete();
        return redirect()->route('admin.teacher')->with(['success' => 'Deleted position '.$name->name]);
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
            'name' => 'required|min:3|unique:positions,name,'.$request->id,
        ];
        $message = [
            'name.required' => 'position name is required.',
            'name.min' => 'position name must have upper 3 letters!',
            'name.unique' => 'position name have been taken!',
        ];
        Validator::make($request->all(), $rule, $message)->validate();
    }
}
