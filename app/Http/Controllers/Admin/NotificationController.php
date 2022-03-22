<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Avatar;

class NotificationController extends Controller
{
    public function index(Request $request) {
        $notifications = auth()->user()->unreadNotifications;
        $result = [];
        foreach($notifications as $row){
            $data = [];
            $user_id = $row->data['user_id'];
            $user_name = User::where('id', $user_id)->first()->name;
            $user_avatar = User::where('id', $user_id)->first()->avatar;
            $comments = Str::limit($row->data['comments'], 50, '...');
            $date = $row->created_at->diffForHumans();
            $name_avatar = Avatar::create($user_name)->toBase64();
            $id = $row->id;
            $comment_id = $row->data['comment_id'];
            $vehicle_id = $row->data['vehicle_id'];
            array_push($data, 
                $data['user_id']=$user_id, 
                $data['user_name']=$user_name, 
                $data['user_avatar']=$user_avatar, 
                $data['comments']=$comments, 
                $data['date']=$date, 
                $data['name_avatar']=$name_avatar, 
                $data['id']=$id, 
                $data['comment_id']=$comment_id, 
                $data['vehicle_id']=$vehicle_id);
            array_push($result, $data);
        }
        return response()->json(['notification' => $result]);
    }
    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
