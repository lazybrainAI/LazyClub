@extends('layouts.app')

@section('title', 'Login')


@section('id', 'login_background');
<div class="container" id="login_section">
    <div  class="row align-content-center justify-content-center" id="div_for_form">
       <div class=" col-md-6">
           <form id="login_form" action="post">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12">

                           <h1 class="lazy_tittle" id="lazy_tittle">
                               Club | LazyBrain
                           </h1>
                           <div>
                               <input  id="username"  type="text" name="username" placeholder="username">
                           </div>
                           <div>
                               <input type="password" name="password" placeholder="password" id="password">

                           </div>
                           <div   id="login_button">
                               <button type="submit" class="btn btn-primary">log in</button>
                           </div>

                       </div>
                   </div>
               </div>


           </form>
       </div>
    </div>
</div>




