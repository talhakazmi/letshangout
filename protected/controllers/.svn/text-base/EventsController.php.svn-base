<?php

class EventsController extends Controller
{
	public $layout = 'events/content';
	public $category = 'events';
	public $limit = '3';
	public $imagePath = 'images/events/';
        public $PageSpecificMenu = array(
                                'normal'=>array(
                                ),
                                'responsive'=>array(                                        
                                )
                            );
        
        /*
         * Default action of Events page
         */
        public function actionIndex()
	{
            $baseUrl = Yii::app()->baseUrl; 
            /*
             * Inculde page specific JS and CSS
             */
            $includes = Yii::app()->getClientScript();
            //CSS inclusion
            $includes->registerCssFile($baseUrl.'/assets/css/events-page-style.css');
            //JS inculsion
            $includes->registerScriptFile($baseUrl.'/assets/js/app/events-onready.js');
            
            
            /*
             * Get city name form session form home page
             */
            $data['venue'] = Yii::app()->session['city'];//Yii::app()->getRequest()->getQuery('venue');
            $data['cat'] = $this->category;//Yii::app()->getRequest()->getQuery('cat');
              
            //Service url for movies data
            $data['url']    =   Yii::app()->params['apiUrl']."api/sessions?limit=".$this->limit."&offset=0";
            //filter fro service to get filtered data from service on the bas eof city and item category
            $data['get']['filter']    =   '[{"property":"venue.city","value":"'.$data['venue'].'","operator":"="},{"property":"itemCat.title","value":"'.$data['cat'].'","operator":"="},{"property":"status","value":"coming","operator":"="}]';
            $data['get']['sort']    =   '[{"property":"createdDate","direction":"DESC"}]';
            /*
             * Get http request from service end
             */
            $record =   $this->httpRequest($data);
            
            if($record['success'])
            {
                $events   =   $record['data']['sessions'];
            }else{
                $events   =   '';
            }
            
            $this->render('index', array('events'=>$events));
	}
        
        public function actions()
        {
            return array(
                'more'=>'application.controllers.events.ShowMore',
                'detail'=>'application.controllers.events.Detail',
                'create'=>'application.controllers.events.Create',
            );
        }
        
        
        public function actionCreateEventModal(){
            
            $includes = Yii::app()->getClientScript();
            $includes->registerScriptFile(Yii::app()->baseUrl.'/assets/js/lib/bootstrap-datetimepicker.js');
            /*
            * create event submit button click javascript load on ajax call
            */
            Yii::app()->clientScript->registerScript('image', "$('#image').on('change', function(){
                                                                    var oFReader = new FileReader();
                                                                    oFReader.readAsDataURL(document.getElementById('image').files[0]);
                                                                    oFReader.onload = function (oFREvent) {
                                                                        document.getElementById('uploadPreview').src = oFREvent.target.result;
                                                                    };
                                                                });", CClientScript::POS_LOAD);
            
            Yii::app()->clientScript->registerScript('', "var nowDate = new Date();
                                                          var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0); ", CClientScript::POS_LOAD);

            Yii::app()->clientScript->registerScript('startDate', "$('#startDate').datetimepicker({
                                                                        keepOpen: false,
                                                                        sideBySide: true,
                                                                        minDate : today
                                                                    }); ", CClientScript::POS_LOAD);
            
            Yii::app()->clientScript->registerScript('endDate', "$('#endDate').datetimepicker({
                                                                        keepOpen: false,
                                                                        sideBySide: true,
                                                                        minDate : today
                                                                    }); ", CClientScript::POS_LOAD);
            /*
            * create event submit button click javascript load on ajax call
            */
            Yii::app()->clientScript->registerScript('submitEvent', "$('#submitEvent').on('click',function(){
                                                                        var formData = new FormData($('form[id=createEventForm]')[0]);
                                                                        var loader = overlay('#detailContainer',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                                                                        $.ajax({
                                                                            url: 'events/create',
                                                                            type: 'POST',
                                                                            data: formData,
                                                                            processData: false,
                                                                            contentType: false,
                                                                            success: function (data){
                                                                                if(data)
                                                                                {
                                                                                   $('#hover-cap-4col').prepend(data);
                                                                                   $('.close').click();
                                                                                }
                                                                            }
                                                                        });
                                                                    });", CClientScript::POS_LOAD);
            
            $this->renderPartial('create',array(), false, true);
        }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}