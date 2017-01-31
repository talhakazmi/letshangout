<?php $this->beginContent('//layouts/main'); ?>

    <?php echo $content; ?>

<?php $this->endContent(); ?>

<!-- Invite friends Modal -->
<div class="modal fade" id="invite-friends-modal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="text-center">Invite Friends</h4>
        

      </div>
<!-- end Modal header -->

      <!-- Modal Body -->
      <div class="modal-body">       
           
        <div class="col-sm-12">
            <div class="actionInvites">
                <button type="button" class="btn btn-invite col-xs-12" data-type="0"><span class="facebook-icon fa fa-facebook"></span> Facebook Friends</button>            
                <button type="button" class="btn btn-invite col-xs-12" data-type="1"><span class="friendcircle-icon fa fa-users"></span> Hangout Friends Circle</button>            
                <button type="button" class="btn btn-invite col-xs-12" data-type="2"><span class="lhfriends-icon fa fa-user-plus"></span> Hangout Friends</button>            
                <button type="button" class="btn btn-invite col-xs-12" data-type="3"><span class="emailinvite-icon fa fa-envelope-o"></span> Email Contacts</button>
            </div>
        </div>

      </div>
      <!-- end Modal Body -->

    
       <div class="modal-footer"> 
        <div class="row col-xs-12 text-left txt-small">
            
        </div>
      </div>
    

    </div>
  </div>
</div><!-- end Invite Friends Modal -->



<!-- Invite Email friends Modal -->
<div class="modal fade" id="invite-email-modal" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-md">
    <div class="modal-content">
     <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="text-center">Invite friends via email</h4>
        

      </div>
<!-- end Modal header -->

      <!-- Modal Body -->
      <div class="modal-body">       
           
        <div class="col-sm-12">
            <input type="text" class="form-control lhinput" name="emails" id="emails" placeholder="Enter email address comma separate" />            
        </div>

      </div>
      <!-- end Modal Body -->

    
       <div class="modal-footer"> 
        <div class="row col-xs-12 text-center txt-small">
            <button type="button" class="btn btn-green" id="send-invitation">Send Invitation</button>
        </div>
      </div>
    

    </div>
  </div>
</div><!-- end Invite Friends Modal -->