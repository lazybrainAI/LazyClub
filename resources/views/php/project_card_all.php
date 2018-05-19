<?php include "project_event_description.php";?>
<div class="col-sm-4 padding_left" id="<?php echo $project['id']; ?>">
    <div class="p_e_card" id="p_e_card_<?php echo $project['id']; ?>">
        <div class="p_e_img">
            <button type="button" class="delete_project close" id="delete_project">&times;</button>
            <h5 class="section_title"><?php echo $project['name']; ?></h5>
            <ul>
                <?php foreach($teams as $project->name=>$team) {
                    foreach($team as $attending){?>
                        <li>
                            <img class="profile_img" src="<?php echo $attending->user->photo_link?>"/>
                        </li>

                    <?php } }?>
            </ul>
        </div>
        <div class="p_e_info">
            <p><?php echo length_of_description($project['description']); ?> </p>
            <div class="see_more_btn">
                <a href="/<?php echo 'project/' . $project['name']; ?>" style="text-decoration: none;"><h6 class="h7">view
                        project</h6></a>
            </div>
        </div>
    </div>
</div>
