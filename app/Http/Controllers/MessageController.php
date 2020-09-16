<?php

namespace App\Http\Controllers;

use App\Chatroom;
use App\Message;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function friendList(){
        $loggedUser = Auth::user();
        $rooms= $loggedUser->chatroom()->get();
        $loggedUser = Auth::user();
        return view('messager/friendList',compact('rooms','loggedUser'));
    }

    public function loadFriend($id, $num=20){
        $loggedUser = Auth::user();
        $room = Chatroom::with('user')->find($id);
        $friend='';
        if($room->type==1){
            if($room['user'][0]['id']!=$loggedUser['id'])
                    $friend=$room['user'][0];
            else
                $friend=$room['user'][1];
            }
        for($i = 0;$i<sizeof($room['user']);$i++){
            if($room['user'][$i]['id']==$loggedUser['id']){
                $chatId = $room->id;
                $messages = [];
                $messages = $room->message()->orderBy('id','DESC')->limit($num)->get();
                if($messages!=null){
                    foreach($messages as $message){
                        $message->message = decrypt($message->message);
                    }
                }
                return view('messager/loadChatroom',compact('messages','friend','loggedUser','chatId'));
            }
        } //Makes sure user is in chatroom
        return abort(401);
    }

    public function sendBox($id){
        $loggedUser = Auth::user();
        $room = Chatroom::with('user')->find($id);
        return view('messager/sendBox',compact('room'));
    }

    public function newFriend(Request $request){
        $chatroom = new Chatroom;
        $chatroom->type=1;
        $chatroom->save();

        $friend = User::where('name',$request->friendName)->get();
        $chatroom->user()->attach($friend);
        $chatroom->user()->attach(Auth::user());
    }

    public function sendMessage(Request $request){
        $message = encrypt($request->sendMsg);
        $chatId = $request->chatId;
        $user = Auth::user();
        $chatroom = Chatroom::find($chatId);
        if($chatroom['user'][0]['id']==$user['id']||$chatroom['user'][1]['id']==$user['id']){
            $msg = $chatroom->message()->create(['chatroom_id'=>$chatId,'user_id'=>$user->id,'message'=>$message]);
            return $msg;
        }
        else return abort(401);

    }

}
