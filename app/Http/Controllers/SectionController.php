<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    // direct create page 
    public function createPage(){
        return view('admin.section.create');
    }
}
