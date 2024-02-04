@extends('layout.front_layout');

@section('content')
<!-- Add this in your HTML head section -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    #menu_btn{
        background-color: #ff6c0f;
        color: white;
    }
    #menu_btn:hover{
        color: #ff6c0f;
        background-color: white;
    }
    .dropdown-menu a:hover{
        background-color: #ff6c0f;
        color: white;
        border-radius: 5px;
    }
</style>
<section id="proj">
    <div class="container-fluid">

        {{-- <div id="menubar" class="d-block d-lg-none mt-3">
            <button id="menu_btn" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions2" aria-controls="offcanvasWithBothOptions">Course Lists <i class="fa-solid fa-bars"></i></button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions2" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="menulist p-3 d-block d-lg-none">
                    @foreach($courses as $courses1)
                        <a class="my-1 px-3 py-1 d-block d-lg-none nav-link" href="">{{$courses1->name}}</a>
                    @endforeach                
                </div>
            </div>
            </div>
        </div> --}}
           
        <div class="row m-auto">
          <div class="dropdown my-3 ms-5">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Courses
            </button>
            <ul class="dropdown-menu">
              @foreach($courses as $courses)
              <li><a class="dropdown-item my-1 px-3 py-1 nav-link course-link" data-course-id="{{$courses->id}}" href="">{{$courses->name}}</a></li>
              @endforeach
            </ul>
          </div>
            {{-- <div class="col-xl-3 col-lg-4 col-0 p-2 d-none d-lg-block" id="left">
                <div class="menulist p-2 d-none d-lg-block">
                    @foreach($courses as $courses)
                      <a class="my-1 px-3 py-1 d-none d-lg-block nav-link course-link" data-course-id="{{$courses->id}}" href="">{{$courses->name}}</a>                    
                    @endforeach
                </div>

            </div> --}}
            <div class="col-12" id="right">
               <div class="w-100 row m-auto" id="projects-container">

               </div>
            </div>
        </div>
    </div>
</section>

<script>
  $(document).ready(function () {
    // Function to fetch projects data
    function fetchProjects(courseId) {
      $.ajax({
        url: '/fetch-projects/' + courseId,
        type: 'GET',
        success: function (data) {
          console.log('Fetched Projects:', data);
          updateProjectsUI(data);
        },
        error: function (error) {
          console.error('Error fetching projects:', error);
        }
      });
    }

    // Set up AJAX headers
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Fetch projects for the first course on page load
    var firstCourseId = $('.course-link:first').data('course-id');
    fetchProjects(firstCourseId);

    // Event handler for course links
    $('.course-link').on('click', function (event) {
      event.preventDefault();
      var courseId = $(this).data('course-id');
      fetchProjects(courseId);
    });

    // Function to update UI with projects data
    function updateProjectsUI(data) {
      var projectsContainer = $('#projects-container');

      projectsContainer.empty();

      if (data.length === 0) {
        var alert = `
          <div class="w-100 h-25 text-center">
            <div class="alert alert-info" role="alert">
              Coming Soon !!!
            </div>  
          </div>
        `;
        projectsContainer.append(alert);
        return;
      }

      data.forEach(function (project) {
        var projectHtml = `
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center text-md-start">
            <div class="card">
              <img src="{{ asset('storage/65b747c41b99e_slider3.JPG') }}" class="card-img-top" alt="${project.title}">
              <div class="card-body">
                <h5 class="card-title">${project.title}</h5>
                <h6 class="card-subtitle mb-2 text-muted">${project.desc}</h6>
                <p class="card-text">${project.desc}</p>
                <a href="${project.github}" class="card-link" target="_blank">GitHub Repo</a>
                <a href="${project.demo}" class="card-link" target="_blank">Demo</a>
              </div>
            </div>
          </div>
        `;

        projectsContainer.append(projectHtml);
      });
    }
  });
</script>

  

@endsection



{{-- if (data.length === 0) {

  var alert = `
  <div class="h-25 text-center">
    <div class="alert alert-info" role="alert">
      Comming Soon !!!
    </div>  
  </div>
 `;
  projectsContainer.append(alert);
  return;
} 

<img src="${project.image}" class="card-img-top" alt="${project.title}">

--}}