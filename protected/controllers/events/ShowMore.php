<?php

class ShowMore extends CAction
{
    public function run($offset)
    {
        /*
        * Event detail ajax call on clicking title of event 
        */
       Yii::app()->clientScript->registerScript('eventDetail', "$('.eventDetail').on('click',function(){
                                                                    $('#detailContainer').html('');
                                                                    $.ajax({
                                                                        url: 'events/detail/itemId/'+$(this).data('id'),
                                                                        type: 'GET',
                                                                        success: function (data){
                                                                            $('#detailContainer').html(data);
                                                                        }
                                                                    });
                                                                }); ", CClientScript::POS_LOAD);
        
        //Service url for movies data
        $data['url']    =   Yii::app()->params['apiUrl']."api/sessions?limit=".$this->getController()->limit;
        //filter fro service to get filtered data from service on the bas eof city and item category
        $data['get']    =   array(
                                    'filter'=>'[{"property":"venue.city","value":"'.Yii::app()->session['city'].'","operator":"="},{"property":"itemCat.title","value":"'.$this->getController()->category.'","operator":"="},{"property":"status","value":"coming","operator":"="},{"property":"id","value":'.$offset.',"operator":"<"}]',
                                    //'sort'=>'[{"property":"createdDate","direction":"DESC"}]'
                                );
        /*
         * Get http request from service end
         */
        $record =   $this->getController()->httpRequest($data);

        if($record['success'])
        {
            $events   =   $record['data']['sessions'];
        }else{
            /*
             * Through exception in case of error from service
             */
            throw new CHttpException(404,'invalid request');
        }
        $viewCount = 1;
        foreach($events as $event){
            $this->getController()->renderPartial('list-item',array('event'=>$event), false, (($viewCount == 1)?true:false));
            $viewCount++;
        }
                                 
    }
}