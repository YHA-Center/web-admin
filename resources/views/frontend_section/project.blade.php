@extends('layout.front_layout');

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #menu_btn{
        background-color: #ff6c0f;
        color: white;
    }
    #menu_btn:hover{
        color: #ff6c0f;
        background-color: white;
    }
    .menulist a:hover{
        background-color: #ff6c0f;
        color: white;
        border-radius: 5px;
    }
</style>
<section id="proj">
    <div class="container-fluid">

        <div id="menubar" class="d-block d-lg-none mt-3">
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
        </div>
           
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-0 p-2 d-none d-lg-block" id="left">
                <div class="menulist p-2 d-none d-lg-block">
                    @foreach($courses as $courses)
                        <a class="my-1 px-3 py-1 d-none d-lg-block nav-link" href="{{ url('yha/projects', $courses->id) }}">{{$courses->name}}</a>
                    @endforeach
                </div>

            </div>
            <div class="col-xl-9 col-lg-8 col-12 bg-success" id="right">
                @yield('content')
            </div>
        </div>
    </div>
</section>



@endsection