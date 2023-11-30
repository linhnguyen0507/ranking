<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "title"=> "required",
            "content"=> "required",
        ]);
        if ($validate->fails()) {
            return view("index")->with('err',"Thêm không thành công");
        }

        $post = new Post($request->all());
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();
        $rank = Rank::where("user_id",  Auth::user()->id)->first();
        if (!$rank) {

            $post = Post::where("user_id", Auth::user()->id)->get();
            $rank = new Rank();
            $rank->user_id = Auth::user()->id;
            $rank->point = count($post);
            $rank->save();
        }else{
            $rank->point = $rank->point+1;
            $rank->save();
        }
       
        $rank->save();
        return redirect()->route("index")->with("success","Thêm bài viết thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
