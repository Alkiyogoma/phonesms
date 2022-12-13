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
            'failure_reason' => null,
            'last_attempted_at' => date('Y-m-d H:i:s'),
            'order_timestamp' => date('Y-m-d H:i:s'),
            'owner' => "+".request('from'),
            'status' => 'pending',
            'user_id' => $user->id,
            "type" => "mobile-terminated",
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
        $owner = $this->validate_phone_number(request("owner"))[1];
        $contact = $this->validate_phone_number(request("contact"))[1];
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
            $adata = [               
                'data' =>  DB::table('message')->where("owner", $owner)->where('contact', $contact)->get()->map(function ($message) {
                    return [
                    "id" =>  $message->id,
                    "owner" =>  $message->owner,
                    "user_id" => $message->user_id,
                    "contact" => $message->contact,
                    "content" => $message->content,
                    "type" => "mobile-terminated",
                    "status" => $message->status,
                    "send_time" => $message->content,
                    "request_received_at" => $message->request_received_at,
                    "created_at" => $message->created_at,
                    "updated_at" => $message->updated_at,
                    "order_timestamp" => $message->order_timestamp,
                    "last_attempted_at" => $message->last_attempted_at,
                    "scheduled_at" => $message->scheduled_at,
                    "sent_at" => $message->sent_at,
                    "delivered_at" => $message->delivered_at,
                    "expired_at" => null,
                    "failed_at" => null,
                    "can_be_polled" => true,
                    "send_attempt_count" => 1,
                    "max_send_attempts" => 2,
                    "received_at" => null,
                    "failure_reason" => null
                ];
            }),
                "message" => "fetched ".count($messages)." messages",
                "status" => "success"
        ];
       
            echo die(json_encode($adata));
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
        $messages = DB::table('message')->where("id", $message_id)->first();

        if(!empty($messages)){
            $users['data'] = $messages;
            $status = array(
                "message" => " Message Fetched successfully",
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
        $message_id = request("message_id") != '' ? request("message_id") : request()->segment(3);
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
                $users['data'] = [
                "id" => $message->id,
                "owner" => $message->owner,
                "user_id" => $message->user_id,
                "contact" => $message->contact,
                "content" => $message->content,
                "type" => "mobile-terminated",
                "status" => 'pending',
                "send_time" => $message->send_time,
                "request_received_at" => $message->request_received_at,
                "created_at" => $message->created_at,
                "updated_at" => $message->updated_at,
                "order_timestamp" => $message->order_timestamp,
                "last_attempted_at" =>$message->last_attempted_at,
                "scheduled_at" => $message->scheduled_at,
                "sent_at" => $message->delivered_at,
                "delivered_at" => $message->delivered_at,
                "expired_at" => null,
                "failed_at" => null,
                "can_be_polled" => false,
                "send_attempt_count" => 1,
                "max_send_attempts" => 2,
                "received_at" => null,
                "failure_reason" => null
                ];
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

    public function validate_phone_number($number) {
            $phone_number = preg_replace("/[^0-9]/", '', $number);
            ;
            if (strlen(preg_replace('#[^0-9]#i', '', $phone_number)) < 7 || strlen(preg_replace('#[^0-9]#i', '', $phone_number)) > 14) {
                return FALSE;
            } else {
        
                $y = substr($phone_number, -9);
                $z = str_ireplace($y, '', $phone_number);
                $p = str_ireplace('+', '', $z);
        
                $x = array(
                    93 => " Afghanistan",
                    355 => " Albania", 213 => " Algeria",
                    1 => " American Samoa",
                    376 => "Andorra ",
                    244 => " Angola",
                    1 => " Anguilla",
                    1 => " Antigua and Barbuda",
                    54 => " Argentine Republic",
                    374 => " Armenia",
                    297 => " Aruba",
                    247 => " Ascension",
                    61 => " Australia",
                    672 => " Australian External Territories",
                    43 => " Austria ", 994 => " Azerbaijani Republic", 1 => " Bahamas ", 973 => " Bahrain", 880 => " Bangladesh ", 1 => " Barbados ", 375 => " Belarus ", 32 => " Belgium ", 501 => " Belize", 229 => " Benin ", 1 => " Bermuda ", 975 => " Bhutan", 591 => " Bolivia", 387 => " Bosnia and Herzegovina ", 267 => " Botswana", 55 => " Brazil (Federative Republic of)", 1 => " British Virgin Islands", 673 => " Brunei Darussalam ", 359 => " Bulgaria (Republic of)", 226 => " Burkina Faso", 257 => " Burundi (Republic of)", 855 => " Cambodia (Kingdom of)", 237 => " Cameroon (Republic of)", 1 => " Canada", 238 => " Cape Verde (Republic of)", 1 => " Cayman Islands ", 236 => " Central African Republic ", 235 => " Chad (Republic of)", 56 => " Chile ", 86 => " China ( Republic of)", 57 => " Colombia (Republic of)", 269 => " Comoros (Union of the)", 242 => " Congo (Republic of the)", 682 => " Cook Islands", 506 => " Costa Rica", 225 => " Côte d \"Ivoire (Republic of)", 385 => " Croatia (Republic of)", 53 => " Cuba", 357 => " Cyprus (Republic of)", 420 => " Czech Republic ", 850 => " Democratic People\"s Republic of Korea ", 243 => " Democratic Republic of the Congo", 670 => " Democratic Republic of Timor-Leste", 45 => " Denmark", 246 => " Diego Garcia ", 253 => " Djibouti (Republic of) ", 1 => " Dominica (Commonwealth of)", 1 => " Dominican Republic", 593 => " Ecuador", 20 => " Egypt (Arab Republic of)", 503 => " El Salvador (Republic of)", 240 => " Equatorial Guinea (Republic of)", 291 => " Eritrea", 372 => " Estonia (Republic of)", 251 => " Ethiopia (Federal Democratic Republic of) ", 500 => " Falkland Islands (Malvinas) ", 298 => " Faroe Islands", 679 => " Fiji (Republic of)", 358 => " Finland ", 33 => " France", 262 => " French Departments and Territories in the Indian Ocean ", 594 => " French Guiana (French Department of)", 689 => " French Polynesia (Territoire français \"outre-mer)", 241 => " Gabonese Republic", 220 => " Gambia (Republic of the)", 995 => " Georgia", 49 => " Germany (Federal Republic of)", 233 => " Ghana", 350 => " Gibraltar", 881 => " Global Mobile Satellite System (GMSS) shared code", 30 => " Greece ", 299 => " Greenland (Denmark)", 1 => " Grenada", 388 => " Group of countries shared code", 590 => " Guadeloupe (French Department of)", 1 => " Guam ", 502 => " Guatemala (Republic of)", 224 => " Guinea (Republic of)", 245 => " Guinea-Bissau (Republic of)", 592 => " Guyana", 509 => " Haiti (Republic of)", 504 => " Honduras (Republic of)", 852 => " Hong Kong China", 36 => " Hungary (Republic of)", 354 => " Iceland", 91 => " India (Republic of)", 62 => " Indonesia (Republic of)", 870 => " Inmarsat SNAC ", 98 => " Iran (Islamic Republic of)", 964 => " Iraq (Republic of)", 353 => " Ireland", 972 => " Israel (State of)", 39 => " Italy", 1 => " Jamaica", 81 => " Japan", 962 => " Jordan (Hashemite Kingdom of)", 7 => " Kazakhstan (Republic of)", 254 => " Kenya (Republic of)", 686 => " Kiribati (Republic of)", 82 => " Korea (Republic of)", 965 => " Kuwait (State of)", 996 => " Kyrgyz Republic ", 856 => " Lao People\"s Democratic Republic", 371 => " Latvia (Republic of)", 961 => " Lebanon ", 266 => " Lesotho (Kingdom of)", 231 => " Liberia (Republic of)", 218 => " Libya (Socialist People\"s Libyan Arab Jamahiriya)", 423 => " Liechtenstein (Principality of)", 370 => " Lithuania (Republic of) ", 352 => " Luxembourg", 853 => " Macao China", 261 => " Madagascar (Republic of)", 265 => " Malawi", 60 => " Malaysia", 960 => " Maldives (Republic of)", 223 => " Mali (Republic of)", 356 => " Malta", 692 => " Marshall Islands (Republic of the)", 596 => " Martinique (French Department of)", 222 => " Mauritania (Islamic Republic of)", 230 => " Mauritius (Republic of)", 269 => " Mayotte", 52 => " Mexico", 691 => " Micronesia (Federated States of)", 373 => " Moldova (Republic of) ", 377 => " Monaco (Principality of)", 976 => " Mongolia ", 382 => " Montenegro (Republic of)", 1 => " Montserrat", 212 => " Morocco (Kingdom of)", 258 => " Mozambique (Republic of) ", 95 => " Myanmar (Union of)", 264 => " Namibia (Republic of)", 674 => " Nauru (Republic of)", 977 => " Nepal (Federal Democratic Republic of)", 31 => " Netherlands (Kingdom of the)", 599 => " Netherlands Antilles", 687 => " New Caledonia (Territoire français d\"outre-mer)", 64 => " New Zealand", 505 => " Nicaragua", 227 => "Niger (Republic of the)", 234 => " Nigeria (Federal Republic of)", 683 => " Niue ", 1 => " Northern Mariana Islands (Commonwealth of the)", 47 => " Norway", 968 => " Oman (Sultanate of)", 92 => " Pakistan (Islamic Republic of)", 680 => " Palau (Republic of)", 507 => " Panama (Republic of)", 675 => " Papua New Guinea", 595 => " Paraguay (Republic of)", 51 => "Peru", 63 => "Philippines (Republic of the)", 48 => " Poland (Republic of)", 351 => " Portugal", 1 => " Puerto Rico", 974 => " Qatar (State of)", 40 => " Romania ", 7 => " Russian Federation", 250 => " Rwanda (Republic of)", 290 => " Saint Helena", 1 => " Saint Kitts and Nevis", 1 => " Saint Lucia", 508 => " Saint Pierre and Miquelon (Collectivité territoriale de la République française)", 1 => " Saint Vincent and the Grenadines", 685 => " Samoa (Independent State of)", 378 => " San Marino (Republic of) ", 239 => " Sao Tome and Principe (Democratic Republic of)", 966 => " Saudi Arabia (Kingdom of)", 221 => " Senegal (Republic of)", 381 => " Serbia (Republic of)", 248 => " Seychelles (Republic of)", 232 => " Sierra Leone", 65 => " Singapore (Republic of)", 421 => " Slovak Republic", 386 => " Slovenia (Republic of)", 677 => " Solomon Islands", 252 => " Somali Democratic Republic", 27 => " South Africa (Republic of)", 34 => " Spain", 94 => " Sri Lanka (Democratic Socialist Republic of)", 249 => " Sudan (Republic of the)", 597 => " Suriname (Republic of)", 268 => " Swaziland (Kingdom of)", 46 => " Sweden", 41 => " Switzerland (Confederation of)", 963 => " Syrian Arab Republic", 886 => " Taiwan China", 992 => " Tajikistan (Republic of)", 255 => " Tanzania (United Republic of)", 66 => " Thailand", 389 => " The Former Yugoslav Republic of Macedonia", 228 => " Togolese Republic", 690 => " Tokelau", 676 => " Tonga (Kingdom of)", 1 => " Trinidad and Tobago", 290 => " Tristan da Cunha", 216 => " Tunisia", 90 => " Turkey", 993 => " Turkmenistan", 1 => " Turks and Caicos Islands", 688 => " Tuvalu", 256 => " Uganda (Republic of)", 380 => " Ukraine", 971 => " United Arab Emirates", 44 => " United Kingdom of Great Britain and Northern Ireland ", 1 => " United States of America", 1 => " United States Virgin Islands", 598 => " Uruguay (Eastern Republic of)", 998 => " Uzbekistan (Republic of)", 678 => " Vanuatu (Republic of)", 379 => " Vatican City State", 39 => " Vatican City State", 58 => " Venezuela (Bolivarian Republic of)", 84 => " Viet Nam (Socialist Republic of)", 681 => " Wallis and Futuna (Territoire français d\"outre-mer)", 967 => " Yemen (Republic of)", 260 => "Zambia (Republic of)", 263 => " Zimbabwe");
        
        
                foreach ($x as $key => $value) {
                    if ($p == $key) {
                        $country_name = $value;
                        $code = $key;
                    } else {
                        $country_name = ' Tanzania (United Republic of)';
                        $code = '255';
                    }
                }
        
                $valid_number = '+' . $code . $y;
        
                $valid = array($country_name, $valid_number);
                return $valid;
            }
        
        }
        
        public function verifySchool()
        {
           $code = request('code');
           $verify = DB::table('admin.school_keys')->where('schema_name', $code)->first();
           if (!empty($verify)) {
              $school = DB::table('admin.clients')->join('admin.all_setting','admin.all_setting.schema_name','=','admin.clients.username')
              ->select('admin.clients.name','admin.clients.address','admin.clients.address','admin.clients.lat','admin.clients.long','admin.all_setting.photo')
              ->where('admin.clients.username', $verify->schema_name)->first();
               
                $logo = $this->imageUrl($school->photo);
                $status = 1;
                $data = ['key'=>$code,'school_name' => $school->name,'location' => $school->address,'location' => $school->address,'latitude'=>$school->lat,'longitude'=>$school->long,'logo'=>$logo];
            } else {
                $status = 0;
                $data = [];
            }
           echo json_encode(['data' => [['status' => $status, 'data'=>$data]]]);
        }


    // function to verify key for attendance machine
    public function verifyKey()
    {
        $code = request('code');
        $verify = DB::table('admin.school_keys')->where('schema_name', $code)->first();
        if (!empty($verify)) {
             $school = DB::table('admin.clients')->where('username', $verify->schema_name)->first();
             $school_name = $school->name;
             $success = 1;
        } else {
            $school_name = '';
            $success = 0;
        }
        echo json_encode(['data' => [['success' => $success, 'school_name' => $school_name]]]);
    }

    
    private function resendNonDelivered($value)
    {
        $pending = DB::select("select a.phone_number as phone,  '" . $value->schema_name . "'||a.sms_id as id, "
            . " a.body from " . $value->schema_name . ".sms a where type <>1 and status =1 limit 5 ");
        $object = [];
        if (!empty($pending)) {
            foreach ($pending as $message) {
                array_push($object, (array) $message);

                $id = (int) str_replace($value->schema_name, NULL, $message->id);
                DB::table($value->schema_name . ".sms")->where('sms_id', $id)->update([
                    'status' => 2,
                    //                             'return_code' => 'pushed to be sent', 
                    'updated_at' => 'now()'
                ]);
            }
        }
        return json_encode(['messages' => $object]);
    }

    public function pushPhoneSMS()
    {
        $object = [];
        $code = request()->segment(3);
        $int_ = (int) filter_var($code, FILTER_SANITIZE_NUMBER_INT);  

        if($int_ < 23){
            return json_encode(['messages' => $object]);
        }
        $verify = DB::table('admin.school_keys')->where('api_key', trim($code))->get();
        $bot = new \App\Http\Controllers\Communication\WhatsAppBot();

        if (count($verify) > 0) {
            foreach ($verify as $value) {
                $setting = DB::table('admin.all_setting')->where('schema_name', $value->schema_name)->first();
                if (!empty($setting)) {
                    $schema = $value->schema_name == 'public' ? 'SHULESOFT' : strtoupper($value->schema_name);
                    $link = $value->schema_name == 'public' ? 'shulesoft.com' : $value->schema_name . '.shulesoft.com';
                    $messages = DB::select("select a.phone_number as phone,  '" . $value->schema_name . "'||a.sms_id as id, " . " '" . $schema . ": '||a.body || '" . chr(10) . " School Link > https://" . $link . "' as body, a.sent_from from " . $value->schema_name . ".sms a where status = 0 order by priority DESC limit 30");

                    if (count($messages) > 0) {
                        foreach ($messages as $message) {
                            $id = (int) str_replace($value->schema_name, NULL, $message->id);

                                array_push($object, (array) $message);
                       
                            DB::table($value->schema_name . ".sms")->where('sms_id', $id)->update([
                                'status' => 1,
                                'return_code' => 'pushed to be sent',
                                'updated_at' => 'now()'
                            ]);
                        }
                        DB::table('admin.school_keys')->where('api_key', trim($code))->update(['last_active' => 'now()']);
                    } else {
                        //wait for 3sec then check empty non delivered
                          sleep(3);
                         return $this->resendNonDelivered($value);
                    }
                }
            }
        } else {
            // array_push($object, ['phone' => '0692321322', 'body' => 'Invalid Code supplied ('.$code.')', 'id' => 1, 'code' => $code]);
        }
        return json_encode(['messages' => $object]);
    }


    public function aunthenticateMobile()
    {
        $code = request()->segment(3);
        $skema='public';
        $verify = DB::table('admin.school_keys')->where('api_key', $code)->first();
        if (!empty($verify)) {
            DB::table('admin.school_keys')->where('api_key', $code)->update([
                'last_active' => 'now()'
            ]);
            $status = 1;
            $skema=$verify->schema_name;
        } else {
            $status = 0;
            $code = '';
            $skema='';
        }
        echo json_encode(['data' => [['code' => $code, 'status' => $status,'skema'=>$skema]]]);
        echo json_encode(['data' => [['success' => 1]]]);
    }

    public function updatestatus()
    {
        $code = request()->segment(3);
        $sms_id = request()->segment(4);
        $ime = request()->segment(5);
        $verify = DB::table('admin.school_keys')->where('api_key', trim($code))->get();
        $int_ = (int) filter_var($sms_id, FILTER_SANITIZE_NUMBER_INT);  

        if (count($verify) > 0 && $int_ > 0) {
                    
            $int = (int) filter_var($sms_id, FILTER_SANITIZE_NUMBER_INT);  
            $schema =  str_replace($int, '', $sms_id); 
            $check_schema = DB::table('admin.all_setting')->where('schema_name', $schema)->first();

                if (!empty($check_schema) && $int > 0) {
                    DB::table($schema . ".sms")->where('sms_id', $int)->update([
                        'status' => 2,
                        'updated_at' => 'now()'
                    ]);
                }
            }
        
        DB::table('admin.school_keys')->where('api_key', trim($code))->update(['last_active' => 'now()']);
        echo json_encode(['reports' => [['code' => $code, 'status' => $ime]]]);
    }

    public function smsReport()
    {
        $code = request()->segment(3);
        $verify = DB::table('admin.school_keys')->where('api_key', $code)->get();
        if (!empty($verify)) {
            $sent_sms = 0;
            $pending_sms = 0;
            foreach ($verify as $value) {
                $check_schema = DB::table('admin.all_setting')->where('schema_name', $value->schema_name)->first();
            if(!empty($check_schema)){
                $sent_sms += DB::table($value->schema_name . ".sms")->where('status', 1)->count();
                $pending_sms += DB::table($value->schema_name . ".sms")->where('status', 0)->count();
                }
            }
        } else {
            $sent_sms = 0;
            $pending_sms = 0;
        }
        echo json_encode(['reports' => [['sent' => $sent_sms, 'pending' => $pending_sms]]]);
    }

    }