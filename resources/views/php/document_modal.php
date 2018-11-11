<div class="modal fade" role="dialog" id="document_upload_modal">
    <div class="modal-dialog">
        <form id="document_upload_form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_heading">Upload document</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">

                <div class="col-sm-12">
                    <label>Title for document</label>
                    <input name="title" id="title" placeholder="Title" type="text" autocomplete="off" required>
                </div>
                <div class="col-sm-12">
                    <select name="project" id="project" required>
                    <?php if($existing_projects->isEmpty()){ ?>
                        <option disabled>No projects at the moment.</option>
                    <?php } else {?>
                        <option selected>Choose project</option>
                        <?php foreach($existing_projects as $existing_project) { ?>
                            <option><?php echo $existing_project->name?></option>
                        <?php } ?>
                    </select>
                    <?php } ?>
                </div>
                <div class="col-sm-12">
                    <input name="document" type="file" required>
                </div>

                <div class="modal-footer" id="footer_review">
                    <div id="doc_uploaded"></div>
                    <button type="submit" class="add_document" form="document_upload_form">Upload</button>
                    <button type="button" class="add_document" data-dismiss="modal">Close</button>
                    <input type="hidden" name="action" value="document">

                </div>
                <p style="margin-left:5px">*Please upload only pdf format with size less than 10MB.</p>





            </div>

        </form>
    </div>


</div>