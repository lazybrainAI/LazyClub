<?php $user = \Illuminate\Support\Facades\Auth::user();?>
<div id="page_top_picture">
    <div>

        <a href="/profile/<?php echo $user->username; ?>">
            <img class="profile_img" src=" <?php echo $user->photo_link;?> ">
        </a>

    </div>
    <div class="container-fluid p_t_button">
        <div class="row justify-content-center">
            <div class="col-sm-3 col-xs-4" id="page_title">
                <h2>Club | LazyBrain</h2>
            </div>
         </div>
    </div>
    <?php
        if($button!="No button"){
            if($page_name=="profile") {
                if(( ($user_clicked_role=="hr") && ($user_sys_role==$user_role)) ||
                    (($user_clicked_role=="admin") && ($user_sys_role==$hr->id)) ){?>
                <div class="edit_btn hr" id="<?php echo $page_name?>_btn">
                    <h6><?php echo "Edit " .$page_name?></h6>
                </div>
            <?php } elseif($user_clicked->id==$user_id && $user_clicked_role=="admin"){ ?>
                    <div class="edit_btn admin" id="<?php echo $page_name?>_btn">
                        <h6><?php echo "Edit " .$page_name?></h6>
                    </div>
             <?php   }
                else{ ?>
                    <div class="edit_btn user" id="<?php echo $page_name?>_btn">
                        <h6><?php echo "Edit " .$page_name?></h6>
                    </div>
            <?php    }
            }else { ?>
                <div class="edit_btn" id="<?php echo $page_name?>_btn">
                    <h6><?php echo "Edit " .$page_name?></h6>
                </div>
             <?php   }?>

       <?php } ?>

    <button type="button" id="toggle_menu_btn"><i class="fas fa-bars"></i></button>
</div>