@extends('layout.front_layout')
@section('content')

<style>
    .home{
    margin-top: 40px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    letter-spacing: 1px;
}
.home .bg-text {
    color: black;
    border: 3px solid #f1f1f1;
    z-index: 2;
    width: 80%;
    padding: 20px;
    text-align: center;

  }
/* main section */
.main{
    margin-top: 40px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.main .left, .right{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.main .heading{
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}
.main .heading p{
    letter-spacing: 1px;
    color: var(--maincolor);
}
.main .heading h5{
    font-size: 20px;
    padding-bottom: 5px;
    border-bottom: 2px solid var(--maincolor);
}
.main .col-12{
    height: 400px;
    margin-bottom: 20px;
    border-radius: 15px;
    position: relative;
    z-index: 1;
}
.main .img{
    width: 80%;
    box-shadow: 2px 2px 10px rgb(97, 97, 97);
}
.main .img1{
    box-shadow: -2px 2px 10px rgb(97, 97, 97);
}
.main .img1::before{
    content: '';
    width: 600px;
    height: 200px;
    background-color: #ff6b01;
    position: absolute;
    z-index: -1;
    transform: translate(-50%, 10%);
}
.main .img2::before{
    content: '';
    width: 600px;
    height: 200px;
    background-color: #ff6b01;
    position: absolute;
    z-index: -1;
    transform: translate(50%, 10%);
}
.main img{
    width: 100%;
}
.main .text{
    text-align: justify;
    width: 100%;
    overflow: hidden;
}

.main button{
    margin-top: 10px;
    color: rgb(114, 114, 114);
    padding-bottom: 2px;
    border: none;
    outline: none;
    background-color: transparent;
    float: right;
}
.main button:hover{
    color: var(--maincolor);
    border-bottom: 2px solid var(--maincolor);
}
.main .btns{
    width: 100%;
    align-items: end;
}
.content {
    max-height: 50px;
    overflow: hidden;
    transition: 0.5s ease;
}
  
.show-content {
    max-height: none;
}

</style>
  
     <section class="home">
         <div class="bg-text">
                 <h2>Event Heading</h2>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ipsa, cupiditate minima esse facilis quo ut maiores saepe commodi rem unde quod libero tenetur laudantium deleniti modi sit a! Culpa.</p>
           </div>
     </section>
 
     <section class="main">
         <div class="container">
            <div class="row">
 
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
                    <div class="heading">
                        <h5>Event 1</h5>
                        <p>12/5/2023</p>
                    </div>
                    <div class="img img1">
                        <img src="{{asset("image/pic/java.png")}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right">
                    <div class="content-container">
                        <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, porro voluptatem assumenda modi ad rerum eius ducimus voluptates? Placeat, voluptatibus.</p>         
                        <button id="btn" class="read-more-btn">Read More...</button>
                        <!-- <button id="btn2" style="display: none;">Read Less...</button> -->
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
                    <div class="heading">
                        <h5>Event 1</h5>
                        <p>12/5/2023</p>
                    </div>
                    <div class="img img1">
                        <img src="{{asset("image/pic/java.png")}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right">
                    <div class="content-container">
                        <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, porro voluptatem assumenda modi ad rerum eius ducimus voluptates? Placeat, voluptatibus.</p>         
                        <button id="btn" class="read-more-btn">Read More...</button>
                        <!-- <button id="btn2" style="display: none;">Read Less...</button> -->
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
                    <div class="heading">
                        <h5>Event 1</h5>
                        <p>12/5/2023</p>
                    </div>
                    <div class="img img1">
                        <img src="{{asset("image/pic/java.png")}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right">
                    <div class="content-container">
                        <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, porro voluptatem assumenda modi ad rerum eius ducimus voluptates? Placeat, voluptatibus.</p>         
                        <button id="btn" class="read-more-btn">Read More...</button>
                        <!-- <button id="btn2" style="display: none;">Read Less...</button> -->
                    </div>
                </div>
             
            </div>
 
     </section>

     <script>
         var readMoreButtons = document.getElementsByClassName("read-more-btn");
   
         for (var x = 0; x < readMoreButtons.length; x++) {
             readMoreButtons[x].addEventListener("click", toggleReadMore);
         }
         
         function toggleReadMore() {
             var contentContainer = this.parentNode;
             var paragraph = contentContainer.querySelector(".content");
         
             if (paragraph.classList.contains("show-content")) {
             // Hide the full content
             paragraph.classList.remove("show-content");
             this.textContent = "Read More...";
             } else {
             // Show the full content
             paragraph.classList.add("show-content");
             this.textContent = "Read Less...";
             }
         }
         
 
         let links = document.querySelectorAll('.page_number > a');
         let bodyId = parseInt(document.body.id) - 1;
         links[bodyId].classList.add("active");
         </script>
 
@endsection