<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$data->materi}}</title>

<meta property="og:title" content="{{ $data->materi }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($data->foto))) ? asset($data->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $data->caption }}" />
<meta property="og:image:type" content="image/jpeg">
<meta property="og:type" content="website" />

<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/cubeportfolio.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/landing-page/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/landing-page/css/style.css')}}">

<link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
<link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
<style>
   .single-items {
   background-attachment: fixed !important;
   background-position: center center !important;
   -webkit-background-size: cover;
   background-size: cover !important;
   background-repeat: no-repeat !important;
   position: relative !important;
   width: 100% !important;
   padding: 20px !important;
   min-height: 450px !important;
   height: auto !important;
}
.floatingButtonWrap {
    display: block;
    position: fixed;
    bottom: 45px;
    right: 45px;
    z-index: 999999999;
}

.floatingButtonInner {
    position: relative;
}

.floatingButton {
    display: block;
    width: 60px;
    height: 60px;
    text-align: center;
    background:#40755c;
    color: #fff;
    line-height: 50px;
    position: absolute;
    border-radius: 50% 50%;
    bottom: 0px;
    right: 0px;
    border: 5px solid #284b3b;
    /* opacity: 0.3; */
    opacity: 1;
    transition: all 0.4s;
}

.floatingButton .fa {
    font-size: 15px !important;
}

.floatingButton.open,
.floatingButton:hover,
.floatingButton:focus,
.floatingButton:active {
    opacity: 1;
    color: #fff;
}


.floatingButton .fa {
    transform: rotate(0deg);
    transition: all 0.4s;
}

.floatingButton.open .fa {
    transform: rotate(270deg);
}

.floatingMenu {
    position: absolute;
    bottom: 60px;
    right: 0px;
    /* width: 200px; */
    display: none;
}

.floatingMenu li {
    width: 100%;
    float: right;
    list-style: none;
    text-align: right;
    margin-bottom: 5px;
    margin-right: 10px;
}

.floatingMenu li a {
   align-self: center;
   text-align: center;
    width: 40px;
    height: 40px;
    padding-top: 10px;
    display: inline-block;
    background: #f8f8f8;
    color: #40755c;
    border-radius: 50%;
    overflow: hidden;
    white-space: nowrap;
    transition: all 0.4s;
}

.floatingMenu li a:hover {
    margin-right: 10px;
    text-decoration: none;
}
.shadow{
  overflow: hidden;
  color: #fff;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  position: relative;
  align-items: center;
  display: flex;
  justify-content: center;
  height: 100vh;
  text-align: center;
  margin: auto;
  /*
  *
  * HERE IS THE SECRET
  * MAKE SURE TO ALWAYS USE A LINEAR-GRADIENT VALUE
  * THE FIRST ONE WILL BE FOR A BLACK OPACITY
  * THE SECOND ONE (COMMENTED) WILL BE FOR A WHITE OPACITY
  *
  */
  background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.7) 100%) , url(https://images.pexels.com/photos/34676/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);
  
  /*** WHITE OPACITY ***/
  /* background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7) 0%,rgba(255, 255, 255, 0.7) 100%), url(https://images.pexels.com/photos/34676/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);*/
}
  

</style>
</head>

<body>

{{-- <div class="floatingButtonWrap">
   <div class="floatingButtonInner">
       <a href="#" class="floatingButton">
           <i class="fa fa-plus icon-default"></i>
       </a>
       <ul class="floatingMenu social-icons">
         <p id="p1" style="display: none;">{{ Request::url() }}</p>
         @foreach($share as $key => $value)
         <li>
             <a href="{{$value}}" target="_blank">
                 @if($key == "facebook")
                 <i class="fa fa-facebook"></i>
                 @elseif($key == "twitter")
                 <i class="fa fa-twitter"></i>
                 @elseif($key == "whatsapp")
                 <i class="fa fa-whatsapp"></i>
                 @elseif($key == "telegram")
                 <i class="fa fa-telegram"></i>
                 @else
                 <i class="fa fa-home"></i>
                 @endif
             </a>
         </li>
         @endforeach
         <li>
            <a href onclick="copyToClipboard('#p1')">
                <i class="fa fa-copy"></i>
            </a>
        </li>
       </ul>
   </div>
</div> --}}
    {{-- <a href="javascript:void(0)" class="scrollToTop"><i class="fa fa-angle-up"></i></a> --}}

<!--Single portfolio items-->
@if(!empty($data->section1))
@if ($data->format1 == 'paralax')
<section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image1) }}');" id="home">
@else
<section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background1 }} !important;" id="home">
@endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-12 col-sm-12">
             <div class="item-titles {{$data->fontcolor1 }} {{$data->position1}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title1 }}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section1 !!}</p>
              
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
 @if(!empty($data->section2))
 @if ($data->format2 == 'paralax')
  <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image2) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background2 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 col-sm-8">
             <div class="item-titles {{$data->fontcolor2}} {{$data->position2}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title2}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section2 !!}</p>
             </div>
          </div>
       </div>
    </div>   
 </section>
 @endif
 @if(!empty($data->section3))
 @if ($data->format3 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image3) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background3 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 offset-md-7 col-sm-8 offset-sm-4">
             <div class="item-titles {{$data->fontcolor3 }} {{$data->position3}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                   <a href="#">{{$data->title3}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section3 !!}</p>
             
             </div>
          </div>
       </div>
    </div>
 </section>
 @endif
 @if(!empty($data->section4))
 @if ($data->format4 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image4) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background4 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 col-sm-8">
             <div class="item-titles {{$data->fontcolor4}} {{$data->position4}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                    <a href="#">{{$data->title4}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section4 !!}</p>
             </div>
          </div>
       </div>
    </div>   
 </section>
 @endif
 @if(!empty($data->section5))
 @if ($data->format5 == 'paralax')
 <section class="single-items center-block parallaxie shadow full-screen" style="background-repeat: no-repeat; background-size: cover;background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%) , url('{{ asset($data->image5) }}');" id="home">
 @else
 <section class="single-items center-block parallaxie full-screen" style="background-color: {{ $data->background5 }} !important;" id="home">
 @endif
    <div class="container wow fadeInUp">
       <div class="row">
          <div class="col-md-5 offset-md-7 col-sm-8 offset-sm-4">
             <div class="item-titles {{$data->fontcolor5 }} {{$data->position5}}">
                <h2 class="font-xlight wow fadeInUp" data-wow-delay="300ms">
                    <a href="#">{{$data->title5}}</a>
                </h2>
                <p class="top25 bottom25 wow fadeInUp" data-wow-delay="350ms">{!! $data->section5 !!}</p>
             </div>
          </div>
       </div>
    </div>
 </section>
@endif
<script>
   function copyToClipboard(element) {
       var $temp = $("<input>");
       $("body").append($temp);
       $temp.val($(element).text()).select();
       document.execCommand("copy");
       $temp.remove();
   }
</script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
   $(document).ready(function(){
        $(function(){
          new WOW().init(); 
        });
        $('.floatingButton').on('click',
            function(e){
                e.preventDefault();
                $(this).toggleClass('open');
                if($(this).children('.fa').hasClass('fa-plus'))
                {
                    $(this).children('.fa').removeClass('fa-plus');
                    $(this).children('.fa').addClass('fa-close');
                } 
                else if ($(this).children('.fa').hasClass('fa-close')) 
                {
                    $(this).children('.fa').removeClass('fa-close');
                    $(this).children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').stop().slideToggle();
            }
        );
        $(this).on('click', function(e) {
          
            var container = $(".floatingButton");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) 
            {
                if(container.hasClass('open'))
                {
                    container.removeClass('open');
                }
                if (container.children('.fa').hasClass('fa-close')) 
                {
                    container.children('.fa').removeClass('fa-close');
                    container.children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').hide();
            }
          
            // if the target of the click isn't the container and a descendant of the menu
            if(!container.is(e.target) && ($('.floatingMenu').has(e.target).length > 0)) 
            {
                $('.floatingButton').removeClass('open');
                $('.floatingMenu').stop().slideToggle();
            } 
        });
    });
</script>

<!--Bootstrap Core-->
<script src="{{ asset('templates/landing-page/js/popper.min.js')}}"></script>
<script src="{{ asset('templates/landing-page/js/bootstrap.min.js')}}"></script>

<!--to view items on reach-->
<script src="{{ asset('templates/landing-page/js/jquery.appear.js')}}"></script>

<!--Equal-Heights-->
<script src="{{ asset('templates/landing-page/js/jquery.matchHeight-min.js')}}"></script>

<!--Owl Slider-->
<script src="{{ asset('templates/landing-page/js/owl.carousel.min.js')}}"></script>

<!--Parallax Background-->
<script src="{{ asset('templates/landing-page/js/parallaxie.js')}}"></script>
  
<!--FancyBox popup-->
<script src="{{ asset('templates/landing-page/js/jquery.fancybox.min.js')}}"></script>                

<!--Morphing Text-->
<script src="{{ asset('templates/landing-page/js/morphext.min.js')}}"></script>                  
              
<!--WOw animations-->
<script src="{{ asset('templates/landing-page/js/wow.min.js')}}"></script>
            
<!--Revolution SLider-->
<script src="{{ asset('templates/landing-page/js/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('templates/landing-page/js/revolution/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{ asset('templates/landing-page/js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>

<script src="{{ asset('templates/landing-page/js/functions.js')}}"></script>

</body>
</html>