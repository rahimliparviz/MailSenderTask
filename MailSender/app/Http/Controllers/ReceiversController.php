<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiverRequest;
use App\MailContent;
use App\Notification;
use App\Receiver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceiversController extends Controller
{
    public function index(){



        return view('dashboard')
            ->with('receivers',Receiver::all());
    }

    public function create(){
        return view('receiver.create');
    }

    public function store(ReceiverRequest $request){
        $request->validated();
        Receiver::CreateReceiver($request);
        return redirect()->route('dashboard');
    }

    public function edit(Request $request){

        $receiver = Receiver::find($request->id);
        return view('receiver.edit')->with('receiver',$receiver);
    }

    public function update(ReceiverRequest $request){

        $request->validated();
        Receiver::UpdateReceiver($request);
        return redirect()->route('dashboard');
    }

    public function delete(Request $request){

        $receiver = Receiver::find($request->id);
        return view('receiver.delete')->with('receiver',$receiver);
    }

    public function destroy(Request $request){

        Receiver::DeleteReceiver($request->id);
        return redirect()->route('dashboard');
    }
}
