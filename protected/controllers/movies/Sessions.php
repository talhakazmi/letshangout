<?php
/*
* method for ajax call for available sessions link to display sessions information over existing overlay
*/
class Sessions extends CAction
{
    public function run($venueId,$itemId)
    {
        
        //Service url for movies data
        $data['url']    =   Yii::app()->params['apiUrl'].'api/sessions/';

        //filter fro service to get filtered data from service on the base of city, item and status
        $data['get']    =   array(
                                'filter'=>'[{"property":"itemId","value":"'.$itemId.'","operator":"="},{"property":"venue.id","value":"'.$venueId.'","operator": "="},{"property":"startTime","value":"'.time().'","operator": ">="},{"property":"access","value":"public","operator": "="}]',
                                //'sort'=>'[{"property":"startTime", "direction":"ASC"}]'
                                );

        /*
         * Get http request from service end
         */
        $record =   $this->getController()->httpRequest($data);

        if($record['success'])
        {
            $sessions   =   $record['data']['sessions'];

            //Render chunks partially and return back to ajax
            foreach($sessions as $session){
                $session['date']    =   date('Y-m-d',strtotime($session['startTime']));
                $session['time']    =   date('h:i:s',strtotime($session['startTime']));
                        
                $availableSessions[$session['date']][] =   $session['time'];
            }
            foreach($availableSessions as $date=>$time){
                $this->getController()->renderPartial('sessions-list',array('sessionDate'=>$date,'sessionTimes'=>$time), false, true);
            }

        }else{
            /*
             * Through exception in case of error from service
             */
            throw new CHttpException(404,'invalid request');
        }
                         
    }
}