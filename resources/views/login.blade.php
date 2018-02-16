@extends('layouts.app')
@section('include_css')
    <link rel="stylesheet" href= {{ URL::asset('css/login.css') }}>
    @endsection
@section('id', 'loginbackground');
<section id="loginsection">
    <div id="div_for_form">
        <form id="loginform" action="post">
            <div class="col-xs-12">
                <h2 class="lazytittle" id="lazytittle">
                    Club | LazyBrain
                </h2>
            </div>
            <div class="col-xs-12">
                <input  id="username"  type="text" name="username" placeholder="username">
            </div>
            <div class="col-xs-12">
                <input type="password" name="password" placeholder="password" id="password">
            </div>
            <div  class="col-xs-12" id="loginButton"><button type="submit" class="btn btn-primary" id="lazybutton">log in</button>
            </div>
        </form>
    </div>
</section>




