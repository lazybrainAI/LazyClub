@extends ('layouts.app')
@section('title', 'Account')
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
                            <h5 class="section_title">Account</h5>
                        </div>
                    </div>
                </div>
                <form id="account_form" method="post" accept-charset="UTF-8">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Old password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" required autocomplete="off" name="current-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>New password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" required autocomplete="off" name="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Repeat new password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" required autocomplete="off" name="new-password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="save_btn" id="save_password" type="submit">
                            <h6>Save changes</h6>
                        </button>
                        <button class="cancel_btn" id="cancel_password" type="reset">
                            <h6>Cancel</h6>
                        </button>
                    </div>
                </form>
                <div id="password_msg">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('include_js')
    <script src={{ URL::asset('js/change_pass.js') }}></script>
@endsection












