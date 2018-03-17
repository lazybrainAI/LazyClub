
@extends ('layouts.app')

@section('title', 'Profile')
@section('id', 'body_profile')

@section('include_css')
@parent
    <link rel="stylesheet" href= {{ URL::asset('css/main.css') }}>

@endsection



@section('page_top_picture')
 @parent
    @include ('/php/page_top_picture')
@endsection


@section('main')
 @parent

 <div class="container-fluid sidebar_section">

     <div class="row">
         <div class="col-sm-3 col-md-2 d-none d-sm-block">
           @include ('/php/sidebar_menu')
         </div>
         <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">

             <div class="container  container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                         <h5 class="section_title">Profile</h5>
                     </div>
                 </div>
             </div>

             <div class="container details_section" >
                <div class="row justify-content-between no-gutters">
                    <div class="col-md-8 order-md-1 order-2">
                        <div class="container user_info_section">
                            <div class="row align-items-center">
                                <div class="col-xs-6 ">
                                    <img class=" profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                </div>
                                <div class="col-xs-6  personal_info">
                                    <input id="name" type="text" disabled="disabled" value="<?php echo $user->name; echo  $user->surname ?>" >
                                    <input id="sector" type="text" disabled="disabled"  value="<?php echo $user->sector?>" >
                                    <input id="position" type="text" disabled="disabled" value="<?php echo $user->position ?>" >
                                    <input id="email" type="email" disabled="disabled" value="<?php echo $user->email?>" >
                                    <input id="phone_num" type="text" disabled="disabled" value="<?php echo $user->phone_num ?>" >
                                    <h6><a class="social_form_btn" id="linkedin" href="<?php echo $linked ?>">LinkedIn |</a>
                                        <a class="social_form_btn" id="twitter" href="<?php echo $twitter ?>">Twitter |</a>
                                        <a href="<?php echo $fb ?>" class="social_form_btn" id="fb">Facebook</a>
                                    </h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3 order-md-2 order-1 details_div">
                        <h6>Profile details:</h6>
                        <br>
                        <h6 class="h7" id="join_date">Join date / {{$user->join_date}}</h6>
                        <h6 class="h7" id="status">Status / {{$user->status}}</h6>

                        <h6 class="h7" id="strength">Strength / {{$user->strength}}</h6>

                    </div>

                </div>
            </div>




             <div class="container  container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                         <h5 class="section_title">Bio</h5>
                     </div>
                 </div>
             </div>
             <div class="container description_section">
                 <div class="row">
                     <div class="col-md-12">
                         <textarea rows="4" cols="100" id="bio_description" disabled="disabled" >{{$user->bio}}</textarea>
                         <div class="read_more_btn">
                            <h6>read more</h6>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="container  container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                         <h5 class="section_title">Education</h5>
                     </div>
                 </div>
             </div>
             <div class="container add_section">
                 <div class="row" id="education_section">
                     @include('/php/education')
                     @include('/php/education')
                 </div>
                 <div class="add_btn" id="add_education">
                     <h6>Add education</h6>
                 </div>
             </div>


             <div class="container  container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                         <h5 class="section_title">Experience</h5>
                     </div>
                 </div>
             </div>
             <div class="container add_section">
                 <div class="row" id="experience_section">
                     @include('/php/experience')

                 </div>
                 <div class="add_btn" id="add_experience">
                     <h6>Add experience</h6>
                 </div>
             </div>



             <div class="container container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                         <h5 class="section_title">Projects</h5>
                     </div>
                 </div>
             </div>

             <div class="projects_section">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-5">
                            @include ('/php/project_card')
                         </div>
                     </div>
                 </div>
             </div>

<!--
             <div class="container container-left-margin">
                 <div class="row">
                     <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                         <h5 class="section_title">Documents</h5>
                     </div>
                 </div>
             </div>
             <div class="container documents_section">
                 <div class="row align-items-center">
                     <div class="col-md-3 col-sm-6">
                         @include('/php/document')
                     </div>
                     <div class="col-md-3 col-sm-6">
                         @include('/php/document')
                     </div>
                     <div class="col-md-3 col-sm-6">
                         @include('/php/document')

                     </div>
                     <div class="col-md-3 col-sm-6">
                         @include('/php/document')

                     </div>
                 </div>
             </div>




         </div> -->

             <div id="save_btn">
                 <h6>Save changes</h6>
             </div>
             <div id="cancel_btn">
                 <h6>Cancel</h6>
             </div>


         </div>
 </div>

@endsection









