@extends('layout.master')

@section("title", 'Register')
 
@section('content')
 
    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5 p-3 shadow">
                    <h4>Register</h4>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label class="form-label">Username</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input
                                              type="text"
                                              class="form-control"
                                              placeholder="Username"
                                              name="name"/>
                                        </div>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        <label class="form-label">Phone</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                            <input
                                              type="number"
                                              class="form-control"
                                              placeholder="Phone number"
                                              name="phone"/>
                                        </div>
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input
                                      type="email"
                                      class="form-control"
                                      placeholder="Email Address"
                                      name="email"/>
                                </div>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                
                            <div class="form-group mt-3">
                                <label class="form-label">Gender</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-male-female-sign"></i></span>
                                    <select name="gender" id="" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="male">Female</option>
                                    </select>
                                </div>
                                
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                
                            <div class="form-group mt-3">
                                <label class="form-label">Address</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input class="au-input au-input--full form-control" value="{{ old('address') }}" type="text" name="city"
                                        placeholder="City">
                                    </div>
                                    <div class="col-6">
                                        <input class="au-input au-input--full form-control" value="{{ old('address') }}" type="text" name="township"
                                        placeholder="Township">
                                    </div>
                                </div>
                            </div>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label class="form-label">Password</label>
                                        <input class="au-input au-input--full form-control" value="{{ old('password') }}" type="password" name="password"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="au-input au-input--full form-control" value="{{ old('password_confirm') }}" type="password"
                                            name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="aggree">Agree the terms and policy
                                </label>
                            </div>
                            <button class="btn btn-primary w-100 my-3" type="submit">register</button>
                            {{-- <div class="social-login-content">
                                <div class="social-button">
                                    <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                    <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                </div>
                            </div> --}}
                        </form>
                        <div class="register-link text-center">
                            <p>
                                Already have account?
                                <a href="{{ route('loginPage') }}">Sign In</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection