<?php
/*
* method for ajax call for movie trailer link to display trailer on an overlay
*/
class Trailer extends CAction
{
    public function run($videoId)
    {
        
        if($videoId)
        {
            //Render chunks partially and return back to ajax
            $this->getController()->renderPartial('embed-player',array('videoId'=>$videoId), false, true);

        }else{
            /*
             * Through exception in case of error from service
             */
            throw new CHttpException(404,'invalid request');
        }

    }
}