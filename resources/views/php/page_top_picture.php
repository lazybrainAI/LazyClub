<?php $user = \Illuminate\Support\Facades\Auth::user();?>
<div id="page_top_picture">
    <div>
        <img class="profile_img" src="">

        <a href="/profile/<?php echo $user->id; ?>">
            <img class="profile_img" src="img/teo.jpeg">
        </a>
        <a href="/profile/<?php echo $user->id; ?>">
            <img class="profile_img" src="img/teo.jpeg">
        </a>

    </div>
    <div class="container-fluid p_t_button">
        <div class="row justify-content-center">
            <div class="col-sm-3 col-xs-4" id="page_title">
                <h2>Club | LazyBrain</h2>
            </div>
         </div>
    </div>
    <div class="add_btn" id="edit_btn">
        <h6>Edit profile</h6>
    </div>
</div>