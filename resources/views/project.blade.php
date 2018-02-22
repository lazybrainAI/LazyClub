
@extends ('layouts.app')

@section('title', 'Project')

@section('include_css')
    @parent
    <link rel="stylesheet" href= {{ URL::asset('css/app.css') }}>

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
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">
                <div class="container container-left-margin">
                    <div class="row no-gutters">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Project</h5>
                        </div>
                    </div>
                </div>

                <div class="container details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-8 order-md-1 order-2">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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
                        <div class=" col-md-3  order-md-2 order-1 details_div" style="height:300px">
                            <h6>Project details:</h6>
                            <br>
                            <h6 class="h7" id="project_lead">Lead/</h6>
                            <h6 class="h7" id="project_sector">Sector/</h6>
                            <br>
                            <h6 class="h7" id="project_start_date">Start date/</h6>
                            <h6 class="h7" id="project_end_date">End date/</h6>
                            <br>
                            <h6 class="h7" id="=project_loc">Location/</h6>
                            <h6 class="h7" id="=project_lang">Language/</h6>
                            <br>
                            <h6 class="h7" id="=project_positions">Open positions/</h6>


                        </div>

                    </div>
                </div>



                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Timeline</h5>
                        </div>
                    </div>
                </div>

                <div class="container timeline_section">
                    <div class="row align-items-center">

                        <div class="col-md-3 col-sm-6">
                            <div class="project_action">
                                <h6 id="action_name">Action name</h6>
                                <h6 class="h7" id="action_responsible">Responsible</h6>
                                <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                                <div class="vertical_line"></div>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="project_action">
                                <h6 id="action_name">Action name</h6>
                                <h6 class="h7" id="action_responsible">Responsible</h6>
                                <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                                <div class="vertical_line"></div>

                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="project_action">
                                <h6 id="action_name">Action name</h6>
                                <h6 class="h7" id="action_responsible">Responsible</h6>
                                <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                                <div class="vertical_line"></div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="container timeline_section_bellow">
                    <div class="row align-items-center">

                        <div class="col-md-3 offset-md-4 col-sm-6">
                            <div class="project_action">
                                <h6 id="action_name">Action name</h6>
                                <h6 class="h7" id="action_responsible">Responsible</h6>
                                <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                                <div class="vertical_line_up"></div>
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

                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <h5 class="section_title">Team</h5>
                        </div>
                    </div>
                </div>
                <div class="container attendees_section">
                    <div class="row align-items-center">
                        <div class="col-md-5 organizer">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-xs-6 ">
                                        <img class=" profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </div>
                                    <div class="col-xs-6  personal_info">
                                        <h5>Person Person</h5>
                                        <h6>Position</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7  attendees">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-6 ">
                                        <div  style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>


                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-sm-6 col-6 personal_info">

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>



                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container" style="margin-left:25px">
                    <div class="row">
                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class=" add_btn">
                                <h6>Join us</h6>
                            </div>
                        </div>

                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class=" add_btn">
                                <h6>Contact us</h6>

                            </div>
                        </div>

                    </div>
                </div>






            </div>



        </div>
    </div>

@endsection













