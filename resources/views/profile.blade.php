
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

             <form id="profile_form" method="post" accept-charset="UTF-8">

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
                                <div class="col-xs-6 profile_img_div">
                                    <img class="profile_img" src={{ URL::asset($user->photo_link) }} />
                                    <button type="button" data-toggle="modal" data-target="#image_upload_modal"><i class="fas fa-camera fa-3x"></i></button>
                                </div>
                                <div class="col-xs-6  personal_info" id="{{$user->id}}">
                                    <input name="user_name" id="name" type="text" disabled="disabled" placeholder="Name" value="<?php if(!is_null($user->name)) {echo $user->name;}  ?>" required>
                                    <input name="surname" id="surname" type="text" disabled="disabled" placeholder="Surname" value="<?php if(!is_null($user->surname)) {echo $user->surname;}  ?>"  required>
                                    <input name="user_sector" id="sector" type="text" disabled="disabled" placeholder="Sector" value="<?php if(!is_null($user->sector)) { echo $user->sector;} ?>" >
                                    <input name="user_position" id="position" type="text" disabled="disabled" placeholder="Position" value="<?php if(!is_null($user->position)) {echo $user->position;} ?>" >
                                    <input name="user_email" id="email" type="email" disabled="disabled" placeholder="Email" value="<?php if(!is_null($user->email)) { echo $user->email;} ?>" >
                                    <input name="phone_num" id="phone_num" type="text" disabled="disabled" placeholder="Phone number" value="<?php if(is_null($user->phone_num)) {echo "Phone number";} else{ echo $user->phone_num;} ?>" >
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
                        <h6 class="h7" id="status">Status / <input value="{{$user->status}}" type="text" required disabled="disabled"></h6>

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
             <div class="container description_section read_more_btn_parent">
                 <div class="row">
                     <div class="col-md-12">
                         <textarea name="bio" cols="80" rows=6 class="expand" maxlength="450" id="bio_description" disabled="disabled" placeholder="Write something about yourself. Don't be lazy."><?php if(!is_null($user->bio)){ echo $user->bio;} ?></textarea>
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
                     @if($education_count==0)
                         @include('/php/education')
                         @include('/php/education')
                         @else
                            @foreach($educations as $education)
                                @include('/php/education')
                                @endforeach
                     @endif
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
                 <div class="row read_more_btn_parent" id="experience_section">
                     @if($experience_count==0)
                         @include('/php/experience')

                     @else
                         @foreach($experiences as $experience)
                             @include('/php/experience')
                         @endforeach
                     @endif

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
                         @if($projects==null)
                             <div><p>You don't have ongoing projects.</p></div>
                         @else
                             @foreach($projects as $project)
                             <div class="col-md-5">
                                @include ('/php/project_card')
                             </div>
                                 @endforeach
                             @endif
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

                 </div>
             </div>




         </div> -->

             <button class="save_btn"  id="save_profile" type="submit">
                 <h6>Save changes</h6>
             </button>
             <button class="cancel_btn" id="cancel_profile" type="reset">
                 <h6>Cancel</h6>
             </button>
             <div id="msg"></div>

             </form> <!--  end of form   -->



         </div>

     </div>
 </div>

 @include('/php/image_upload_modal')


@endsection









