<?php

class PlanController extends Controller
{

    public $layout = 'plan/content';
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
                'actions' => array('index', 'create', 'detail'),
                'users' => array('?'),
            ),
        );
    }

    // Uncomment the following methods and override them if needed


    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'detail' => 'application.controllers.plan.Detail',
        );
    }

    public function actionUpdateInviteStatus()
    {

        //Get inviteId
        $user['url'] = Yii::app()->params['apiUrl']."api/planinvites";
        //filter fro service to get filtered data from service on the bas of email from user
        $user['get'] = array('filter' => '[{"property":"planId","value":"' . $_GET['planId'] . '","operator":"="},{"property":"user.id","value":"' . Yii::app()->user->getId() . '","operator":"="}]');
        /*
         * Get http request from service end
         */
        $record = $this->httpRequest($user);

        if ($record['success'])
        {
            //update user code
            $userData['url'] = Yii::app()->params['apiUrl']."api/planinvites/" . $record['data']['planinvites'][0]['id'];

            $userData['post'][$_GET['type']] = $_GET['status'];
            $userData['method'] = 'put';
            /*
             * Get http request from service end
             */
            $rs = $this->httpRequest($userData);

            echo $rs['success'];
        }

        echo false;
    }
    
    public function actionUpdatePlanStatus()
    {

        //update user code
        $planData['url'] = Yii::app()->params['apiUrl']."api/plan/" . $_GET['planId'];

        $planData['post']['status'] = $_GET['status'];
        $planData['method'] = 'put';
        /*
         * Get http request from service end
         */
        $rs = $this->httpRequest($planData);
        
        if($rs['success'])
        {
            foreach($rs['data']['plan']['invited'] as $user)
            {
                //Create a new freind relation with user
                $emailData['url'] = Yii::app()->params['apiUrl']."api/user/sendemail";

                $emailData['post']['link'] = Yii::app()->getBaseUrl(true).'/plan/detail/id/'.$_GET['planId'];
                $emailData['post']['label'] = 'View plan detail';
                $emailData['post']['message'] = 'Plan status updated to '.ucfirst($_GET['status']);
                $emailData['post']['sender'] = ucfirst(Yii::app()->user->getState('name'));
                $emailData['post']['name'] = 'Guest';
                $emailData['post']['email'] = $user['email'];
                $emailData['post']['subject'] = 'Plan status updated';

                $send = $this->httpRequest($emailData);
                
                //Create a new notification
                $data['url'] = Yii::app()->params['apiUrl']."api/notifications";
                $data['post']['userId'] = $user['userId'];
                $data['post']['senderId'] = Yii::app()->user->getId();
                $data['post']['code'] = CJSON::encode(array('link'=>$emailData['post']['link'],'label'=>$rs['data']['plan']['title'].' status updated to '.ucfirst($_GET['status'])));

                $notification = $this->httpRequest($data);
                
                echo $notification['success'];
            }
        }
        //echo $rs['success'];
        
    }

    public function actionVoteSuggestion()
    {
        //GET USER VOTE HISTORY FOR THIS SUGGESTION
        $userVote['url'] = Yii::app()->params['apiUrl']."api/plansuggestionvote";
        //filter fro service to get filtered data from service on the bas of email from user
        $userVote['get'] = array('filter' => '[{"property":"userId","value":"' . $_GET['user'] . '","operator":"="},{"property":"planSuggestionsId","value":"' . $_GET['suggestion'] . '","operator":"="}]');

        $record = $this->httpRequest($userVote);

        if (!$record['success'])
        {
            //update user code
            $VoteData['url'] = Yii::app()->params['apiUrl']."api/plansuggestionvote";

            $VoteData['post']['userId'] = $_GET['user'];
            $VoteData['post']['planSuggestionsId'] = $_GET['suggestion'];
            $VoteData['post']['vote'] = '1';
            /*
             * Get http request from service end
             */
            $rs = $this->httpRequest($VoteData);
            echo $rs['success'];
        }
        else
        {
            $VoteData['url'] = Yii::app()->params['apiUrl']."api/plansuggestionvote/delete/" . $record['data']['plansuggestionvote'][0]['id'];

            $rs = $this->httpRequest($VoteData);
            echo 'downVote';
        }
    }

    /*
     * Default action of Movies page
     */

    public function actionCreate()
    {
        //Get user's ip address
        /*$ip = Yii::app()->request->getUserHostAddress();
        //get request for ip to location service
        $data['get'] = array('key' => 'jJf6q3fmpR7dctPG', 'qt' => 'geoip', 'd' => 'json', 'q' => '110.93.196.173'); //Egypt ip 196.218.110.195
        //url for requesting location via IP address
        $data['url'] = 'http://api.netimpact.com/qv1.php';
        //Http request for location
        $record = $this->httpRequest($data);

        Yii::app()->session['country'] = $record[0][2];
        Yii::app()->session['city'] = $record[0][0];*/

        $data['venue'] = Yii::app()->session['city'];
        $this->render('create');
    }

    public function actionSave()
    {
        $data   =   array();
        if (empty($_POST['title']))
        {
            $data   =   array('title'=>'This field is required');
        }
        
        if (empty($_POST['venue']))
        {
            $data   =   array('venue'=>'This field is required');
        }
        
        if (empty($_POST['startDate']))
        {
            $data   =   array('startDate'=>'This field is required');
        }
        
        if(!empty($data))
        {
            $this->render('create',$data);
            exit;
        }
        
        switch ($_POST['itemCategory'])
        {
            case 'movies':
                $postTitle  =   "Let's go for Movie";
                break;
            case 'event':
                $postTitle = "Let's go for Event";
                break;
            default:
                $postTitle = $_POST['title']; //custom
                break;
        }
        
        //Create a new plan
        $planData['url'] = Yii::app()->params['apiUrl']."api/plan";
        $planData['post']['userId'] = Yii::app()->user->getId();
        $planData['post']['title'] = $postTitle;
        $planData['post']['isSuggestion'] = intval(isset($_POST['canSuggest']));
        $planData['post']['isInvite'] = intval(isset($_POST['canInvite']));

        $plan = $this->httpRequest($planData);
        $planId = $plan['data']['plan']['id'];

        $this->addSuggestion($planId);
        $this->redirect(array('detail', 'id' => $planId));
    }

    public function actionSuggest()
    {
        if (empty($_POST['title']) || empty($_POST['venue']) || empty($_POST['startDate']))
        {
            echo 'Required fields missing';
            return;
        }

        $this->addSuggestion();
        $this->redirect(array('detail', 'id' => $_POST['planId']));
    }

    private function addSuggestion($planId = 0)
    {
        if ($planId > 0)
        {
            $isActive = 1;
        }
        else
        {
            $isActive = 0;
            $planId = $_POST['planId'];
        }

        $itemCat = $_POST['itemCategory'];
        $venueCat = 0;

        switch ($itemCat)
        {
            case 'coffee':
                $venueCat = 4; //restaurant
                $itemCat = 10; //coffee
                break;
            case 'movies':
                $venueCat = 1; //Cinema
                $itemCat = 4; //Movie
                break;
            case 'event':
                $venueCat = 7; //Custom
                $itemCat = 6; //event
                break;
            case 'lunch':
            case 'dinner':
                $venueCat = 4; //restaurant
                $itemCat = 5; //food
                break;
            case 'other':
                $venueCat = 7; //custom
                $itemCat = 9; //custom
                break;
        }

        if (0 < $_POST['sessionId'])
        {
            $sessionId = $_POST['sessionId'];
        }
        else
        {
            //Add Custom Venue
            $venueData['url'] = Yii::app()->params['apiUrl']."api/venue";
            $venueData['post']['title'] = $_POST['venue'];
            $venueData['post']['address'] = $_POST['venue'];
            $venueData['post']['city'] = YII::app()->session->get('city');
            $venueData['post']['country'] = Yii::app()->session->get('country');
            $venueData['post']['catId'] = $venueCat;
            $venueData['post']['userId'] = Yii::app()->user->getId();
            //$venueData['post']['status']     =   (isset($_POST['status']))?'public':'private';

            $venue = $this->httpRequest($venueData);

            //Add StateRoom
            $stateRoomData['url'] = Yii::app()->params['apiUrl']."api/stateroom";
            $stateRoomData['post']['title'] = 'Room';
            $stateRoomData['post']['venueId'] = $venue['data']['venue']['id'];

            $stateRoom = $this->httpRequest($stateRoomData);

            //Add Item
            $itemData['url'] = Yii::app()->params['apiUrl']."api/items/";
            $itemData['post']['title'] = $_POST['title'];
            $itemData['post']['description'] = (isset($_POST['description']) ? $_POST['description'] : '');
            $itemData['post']['catId'] = $itemCat; //custom

            $item = $this->httpRequest($itemData);

            //Add Session
            $sessionsData['url'] = Yii::app()->params['apiUrl']."api/sessions";
            $sessionsData['post']['itemId'] = $item['data']['items']['id'];
            $sessionsData['post']['stateRoomId'] = $stateRoom['data']['stateroom']['id'];
            $sessionsData['post']['startTime'] = date('Y-m-d', strtotime($_POST['startDate'])) . ' ' . date('h:i:s', strtotime($_POST['startDate']));
            $sessionsData['post']['description'] = (isset($_POST['description']) ? $_POST['description'] : '');
            $sessionsData['post']['userId'] = Yii::app()->user->getId();


            /*
             * Get http request from service end
             */
            $sessions = $this->httpRequest($sessionsData);
            $sessionId = $sessions['data']['sessions']['id'];
        }

        //Create a new plan suggestion
        $planSuggestionData['url'] = Yii::app()->params['apiUrl']."api/plansuggestions";
        $planSuggestionData['post']['userId'] = Yii::app()->user->getId();
        $planSuggestionData['post']['planId'] = $planId;
        $planSuggestionData['post']['sessionsId'] = $sessionId;
        $planSuggestionData['post']['isActive'] = $isActive;

        $planSuggestion = $this->httpRequest($planSuggestionData);
        
        //update user code
        $planData['url'] = Yii::app()->params['apiUrl']."api/plan/" . $planId;

        /*
         * Get http request from service end
         */
        $rs = $this->httpRequest($planData);
        
        if($rs['success'])
        {
            foreach($rs['data']['plan']['invited'] as $invitees)
            {
                if(Yii::app()->user->getId() != $invitees['userId'])
                {
                    //Create a new notification
                    $data['url'] = Yii::app()->params['apiUrl']."api/notifications";
                    $data['post']['userId'] = $invitees['userId'];
                    $data['post']['senderId'] = Yii::app()->user->getId();
                    $data['post']['code'] = CJSON::encode(array('link'=>Yii::app()->getBaseUrl(true).'/plan/detail/id/'.$planId,'label'=>ucfirst(Yii::app()->user->getState('name')) . ' suggest in  '.$rs['data']['plan']['title']));

                    $notification = $this->httpRequest($data);
                }
            }
            if(Yii::app()->user->getId() != $rs['data']['plan']['userId'])
            {
                //Create a new notification
                $data['url'] = Yii::app()->params['apiUrl']."api/notifications";
                $data['post']['userId'] = $rs['data']['plan']['userId'];
                $data['post']['senderId'] = Yii::app()->user->getId();
                $data['post']['code'] = CJSON::encode(array('link'=>Yii::app()->getBaseUrl(true).'/plan/detail/id/'.$planId,'label'=>ucfirst(Yii::app()->user->getState('name')) . ' suggest in  '.$rs['data']['plan']['title']));

                $notification = $this->httpRequest($data);
            }
        }
    }

    public function actionAutoComplete()
    {
        if ($_GET['term'] && $_GET['cat'] && $_GET['status'])
        {
            $data['url'] = Yii::app()->params['apiUrl'].'api/items/autocompleteitems';
            $data['get']['term'] = $_GET['term'];
            $data['get']['status'] = $_GET['status'];
            $data['get']['cat'] = $_GET['cat'];


            //$data['get']['filter'] = '[{"property":"sessions.status","value":"available","operator":"="},{"property":"cat.title","value":"' . ucfirst($_GET['itemCat']) . '","operator": "="},{"property":"title","value":"' . $_GET['term'] . '","operator": "LIKE"}]';

            $response = $this->httpRequest($data);
            /* foreach ($response['data']['items'] as $item)
              {
              $rs[]['id'] = $item['id'];
              $rs[]['value'] = $item['title'];
              } */
            echo CJSON::encode($response);
        }
    }

    public function actionFetchResults()
    {
        if ($_GET['cat'] && $_GET['status'])
        {
            $data['url'] = Yii::app()->params['apiUrl'].'api/items/fetchitems';           
            $data['get']['status'] = $_GET['status'];
            $data['get']['cat'] = $_GET['cat'];
            $data['get']['city'] = Yii::app()->session['city'];


            //$data['get']['filter'] = '[{"property":"sessions.status","value":"available","operator":"="},{"property":"cat.title","value":"' . ucfirst($_GET['itemCat']) . '","operator": "="},{"property":"title","value":"' . $_GET['term'] . '","operator": "LIKE"}]';

            $response = $this->httpRequest($data);
            /* foreach ($response['data']['items'] as $item)
              {
              $rs[]['id'] = $item['id'];
              $rs[]['value'] = $item['title'];
              } */
            echo CJSON::encode($response);
        }
    }

    public function actionFoursquarePlaces()
    {
        $places =   array();
        
        if(isset($_GET['intent']) || isset($_GET['categoryid'])){
            //$data['url'] = 'https://api.foursquare.com/v2/venues/search?client_id=13515JSC5UWIWUP1CHAL0NK24TEIASL0HJKUHICOQ3FRCA51&client_secret=FHL0H4H1GLJ3DAE40HZR34NUK55TNVFJGQRUJTQHF4NUP3JQ&v=20130815&near=' . Yii::app()->session['city'] . '&query=' . preg_replace('/\s/', '', $_GET['term'] . '&intent='. $_GET['intent'].'&categoryId='.$_GET['categoryid']);            
            $data['url'] = 'https://api.foursquare.com/v2/venues/search?client_id=13515JSC5UWIWUP1CHAL0NK24TEIASL0HJKUHICOQ3FRCA51&client_secret=FHL0H4H1GLJ3DAE40HZR34NUK55TNVFJGQRUJTQHF4NUP3JQ&v=20130815&near=' . Yii::app()->session['city'] . '&query=' . preg_replace('/\s/', '', $_GET['term'] . '&categoryId='.$_GET['categoryid']);            
        }else{
            $data['url'] = 'https://api.foursquare.com/v2/venues/search?client_id=13515JSC5UWIWUP1CHAL0NK24TEIASL0HJKUHICOQ3FRCA51&client_secret=FHL0H4H1GLJ3DAE40HZR34NUK55TNVFJGQRUJTQHF4NUP3JQ&v=20130815&near=' . Yii::app()->session['city'] . '&query=' . preg_replace('/\s/', '', $_GET['term']);
        }
        

        $response = $this->httpRequest($data);

        $count = 0;
        foreach ($response['response']['venues'] as $result)
        {
            $places[$count]['value'] = $result['name'] . (isset($result['location']['address']) ? ', ' . $result['location']['address'] : '');
            $places[$count]['label'] = $result['name'];
            $places[$count]['desc'] = (isset($result['location']['address']) ? $result['name'] . ', ' . $result['location']['address'] : '');
            $count++;
        }
        echo CJSON::encode($places);
    }

    // Author: Waqas Karim
    // Date: 2/10/2015
    // Description: Get all sessions againts itemid


    public function actionGetSessions()
    {
        if (isset($_GET['itemid']))
        {
            $data['url'] = Yii::app()->params['apiUrl'].'api/items/autocompletesessions';
            $data['get']['itemid'] = $_GET['itemid'];
            $response = $this->httpRequest($data);
            echo CJSON::encode($response);
        }
    }

    /*
      Author: Waqas Karim
      Date: 2/16/2015
      Description: User status udpate view

     */

    public function actionGetUserUpdateView()
    {
        if(isset($_GET['view']) && $_GET['view'] == 'user')
        {
            Yii::app()->clientScript->registerScript('updateUserStatus', "$('.updateStatusOptions li a').click(function(){ 
                                                                                        var newStatus  =   $(this).text();
                                                                                        $.ajax({
                                                                                                url: baseUrl+'/plan/updateinvitestatus',
                                                                                                type: 'get',
                                                                                                data: 'planId='+$('.plan-status').data('plan')+'&type='+$(this).data('type')+'&status='+$(this).data('status'),
                                                                                                success: function(data){
                                                                                                    if(data)
                                                                                                    {
                                                                                                        $('.updateStatusOptions').parents('li').find('a span').html('');
                                                                                                        $('.updateStatusOptions').parents('li').find('a span').html(newStatus);
                                                                                                        $('.popover').remove();
                                                                                                    }
                                                                                                }
                                                                                        });

                                                                                });");

            $this->renderPartial('updateuser_popover', array(), false, true);
        }
        else
        {
            Yii::app()->clientScript->registerScript('updateUserStatus', "$('.updatePlanOptions li a').click(function(){ 
                                                                                        var newStatus  =   $(this).text();
                                                                                        $.ajax({
                                                                                                url: baseUrl+'/plan/updateplanstatus',
                                                                                                type: 'get',
                                                                                                data: 'planId='+$('.planState').data('plan')+'&status='+$(this).data('status'),
                                                                                                success: function(data){
                                                                                                    if(data)
                                                                                                    {
                                                                                                        $('.planState').find('span').html('');
                                                                                                        $('.planState').find('span').html(newStatus);
                                                                                                        $('.popover').remove();
                                                                                                    }
                                                                                                }
                                                                                        });

                                                                                });");

            $this->renderPartial('updateplan_popover', array(), false, true);
        }
    }


    /*
        Author: Waqas Karim
        CreatedDate: 2/26/2015
        Method: GetNotifications , GetNotiCount
        Access URI: letshangout.com/plan/getnotifications
        Description: Get all notification against logged in user and getNoticount for notification count
     */
    
    public function actionGetNotifications()
    {
        //update notification status
        $user['url'] = Yii::app()->params['apiUrl']."api/notifications";
        //column to be updated in notifications table
        $user['get']['filter'] = '[{"property":"userId","value":"' . Yii::app()->user->getId() . '","operator":"="},{"property":"isActive","value":"1","operator":"="}]';
        /*
         * Get http request from service end
         */
        $record = $this->httpRequest($user);
        echo CJSON::encode($record['data']['notifications']);
    }

    public function actionGetNotiCount()
    {
        //update notification status
        $user['url'] = Yii::app()->params['apiUrl']."api/notifications/";
        //column to be updated in notifications table
        $user['get']['filter'] = '[{"property":"userId","value":"' . Yii::app()->user->getId() . '","operator":"="},{"property":"isActive","value":"1","operator":"="}]';
        /*
         * Get http request from service end
         */
        $record = $this->httpRequest($user);
        echo $record['data']['totalCount'];
    }

    public function actionUpdateNotificationStatus()
    {
        //update notification status
        $user['url'] = Yii::app()->params['apiUrl']."api/notifications/".$_POST['id'];
        //column to be updated in notifications table
        $user['post']['isActive'] = '0';
        $user['method'] =   'put';
        /*
         * Get http request from service end
         */
        $record = $this->httpRequest($user);
        
        echo $record['success'];
    }

    public function actionEmailInvite()
    {
        if( Yii::app()->request->isAjaxRequest) {
            $emails =   explode(',', $_POST['emails']);
            
            //Invite friend internal/external
            $userData['url']    =   Yii::app()->params['apiUrl']."api/planinvites/friends";
            //friends email address and user id and plan id in which they should be added
            $userData['post']['emails']    =   $_POST['emails'];
            $userData['post']['userId']    =   Yii::app()->user->getId();
            $userData['post']['planId']    =   $_POST['planId'];
            /*
            * Get http request from service end
            */
            $response =   $this->httpRequest($userData);
            echo ($response['success'])?1:0;
        }
    }

    public function actionSelectSuggestion()
    {
        if (isset($_POST['suggestionId']))
        {
            $data['url'] = Yii::app()->params['apiUrl'].'api/plansuggestions/'.$_POST['suggestionId'];           
            $data['post']['isActive'] = ($_POST['status'] == 'true')?'1':'0';
            $data['method'] = 'put';

            $response = $this->httpRequest($data);
            
            echo ($response['success'])?1:0;
        }
    }
}