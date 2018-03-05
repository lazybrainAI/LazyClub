<div class="p_e_card">
    <div class="p_e_img">
        <?php foreach ($projects as $project)?>
        <h5 class="section_title"><?php echo $project->name ?></h5>
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
        <p><?php echo $project->description?>o </p>
        <div class="see_more_btn">
            <h6 class="h7">view project</h6>
        </div>
    </div>
</div>
