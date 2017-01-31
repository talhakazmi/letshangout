<?php
/*
* method for ajax call for created event via ajax
*/
class Create extends CAction
{
    
    public function run()
    {
        if( Yii::app()->request->isAjaxRequest) {
            
            //Add Custom Venue
            $userData['url']    =   Yii::app()->params['apiUrl']."api/user";
            
            $userData['post']['name']               =   isset($_POST['name'])?$_POST['name']:'';
            $userData['post']['email']              =   $_POST['email'];
            $userData['post']['password']           =   md5($_POST['password']);
            $userData['post']['code']               =   md5($_POST['email']);
            $userData['post']['repeat_password']    =   md5($_POST['confirm']);
            
            /*
             * http request from service end
             */
            $user =   $this->getController()->httpRequest($userData);
            
            if($user['success'])
            {
                $identity=new UserIdentity($_POST['email'],md5($_POST['password']));
                $identity->authenticate();
                //$isUser=$identity->authenticate();
                $duration=0;
                Yii::app()->user->login($identity,$duration);
                Yii::app()->user->setFlash('success', "Welcome user, Kindly check your inbox and verify your account.");
                echo Yii::app()->user->returnUrl;
                exit;
            }
            else
            {
                $errorMessage    =   CJSON::decode($user['message']);
                
                if(isset($errorMessage['email']) && $errorMessage['email'][0] == 'This Email is already in use')
                {
                    //Get user
                    $isUserData['url']    =   Yii::app()->params['apiUrl']."api/user";
                    //filter fro service to get filtered data from service on the bas of email from user
                    $isUserData['get']    =   array('filter'=>'[{"property":"email","value":"'.$_POST['email'].'","operator":"="}]');
                    /*
                    * Get http request from service end
                    */
                    $record =   $this->getController()->httpRequest($isUserData);

                    if(isset($record['data']['user'][0]['name']) && $record['data']['user'][0]['name'] == 'Guest')
                    {
                        $userData['url']    =   Yii::app()->params['apiUrl']."api/user/".$record['data']['user'][0]['id'];

                        $userData['post']['name']       =   isset($_POST['name'])?$_POST['name']:'';
                        $userData['post']['password']   =   md5($_POST['password']);
                        $userData['post']['code']       =   md5($_POST['email']);
                        $userData['method']             =   'put';

                        /*
                         * http request from service end
                         */
                        $user =   $this->getController()->httpRequest($userData);

                        if($user['success'])
                        {
                            $identity=new UserIdentity($_POST['email'],md5($_POST['password']));
                            $identity->authenticate();
                            //$isUser=$identity->authenticate();
                            $duration=0;
                            Yii::app()->user->login($identity,$duration);
                            Yii::app()->user->setFlash('success', "Welcome user, Kindly check your inbox and verify your account.");
                            //send email
                            $emailData['url'] = Yii::app()->params['apiUrl']."api/user/sendemail";

                            $emailData['post']['link'] = Yii::app()->getBaseUrl(true).'/user/activateuser/code/'.md5($_POST['email']);
                            $emailData['post']['label'] = 'Verify email';
                            $emailData['post']['message'] = 'Welcome to Let`s Hanout, the one place to create Plans.';
                            $emailData['post']['sender'] = 'Team Let`s Hangout';
                            $emailData['post']['name'] = isset($_POST['name'])?$_POST['name']:'Guest';
                            $emailData['post']['email'] = $_POST['email'];
                            $emailData['post']['subject'] = 'Welcome to LetsHangout';

                            $send = $this->getController()->httpRequest($emailData);
                            
                            echo Yii::app()->user->returnUrl;
                            exit;
                        }
                    }
                }
            }
            echo Yii::app()->createUrl('user/register?error='.  CJSON::encode($user));
            exit;
        }else{
            /*
            * Through exception in case of error from service
            */
            throw new CHttpException(404,'invalid request');
        }
    }
}