<?php

class UserController extends Controller
{
	public $layout = 'user/content';
        public $PageSpecificMenu = '';
        
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
                array('deny',
                    'actions'=>array('dashboard'),
                    'users'=>array('?'),
                ),
                array('deny',
                    'actions'=>array('login','signin','register','forgotpassword','resetpassword'),
                    'users'=>array('@'),
                ),
            );
        }
        
        /*
	 * Default action of User page
	 */
	public function actionIndex()
	{
		//Render chunks partially and return back to ajax
		//$this->renderPartial('signin',array(), false, false);
       
	}

	/*
	*	Method for loading sign in form on ajax call via button from header
	*/
	public function actionSignIn()
	{
            $baseUrl = Yii::app()->baseUrl; 
            /*
             * Inculde page specific JS and CSS
             */
            $includes = Yii::app()->getClientScript();
            
            //JS inculsion
            $includes->registerScriptFile($baseUrl.'/assets/js/facebook.js');
            
            /*
            * Signup submit button click javascript load on ajax call
            */
            
           /* Yii::app()->clientScript->registerScript('facebook-jssdk', "if(document.getElementById(\"facebook-jssdk\")){ //if set, reset
                                                                            //removes the <script>
                                                                            document.head.removeChild(document.getElementById(\"facebook-jssdk\")); 
                                                                            window.FB=null; //unloads the APIs
                                                                            loaded=null; 
                                                                        }", CClientScript::POS_END);   
            */
            Yii::app()->clientScript->registerScript('signupSubmit', "$('#signinSubmit').click(function(){
                        var formData = new FormData($('form[id=signinForm]')[0]);
                        var loader = overlay('#detailContainer',{style:'width:100%; position:absolute; top:0px; left:0px;'});

                        $.validate({
                            form : '#signinForm',                                   
                            onError: function(){
                                removeOverlay();
                            },
                            onSuccess: function(){  
                                $.ajax({
                                        url: baseUrl+'/user/signinuser',
                                        type: 'POST',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function (data){
                                            //$('.close').click();
                                            window.location  =   ((data=='/')?baseUrl+'/user/dashboard':data);
                                        }
                                    });// End Ajax Call
                                },
                                language : {
                                    requiredFields : 'This field is required'
                                }  
                            });// validation end

                            });//end signin button event", CClientScript::POS_END);
           
            //Render chunks partially and return back to ajax
            $this->renderPartial('signin',array(), false, true);
	}
	
	/*
	*	Method for loading sign up form on ajax call via button from header
	*/
	public function actionSignUp()
	{
            /*
            * Signup submit button click javascript load on ajax call
            */
            Yii::app()->clientScript->registerScript('signupSubmit', "$('#signupSubmit').on('click',function(){   
                                        var formData = new FormData($('form[id=signupForm]')[0]);
                                        var loader = overlay('#detailContainer',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                                            $.validate({
                                                        form : '#signupForm',                                   
                                                        onError: function(){
                                                            removeOverlay();
                                                        },
                                                        onSuccess: function(){                                         
                                                            
                                                                  $.ajax({
                                                                    url: baseUrl+'/user/create',
                                                                    type: 'POST',
                                                                    data: formData,
                                                                    processData: false,
                                                                    contentType: false,
                                                                    beforeSend : function(){
                                                                       
                                                                    },
                                                                    success: function (data){
                                                                           window.location = ((data=='/')?baseUrl+'/user/dashboard':data);
                                                                        }
                                                                    });
                                                           
                                                            
                                                        },
                                                        language : {
                                                            requiredFields : 'This field is required'
                                                        }               
                                                  }); // validation
                                            }); //#signupSubmit", CClientScript::POS_END);
            //Render chunks partially and return back to ajax
            $this->renderPartial('signup',array(), false, true);
	}
        
        public function actions()
        {
            return array(
                'create'=>'application.controllers.user.Create',
                'dashboard'=>'application.controllers.user.Dashboard',
                'login'=>'application.controllers.user.Login',
                'register'=>'application.controllers.user.Register'
            );
        }
        
        public function actionSignInUser(){
            if( Yii::app()->request->isAjaxRequest) {
                
                
                $identity=new UserIdentity($_POST['email'],md5($_POST['password']));
                $isUser=$identity->authenticate();
                
                if($isUser)
                {
                    echo Yii::app()->createUrl('user/login?error=invalid_credentials');
                    exit;
                }
                else
                {
                    $duration=isset($_POST['remember']) ? 3600*24*30 : 0; // 30 days
                    Yii::app()->user->login($identity,$duration);
                    echo Yii::app()->user->returnUrl;
                    exit;
                }
            }
            echo false;
        }
        
        public function actionFacebookUserSignIn(){
            if( Yii::app()->request->isAjaxRequest) {
                
                if(!isset($_POST['email']))
                {
                    $_POST['email'] =   $_POST['id'];
                }
                
                //Add Custom Venue
                $userData['url']    =   Yii::app()->params['apiUrl']."api/user";
                //filter fro service to get filtered data from service on the bas of email from user
                $userData['get']    =   array('filter'=>'[{"property":"email","value":"'.$_POST['email'].'","operator":"="}]');
                /*
                * Get http request from service end
                */
                $record =   $this->httpRequest($userData);
                
                if($record['success'])
                {
                    if($record['data']['user'][0]['isActive'] == 0)
                    {
                        //update user code
                        $userData['url']    =   Yii::app()->params['apiUrl']."api/user/".$record['data']['user'][0]['id'];
                        //filter fro service to get filtered data from service on the bas of email from user
                        $userData['post']['code']       =   '';
                        $userData['post']['isActive']   =   1;
                        $userData['method']             =   'put';
                        /*
                        * Get http request from service end
                        */
                        $rs =   $this->httpRequest($userData);
                    }
                    
                    $identity=new UserIdentity($record['data']['user'][0]['email'],$record['data']['user'][0]['password']);
                    $identity->authenticate();
                    $duration=isset($_POST['remember']) ? 3600*24*30 : 0; // 30 days
                    Yii::app()->user->login($identity,$duration);
                    echo Yii::app()->user->returnUrl;
                    exit;
                }
                else
                {
                    $password   =   mt_rand(5, 15);
                    //Add user
                    $userData['url']    =   Yii::app()->params['apiUrl']."api/user";
                    $userData['post']['email']      =   $_POST['email'];
                    $userData['post']['isActive']   =   1;
                    $userData['post']['password']   =   md5($password);
                    $userData['post']['repeat_password']   =   md5($password);
                    $userData['post']['name']       =   (isset($_POST['name'])?$_POST['name']:'');
                    /*
                     * http request from service end
                     */
                    $user =   $this->httpRequest($userData);
                    
                    $identity=new UserIdentity($_POST['email'],md5($password));
                    $identity->authenticate();
                    $duration=0;
                    Yii::app()->user->login($identity,$duration);
                    echo Yii::app()->user->returnUrl;
                    exit;                    
                }
                echo true;
            }
        }
        
        public function actionActivateUser(){
            
            if(isset($_GET['code']))
            {
               //Get user
               $user['url']    =   Yii::app()->params['apiUrl']."api/user";
               //filter fro service to get filtered data from service on the bas of email from user
               $user['get']    =   array('filter'=>'[{"property":"code","value":"'.$_GET['code'].'","operator":"="}]');
               /*
               * Get http request from service end
               */
               $record =   $this->httpRequest($user);
               if($record['success'])
               {
                    //update user code
                    $userData['url']    =   Yii::app()->params['apiUrl']."api/user/".$record['data']['user'][0]['id'];
                    //filter fro service to get filtered data from service on the bas of email from user
                    $userData['post']['code']       =   '';
                    $userData['post']['isActive']   =   1;
                    $userData['method']             =   'put';
                    /*
                    * Get http request from service end
                    */
                    $rs =   $this->httpRequest($userData);
                    
                    if($rs['success'])
                    {
                        Yii::app()->user->setFlash('success', "User is activated");
                        $this->redirect('/');
                    }else{
                        Yii::app()->user->setFlash('notice', "Sorry for inconvinence, Try again.");
                        $this->redirect('/');
                    }
               }else{
                    Yii::app()->user->setFlash('notice', "Invalid Code.");
                    $this->redirect('/');
               } 
            }
            else {
                Yii::app()->user->setFlash('error', "Code is missing.");
                $this->redirect('/');
            }
        }
        
        public function actionLogout(){
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

        public function actionSetUserLocation(){
            unset(Yii::app()->session['location']);
            if(isset($_GET['location_update'])){
               Yii::app()->session['country']  =   $_GET['country'];
               Yii::app()->session['city']     =   $_GET['city']; 
               Yii::app()->session['location'] =   true;
               echo true;
            }
        }
        
        public function actionForgotPassword()
        {
            $data   =   array();
            if(isset($_POST['submit']))
            {
                
                //Get user
                $user['url']    =   Yii::app()->params['apiUrl']."api/user";
                //filter fro service to get filtered data from service on the bas of email from user
                $user['get']    =   array('filter'=>'[{"property":"email","value":"'.$_POST['email'].'","operator":"="}]');
                /*
                * Get http request from service end
                */
                $record =   $this->httpRequest($user);
                
                if($record['success'])
                {
                    //Create a new freind relation with user
                    $emailData['url'] = Yii::app()->params['apiUrl']."api/user/sendemail";

                    $emailData['post']['link'] = Yii::app()->getBaseUrl(true).'/user/resetpassword/code/'.md5($_POST['email']);
                    $emailData['post']['label'] = 'Reset Password';
                    $emailData['post']['message'] = 'You have requested to reset your password, kindly click on the following link';
                    $emailData['post']['sender'] = 'Team Letshangout';
                    $emailData['post']['name'] = $record['data']['user'][0]['name'];
                    $emailData['post']['email'] = $_POST['email'];
                    $emailData['post']['subject'] = 'Reset Password';

                    $send = $this->httpRequest($emailData);
                    
                    //Get user
                    $updateUser['url']    =   Yii::app()->params['apiUrl']."api/user/".$record['data']['user'][0]['id'];
                    //filter fro service to get filtered data from service on the bas of email from user
                    $updateUser['post']['code']    =   md5($_POST['email']);
                    $updateUser['method']   =   'put';
                    /*
                    * Get http request from service end
                    */
                    
                    $updatedRecord =   $this->httpRequest($updateUser);
                    
                    Yii::app()->user->setFlash('success', "Kindly check your inbox");
                    
                    $this->redirect('login');
                }
                else
                {
                    $data   =   array('error'=>'Email address not found');
                }
            }
            //Render html
            $this->render('forgot-password',$data);
        }
        
        public function actionResetPassword()
        {
            if(isset($_POST['submit']) && isset($_POST['code']))
            {
                if(!isset($_POST['password']))
                {
                    $data   =   array('error'=>'Please provide password');
                }
                elseif(!isset($_POST['cpassword']))
                {
                    $data   =   array('error'=>'Please provide confirm password');
                }
                elseif($_POST['password'] != $_POST['cpassword'])
                {
                    $data   =   array('error'=>'Password dosen\'t match with confirm password');
                }
                else 
                {
                    //Get user
                    $updateUser['url']    =   Yii::app()->params['apiUrl']."api/user/".$_POST['id'];
                    //filter fro service to get filtered data from service on the bas of email from user
                    $updateUser['post']['password']    =   md5($_POST['password']);
                    $updateUser['method']   =   'put';
                    /*
                    * Get http request from service end
                    */
                    
                    $updatedRecord =   $this->httpRequest($updateUser);
                    
                    if($updatedRecord['success'])
                    {
                        Yii::app()->user->setFlash('success', "Kindly login to the application");
                        $this->redirect('login');
                    }
                }
                
            }

            if(isset($_GET['code']))
            {
                $code   =   $_GET['code'];
            }
            elseif(isset($_POST['code']))
            {
                $code   =   $_POST['code'];
            }
            else
            {
                $data['error']  =   'Provided code is invalid try again.';
            }
            
            //Get user
            $user['url']    =   Yii::app()->params['apiUrl']."api/user";
            //filter fro service to get filtered data from service on the bas of email from user
            $user['get']    =   array('filter'=>'[{"property":"code","value":"'.$code.'","operator":"="}]');
            /*
            * Get http request from service end
            */
            $record =   $this->httpRequest($user);

            
            if($record['success'])
            {
                $data['code']   =   $code;
                $data['id']   =   $record['data']['user'][0]['id'];
            }
            else 
            {
                $data['error']  =   'Code dosen\'t match with any profile.';
            }
            
            $this->render('reset-password',$data);
        }
}