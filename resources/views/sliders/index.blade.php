<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMK Wikrama Kota Bogor</title>
    {{-- slick --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    {{-- owl --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    {{-- custom --}}
    <link rel="stylesheet" href="{{asset('assets/custom/css-slider.css')}}">
    {{-- font --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- slick --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{-- owl --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>
<body>

    <div class="slider">
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{asset('/uploads/images/default.png')}})">
        <div class="container">
            <div class="info i-first">
                <h2 class="h2-first" style="font-size: 3em;">Selamat Datang di SMK Wikrama kota Bogor</h2>
                <p class="p-first" style="font-size: 1.5em;">ILMU YANG AMALIAH | AMAL YANG ILMIAH | AKHLAKUL KARIMAH</p>
            </div>
        </div>
    </div>
    @foreach ($sliders as $item)
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{asset('/uploads/images/'.$item->image)}})">
        <div class="container">
            <div class="info">
                <h2>{{$item->title}}</h2>
                @if ($item->desc !== '-')
                    <p>{!! $item->desc !!}</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <div class="jumbotron jumbotron-fluid">
        <div class="slider-owl owl-carousel">
            {{-- @foreach ($prestasi as $data)
            <div class="card card-2">
                <span class="sale">{{$data->date}}</span>
                <div class="image">
                     <img src="{{asset('images/'.$data->image)}}">
                </div>
                <div class="details">
                    <h3>{{$data->name}}</h3>
                    @if ($data->students !== '-')
                    <div class="desc">
                        {!! $data->students !!}
                    </div>
                    @endif
                </div>
            </div>
            @endforeach --}}
      </div>
    </div>

    </div>

    <script>
        $('.slider').slick({
            arrows: false,
            dots: false,
            infinite: true,
            speed: 700,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true,
            draggable: true,
            autoplay: true,
            autoplaySpeed: 2000
        });

        $('.slider')
        .on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $('.slick-list').addClass('do-transition')
        })
        .on('afterChange', function(){
            $('.slick-list').removeClass('do-transition')
        });

        $(".slider-owl").owlCarousel({
            center: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 1000, //2000ms = 2s;
            autoplayHoverPause: true,
            margin:10,
            autoWidth:true,
        });
    </script>
</body>
</html>