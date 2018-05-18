<div class="modal fade" role="dialog" id="image_upload_modal">
    <div class="modal-dialog">
        <form id="image_upload_form" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_heading">Upload image</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="col-sm-12">
                    <input name="profile_img" type="file" required>
                </div>

                <div class="modal-footer" id="footer_review">
                    <button type="submit" class="add_image" form="image_upload_form">Upload</button>
                    <button type="button" class="add_image" data-dismiss="modal">Close</button>
                    <input type="hidden" name="action" value="image">

                    <div id="img_uploaded"></div>

                </div>




            </div>

        </form>
    </div>


</div>