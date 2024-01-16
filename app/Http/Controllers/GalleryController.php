<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    // direct gallery create page
    public function createPage(){
        return view('admin.gallery.create');
    }

    // create gallery
    public function create(Request $request){
        $this->validation($request, "create");
        // dd($request->all());
        $data = $this->get_request_data($request);
        if($request->hasfile('image')){
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        Gallery::create($data);
        return redirect()->route('admin.gallery')->with(['success' => 'Added gallery '.$data['name']]);
    }

    // edit gallery
    public function edit($id){
        $data = Gallery::where('id', $id)->first();
        return view('admin.gallery.edit', compact('data'));
    }

    // update gallery
    public function update(Request $request, $id){
        $this->validation($request, "update");
        $data = $this->get_request_data($request);
        if($request->hasfile('image')){
            // Delete Old image 
            $old = Gallery::select('image')->where('id', $id)->first()->toArray();
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        Gallery::where('id', $id)->update($data);
        return redirect()->route('admin.gallery')->with(['success' => 'Updated Gallery '.$request->name.' successfully']);
    }

    // delete gallery
    public function delete($id){
        $gallery = Gallery::where('id', $id)->first();
        $old = Gallery::select('image')->where('id', $id)->first()->toArray();
        $old = $old['image'];
        if($old != null){
            Storage::delete('public/'.$old);
        }
        Gallery::where('id', $id)->delete();
        return redirect()->route('admin.gallery')->with(['success' => 'Deleted '.$gallery->name.' gallery.']);
    }

    // get request data
    private function get_request_data($request){
        $array = [
            'name' => $request->name,
        ];
        return $array;
    }
    // validation
    private function validation($request, $mode){
        $rule = [
            'name' => 'required|min:5|unique:courses,name,'.$request->id,
            'image' => ($mode == 'create') ? 'required|file|mimes:jpg,png,jpeg,webp' : 'file|mimes:jpg,png,jpeg,webp',
        ];
        $message = [
            'name.required' => 'Course name is required',
            'image.required' => 'Course image is required',
        ];
        Validator::make($request->all(), $rule, $message)->validate();
    }
}
