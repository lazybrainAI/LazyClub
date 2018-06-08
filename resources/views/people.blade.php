@extends ('layouts.app')

@section('title', 'People')



@section('page_top_picture')
    @parent
    @include('/php/page_top_picture')
@endsection

@section('small_menu')
    @parent
    @include ('/php/small_sidebar_menu')
@endsection

@section('main')
    @parent

    <div class="container-fluid sidebar_section">
        <div class="row">
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
                @include('/php/sidebar_menu')
            </div>
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">


                <div class="container container-left-margin">
                    <div class="row">
                        {{--Event header--}}
                        <div class="col-sm-3">
                            <h4 class="section_title" id="all_people_section_title">People</h4>
                        </div>
                        {{--Add new event button--}}
                        @if($add_new_user=="hr" || $add_new_user=="admin")
                            <div class="col-sm-4 offset-sm-4 div_btn_event_project">
                                <button class="add_new_project" data-toggle="modal" data-target="#userModal">Add new user
                                </button>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="container">
                    <div class="row" id="all_users">
                        @if($users->isEmpty())
                            <div>No people in organization yet.</div>
                        @else
                            @foreach($users as $user)
                                @if($user->id!=1)
                                    <div class="col-sm-4">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <a href="/profile/{{$user->username}}">
                                                    <div class="col-xs-6 ">
                                                        <img class="people_img" src={{ URL::asset($user->photo_link) }} />
                                                    </div>
                                                </a>
                                                <div class="col-xs-6  personal_info">
                                                    <h5>{{$user->name}} {{$user->surname}}</h5>
                                                    <h6>{{$user->position}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @endif

                    </div>
                </div>


            </div>


        </div>
    </div>
    @include('/php/hr_modal')
@endsection
@section('include_js')
    <script src={{ URL::asset('js/hrpanel_add_new_user.js') }}></script>
@endsection













