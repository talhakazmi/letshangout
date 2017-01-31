<?php
/*
* method for ajax call for more detail link to display detail information in an overlay
*/
class Detail extends CAction
{
    public function run($itemId)
    {
        
        /*
        * Movie trailer on watch trailer click javascript load on ajax call
        */
       Yii::app()->clientScript->registerScript('venue', "$('.venue').on('click', function(){
                                                               $('.venue').removeClass('selected');
                                                               $(this).addClass('selected');
                                                               $('.slots-list').html('');   
                                                               $.ajax({
                                                                       url: baseUrl+'/movies/getsessions/venueId/'+this.id+'/itemId/".$itemId."',
                                                                       type: 'GET',
                                                                       success: function (data){
                                                                           $('.slots-list').html(data);
                                                                       },
                                                                       error: function(error){
                                                                           $('.slots-list').html('No data Availbale');
                                                                       }
                                                                   });
                                                               });");

       /*
        * Movie trailer on watch trailer click javascript load on ajax call
        */
       Yii::app()->clientScript->registerScript('venue', "$.ajax({
                                                                       url: baseUrl+'/movies/getsessions/venueId/'+$('ul > li > a.selected').attr('id')+'/itemId/".$itemId."',
                                                                       type: 'GET',
                                                                       success: function (data){
                                                                           $('.slots-list').html(data);
                                                                       },
                                                                       error: function(error){
                                                                           $('.slots-list').html('No data Availbale');
                                                                       }
                                                                   });
                                                               ", CClientScript::POS_LOAD);

       //Service url for movies data
       $data['url']    =   Yii::app()->params['apiUrl']."api/items/$itemId";

       /*
        * Get http request from service end
        */
       $record =   $this->getController()->httpRequest($data);

       if($record['success'])
       {
           $movie   =   $record['data']['items'];

           $imdb['url']    =   'http://www.omdbapi.com/';
           $imdb['get']    =   array('i'=>'','t'=> str_replace(' ', '+', $movie['title']));
           $movie['imdbData']    =   $this->getController()->httpRequest($imdb);
           //Render chunks partially and return back to ajax
           $this->getController()->renderPartial('detail',array('movie'=>$movie), false, true);

       }else{
           /*
            * Through exception in case of error from service
            */
           throw new CHttpException(404,'invalid request');
       }
                         
    }
}