<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other head elements -->

    <!-- Add this meta tag to include the CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Add this to your layout file -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>



    <div class="main"></div>
    <div class="container w-100 h-100">

        <img src="{{ asset('image/logo/logo.png') }}" alt="">



        <div class="row w-100 h-100">
            <div class="center w-100 h-100">
                <div class="left">

                    <div class="heading">
                        <h4 id="welcome">Welcome Back</h4>
                        <img src="" alt="">
                        <span>Build Your Future With Technology</span>
                    </div>

                </div>
                <div class="right">
                    <div class="flip-card ">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="title">
                                    <h4>Login Account</h4>
                                </div>
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                                <form action="{{route('login.process')}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required type="text" name="phno" autocomplete="off"
                                                class="input">
                                            <label class="user-label">Phone Number </label>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required id="login_password" type="password" name="pass"
                                                autocomplete="off" class="input passwords">
                                            <label class="user-label">Password</label>
                                            <span id="show">
                                            </span>
                                        </div>
                                    </div>
                                    <input type="submit" class="login" name="login" value="Login" id="login_btn">
                                </form>

                                <div class="turn d-flex">
                                    <a href="{{ route('user.home') }}"> <abbr title="Back To Home Page"><i
                                                class="fa-solid fa-arrow-left"></i></abbr> </a>
                                    <span>Doesn't have account?</span>
                                    <button id="turnon">Sign Up</button>
                                </div>
                            </div>

                            <div class="flip-card-back">
                                <div class="title">
                                    <h4>Sign-up Account</h4>
                                </div>
                                {{-- Back Button  --}}
                                {{-- <a href="{{ route('user.home') }}" class="">
                                    <button class="btn text-warning btn-sm">
                                        <i class="fas fa-arrow-left"></i> Home
                                    </button>
                                </a> --}}
                                
                                <form action="{{ route('user.signup.process') }}" method="post">
                                    @csrf

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required="" type="text" name="ph" id="phoneNumber" autocomplete="off" class="input">
                                            <label class="user-label">Phone Number</label>
                                        </div>
                                    </div>
                                
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required="" type="text" name="name" id="userName" autocomplete="off" class="input">
                                            <label class="user-label">User Name</label>
                                        </div>
                                    </div>
                                
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required id="password" type="password" name="password" autocomplete="off" class="input">
                                            <label class="user-label">Password</label>
                                            <span id="showPassword"></span>
                                        </div>
                                    </div>
                                
                                    <div class="input-group">
                                        <div class="inputgp">
                                            <input required id="cpassword" type="password" name="password_confirmation" autocomplete="off" class="input">
                                            <label class="user-label">Confirm Password</label>
                                            <span id="showConfirmPassword"></span>
                                        </div>
                                    </div>
                                
                                    <input type="submit" name="signup" value="SignUp" class="login">
                                </form>
                                
                                <div class="turn d-flex">
                                    <a href="{{ route('user.home') }}"> <abbr title="Back To Home Page"><i
                                                class="fa-solid fa-arrow-left"></i></abbr> </a>
                                    <span>Already have an account?</span>
                                    <button id="turnoff">Login</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let turnon = document.getElementById('turnon');
            let turnoff = document.getElementById('turnoff');
            let flip = document.querySelector(".flip-card-inner");

            turnon.addEventListener("click", function() {
                flip.style.transform = "rotateY(180deg)";
                document.querySelector('#welcome').innerHTML = "Welcome"

            })
            turnoff.addEventListener("click", function() {
                flip.style.transform = "rotateY(0deg)";
                document.querySelector('#welcome').innerHTML = "Welcome Back"
            })



            // show and hide password
            var a = 1;
            let show = document.querySelectorAll("#show");

            for (let i = 0; i < show.length; i++) {
                show[i].innerHTML = `<i id="show1" class="fa-solid fa-eye"></i>`;
                var a = 0;
                show[i].addEventListener("click", function() {
                    if (a == 0) {
                        show[i].innerHTML = `<i class="fa-solid fa-eye-slash"></i>`;
                        let password = document.querySelectorAll("#password")
                        password[i].type = 'text';
                        a = 1;
                    } else {
                        show[i].innerHTML = `<i class="fa-solid fa-eye"></i>`;
                        let password = document.querySelectorAll("#password")
                        password[i].type = 'password';
                        a = 0;
                    }


                })
            }


            $(document).ready(function() {
                $('#phoneNumber').on('input', function() {
                    var phoneNumber = $(this).val();

                    $.ajax({
                        url: '{{ route('user.signup.getPhone') }}',
                        method: 'POST',
                        data: {
                            ph: phoneNumber,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            var nameInput = $('#userName');
                            var signupButton = $('#signupButton');

                            nameInput.val(response.name);

                            if (response.name === 'Name not found') {

                                signupButton.prop('disabled',
                                    true); // Disable the submit button
                            } else {
                                signupButton.prop('disabled', false);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

            });

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('signupForm').addEventListener('submit', function(event) {
                    // Client-side validation
                    var phoneNumber = document.getElementById('phoneNumber').value;
                    var userName = document.getElementById('userName').value;
                    var password = document.getElementById('password').value;
                    var confirmPassword = document.getElementById('cpassword').value;

                    if (userName === 'Phone number not found') {
                        alert('Phone number not found');
                        event.preventDefault(); // Prevent form submission
                    }

                    if (password !== confirmPassword) {
                        alert('Password must be the same');
                        event.preventDefault(); // Prevent form submission
                    }
                });
            });
        })
    </script>

</body>

</html>
