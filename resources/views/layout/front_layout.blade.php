<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YHA - Computer Training Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="shortcut icon" href="img/logo01.png" type=""/>
    <link rel="stylesheet" href="{{asset("css/f_home.css")}}">
    <link rel="stylesheet" href="{{asset("css/f_course_menu.css")}}">
    <link rel="stylesheet" href="{{asset("css/f_footer.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   

</head>



<body>
    <!-- top section --> 
    <section class="top">
        <div class="container-fluid">
        
            <div class="row">
             
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-evenly align-items-center">
                      <span><i style="color: orangered; margin-right: 5px;" class="fa-solid fa-phone"></i>Ph - 09882328992 </span>
                      <span><i style="color: orangered; margin-right: 5px;" class="fa-solid fa-envelope"></i>Email - yhacomputer@gmail.com</span>
              
                </div> 
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-end align-items-center">
                    <!-- <div class="search">
                      <input type="search" id="searchInput" class="search-input" placeholder="Search">
                      <button><i style="color: orangered; margin-right: 5px;" class="fa-solid fa-magnifying-glass"></i></button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- nav section --> 
    <section class="nav"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10 col-10">
                    <div class="img">
                        <img src="{{asset('image/logo/logo.png')}}" alt="">
                    </div>
                    <h4>YHA <br> Computer Training Center</h4>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-2 col-sm-2 col-2"> 
                    <a id="disp" href="{{ route("user.home")}}">Home</a>
                    <a href="">Computer ICT</a>  
                    <a href="">Programming</a>
                    <a href="">Graphic Design</a>
                    {{-- <a class="disp" href="{{ route("user.course")}}" id="courses">Courses</a> --}}
                    <a id="disp" href="{{ route("user.project")}}">Projects</a>
                    <a id="disp" href="{{ route("user.event")}}">Events</a>
                    <a id="disp" href="{{ route("user.signup")}}">
                        <div class="login">
                            <i class="fa-solid fa-user"></i>
                            <!-- <span>Login <span style="color: orangered;">/</span> Signup</span> -->
                        </div>
                    </a>

                  {{-- include('src/responsive_menu.php') --}}

                  
<style>
    .dropdown-content{
        box-shadow: 1px 1px 10px 1px #bababa;
    }
</style>

<div class="rightmenu">
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
    </button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <img src="img/logo01.png" width="20%" alt="">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body"> 
            <div class="home_menu1 items">
                <i class="fa-solid fa-house"></i> 
                <a href="index.php">Home</a>
            </div>
            <div class="courses_menu items">
            <i class="fas fa-book"></i>
            <button id="dropbtn">Courses</button>
            <div class="dropdown-content">
                <div class="listes d-flex flex-column">
                    <a href="courses.php" style="color: orangered;">View All Courses</a>

                    <a href="course.php?id=">java</a>
                    
                    
                
                </div>
            </div>
            </div>
            <div class="project_menu items">
            <i class="fa-solid fa-folder"></i>
            <a href="stu_projects.php">Projects</a>
            </div>
            <div class="photo_gallery_menu items">
            <i class="fa-solid fa-image"></i>
            <a href="photo.php">Photo-Gallery</a>
            </div>
            <div class="Events_menu items">
            <i class="fa-solid fa-calendar"></i>
            <a href="event.php">Events</a>
            </div>
            <div class="login_menu items">
            <i class="fa-solid fa-user"></i>
            <a href="login1.php">
            <span>Login <span style="color: orangered;">/</span> Signup</span></a>
        </div>
        </div>
    </div>
</div>  
                  
                </div>
            </div>
        </div>
        
    
    </section>

    
    {{-- include('course_menu.php') --}}
    <section id="courses_menu">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
            <div class="courses programming w-100 h-50">
                <h6>Programming Classes</h6>
                
                <a href="course.php?id="> JAVA </a>
                
             
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
              <div class="courses  webd w-100">
              
                <h6>Basic Classes</h6>
                
                <a href="course.php?id=">ICT</a>
                
               
              </div>
            </div> 
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
              <div class="courses ict w-100 h-50">
                <h6>Graphic design Classes</h6>
                
              
                <a href="course.php?id=">Graphic Design</a>
                
               
              </div>
              
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
              <div class="courses advanceexcel w-100 h-50">
                <a href="#">Advance Excel</a>
              </div>
            </div>
          </div> 
        </div>
      </section>
   
      {{-- ------------------------------------ top ------------------------ --}}

      @yield('content')

       {{-- include ('footer.php') ?>  --}}
    <div style="overflow: hidden; margin-top: 150px;">
      <svg
        preserveAspectRatio="none"
        viewBox="0 0 1200 120"
        xmlns="http://www.w3.org/2000/svg"
        style="fill: rgb(49, 52, 61); width: 100%; height: 100px; transform: rotate(180deg);"
      >
        <path d="M321.39 56.44c58-10.79 114.16-30.13 172-41.86 82.39-16.72 168.19-17.73 250.45-.39C823.78 31 906.67 72 985.66 92.83c70.05 18.48 146.53 26.09 214.34 3V0H0v27.35a600.21 600.21 0 00321.39 29.09z" />
      </svg>
    </div>
<section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 pt-4">
            <ul>
              <li><a class="active" href="index.php">Home</a></li>
              <li><a href="index.php">About</a></li> 
              <li><a href="courses.php">Courses</a></li>
              <li><a href="index.php">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 pt-4">
            <ul>
              <li><a href="stu_projects.php">Students Projects</a></li>
              <li><a href="event.php">Events</a></li>
              <li><a href="">Policy</a></li>
              <li><a href="">Rules</a></li>
              <li><a href="">Purpose</a></li>
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="img">
              <img src="img/logo.png" alt="">
              <span>Build Your Future With Technology</span>
            </div>
          </div>
          <div class="row copyright">
            <div class="col-6 left">
              <span>Copyright @2023 YHA</span>
            </div>
            <div class="col-6 right">
              <span>Follow us on social media</span>
              <div class="icons">
                <a href="https://www.facebook.com/yhacomputerforyou"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.facebook.com/messages/t/100787362478747"><i class="fa-brands fa-facebook-messenger"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="js/setinterval.js"></script>
  {{-- <script src="js.js"></script> --}}
  <script src="{{asset("js/f_course_menu.js")}}"></script> 

</body>
</html>