<?php

class HomeController extends Controller
{
	public $layout  =   'landingPage/content';
        public $PageSpecificMenu = array(
                                'normal'=>array(
                                ),
                                'responsive'=>array(
                                )
                            );
        
        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
        
        public function accessRules()
        {
            return array(
                array('allow',
                    'actions'=>array('index'),
                    'users'=>array('?'),
                ),
                array('deny',
                    'actions'=>array('index'),
                    'users'=>array('@'),
                    'deniedCallback' => function() {Yii::app()->controller->redirect(array ('user/dashboard'));},
                ),
            );
        }
        
        /**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
            $this->layout  =   'user/content';
            if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
        /*
         * Default action of landing page
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
            $includes->registerCssFile($baseUrl.'/assets/css/landing-page-style.css');
            $includes->registerScriptFile($baseUrl.'/assets/js/app/landing-onready.js');
            $this->render('index');
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

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
        
        public function actionLogin()
        {
            $data['url']    =   Yii::app()->params['apiUrl'].'api/user';
            
            $data['get']   =   array('filter'=>'[{"property":"email","value":"'.Yii::app()->getRequest()->getQuery('email').'","operator":"="},{"property":"password","value":"'.Yii::app()->getRequest()->getQuery('password').'","operator":"="}]');
            
            $record =   $this->httpRequest($data);
            
            if($record['success'])
            {
                $user   =   $result['data']['user'];
            }else{
                throw new CHttpException(404,'invalid request');
            }
        }
        
        /*
         * Action for early access email collection
         */
        /*public function actionEarlyAccess()
        {
            if(Yii::app()->request->getPost('email') != null)
            {
                $data['url']    =   Yii::app()->params['apiUrl'].'api/earlyAccessList/earlyaccess/';

                $data['get']   =   array('param1'=>Yii::app()->request->getPost('email'));

                $data['header']['X-REST-USERNAME']  =   'admin@letshangout';
                $data['header']['X-REST-PASSWORD']  =   'admin@Access';

                $record =   $this->httpRequest($data);
                
                if($record)
                {
                    Yii::app()->user->setFlash('success', "Data saved!");
                }else{
                    Yii::app()->user->setFlash('notice', "Data ignored.");
                }
                
                //Render chunks partially and return back to ajax
                $this->renderPartial('//messages/flashMessages', false, false);
            }
        }*/

        public function actionPage() {
                $this->layout  =   'user/content';
                $page = $_GET['view'];
                if(empty($page))
                    $this->actionIndex();                
                else
                    $this->render('pages/'.$page);
        }
       
}