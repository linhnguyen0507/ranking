<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function getRanksArrage()
    {
        $rank = Rank::with('user:id,name,image')->orderBy("point", "desc")->get()->toArray();
        return view("index")->with("ranks", $rank);
    }
    public function getUser(Request $request)
    {
        $user = $request->id;

        $rank = Rank::with('user:id,name,image')
            ->orderBy('point', 'desc')
            ->where('user_id', $user)
            ->first();
        
        if ($rank) {
            return response()->json([
                'user_info' => $rank,
            ]);
        } else {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }
        


        
    }
}
