<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
        private $_id;
	public function authenticate()
	{
                
                /*
                 * http request from service end
                 */
		Yii::import('ext.EHttpClient.*');
            
                $client = new EHttpClient(Yii::app()->params['apiUrl']."api/user", array(
                    'maxredirects' => 0,
                    'timeout'      => 30));

                $client->setHeaders('Accept', 'application/json');

                //requets header with username and password
                $client->setHeaders('X-REST-USERNAME', 'admin@letshangout');
                $client->setHeaders('X-REST-PASSWORD', 'admin@Access');


                $client->setParameterGet(array('filter'=>'[{"property":"email","value":"'.$this->username.'","operator":"="},{"property":"password","value":"'.$this->password.'","operator":"="}]'));


                $response = $client->request();
                $users = CJSON::decode($response->getBody());
                
                if(!$users['success'])
                {
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                    return $this->errorCode;
                }
		else
                {
                    $this->errorCode=self::ERROR_NONE;
                }
                
                $this->_id=$users['data']['user'][0]['id'];
                $this->setState('email', $users['data']['user'][0]['email']);
                $this->setState('name', $users['data']['user'][0]['name']);
                //$this->setState('notificationCount', count($users['data']['user'][0]['notifications']));
                //$this->setState('notifications', $users['data']['user'][0]['notifications']);
                
		return $this->errorCode;
	}
        
        public function getId()
        {
            return $this->_id;
        }
}