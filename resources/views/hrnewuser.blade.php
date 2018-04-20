@extends ('layouts.app')

@section('title', 'Add new user')
@section('id', 'add_new_user')

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
                            <h5 class="section_title">HR panel</h5>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row align-content-center justify-content-center" id="div_for_hr_form">
                        <div class=" col-md-6">

                            <form id="hr_form" method="POST" action="" accept-charset="UTF-8">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div>
                                                <label>First name: </label>
                                                <input id="firstNameHR" type="text" placeholder="First name*"
                                                       name="firstName" required autocomplete="off">
                                            </div>

                                            <div>
                                                <label>Last name: </label>
                                                <input id="lastNameHR" type="text" name="lastName"
                                                       placeholder="Last name*" required autocomplete="off">
                                            </div>
                                            <div>
                                                <label>Email: </label></br>
                                                <input id="emailHR" type="email" name="email" placeholder="Email*"
                                                       required autocomplete="off">
                                            </div>
                                            <div>
                                                <label>Username: </label>
                                                <input id="usernameHR" type="text" placeholder="Username*"
                                                       name="username" required autocomplete="off">
                                            </div>

                                            <div id="hr_button">
                                                <button type="submit" class="btn btn-primary">Create new user</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div id="email_sent">
                            </div>
                            <div id="email_not_sent">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section("include_js")
    <script src={{ URL::asset('js/hrpanel_add_new_user.js') }}></script>
@endsection