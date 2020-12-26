<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn,T Facebook, Google+ -->
    <meta property="og:site_name" content="" />
    <!-- website name -->
    <meta property="og:site" content="" />
    <!-- website link -->
    <meta property="og:title" content="" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" />
    <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Green Dormitory</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{asset('page_assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('page_assets/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('page_assets/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('page_assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('page_assets/css/styles.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<style>
input[type=datetime-local]:required:invalid::-webkit-datetime-edit {
    color: transparent;
}
input[type=datetime-local]:focus::-webkit-datetime-edit {
    color: `black !important;
}
input[type=date]:required:invalid::-webkit-datetime-edit {
    color: transparent;
}
input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
}
.img-radius{
    border-radius:50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   

}
.img-radius img{
    width: 250px;
    height: 250px;
    display: block;
    /* image-rendering: pixelated;  */

/* 
    object-fit: cover; */
}
</style>

</head>

<body data-spy="scroll" data-target=".fixed-top">
@include('page.view.load_page')
@include('page.view.nav_page')
@include('page.view.head_page')
@include('page.view.intro_page')
{{-- @include('page.view.description_page') --}}
@include('page.view.services_page')
@include('page.view.detail1_page')
@include('page.view.detail2_page')
{{-- @include('page.view.testimonials_page') --}}
@include('page.view.callme_page')

@include('page.view.project_page')
@include('page.view.lightbox_page')
@include('page.view.team_page')
{{-- @include('page.view.about_page') --}}
@include('page.view.contact_page')
@include('page.view.footer_page')


    <!-- Scripts -->
    <script src="{{asset('page_assets/js/jquery.min.js')}}"></script>
    <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('page_assets/js/popper.min.js')}}"></script>
    <!-- Popper tooltip library for Bootstrap -->
    <script src="{{asset('page_assets/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap framework -->
    <script src="{{asset('page_assets/js/jquery.easing.min.js')}}"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('page_assets/js/swiper.min.js')}}"></script>
    <!-- Swiper for image and text sliders -->
    <script src="{{asset('page_assets/js/jquery.magnific-popup.js')}}"></script>
    <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('page_assets/js/morphext.min.js')}}"></script>
    <!-- Morphtext rotating text in the header -->
    <script src="{{asset('page_assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- Isotope for filter -->
    <script src="{{asset('page_assets/js/validator.min.js')}}"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('page_assets/js/scripts.js')}}"></script>
    <!-- Custom scripts -->

    <script>
        $(document).ready(function(){
            $('#alertbox').click(function(){
                $('#myModal').modal("show");
    });
  });
    </script>
<script>
    function cut() {
        document.getElementById("top-mess").classList.add('cut');
    }
</script>
    <script>
        $basic_url = "http://oceanhotel.com/phong/";
        $(document).ready(function(){
            $("#tang").change(function(){
                var idtang = $(this).val();
                $.get($basic_url +idtang, function(data){
                    $("#phong").html(data);
                });
            });
        });
    </script>
</body>

</html>
