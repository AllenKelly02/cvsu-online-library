<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\Message;
use App\Models\MessageReply;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function __construct(public Message $message)
    {
    }


    public function index(){

        $messages = Message::latest()->get();


        return view('inquiries.messages.index', compact(['messages']));
    }
    public function reply(Request $request){


        $data = MessageReply::create([
            'subject' => 'CVSU Library Response to ' . $request->email,
            'content' => $request->content,
            'message_id' => $request->message_id
        ]);


        Mail::to($request->email)->send(new MailNotify($data));


        return back()->with(['message' => 'Email sent']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'content' => 'required'
        ]);

        $this->message->create(['email' => $request->email, 'content' => $request->content]);


        return back()->with(['message' => 'Message Sent!']);
    }
    public function show(string $id){
        $message = $this->message->where('id', $id)->first();


        return view('inquiries.messages.show', compact(['message']));
    }
}
