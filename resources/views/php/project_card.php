<?php include "project_event_description.php";?>
<div class="p_e_card">
    <div class="p_e_img">
        <h5 class="section_title"><?php if (is_null($project->name)) echo "Project name"; else {echo $project->name;} ?></h5>
        <ul>
            <li>
                <img class="profile_img" src="" />
            </li>
            <li>
                <img class="profile_img" src="" />


            </li>
        </ul>
    </div>
    <div class="p_e_info">
        <h5>About</h5>
        <p><?php if (is_null($project->description)) echo "About"; else {echo length_of_description($project->description);} ?></p>
        <div class="read_more_btn">
            <a href="<?php echo '/project/' . $project->name ?>" > <h6>view project</h6></a>
            </div>
    </div>
</div>