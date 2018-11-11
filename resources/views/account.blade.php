@extends ('layouts.app')

@section('title', 'Account')

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
                        <div class="col-8 col-sm-5 col-md-5  col-lg-3">
                            <h5 class="section_title">Change password</h5>
                        </div>
                    </div>
                </div>

                <form id="account_form" method="post" accept-charset="UTF-8" style="margin-top: 2%; margin-bottom: 2%">
                    @csrf
                    <input hidden value="pass" name="action">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Old password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" required autocomplete="off" name="current-password" minlength="6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>New password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" required autocomplete="off" name="new-password" minlength="6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Repeat new password</label>
                            </div>
                            <div class="col-md-4" >
                                <input type="password" required autocomplete="off" name="new-password_confirmation"
                                       minlength="6">
                            </div>
                        </div>

                       
                         <div class="row">
                               <div class="col-md-4 offset-md-3" style="text-align: center;">
                                   
                                   <button class="normal_btn" id="save_password" type="submit">
                                        <h6>Save</h6>
                                    </button>

                                    <button class="normal_btn" id="cancel_password" type="reset" >
                                        <h6>Cancel</h6>
                                    </button>
                            
                               </div>
                           </div>
                  
                        <div id="password_msg">
                        </div>

                    </div>
                    
                </form>
                
                
                <div class="container container-left-margin" id="change-username-div">
                    <div class="row">
                        <div class="col-8 col-sm-5 col-md-5  col-lg-3">
                            <h5 class="section_title">Change username</h5>
                        </div>
                    </div>
                </div>
                    <form id="account_form_username" method="post" accept-charset="UTF-8" style="margin-top: 2%">
                        @csrf
                        <input hidden value="user" name="action">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>New username</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" required autocomplete="off" name="new-username">
                                </div>
                            </div>

                           <div class="row">
                               <div class="col-md-4 offset-md-3" style="text-align: center;">
                                   
                                   <button class="normal_btn" id="save_username" type="submit">
                                        <h6>Save</h6>
                                    </button>

                                    <button class="normal_btn" id="cancel_username" type="reset" >
                                        <h6>Cancel</h6>
                                    </button>
                            
                               </div>
                           </div>
                            
                                
                            <div id="username_msg">


                        </div>

                    </form>

                
            </div>
        </div>
    </div>

@endsection
@section('include_js')
    <script src={{ URL::asset('js/change_pass.js') }}></script>
    <script src={{ URL::asset('js/account_update_username.js') }}></script>
@endsection












