<div class="container events">
        <div class="row">
                <h3 class="heading-large-light-35">Upcoming Events</h3>

                <ul class="thumbnails" id="hover-cap-4col">
                    <?php 
                        if(!empty($events)):
                            foreach($events as $event):

                                $this->renderPartial('list-item',array('event'=>$event), false, false);
                                $offset =   $event['id'];
                            endforeach; 
                        else:
                            echo 'No up coming events';
                        endif;
                    ?>
                </ul>
        </div>
        <?php if(!empty($events)): ?>
        <div class="row show-more">
                <a href="javascript:void(0);" id="moreEvents" data-index="<?php echo $offset;?>" >Show More</a>
        </div>
        <?php endif; ?>
</div>