<div class="container">
    
<div class="create-plan-form">
<div class="col-md-10 box">
    <h3>What would you like to plan for hangout?</h3>
    <hr />

<div style="padding:0px 20px">
<div class="row col-sm-12">
    <a href="javascript:void(0);" data-value="movies" class="term"><!-- <span class="icon-movies"></span> --> Movies</a>
    <a href="javascript:void(0);" data-value="event" class="term"><!-- <span class="icon-event"></span> --> Event</a>
    <a href="javascript:void(0);" data-value="coffee" class="term"><!-- <span class="icon-coffee"></span>  -->Coffee</a>
    <a href="javascript:void(0);" data-value="lunch" class="term"><!-- <span class="icon-food"></span> --> Lunch</a>
    <a href="javascript:void(0);" data-value="dinner" class="term"><!-- <span class="icon-food"></span>  -->Dinner</a>
    <a href="javascript:void(0);" data-value="other" class="term active"><!-- <span class="icon-other"></span> --> Other</a>
</div>

<div class="clearfix">&nbsp;</div> 

<form method="post" action="" id="createPlanForm" class="frm-create" autocomplete="off">
    <div class="form-group titleField">
        <label id="lblTitle">What would you like to plan</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Name of your plan" data-validation="required">
        <?php if(isset($title)): ?><span class="help-block form-error"><?php echo $title ?></span><?php endif; ?>
        <div class="selectionDiv"></div>
    </div>     
     <div class="clearfix">&nbsp;</div>   
     <div class="form-group whereField">   
        <label id="lblWhere">Where would you like to go</label>
        <input type="text" name="venue" id="venue" class="form-control" placeholder="Type address or location name" data-validation="required">
        <?php if(isset($venue)): ?><span class="help-block form-error"><?php echo $venue ?></span><?php endif; ?>
        <div class="selectionDiv"></div>
    </div> 
    <div class="clearfix">&nbsp;</div>  
    <div class="form-group whenField">
        <label id="lblWhen">When would you like to <span>go</span></label>
        <input type="text" id="startDate" name="startDate" class="form-control" placeholder="Date and time" data-validation="required">
        <?php if(isset($startDate)): ?><span class="help-block form-error"><?php echo $startDate ?></span><?php endif; ?>
        <div class="selectionDiv"></div>
    </div>
   <div class="clearfix">&nbsp;</div>  
     <div class="form-group">
         Guest can suggest other options
         <label class="switch">
            <input type="checkbox" class="switch-input" value="1" name="canSuggest" id="is_op_out" checked="checked">
            <span class="switch-label" data-on="On" data-off="Off"></span>
            <span class="switch-handle"></span>   
        </label>
    </div>
     <div class="form-group">
         Guest can invite other guest
         <label class="switch">
            <input type="checkbox" class="switch-input" value="1" name="canInvite" id="is_op_out" checked="checked">
            <span class="switch-label" data-on="On" data-off="Off"></span>
            <span class="switch-handle"></span>   

        </label>
        </div>
        <input type="hidden" name="sessionId" id="session_id" value="0" />
        <input type="hidden" name="itemCategory" id="itemCategory" value="other" />
        <input type="submit" name="submit" value="Done" id="createFormSubmit" class="btn btn-green">        
</form>

</div>

</div>

</div>

</div>

