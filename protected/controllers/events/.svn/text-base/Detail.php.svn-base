<?php
/*
* method for ajax call for more detail link to display detail information in an overlay
*/
class Detail extends CAction
{
    public function run($itemId)
    {
       
       //Service url for movies data
       $data['url']    =   Yii::app()->params['apiUrl']."api/sessions/$itemId";
       
       /*
        * Get http request from service end
        */
       $record =   $this->getController()->httpRequest($data);

       if($record['success'])
       {
           $session   =   $record['data']['sessions'];
           //Render chunks partially and return back to ajax
           
           $this->getController()->renderPartial('detail',array('session'=>$session), false, false);

       }else{
           /*
            * Through exception in case of error from service
            */
           throw new CHttpException(404,'invalid request');
       }
                         
    }
}