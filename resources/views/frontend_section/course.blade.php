@extends("layout.front_layout")
@section('content')


<style>
    .main{
    width: 100%;
    height: 400px;
    background-color: #eeeeee;
}
.main ,.main .container, .main .row{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}
.main .col-xl-7{
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.main .text{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
}
.main .text h1{
    font-size: 40px;
    font-weight: 900;
    letter-spacing: 2px;
    margin-bottom: 30px;
}
.main .text span{
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: 400;
    color: rgb(56, 56, 56);
    letter-spacing: 2px;
}
.main .text p{
    letter-spacing: 1px;
    font-size: 18px;
    font-weight: 400;
}
.main .text button{
    background-color: var(--white);
    color: var(--maincolor);
    letter-spacing: 1px; 
}
.main .text button:hover{
    color: var(--white);
}
.main .img{
    background-image: url(img/shape3.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.main img{
    padding: 30px 0px;
    width: 100%;
    border-radius: 20px;
    background:transparent;
}
/* what section */
#what{
    padding-left: 10px;
}
#what h3{
    letter-spacing: 1px;
    font-weight: 500;
}
#what span{
    color: var(--maincolor);
}
#what p{
    line-height: 170%;
    margin-top: 20px;
}
#what img{
    width: 85%;
    float: right;
}
#what .what {
    height: 300px;
}
#what .what .img{
    width: 100%;
    height: 100%;
    align-items: end;
}
#what .why{
    margin-top: 50px;
}
/* about section */
#about{
    width: 100%;
    margin-top: 100px;
}

#about .row{
    padding: 20px 0px;
    
}
#about .col-12{
    border: 1px solid rgb(172, 172, 172);
    margin: 20px 0px;
    border-radius: 5px;
}
#about .outline{
    padding: 15px;
    margin-bottom: 20px;
}
#about .uls ul{
    columns: 2;
    column-gap: 10px;
}
#about .uls ul li{
    list-style-type: "➤";
    color: var(--maincolor);
    padding-left: 10px;
    margin: 10px 0px;
    margin-right: 10px;
}
#about .uls ul li span{
    color: var(--bg);
}
#about .content{
    padding: 15px;
    margin-bottom: 20px;
    width: 80%;
}
#about .content ul{
    margin-top: 20px;
    list-style-type: none;
}
#about .content i{
    color: var(--maincolor);
}
#about .content ul li{
    margin: 10px 0px;
    font-size: 20px;
    font-weight: 500;
}
#about .img img{
    width: 100%;
}
#about .img img:hover{
    position: absolute;
    transform: translate(-20%, -10%);
    width: 40%;
    z-index: 99;
    box-shadow: 2px 2px 10px black;
}
#about .times{
    padding: 20px 10px;
}
#about .times i{
    color: var(--maincolor);
}
#about .times h3{
    letter-spacing: 1px;
}
#about .times span{
    padding-left: 30px;
} 
 
</style>

<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                <div class="text">
                    <h1>JavaScript full course</h1>
                    <span>In this course, you will learn JavaScript from Beginner. You don't need any programming knowledge to enroll this course</span>
                        <a href="#">
                            <Button id="btn1">Enroll Now</Button>
                        </a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="img">
                    <img src="{{asset('image/pic/java.png')}}" alt="">
                </div>
                
            </div>
        </div>
    </div>
</section>

<div style="overflow: hidden;">
  <svg
    preserveAspectRatio="none"
    viewBox="0 0 1200 120"
    xmlns="http://www.w3.org/2000/svg"
    style="fill: #eeeeee; width: 176%; height: 162px;"
  >
    <path d="M321.39 56.44c58-10.79 114.16-30.13 172-41.86 82.39-16.72 168.19-17.73 250.45-.39C823.78 31 906.67 72 985.66 92.83c70.05 18.48 146.53 26.09 214.34 3V0H0v27.35a600.21 600.21 0 00321.39 29.09z" />
  </svg>
</div>

<section id="what">
  <div class="container">
    <div class="row what">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12"><h3>What is JAVA</span>?</h3>
        <p> <span>⊳ JavaScript is a scripting or programming language that allows you to implement complex features on web pages. Every time a web page does more than just sit there and display static information for you to look at. Displaying timely content updates, interactive maps, animated 2D/3D graphics, scrolling video jukeboxes, etc. You can bet that JavaScript is probably involved. It is the third layer of the layer cake of standard web technologies, two of which (php and CSS) we have covered in much more d</p>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="img">
          <img src="img/js_svg.jpg" alt="">
        </div>
      </div>
      </div>
    <div class="row why">
      <h3>Why should you learn?</h3>
      <p><span>⊳ Learning JavaScript (JS) is highly beneficial in today's digital landscape. JavaScript is a versatile programming language that finds extensive use in web development, making it an essential skill for aspiring developers. One compelling reason to learn JS is its versatility. It is the de facto language of the web, allowing developers to create interactive and dynamic web pages. By mastering JavaScript, you gain the power to enhance user interfaces, create animations, handle form submissions, and</p>
    </div>
  </div>
 
</section>

<section id="about">
    <div class="container w-100 h-100">
        <div class="row w-100">
            <div class="col-12">
                <div class="outline w-100">
                    <h3>Course Outline</h3>
                    <div class="uls w-100 h-100 d-flex">
                    <ul>
                           
                            <li><span>You will master the Java programming language</span></li>
                            <li><span>You will be able to code JavaScript professionally</span></li>
                            <li><span>Understanding the concepts of DOM (Document Object Model)</span></li>
                            <li><span>Animated UI/UX designs</span></li>
                            <li><span>React Framework for better Frontend design</span></li>
                            <li><span>Coding projects for real life useable codes</span></li>
                            
                        </ul>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-12 content w-100">
              <h3>Course Content</h3>
              <span class="text-secondary"> .4 sections .2 projects .total 12 hours (2 Hours a Day)  <i class="fa-solid fa-paperclip"></i> Assigiments</span>
              <ul>
                <li>Day 1 - JavaScript Introduction</li>
                <li>Day 2 - Operators</li>
                <li>Day 3 - Object datatype and Array datatype</li>
                <li>Day 4 - Statements in JavaScript</li>
                <li>Day 5 - Document Object Model (DOM)</li>
                <li>Day 6 - Projects</li>
              </ul>
            </div>
            <div class="col-12 w-100">
              <div class="times">
                <h3><i class="fa-solid fa-calendar-days"></i> TimeTable</h3>
                <span>Mon to Thu - 12:00 PM to 2:00 PM</span> <br>
                <span>Sat and Sun - 8:00 AM to 11:00 AM</span>
                <p class="text-secondary mt-3">On Weekend (Sat and Sun) is 3 Hours 
                  a day</p>
              </div>
            </div>
        </div>
    </div>
</section>

@endsection