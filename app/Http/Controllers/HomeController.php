<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Welcome;
use App\Models\AboutDesc;
use Illuminate\Http\Request;
use App\Models\StudentProject;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // create welcome page image
    public function createWelcome(){
        return view('admin.user_interface.welcome.create');
    }
    // create welcome image
    public function postWelcome(Request $request){
        $rule = [
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ];
        Validator::make($request->all(), $rule)->validate();
        if($request->hasfile('image')){
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        // dd($data); 
        Welcome::create($data);
        return redirect()->route('admin.home')->with(['success' => '✅ Added Image Successfully!']);
    }
    // delete welcome image
    public function deleteWelcome($id){
        $old = Welcome::select('image')->where('id', $id)->first()->toArray();
        $old = $old['image'];
        if($old != null){
            Storage::delete('public/'.$old);
        }
        Welcome::where('id', $id)->delete();
        return redirect()->route('admin.home')->with(['success'=>'✅ Deleted image successfully!']);
    }
    // edit welcome image
    public function editWelcome($id){
        $welcome = Welcome::where('id', $id)->first();
        // dd($welcome->toArray());
        return view('admin.user_interface.welcome.edit', compact('welcome'));
    }
    // update welcome image
    public function updateWelcome(Request $request){
        // validation rule
        $rule = [
            'image' => 'image|mimes:png,jpeg,jpg'
        ];
        // make validation
        Validator::make($request->all(), $rule)->validate();
        // get current image id
        $id = $request->id;
        if($request->hasfile('image')){
            // Delete Old image 
            $old = Welcome::select('image')->where('id', $request->id)->first()->toArray();
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
            Welcome::where('id', $id)->update($data);
            return redirect()->route('admin.home')->with(['success' => 'Updated image successfully']);
        }
        return redirect()->route('admin.home');
    }



    //direct about add image page
    public function postAbout(){
        return view('admin.user_interface.about.create');
    }
    // create about page
    public function createAbout(Request $request){
        $rule = [
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ];
        Validator::make($request->all(), $rule)->validate();
        if($request->hasfile('image')){
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
        }
        // dd($data); 
        About::create($data);
        return redirect()->route('admin.home')->with(['success' => 'Added about image successfully!']);
    }
    // editing about image
    public function editAbout($id){
        $data = About::where('id', $id)->first();
        // dd($welcome->toArray());
        return view('admin.user_interface.about.edit', compact('data'));
    }
    // delete about image
    public function deleteAbout($id){
        About::where('id', $id)->delete();
        return back()->with(['success' => 'Deleted about image successfully!']);
    }
    // update about image
    public function updateAbout(Request $request){
        // validation rule
        $rule = [
            'image' => 'image|mimes:png,jpeg,jpg'
        ];
        // make validation
        Validator::make($request->all(), $rule)->validate();
        // get current image id
        $id = $request->id;
        if($request->hasfile('image')){
            // Delete Old image 
            $old = About::select('image')->where('id', $request->id)->first()->toArray();
            $old = $old['image'];
            if($old != null){
                Storage::delete('public/'.$old);
            }
            $filename = uniqid() .'_'. $request->file('image')->getClientOriginalName(); // filename with unique
            $request->file('image')->storeas('public', $filename);
            $data["image"] = $filename;
            About::where('id', $id)->update($data);
            return redirect()->route('admin.home')->with(['success' => 'Updated about image successfully']);
        }
        // dd($data);
        return redirect()->route('admin.home');
    }
    // edit about description
    public function editDesc($id){
        $data = AboutDesc::where('id', $id)->first();
        return view('admin.user_interface.about.desc', compact('data'));
    }
    // update about description
    public function updateDesc(Request $request){
        $data = [
            'id' => $request->id,
            'desc' => $request->desc,
        ];
        $id = $request->id;
        AboutDesc::where('id', $id)->update($data);
        return redirect()->route('admin.home')->with(['success' => 'Updated about description successfully!']);
    }


    
    // return admin course page
    public function course(){
        return view('admin.course.home');
    }
    // return admin event page
    public function event(){
        return view('admin.event.home');
    }
    // return admin gallery page
    public function gallery(){
        return view('admin.gallery.home');
    }
    // return admin project page
    public function project(){
        return view('admin.project.home');
    }
}
