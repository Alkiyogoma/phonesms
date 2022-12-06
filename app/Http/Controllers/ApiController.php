<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller {

    
    public function sendMessage(Request $request){
        // Check if User Exists
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $id = Str::uuid();

        $message = Message::create([
            'id' => $id,
            'contact' => "+".request('to'),
            'content' => request('content'),
            'failure_reason' => 'failure_reason',
            'last_attempted_at' => date('Y-m-d H:i:s'),
            'order_timestamp' => date('Y-m-d H:i:s'),
            'owner' => "+".request('from'),
            'status' => 'pending',
            'user_id' => $user->user_id,
            'type' => 'type',
        ]);
        if($message){
            $users = array();
            $message = DB::table('message')->where("id", $id)->first();

            $adata = [
                "id" =>  $message->id,
                "owner" =>  $message->owner,
                "user_id" => $user->id,
                "contact" => $message->contact,
                "content" => $message->content,
                "type" => "mobile-terminated",
                "status" => "pending",
                "send_time" => null,
                "request_received_at" => date('Y-m-d H:i:s'),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
                "order_timestamp" => date('Y-m-d H:i:s'),
                "last_attempted_at" => null,
                "scheduled_at" => null,
                "sent_at" => null,
                "delivered_at" => null,
                "expired_at" => null,
                "failed_at" => null,
                "can_be_polled"=>false,
                "send_attempt_count" => 0,
                "max_send_attempts" => 2,
                "received_at" => null,
                "failure_reason" => null
            ];
            $success = [
                    "message" => "Message sent successfully",
                    "status" => "success"
            ];
            $users['data'] = $adata;
            echo die(json_encode(array_merge($users, $success)));

        }else{
            $success = [
                "data" => "The request body is not a valid JSON string",
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            return die(json_encode($success));
        }
      
    }


    public function AuthValidate(Request $request)
        {
            $key = $request->header('x-api-key');

            if($key == null){
                $data = [
                    "data" => "Make sure your API key is set in the [X-API-Key] header in the request",
                    "message" => "You are not authorized to carry out this request.",
                    "status" => "error"
                ];
                return die(json_encode($data));
            }
            $user = User::where('api_key', $key)->first();

            if(empty($user)){
                $data = [
                    "data" => "Make sure your API key is set in the [X-API-Key] header in the request",
                    "message" => "You are not authorized to carry out this request.",
                    "status" => "error"
                ];
                return die(json_encode($data));
            }else{
                return $user;
            }
            // do some stuff
        }

    public function me(Request $request)
    {
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $users = array();
        $data = [
              "id" => $user->id,
              "email" => $user->email,
              "api_key" => $user->api_key,
              "active_phone_id"  => $user->active_phone_id,
              "created_at" => $user->created_at,
              "updated_at" => $user->updated_at
        ];
        $users['data'] = $data;
        $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
        );
        echo die(json_encode(array_merge($users, $status)));

    }

    public function updateUser(Request $request)
    {
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $phone = DB::table('phones')->where("user_id", $user->id)->first();
        if(!empty($phone)){
        $phone_id = request("active_phone_id");
        DB::table('users')->where("api_key", $user->api_key)->update(['active_phone_id' => $phone_id]);

        $users = array();
        $data = [
            "created_at" => $phone->created_at,
            "fcm_token" =>  $phone->fcm_token,
            "id" => Str::uuid(),
            "max_send_attempts" => 1,
            "message_expiration_seconds" => 0,
            "messages_per_minute" => 5,
            "phone_number" =>  $phone->phone_number,
            "updated_at" =>  $phone->updated_at,
            "user_id" => $user->id,
          ];
            $users['data'] = $data;

            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            $data = [
                "created_at" => date('Y-m-d H:i:s'),
                "fcm_token" =>  'token',
                "id" => Str::uuid(),
                "max_send_attempts" => 1,
                "message_expiration_seconds" => 0,
                "messages_per_minute" => 5,
                "phone_number" =>  $user->phone,
                "updated_at" =>  date('Y-m-d H:i:s'),
                "user_id" => $user->id,
              ];
          \App\Models\Phone::create($data);

            $status = [
                "data" =>  "The request body is not a valid JSON string",
                "message" =>  "The request isn't properly formed",
                "status" => "error"
            ];
          echo die(json_encode($status));
        }

    }

    public function getMessages(Request $request){
        // Get list of messages which are sent between 2 phone numbers. It will be sorted by timestamp in descending order.
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $owner = request("owner");
        $contact = request("contact");
        if($owner == '' || $contact == ''){
            $data = [
                "data" => "The request body is not a valid JSON string",
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
        $users = array();
        $messages = DB::table('message')->where("owner", $owner)->where('contact', $contact)->get();
        if(count($messages) > 0){
            $users['data'] = $messages;
            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            $data = [
                "data" => "The request body is empty no messages between these two numbers".$owner .' - '. $contact,
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
      
    }

    public function outstanding(Request $request){
        //Get an outstanding message to be sent by an android phone
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $message_id = request("message_id");
        if($message_id == ''){
            $data = [
                "data" => "The request body is not a valid JSON string",
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
        $users = array();
        $messages = DB::table('message')->where("id", $message_id)->get();

        if(count($messages) > 0){
            $users['data'] = $messages;
            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            $data = [
                "data" => "The request message is empty no message found ".$message_id,
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
      
    }

     public function received(Request $request)
    {
        # Add a new message received from a mobile phone
        # Received message request payload - POST
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();

        $message = Message::create([
            'id' => Str::uuid(),
            'contact' => request('to'),
            'content' => request('content'),
            'failure_reason' => 'failure_reason',
            'last_attempted_at' => date('Y-m-d H:i:s'),
            'order_timestamp' => date('Y-m-d H:i:s'),
            'owner' => request('from'),
            'status' => 'sent',
            'user_id' => $user->user_id,
            'type' => 'type',
        ]);
        $message = DB::table('message')->where("id", $message->id)->first();

        if($message){
            $users['data'] = $message;
            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            $data = [
                "data" => "The request message is empty no message found ",
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
      
    }

    public function events(Request $request)
    {
        // Use this endpoint to send events for a message when it is failed, sent or delivered by the mobile phone.

        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $message_id = request("message_id");
        if($message_id == ''){
            $data = [
                "data" => "The request body is not a valid JSON string",
                "message" => "The request isn't properly formed",
                "status" => "error"
            ];
            echo die(json_encode($data));
   
        }
        $users = array();
        $message = DB::table('message')->where("id", $message_id)->first();

        if(!empty($message)){
            DB::table('message')->where("id", $message_id)->update(["status" => request('event_name'), "failure_reason" => request("reason"), "scheduled_at" => date("Y-m-d H:i:s")]);
                $users['data'] = $message;
                $status = array(
                    "message" => "Message Updated successfully",
                    "status" => "success"
                );
                echo die(json_encode(array_merge($users, $status)));
            }else{
                return $this->errors();
            }

    }


    public function phones(Request $request)
    {
      #  Get list of phones which a user has registered on the http sms application

        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $phone = DB::table('phones')->where("user_id", $user->id)->first();
        if(!empty($phone)){
        $phones = DB::table('phones')->where("user_id", $user->id)->get();

            $users = array();
            $users['data'] = $phones;

            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            return $this->errors();
        }
    }

    public function updatePhones(Request $request)
    {
      #  Get list of phones which a user has registered on the http sms application
      $user_data = [
        "fcm_token" =>  request('fcm_token'),
        "max_send_attempts" => request('max_send_attempts'),
        "message_expiration_seconds" => request('message_expiration_seconds'),
        "messages_per_minute" => request('messages_per_minute'),
        "phone_number" =>  request('phone_number'),
      ];

      if(request('phone_number') != '' && request('fcm_token') != ''){
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $phone = DB::table('phones')->where("phone_number", request('phone_number'))->first();
        if(!empty($phone)){
        DB::table('phones')->where("phone_number", request('phone_number'))->update($user_data);
        }else{
        $data = [
            "created_at" => date("Y-m-d H:i:s"),
            "fcm_token" =>  request('fcm_token'),
            "id" => Str::uuid(),
            "max_send_attempts" => request('max_send_attempts'),
            "message_expiration_seconds" => request('message_expiration_seconds'),
            "messages_per_minute" => request('messages_per_minute'),
            "phone_number" =>  request('phone_number'),
            "updated_at" =>   date("Y-m-d H:i:s"),
            "user_id" => $user->id,
          ];
         $phone = \App\Models\Phone::create($data);
         $phone = DB::table('phones')->where("id", $phone->id)->first();
        }
            $users = array();
            $users['data'] = $phone;

            $status = array(
                "message" => "user fetched successfully",
                "status" => "success"
            );
            echo die(json_encode(array_merge($users, $status)));
        }else{
            return $this->errors();
        }
        
    }

    public function deletePhones(Request $request)
    {
        # code... Delete a phone that has been sored in the database

        $phone_id = request('phone_id');

        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $phone = DB::table('phones')->where("id", $phone_id)->first();
        if(!empty($phone)){
            DB::table('phones')->where("id", $phone_id)->delete();

            $status = array(
                "message" => "phone deleted successfully",
                "status" => "success"
            );
            echo die(json_encode($status));
        }else{
            return $this->errors();
        }
        
    }

    public function heartbeats(Request $request)
    {
        # Store the heartbeat to make notify that a phone number is still active
        $users = array();
        $phone_id = request('owner');
        if($phone_id != ''){
        $user = $this->AuthValidate($request);
        $user = DB::table('users')->where("api_key", $user->api_key)->first();
        $phones = DB::table('phones')->where("phone_number", $phone_id)->first();
        if(!empty($phones)){
            $phone =  DB::table('heartbeat')->where("owner", $phone_id)->first();
            if(!empty($phone)){
                $body = [
                    "id" => $phone->id,
                    "owner" => $phone_id,
                    "user_id" =>  $user->id,
                    "timestamp" =>  date('Y-m-d H:i:s')
                  ];
                  DB::table('heartbeat')->where("owner", $phone_id)->update(["timestamp" =>  date('Y-m-d H:i:s')]);
                }else{
                  $body = [
                    "id" => Str::uuid(),
                    "owner" => $phone_id,
                    "user_id" =>  $user->id,
                    "timestamp" =>  date('Y-m-d H:i:s')
                  ];
                  DB::table('heartbeat')->insert($body);
                }
                $users['data'] = $body;
                
                $status = array(
                    "message" => "user fetched successfully",
                    "status" => "success"
                );
                echo die(json_encode(array_merge($users, $status)));
            }else{
                return $this->errors();
            }
            }else{
                return $this->errors();
            }
   
    }
        
    public function errors()
    {
        $status = [
            "data" =>  "The request body is not a valid JSON string",
            "message" =>  "The request isn't properly formed",
            "status" => "error"
        ];
        echo die(json_encode($status));
    }

    public function send_sms(){
        // initialize guzzle client https://github.com/guzzle/guzzle
        $apiKey = "PYXf934Tpyg4PF6du9F1O7wpFpz1e83dQpJzGZ293HVuQYcLrO6OFAP1K6ljn4K-";

        $dd =  Http::withHeaders([
            'x-api-key' => $apiKey,
            ])->post('https://api.httpsms.com/v1/messages/send', [
                'content' => request('content'),
                'from'    => request('from'),
                'to'      => request('to')
            ]);

            echo $dd; 
    }

    public function billing($var = null)
    {
        # Get the summary of sent and received messages for a user in the current month
        /*
        curl -X 'GET' \
        'https://api.httpsms.com/v1/billing/usage' \
        -H 'accept: application/json' \
        -H 'x-api-Key: PYXf934Tpyg4PF6du9F1O7wpFpz1e83dQpJzGZ293HVuQYcLrO6OFAP1K6ljn4K-'
            
        Request URL
            https://api.httpsms.com/v1/billing/usage

            {
            "data": {
                "id": "addf4af1-1f0e-4853-8098-5e4e73a5fd4e",
                "user_id": "LUzBoZZvD9WqFwyrzbQd00cGX0D2",
                "sent_messages": 5,
                "received_messages": 13,
                "total_cost": 0,
                "start_timestamp": "2022-11-01T00:00:00Z",
                "end_timestamp": "2022-11-30T23:59:59.999999Z",
                "created_at": "2022-11-28T13:33:55.972779Z",
                "updated_at": "2022-11-28T13:33:55.972779Z"
            },
            "message": "fetched current billing usage",
            "status": "success"
            }

        */

    }

    public function billingHistory($var = null)
    {
        # code...
        /*
        curl -X 'GET' \
            'https://api.httpsms.com/v1/billing/usage-history' \
            -H 'accept: application/json' \
            -H 'x-api-Key: PYXf934Tpyg4PF6du9F1O7wpFpz1e83dQpJzGZ293HVuQYcLrO6OFAP1K6ljn4K-'
            Request URL
            https://api.httpsms.com/v1/billing/usage-history

            {
            "data": [
                {
                "id": "10e0a3c3-e092-4463-aeab-c21226a658b6",
                "user_id": "LUzBoZZvD9WqFwyrzbQd00cGX0D2",
                "sent_messages": 0,
                "received_messages": 2,
                "total_cost": 0,
                "start_timestamp": "2022-05-31T21:00:00Z",
                "end_timestamp": "2022-06-30T20:59:59.999999Z",
                "created_at": "2022-11-28T15:55:32.905708Z",
                "updated_at": "2022-11-28T15:55:32.905708Z"
                }
            ],
            "message": "fetched 1 billing usage record",
            "status": "success"
            }
        */
    }




}