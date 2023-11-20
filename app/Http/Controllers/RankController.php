<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function getRanksArrage(){
        return Rank::with('user:id,name')->orderBy("point","desc")->get()->take(10);
    }
    public function getUser(Request $request){
        $user = $request->id;
        $rank = Rank::with('user:id,name')->where("user_id", $user)->first();
        return $rank;
    }
}
