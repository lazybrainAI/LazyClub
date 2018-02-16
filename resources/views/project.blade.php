
@extends ('layouts.app')

@section('title', '| Project')

@section('include_css')
 @parent
 <link rel="stylesheet" href= {{ URL::asset('css/project.css') }}>

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

 <div class="container-fluid sidebar_section">
  <div class="row">
   <div class="col-sm-3 col-md-2 d-none d-sm-block">
    <ul id="sidebar_menu">
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
   <div class="col-sm-9 col-md-10  col-xs-12 project_info_section">
    <div class="container project_details_section" >
     <div class="row justify-content-between no-gutters">
      <div class="col-md-4 ">
       <h5 class="section_title">Project name</h5>
      </div>
      <div class="container project_section">
       <div class="row">
        <div class="col-md-12">

         <p style="padding-left:33px; color: #666666;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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

     </div>
    </div>
   </div>

    <div class="timeline_section">
     <div class="containter center">
      <div class="col-sm-6  col-md-3 col-lg-2">
       <div class="timeline">
       <div class="content content_up">
        <div class="timeline_content">
        <h2 id="Action_title">Action</h2>
        <h3 id="Responsible">Responsible</h3>
        <img src="{{asset('img/teo.jpeg')}}" class="responsible_person" alt="Responsible person">
        </div>
        </div>
        <div class="content content_down">
         <div class="timeline_content">
          <h2 id="Action_title">Action</h2>
          <h3 id="Responsible">Responsible</h3>
          <img src="{{asset('img/teo.jpeg')}}" class="responsible_person" alt="Responsible person">
         </div>
         <div class="content content_up">
          <div class="timeline_content">
           <h2 id="Action_title">Action</h2>
           <h3 id="Responsible">Responsible</h3>
           <img src="{{asset('img/teo.jpeg')}}" class="responsible_person" alt="Responsible person">
          </div>
         </div>
         <div class="content content_down">
          <div class="timeline_content">
           <h2 id="Action_title">Action</h2>
           <h3 id="Responsible">Responsible</h3>
           <img src="{{asset('img/teo.jpeg')}}" class="responsible_person" alt="Responsible person">
          </div>
         </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-3 personal_info">
       <h5>Person Person</h5>
       <h5>Sector name</h5>
       <h5>Position</h5>
       <h5>email@email.com</h5>
       <h5>+381 065 444 444</h5>
       <h6><a>LinkedIn |</a><a>Twitter |</a><a>Facebook</a></h6>

      </div>
     </div>
    </div>

    <h5 class="section_title">Bio</h5>
    <div class="container biography_section">
     <div class="row">
      <div class="col-md-12">

       <p style="padding-left: 15px">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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

    <h5 class="section_title">Education</h5>
    <div class="container education_section">
     <div class="row" >
      <div class="col-sm-6 education">
       <h5 id="institution">Institution name</h5>
       <h6 id="address">Address</h6>
       <h6 id="period_education">Period</h6>
       <h6 id="title">Title</h6>

      </div>
      <div class="col-sm-6 education">
       <h5 id="institution">Institution name</h5>
       <h6 id="address">Address</h6>
       <h6 id="period_education">Period</h6>
       <h6 id="title">Title</h6>
      </div>

     </div>
    </div>
    <div class="add_btn">
     <h6>Add experience</h6>
    </div>


    <h5 class="section_title">Experience</h5>
    <div class="container experience_section">
     <div class="row">
      <div class="col-md-12">


       <div class="experience">
        <h5 id="position">Position</h5>
        <h5 id="company">Company</h5>
        <h5 id="period">Period</h5>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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
    </div>
    <div class="add_btn">
     <h6>Add experience</h6>
    </div>

    <h5 class="section_title">Projects</h5>

    <h5 class="section_title">Documents</h5>
    <div class="container documents_section">
     <div class="row align-items-center">
      <div class="col-md-3 col-sm-6">
       <div class="document">
        <h6 id="doc_name">Document name</h6>
        <h6 class="h7" id="doc_date_created">Date created</h6>
       </div>
      </div>
      <div class="col-md-3 col-sm-6">
       <div class="document">
        <h6 id="doc_name">Document name</h6>
        <h6 class="h7" id="doc_date_created">Date created</h6>
       </div>
      </div>
      <div class="col-md-3 col-sm-6">
       <div class="document">
        <h6 id="doc_name">Document name</h6>
        <h6 class="h7" id="doc_date_created">Date created</h6>
       </div>
      </div>
      <div class="col-md-3 col-sm-6">
       <div class="document">
        <h6 id="doc_name">Document name</h6>
        <h6 class="h7" id="doc_date_created">Date created</h6>
       </div>
      </div>
     </div>
    </div>




   </div>



  </div>
 </div>

@endsection



@section('sidebar_section')
 @parent

@endsection







