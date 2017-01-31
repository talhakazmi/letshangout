<!-- Modal Header -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title text-center">Create an event</h4>
</div>
<!-- end Modal header -->

<!-- Modal Body -->
<div class="modal-body modal-inner-body">       
   <div class="col-sm-12">
        <form class="dropzone" enctype="multipart/form-data" onSubmit="return false;" id="createEventForm">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title <span class="required">*</span></label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
                <div class="clearfix">&nbsp;</div> 
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control"  name="description" placeholder="Enter Description (Optional)"></textarea>
                </div>
                <div class="clearfix">&nbsp;</div> 
                <div class="row">
                    <div class="col-sm-5">
                    <div class="form-group">
                            <label >Start date</label>
                            <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Enter Start date & time">
                    </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label >End date</label>
                            <input type="text" class="form-control" id="endDate" name="endDate" placeholder="Enter End date & time">
                        </div>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="form-group">
                        <label >Venue Title</label>
                        <input type="text" class="form-control" name="venueTitle" placeholder="Enter location name">
                </div>
                <div class="form-group">
                        <label >Venue</label>
                        <input type="text" class="form-control" name="venue" placeholder="Enter location address">
                </div>
                <div class="form-group">
                        <label >Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter Price">
                </div>
                <!--<div class="clearfix">&nbsp;</div>
                <div class="form-group">
                    <label class="switch">
                        <input type="checkbox" class="switch-input" value="1" name="status" id="status" checked="checked">
                        <span class="switch-label" data-on="Public" data-off="Private"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>-->
            </div>
            <div class="col-sm-4">
                <label>Add photo</label>
                <div class="upload-holder">
                    <div class="fallback">
                        <input name="image" id="image" type="file" />
                        <img id="uploadPreview" style="width: 100px; height: 100px;" />
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-normal" id="submitEvent">Save &amp; Continue</button> or <a href="javascript:void(0);" data-dismiss="modal">Cancel</a>
            </div>
        </form>
    </div>
</div>
<!-- end Modal Body -->