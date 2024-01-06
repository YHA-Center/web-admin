@extends('layout.master')

@section("title", 'Login')

@section('content')

<div class="container py-5">

        

    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 ">

            <form class="border p-3 border-rounded shadow bg-white" action="{{ route('login') }}" method="POST">

              <h4>Login</h4>
              <hr>
                @csrf
                <!-- email  -->
                <div class="mb-3">
                  <label class="form-label" for="">Email</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input
                      type="text"
                      id="basic-icon-default-email"
                      class="form-control"
                      placeholder="john.doe"
                      name="email"/>
                    <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                  </div>
                </div>
                <!-- Password  -->
                <div class="mb-4 row">
                    <label class="form-label" for="basic-icon-default-phone">Password</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-key"></i
                    ></span>
                    <input
                      type="password"
                      class="form-control phone-mask"
                      placeholder="Password"
                      name="password"
                       />
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center mb-4">
                  <button type="submit" class="btn btn-primary w-25">Login</button>
                </div>

                <div class="text-center">Are you new to here? | <a href="{{ route('registerPage') }}">Sign Up</a></div>

              </form>
        </div>
    </div>
    
</div>

@endsection