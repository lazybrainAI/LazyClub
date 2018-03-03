
@extends ('layouts.app')

@section('title', 'Profile')


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
                                    <h5>Person Person</h5>
                                    <h5>Sector name</h5>
                                    <h5>Position</h5>
                                    <h5>email@email.com</h5>
                                    <h5>+381 065 444 444</h5>
                                    <h6><a>LinkedIn |</a><a>Twitter |</a><a>Facebook</a></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3 order-md-2 order-1 details_div">
                        <h6>Profile details:</h6>
                        <br>
                        <h6 class="h7" id="join_date">Join date/</h6>
                        <h6 class="h7" id="status">Status/</h6>

                        <h6 class="h7" id="strength">Strength/</h6>

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

                         <p >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                             Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                             Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                             ullam voluptatemLorem ipsum dolor sit amet, consectetur adipisicing elit.
                             Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                             Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                             ullam voluptatem
                         </p>
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
                 <div class="row" >
                     <div class="col-sm-6 click_to_add">
                         <h5 id="institution">Institution name</h5>
                         <h6 id="address">Address</h6>
                         <h6 id="period_education">Period</h6>
                         <h6 id="title">Title</h6>
                         <a class="edit_icon"><i class="far fa-edit"></i></a>
                         <a class="delete_icon"><i class="far fa-trash-alt"></i></a>

                     </div>
                     <div class="col-sm-6 click_to_add">
                         <h5 id="institution">Institution name</h5>
                         <h6 id="address">Address</h6>
                         <h6 id="period_education">Period</h6>
                         <h6 id="title">Title</h6>
                         <a class="edit_icon"><i class="far fa-edit"></i></a>
                         <a class="delete_icon"><i class="far fa-trash-alt"></i></a>
                     </div>
                     <div class="add_btn">
                         <h6>Add experience</h6>
                     </div>
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
                 <div class="row">
                     <div class="col-md-12 click_to_add">

                         <h5 id="position">Position</h5>
                         <h5 id="company">Company</h5>
                         <h5 id="period">Period</h5>
                         <a class="edit_icon"><i class="far fa-edit"></i></a>
                         <a class="delete_icon"><i class="far fa-trash-alt"></i></a>

                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                             Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                             Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                             ullam voluptatem
                         </p>
                         <div class="read_more_btn">
                             <h6>read more</h6>
                         </div>

                     </div>
                     <div class="add_btn">
                         <h6>Add experience</h6>
                     </div>
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




         </div>



     </div>
 </div>

@endsection









