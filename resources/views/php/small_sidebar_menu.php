<?php $user = \Illuminate\Support\Facades\Auth::user(); ?>

<div id="small_sidebar_menu">
    <button type="button" id="close_menu"><i class="fas fa-times"></i></button>
    <ul>
        <li><a class="active" href="/home"><h5>Home</h5></a></li>
        <li><a href="/events"><h5>Events</h5></a></li>
        <li><a href="/projects"><h5>Projects</h5></a></li>
        <li><a href="/people"><h5>People</h5></a></li>
        <li><a href="/profile/<?php echo $user->username; ?>"><h5>Profile</h5></a></li>
        <li><a href="/account"><h5>Account</h5></a></li>
        <li><a href="/document"><h5>Documents</h5></a></li>
        <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none;"><h5>Logout</h5></a>  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">
            </form></li>
    </ul>
</div>