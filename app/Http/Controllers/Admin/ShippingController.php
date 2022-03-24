<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Reply;
use App\Models\User;
use App\Models\VehicleImage;
use App\Models\Vehicle;
use Mail;

class ShippingController extends Controller
{
    public function index(Request $request){ 
        $user = User::where('role', 2)->orderBy('updated_at', 'desc')->get();;
        return view('admin.pages.shipping.index', [
            'user' => $user,
        ]);
    }

    public function chat(Request $request, $id){ 
        $comments = Comments::leftJoin('vehicle_image', 'comments.vehicle_id', '=', 'vehicle_image.vehicle_id')
                            ->where('comments.user_id', $id)
                            ->groupBy('comments.vehicle_id')
                            ->orderBy('comments.created_at', 'desc')
                            ->select('comments.*', 'vehicle_image.image')
                            ->get();
        
        return view('admin.pages.shipping.start', [
            'comments' => $comments,
        ]);
    }

    public function stockChat(Request $request, $id, $vehicle_id){ 
        $comments = Comments::leftJoin('vehicle_image', 'comments.vehicle_id', '=', 'vehicle_image.vehicle_id')
                            ->where('comments.user_id', $id)
                            ->groupBy('comments.vehicle_id')
                            ->select('comments.*', 'vehicle_image.image')
                            ->orderBy('comments.created_at', 'desc')
                            ->get();
        $customer_message = Comments::leftJoin('users', 'comments.user_id', '=', 'users.id')
                                    ->where('comments.user_id', $id)
                                    ->where('comments.vehicle_id', $vehicle_id)
                                    ->select('comments.*', 'users.name')
                                    ->get();
        $latest_id = Comments::leftJoin('users', 'comments.user_id', '=', 'users.id')
                                ->where('comments.user_id', $id)
                                ->where('comments.vehicle_id', $vehicle_id)
                                ->select('comments.*', 'users.name')
                                ->latest()
                                ->first()->id;
        $reply = Reply::leftJoin('comments', 'comments.id', '=', 'replies.comment_id')
                        ->where('comments.user_id', $id)
                        ->where('comments.vehicle_id', $vehicle_id)
                        ->select('replies.*')
                        ->get();
        $order_status = config('config.order_status');
        $stock_info = Comments::where('vehicle_id', $vehicle_id)->where('user_id', $id)->first();
        return view('admin.pages.shipping.chat', [  
            'comments' => $comments,
            'customer_message' => $customer_message,
            'latest_id' => $latest_id,
            'reply' => $reply,
            'stock_info' => $stock_info,
            'order_status' => $order_status,
        ]);
    }
    public function reply(Request $request){ 
        $reply = new Reply;
        $reply->comment_id = $request->comment_id;
        $reply->reply = $request->reply;
        $reply->save();
        $email = Comments::leftJoin('users', 'comments.user_id', '=', 'users.id')
                         ->where('comments.id', $request->comment_id)
                         ->first()->email;
        $reply = $request->reply;
        $subject = 'SakuraMotors new reply';
        Mail::send('mail', array(
            'chat' => 'reply',
            'subject' => $subject,
            'reply' => $reply,
        ), function($message) use ($email, $subject){
            $message->from('inquiry@sakuramotors.com');
            $message->to($email, $subject)
                    ->subject($subject);
        });
        return response()->json(['result' => true, 'save port' => $reply]);
    }
    public function change_status(Request $request){ 
        Comments::where('vehicle_id', $request->id)->update(['order_status' => $request->status]);
        Vehicle::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['result' => true]);
    }
    public function delete(Request $request, $id){ 
        
        return view('admin.pages.shipping.delete', [
            
        ]);
    }
}
