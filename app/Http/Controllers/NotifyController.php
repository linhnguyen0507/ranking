<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\Post;
use App\Models\Rank;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function like(Request $request){
        
        $liked = Notify::where("user_id", auth()->user()->id)->where('post_id', $request->id)->where('type', 'like')->first();
       
        $post = Post::with('user:id')->find( $request->id)->toArray();
        $user_id = '';
        foreach ($post as $key => $value) {
            if ($key == 'user_id') {
               $user_id = $value;
            }
        }
        if(($liked)){
            $rank = Rank::where('user_id', $user_id)->first();
            $rank->point = $rank->point - 2;
            $rank->save();
            $liked->delete();
            
        }else{
            $rank = Rank::where('user_id', $user_id)->first();
            $rank->point = $rank->point + 2;
            $rank->save();

            $like = new Notify();
            $like->type = 'like';
            $like->post_id = $request->id;
            $like->user_id = auth()->user()->id;
            $like->save();
        }
        return redirect(route('index'))->with("success","successfully");
    }
    public function favorite(Request $request){
        $liked = Notify::where("user_id", auth()->user()->id)->where('post_id', $request->id)->where('type', 'favorite')->first();
       
        $post = Post::with('user:id')->find( $request->id)->toArray();
        $user_id = '';
        foreach ($post as $key => $value) {
            if ($key == 'user_id') {
               $user_id = $value;
            }
        }
        if(($liked)){
            $rank = Rank::where('user_id', $user_id)->first();
            $rank->point = $rank->point - 3;
            $rank->save();
            $liked->delete();
            
        }else{
            $rank = Rank::where('user_id', $user_id)->first();
            $rank->point = $rank->point + 3;
            $rank->save();

            $like = new Notify();
            $like->type = 'favorite';
            $like->post_id = $request->id;
            $like->user_id = auth()->user()->id;
            $like->save();
        }
        return redirect(route('index'))->with("success","successfully");
    }
}
