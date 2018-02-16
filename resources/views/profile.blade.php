
@extends ('layouts.app')

@section('title', '| Profile')

@section('include_css')
@parent
    <link rel="stylesheet" href= {{ URL::asset('css/main.css') }}>

@endsection


@section('page_top_picture')
 @parent



 <div id="page_top_picture">
     <div class="container-fluid p_t_button">
         <div class="row justify-content-center">
             <div class="col-sm-3 col-xs-4" id="page_title">
                 <h2>Club | LazyBrain</h2>
             </div>
         </div>
     </div>
 </div>
@endsection






@section('main')
 @parent

 <div class="container-fluid sidebar">
     <div class="row">
         <div class="col-sm-3 col-md-2 d-none d-sm-block">
            <ul id="sidebar-menu">
                <li>
                    <a href="">
                        <h5>Home</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Events</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Projects</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Review</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Documents</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Profile</h5>
                    </a>
                </li>
                <li>
                    <a href="">
                        <h5>Logout</h5>
                    </a>
                </li>

            </ul>
         </div>
         <div class="col-sm-9 col-md-10  col-xs-12 profile_info"> <!--profile information-->
            <div class="container profile_details_container" >
                <div class="row no-gutters">
                    <div class="col-sm-4">
                        <h5 class="section_title">Profile</h5>
                    </div>
                    <div class="col-md-3 offset-md-5  profile_details"> <!--profile details-->
                        <h6>Profile details:</h6>
                        <br>
                        <h6 class="h7">Join date/</h6>
                        <h6 class="h7">Status/</h6>

                        <h6 class="h7">Strength/</h6>

                    </div>

                </div>
            </div>

             <div class="container profile_img_container">
                 <div class="row align-items-center">
                     <div class="col-md-3 col-lg-2">
                         <img class=" profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                     </div>
                     <div class="col-md-4 col-lg-3 personal_info">
                         <h5>Person Person</h5>
                         <h5>Sector name</h5>
                         <h5>SPosition</h5>
                         <h5>email@email.com</h5>
                         <h5>+381 065 444 444</h5>
                         <h6><a>LinkedIn |</a><a>Twitter |</a><a>Facebook</a></h6>

                     </div>
                 </div>
             </div>

         </div>



     </div>
 </div>

@endsection



@section('sidebar')
 @parent

@endsection







