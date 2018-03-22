@extends ('layouts.app')

@section('title', 'Home')

@section('id', 'body_home')

@section('page_top_picture')
    @include ('/php/page_top_picture')
@endsection

@section('main')
    @parent

    <div class="container-fluid home_section">
        <div class="row">
            <div class="col-lg-6 left_section">
                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="section_title">Events</h4>
                        </div>

                    </div>
                </div>

                <div class="container timeline_vertical">
                    @foreach($events as $event)
                        @if($loop->index%2==0)
                            <div class="row no-gutters justify-content-between">
                                <div class="col-sm-6 col-md-5">
                                    <div class="event_date_right">
                                        <h6>@include('/php/date')</h6>
                                    </div>
                                </div>
                                @include('/php/event_card_right_home')
                            </div>

                        @else
                            <div class="row no-gutters justify-content-between">
                                @include('/php/event_card_right_home')
                                <div class="col-sm-6 col-md-5 order-1 order-sm-2">
                                    <div class="event_date_left">
                                        <h6>@include('/php/date')</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach


                    <div class="timeline_circle" id="tml_crcl_2">
                        <div class="horizontal_line_left"></div>

                    </div>
                    <div class="timeline_circle" id="tml_crcl_3">
                        <div class="horizontal_line_right"></div>

                    </div>
                    <div class="timeline_circle" id="tml_crcl_4">
                        <div class="horizontal_line_left"></div>

                    </div>

                    <div class="see_more_btn" style="width:100px">
                        <a href="/events" style="text-decoration: none;"><h6>View more</h6></a>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 right_section">
                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="section_title">Projects</h4>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        @foreach($projects as $project)
                            @include('/php/project_card_home')
                        @endforeach
                        <div class="see_more_btn" style="margin-bottom:70px">
                            <a href="/projects" style="text-decoration: none;"><h6>View more</h6></a>
                        </div>

                    </div>
                </div>

                <div class="container review_ppl_section">
                    <div class="row align-content-center">
                        <div class="col-sm-6 padding_left">
                            <div class="container container-left-margin">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="section_title">Review</h5>
                                    </div>
                                </div>
                            </div>

                            @include ('/php/review_card')




                        </div>
                        <div class="col-sm-6">
                            <div class="container container-left-margin">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h5 class="section_title">People</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="container people_home_section">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </div>
                                    <div class="col-md-2">
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                        <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </div>
                                </div>
                            </div>

                            <div class="see_more_btn" style="margin-bottom:70px">
                                <h6>View more</h6>
                            </div>


                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
