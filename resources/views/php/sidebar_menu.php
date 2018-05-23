<?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="sidebar_menu">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="wow fadeInDown"><a class="active" href="/home"><h5>Home</h5></a></li>
            <li class="wow fadeInDown delay05"><a href="/events"><h5>Events</h5></a></li>
            <li class="wow fadeInDown delay05"><a href="/projects"><h5>Projects</h5></a></li>
            <li class="wow fadeInDown delay15"><a href="/people"><h5>People</h5></a></li>
            <li class="wow fadeInDown delay2"><a href="/profile/<?php echo $user->username; ?>"><h5>Profile</h5></a></li>
            <li class="wow fadeInDown delay25"><a href="/account"><h5>Account</h5></a></li>
            <li class="wow fadeInDown delay3"><a href="/documents"><h5>Documents</h5></a></li>
            <li class="wow fadeInDown delay35"><a href="/logout"
                                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none;"><h5>Logout</h5></a>  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">
                </form></li>
        </ul>
    </div>
</nav>