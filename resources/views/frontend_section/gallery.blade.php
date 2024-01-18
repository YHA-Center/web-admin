@extends('layout.front_layout')
@section('content')


<style>
    .home .container{
    width: 100%;
    columns: 3;
    column-gap: 15px;
}
.home img{
    width: 100%;
    height: auto;
    margin: 10px 10px;
    border-radius: 5px;
    box-shadow: 2px 2px 10px rgb(209, 209, 209);
    cursor: pointer;
}
.home img:hover{
    box-shadow: 2px 2px 10px grey;
}
</style>

<section class="home mt-5">
    <div class="container">
       
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/02.jpg')}}" alt="">
              <img src="{{asset('image/pic/03.png')}}" alt="">
              <img src="{{asset('image/pic/18.jpg')}}" alt="">
              <img src="{{asset('image/pic/19.jpg')}}" alt="">
              <img src="{{asset('image/pic/21.jpg')}}" alt="">
              <img src="{{asset('image/pic/home1.png')}}" alt="">
              <img src="{{asset('image/pic/home2.png')}}" alt="">
              <img src="{{asset('image/pic/home3.png')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">
              <img src="{{asset('image/pic/01.jpg')}}" alt="">

    </div>
</section>


@endsection