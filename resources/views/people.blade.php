
@extends ('layouts.app')

@section('title', 'People')


@section('include_css')
    @parent
    <link rel="stylesheet" href= {{ URL::asset('css/main.css') }}>

@endsection


@section('page_top_picture')
    @parent
    @include('/php/page_top_picture')
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
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">People</h5>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        @if($users->isEmpty())
                            <div>No people in organization yet.</div>
                        @else
                            @foreach($users as $user)
                                <div class="col-sm-4">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <a href="/profile/{{$user->id}}">
                                                <div class="col-xs-6 ">
                                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                                </div>
                                            </a>
                                            <div class="col-xs-6  personal_info">
                                                <h5>{{$user->name}} {{$user->surname}}</h5>
                                                <h6>{{$user->position}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @endif

                    </div>
                </div>




            </div>



        </div>
    </div>

@endsection













