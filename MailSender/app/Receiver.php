<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Receiver extends Model
{
    protected $fillable = ['name','email'];

    public static function CreateReceiver(Request $request){
        Receiver::create(['name'=>$request->name,'email'=>$request->email]);
    }

    public static function  DeleteReceiver($id){
        $receiver = Receiver::find($id);
        $receiver->delete();
    }

    public static function UpdateReceiver(Request $request){

        $receiver = Receiver::find($request->id);

//        $takenEmail = Receiver::where('email', $request->email);
//
//        if($takenEmail){
//            return redirect()->back()->withError('email');
//        }

        $receiver->name = $request->name;
        $receiver->email = $request->email;
        $receiver->update();
    }
}
