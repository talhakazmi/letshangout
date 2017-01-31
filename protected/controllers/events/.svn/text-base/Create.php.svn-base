<?php
/*
* method for ajax call for created event via ajax
*/
class Create extends CAction
{
    public $venueCategoryId = 7; //Custom
    public $itemCategoryId = 6; //Event
    public function run()
    {
        if( Yii::app()->request->isAjaxRequest) {
            
            //Add Custom Venue
            $venueData['url']    =   Yii::app()->params['apiUrl']."api/venue";
            
            $venueData['post']['title']      =   $_POST['venueTitle'];
            $venueData['post']['address']    =   $_POST['venue'];
            $venueData['post']['city']       =   YII::app()->session->get('city');
            $venueData['post']['country']    =   Yii::app()->session->get('country');
            $venueData['post']['catId']      =   $this->venueCategoryId;
            $venueData['post']['userId']     =   14;
            //$venueData['post']['status']     =   (isset($_POST['status']))?'public':'private';
            
            /*
             * http request from service end
             */
            $venue =   $this->getController()->httpRequest($venueData);
            
            //Add StateRoom
            $stateRoomData['url']    =   Yii::app()->params['apiUrl']."api/stateroom";
            
            $stateRoomData['post']['title']      =   'Room';
            $stateRoomData['post']['venueId']    =   $venue['data']['venue']['id'];
            
            /*
             * Get http request from service end
             */
            $stateRoom =   $this->getController()->httpRequest($stateRoomData);
            
            //Add Item
            $itemData['url']    =   Yii::app()->params['apiUrl']."items/insertdata";
            
            $itemData['post']['title']          =   $_POST['title'];
            $itemData['post']['description']    =   (isset($_POST['description'])?$_POST['description']:'');
            $itemData['post']['catId']          =   $this->itemCategoryId;
            
            if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']))
            {
                $itemData['file']         =   $_FILES;
            }
            
            /*
             * Get http request from service end
             */
            $item =   $this->getController()->customCurlCall($itemData);
            
            //Add Session
            $sessionsData['url']    =   Yii::app()->params['apiUrl']."api/sessions";
            
            $sessionsData['post']['itemId']         =   $item['id'];
            $sessionsData['post']['stateRoomId']    =   $stateRoom['data']['stateroom']['id'];
            $sessionsData['post']['price']          =   (isset($_POST['price']))?$_POST['price']:'';
            $sessionsData['post']['startTime']      =   date('Y-m-d',strtotime($_POST['startDate'])) . ' ' . date('h:i:s',strtotime($_POST['startDate']));
            $sessionsData['post']['expireTime']     =   $_POST['endDate'];
            $sessionsData['post']['description']    =   (isset($_POST['description'])?$_POST['description']:'');
            $sessionsData['post']['userId']         =   14;
            
            
            /*
             * Get http request from service end
             */
            $sessions =   $this->getController()->httpRequest($sessionsData);
            
            if($sessions['data']['sessions']['id']){
               
               //Service url for movies data
               $data['url']    =   Yii::app()->params['apiUrl']."api/sessions/".$sessions['data']['sessions']['id'];
               /*
                * Get http request from service end
                */
               $record =   $this->getController()->httpRequest($data);

               if($record['success'])
               {
                   $event   =   $record['data']['sessions'];
               }else{
                   $event   =   '';
               }

               echo $this->getController()->renderPartial('list-item',array('event'=>$event), false, false);
                
               //echo CJSON::encode(array('success'=>true));
            }
        }else{
            /*
            * Through exception in case of error from service
            */
            throw new CHttpException(404,'invalid request');
        }
    }
}