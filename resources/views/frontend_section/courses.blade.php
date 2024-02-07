@extends('layout.front_layout')

@section('content')

<div class="main w-100 mt-5"> 
    <div class="container">
        <h5 style="margin-bottom: 30px;">Courses Section</h5>
        <div class="row w-100">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card p-2">
                    <div class="img">
                        <img src="{{asset("image/pic/java.png")}}" alt="">
                    </div>
                    <div class="text mt-2">
                        <h5>JAVA Enterprise Edition (J2EE)</h5>
                        <span>Foundation of JAVA , Database and 
                            JAVA OOP </span>
                    </div>
                    <div class="btns d-flex align-items-center justify-content-between mt-4" style="margin-top: 5px;">
                        <span> <span style="color: orangered;">Ks /-</span> 200,000</span>
                        <button id="btn1"><a href="">View More</a></button>
                    </div>
                </div>
            </div>
        
        </div>
      </div>
</div>


@endsection