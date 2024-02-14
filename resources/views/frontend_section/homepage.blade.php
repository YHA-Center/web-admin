@extends('layout.front_layout')

@section('content')

     
    <section id="home">
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          
          @foreach($sliders as $slider)
          <?php
            $slide = asset('storage/' . $slider->image)
          ?>
            <div class="carousel-item active">
              <img src="{{  $slide }}" class="d-block w-100" alt="...">
            </div>
          @endforeach
         
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
    </section>

    <section id="about">
      
      <div class="container">
        <h3 class="text-white" style="font-variant: small-caps; font-size: 25px; letter-spacing: 1px;"> Build Your Future With <br> TECHNOLOGY</h3>
        <div class="row">
          @if($abouts->isNotEmpty())
          <div id="ab_left" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              @php
                  $about = $abouts->first();
                  $imagePath = asset('storage/' . $about->image);
              @endphp
      
              <img class="ab_img1 hidden1" src="{{ $imagePath }}">
              <img class="ab_img2 hidden2" src="{{ $imagePath }}">
              <img class="ab_img3 hidden3" src="{{ $imagePath }}">
          </div>
      @else
          <p>Images are empty</p>
      @endif
      

          @if($aboutDesc->isNotEmpty())
          @php
            $aboutdesc = $aboutDesc->first();
          @endphp
          <div id="ab_right" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="ab_text">
              <h2>About Us</h2>
              <p class="section"> 
                {{$aboutdesc->desc}}
              </p>
          @endif
              <button class="d-none" id="btn1"><a href="">View More</a></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="stu_number">
      <div class="container">
        <h5 class="hidden">Lorem ipsum dolor, sit amet consectetur adipisicing.</h5>
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 justify-content-end">
            <div class="card hidden1">
              <span>YHA</span>
              <h3 id="number" data-goal="20">0</h3>
              <p>courses</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 justify-content-center">
            <div class="card hidden2">
              <span>YHA</span>
              <h3 id="number" data-goal="100">0</h3>
              <p>Students</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 justify-content-start">
            <div class="card hidden3">
              <span>YHA</span>
              <h3 id="number" data-goal="50">0</h3>
              <p>Batches</p>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <section id="stu_project">
      <div class="container">
        <div class="heading">
          <h2>Students Projects</h2>
          <p>We held project presentations end of the Batches to make sure that our students receive knowledge and truly understand the fields they are taking</p>
        </div>
        <div class="row">
          @if(isset($project) && $project->isNotEmpty())
              @foreach([11, 8, 6, 7] as $courseId)
                  @php
                      $latestProject = $project->where('course_id', $courseId)->sortByDesc('created_at')->first();
                  @endphp
      
                  @if($latestProject)
                      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                          <img class="hidden1" src="{{ asset('storage/' . $latestProject->image) }}" alt="">
                          <div class="text">
                              <span>{{ $latestProject->title }}</span>
                              <p>{{ $latestProject->title }}</p>
                          </div>
                      </div>
                  @endif
              @endforeach
          @endif
      </div>
            
      
      </div>
    </section>

    <section id="teacher">
      <div class="container">
        <div class="header">
          <h2 style="text-align: center;">Teacher section</h2>
        </div>
        <div class="row">
          @if($teacher->isNotEmpty())
          <div class="row">
              @foreach($teacher->take(3) as $singleTeacher)
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="cards hidden1">
                          <div class="img">
                              <img src="{{ asset('image/pic/photo3.jpg') }}" alt="">
                          </div>
                          <div class="text">
                              <h4 style="text-align: center;">{{ $singleTeacher->name }}</h4>
                              <span> Age: <span style="color: #ff6f00">{{ $singleTeacher->age }}</span> </span>
                              <span> Position: <span style="color: #ff6f00">{{ $singleTeacher->position_id }}</span> </span>
                          </div> 
                      </div>
                  </div>
              @endforeach
          </div>
      @endif
      
        </div>
        <div class="footer">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos, cumque expedita? Fugiat perferendis dolore ipsa omnis, magni harum libero fugit ex aperiam, ut vitae.</p>
          <!-- <button id="btn1"><a href="#">About our teachers</a></button> -->
        </div>
      </div>
    </section>

    <section id="contact">  
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
            <!-- <div id="map"></div> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d238.68470692968666!2d96.12988827305935!3d16.828572950010972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1689075973621!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right">
            <div class="text">

          @if($address->isNotEmpty())
              @php
                $address = $address->first();
          @endphp
            <h2>Address And Location</h2>
            <div class="address">
              <p>Address - {{$address->address}}</p>
            </div>
            <p> {{$address->OpenClose}} </p> 
           
          @endif
          </div>
        </div>
        </div>
    </section>

    <script>
        
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if(entry.isIntersecting){
                entry.target.classList.add('show');
            } //else{
            //     entry.target.classList.remove('show');
            // }
        })
    });
    
    const hiddenElements1 = document.querySelectorAll('.hidden1');
    hiddenElements1.forEach((el) => observer.observe(el));
    
    const hiddenElements2 = document.querySelectorAll('.hidden2');
    hiddenElements2.forEach((el) => observer.observe(el));
    
    const hiddenElements3 = document.querySelectorAll('.hidden3');
    hiddenElements3.forEach((el) => observer.observe(el));
    

    let nums = document.querySelectorAll("#number");
    let section = document.querySelector(".section");
    
    let started = false;
    
    window.onscroll = function () {
        if(window.scrollY >= section.offsetTop){
            if(!started){
                nums.forEach((num) => startCount(num));
            }
            started = true;
        }
    };
    
    
    function startCount(el){
        let goal = el.dataset.goal;
        let count = setInterval(() => {
            el.textContent ++;
            if(el.textContent == goal){
                clearInterval(count);
              }
        }, 20);
    }
    
    </script>

    
{{-- ------------------------ bottom ------------------ --}}
   @endsection