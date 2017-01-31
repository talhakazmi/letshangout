<?php
/*
* method for ajax call for updateing grid data on request
*/
class Grid extends CAction
{
    public function run($status)
    {
        
        /*
         * Thumbnail hover javascript load on ajax call
         */
        Yii::app()->clientScript->registerScript('thumbnail', "$('#hover-cap-4col .thumbnail').hover(
                                                    function(){
                                                        $(this).find('.caption').fadeIn(250); //.fadeIn(250)
                                                    },
                                                    function(){
                                                        $(this).find('.caption').fadeOut(250, function(){
                                                            $(this).clearQueue();
                                                        }); //.fadeOut(205)
                                                    }
                                                );");
        /*
         * Movie detail on more info click javascript load on ajax call
         */
        Yii::app()->clientScript->registerScript('more-info', "$('.more-info').on('click', function(){
                                                    $('#detailContainer').html('');
                                                    $.ajax({
                                                        url: baseUrl+'/movies/getdetail/itemId/'+this.id,
                                                        type: 'GET',
                                                        success: function (data){
                                                            $('#detailContainer').html(data);
                                                        }
                                                    });
                                                });");
        /*
         * Movie trailer on watch trailer click javascript load on ajax call
         */
        Yii::app()->clientScript->registerScript('watch-trailer', "$('.watch-trailer').on('click', function(){
                                                    $('#detailContainer').html('');
                                                    $.ajax({
                                                        url: baseUrl+'/movies/gettrailer/videoId/'+$(this).data('video'),
                                                        type: 'GET',
                                                        success: function (data){
                                                            $('#detailContainer').html(data);
                                                        }
                                                    });

                                                });");

        //Service url for movies data
        $data['url']    =   Yii::app()->params['apiUrl'].'api/items';
        //filter fro service to get filtered data from service on the base of city, item and status
        $data['get']    =   array('filter'=>'[{"property":"venue.city","value":"'.Yii::app()->session['city'].'","operator":"="},{"property":"venue.status","value":"public","operator":"="},{"property":"cat.title","value":"'.$this->getController()->category.'","operator":"="},{"property":"sessions.status","value":"'.$status.'","operator":"="}]');
        /*
         * Get http request from service end
         */
        $record =   $this->getController()->httpRequest($data);

        if($record['success'])
        {
            $movies   =   $record['data']['items'];
            for($count=0;$count<count($movies);$count++)
            {
                $imdb['url']    =   'http://www.omdbapi.com/';
                $imdb['get']    =   array('i'=>'','t'=> str_replace(' ', '+', $movies[$count]['title']));
                $movies[$count]['imdbData']    =   $this->getController()->httpRequest($imdb);
                //Render chunks partially and return back to ajax
                $this->getController()->renderPartial('list-item',array('movie'=>$movies[$count]), false, (($count == 0)?true:false));
            }
        }else{
            /*
             * Through exception in case of error from service
             */
            throw new CHttpException(404,'invalid request');
        }
                         
    }
}