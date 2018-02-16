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
            {{--Navbar--}}
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
            {{--Project Description--}}

            <div class="col-sm-9 col-md-10 col-xs-12 right_side">
                <div class="project_info_section">
                    <div class="container project_details_section">
                        <div class="row justify-content-between no-gutters">
                            <div class="col-md-9">
                                <h5 class="section_title">Project name</h5>
                                <div class="container project_section">


                                    <p id="project_descr">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.
                                        Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                                        Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                                        ullam voluptatemLorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                                        Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                                        ullam voluptatem. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.
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

                            <div class="col-md-3 project_details">
                                <h6>Project details:</h6>
                                <br>
                                <h6 class="h7" id="lead">Project lead//</h6>
                                <h6 class="h7" id="sector">Sector/</h6>
                                <h6 class="h7" id="start_date">Start date/</h6>
                                <h6 class="h7" id="end_date">End date/</h6>
                                <h6 class="h7" id="location">Location/</h6>
                                <h6 class="h7" id="language">Language/</h6>
                                <h6 class="h7" id="open_positions">Open positions/</h6>
                                <ol>
                                    <li>Position One</li>
                                    <li>Position Two</li>
                                    <li>Position Three</li>
                                    <li>Position Four</li>
                                    <li>Position Five</li>
                                </ol>

                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-sm-9 col-md-10 col-xs-12 timeline_info_section">
                    <div class="container timeline_lazy">
                        <div class="row justify-content-between no-gutters">
                            <div class="col-md-4 ">
                                <h5 class="section_title">Timeline</h5>
                            </div>
                        </div>

                        <div class="row" id="timeline_lazy">
                            <section class="main-timeline-section">
                                <div class="conference-center-line"></div>
                                <div class="conference-timeline-content">

                                    <div class="timeline-article timeline-article-top">
                                        <div class="content-box">
                                            <h4>Action</h4>
                                            <h5>Responsible</h5>
                                            <img src="/img/teo.jpeg" alt="Responsible" class="lazy_picture"/>
                                        </div>
                                    </div>

                                    <div class="timeline-article timeline-article-bottom">
                                        <div class="content-box">
                                            <h4>Action</h4>
                                            <h5>Responsible</h5>
                                            <img src="/img/teo.jpeg" alt="Responsible" class="lazy_picture"/>
                                        </div>
                                    </div>

                                    <div class="timeline-article timeline-article-top">
                                        <div class="content-box">
                                            <h4>Action</h4>
                                            <h5>Responsible</h5>
                                            <img src="/img/teo.jpeg" alt="Responsible" class="lazy_picture"/>
                                        </div>
                                    </div>

                                    <div class="timeline-article timeline-article-bottom">
                                        <div class="content-box">
                                            <h4>Action</h4>
                                            <h5>Responsible</h5>
                                            <img src="/img/teo.jpeg" alt="Responsible" class="lazy_picture"/>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>


                <div class="col-sm-9 col-md-10 col-xs-12 document_part">
                    <div class="container document_section">
                        <div class="row justify-content-between no-gutters">
                            <div class="col-md-12 ">
                                <h5 class="section_title">Documents</h5>
                            </div>
                        </div>
                        <div class="row align-items-center documents_row">
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
    </div>


@endsection



@section('sidebar_section')
    @parent

@endsection







