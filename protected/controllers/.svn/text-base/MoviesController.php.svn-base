<?php

class MoviesController extends Controller
{
	public $layout = 'movies/content';
	public $category = 'movies';
	public $imagePath = 'images/movies/';
        public $PageSpecificMenu = '';
        /*
         * Default action of Movies page
         */
        public function actionIndex()
	{
            $baseUrl = Yii::app()->baseUrl; 
            /*
             * Inculde page specific JS and CSS
             */
            $includes = Yii::app()->getClientScript();
            //CSS inclusion
            $includes->registerCssFile($baseUrl.'/assets/css/full-slider.css');
            $includes->registerCssFile($baseUrl.'/assets/css/movie-page-style.css');
            //JS inculsion
            $includes->registerScriptFile($baseUrl.'/assets/js/app/movies-onready.js');
            
            
            
            /*
             * Get city name form session form home page
             */
            $data['venue'] = Yii::app()->session['city'];//Yii::app()->getRequest()->getQuery('venue');
            $data['cat'] = $this->category;//Yii::app()->getRequest()->getQuery('cat');
            
            //Load slider data from actionSilder
            $sliderMovies=$this->actionSlider($data);
            
            //Load now showing grid data
            $showingMovies=$this->actionNowShowingGrid($data);
            //$this->layout='column2';
            
            $this->render('index',array('nowShowing'=>$showingMovies,'sliderMovies'=>$sliderMovies));
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

        
        /*
         * Method for fecthing data of movies for grid
         */
        public function actionNowShowingGrid($data)
        {
            
            //Service url for movies data
            $data['url']    =   Yii::app()->params['apiUrl'].'api/items';
            //filter fro service to get filtered data from service on the bas eof city and item category
            $data['get']    =   array('filter'=>'[{"property":"venue.city","value":"'.$data['venue'].'","operator":"="},{"property":"venue.status","value":"public","operator":"="},{"property":"cat.title","value":"'.$data['cat'].'","operator":"="},{"property":"sessions.status","value":"available","operator":"="}]');
            /*
             * Get http request from service end
             */
            $record =   $this->httpRequest($data);
            
            if($record['success'])
            {
                return $movies   =   $record['data']['items'];
            }else{
                /*
                 * Through exception in case of error from service
                 */
                throw new CHttpException(404,'invalid request');
            }
        }
        
        /*
         * Method for fecthing data of movies for slider
         */
        public function actionSlider($data)
        {
            
            //Service url for movies data
            $data['url']    =   Yii::app()->params['apiUrl'].'api/items';
            //filter fro service to get filtered data from service on the bas eof city and item category
            $data['get']    =   array('filter'=>'[{"property":"venue.city","value":"'.$data['venue'].'","operator":"="},{"property":"venue.status","value":"public","operator":"="},{"property":"cat.title","value":"'.$data['cat'].'","operator":"="},{"property":"sessions.status","value":["available", "coming"],"operator":"in"}]');
            /*
             * Get http request from service end
             */
            $record =   $this->httpRequest($data);
            
            if($record['success'])
            {
                return $movies   =   $record['data']['items'];
            }else{
                /*
                 * Through exception in case of error from service
                 */
                throw new CHttpException(404,'invalid request');
            }
        }
        
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'updategrid'=>'application.controllers.movies.Grid',
                        'getdetail'=>'application.controllers.movies.Detail',
                        'getsessions'=>'application.controllers.movies.Sessions',
                        'gettrailer'=>'application.controllers.movies.Trailer',
		);
	}
        
}