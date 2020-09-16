<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Replies;
use App\Boards;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Post;

class BoardsController extends Controller
{

    public function test(){
        return view('test');
    }

    public function getApi($id){
        $data['post']=Posts::where('pid',$id)->first();
        $data['replies']=Replies::where('postId',$id)->get();
        return response()->json($data);
    }

    public function getBoardApi($board){
        $data['posts']=Posts::where('board',$board)->orderBy('pid','desc')->paginate(10);
        $data['replies']=array();
        foreach($data['posts'] as $post){
        array_push($data['replies'],Replies::where('postId',$post['pid'])->get());
        }
        $data['pageName']=$board;
        return response()->json($data);
    }

    public function deleteReply(Request $request){
        if(Auth::user()&&Auth::user()->role_id<3) {
            $reply = Replies::find($request->rid);
            $reply->delete();
            return back();
        }
        return abort(403);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['boards']=Boards::all();
        return view('pages/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filenameToStore=null;
        if($request->file('inputFile')!=null){
            $originalFName= $request->file('inputFile')->getClientOriginalName();
            $filename = pathinfo($originalFName,PATHINFO_FILENAME);
            $extension = '.'.$request->file('inputFile')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().$extension;
            $path = $request->file('inputFile')->storeAs('public/pics',$filenameToStore);
            $path = $request->file('inputFile')->store('pics','public');
        }


        if($request->input('type')=='reply'){
            $reply = new Replies();
            $reply->posts_id=$request->input('id');
            $reply->replyPic=$filenameToStore;
            $reply->replyText=$request->input('replyText');

            if($request->input('userCheckBox') && Auth::user())
                $reply->user_id=Auth()->user()->name;

            $reply->save();
        }

        else if($request->input('type')=='post'){
            $post = new Posts();
            $post->boards_id=$request->input('board');
            $post->title=$request->input('title');
            $post->postPic=$filenameToStore;
            $post->postText=$request->input('cPostText');

            if($request->input('userCheckBox') && Auth::user())
                $post->user=Auth()->user()->name;

            $post->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $id)
    {
        $data['post']=$id;
        $data['replies']=$id->replies()->get();
        return view('posts/show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()&&Auth::user()->role_id<3){
            $post = Post::find($id);
            $post->delete();
            return back();
        }
        return abort(403);
    }

    public function view($board)
    {
        $board = Boards::find($board);
        $data['posts']=$board->posts()->orderBy('id','desc')->paginate(10);
        $data['pageName']=$board->id;
        return view('posts/board',$data);
    }

    public function sesh(){

    }

    //Manage boards

    public function manageBoards(){
        if(!(Auth::user()&&Auth::user()->role_id<3)) {
            return abort(403);
        }

        $data['boards'] = Boards::all();
        return view('/boards/manageBoards', $data);
    }



    public function newBoardView(){
        if(Auth::user()&&Auth::user()->role_id<3) {
            return view('boards/newBoard');
        }
        return abort(403);
    }

    public function newBoardCreate(Request $request){
        if(!(Auth::user()&&Auth::user()->role_id<3)) {
            return abort(403);
        }
        $p = $request->post();
        if((Boards::find($p['name'])) != null){
            return 'board exists';
        }
        $nb = new Boards();
        $nb->id = $p['name'];
        $nb->rules = $p['rules'];
        $nb->save();
        return redirect('/');
    }

    public function setRules(Request $request, $id){
        if(!(Auth::user()&&Auth::user()->role_id<3)) {
            return abort(403);
        }
        $board = Boards::find($id);
        $board->rules = $request->post('rules');
        $board->save();
        return $board;
    }

    public function deleteBoard($id){
        if(!(Auth::user()&&Auth::user()->role_id<3)) {
            return abort(403);
        }
        $board = Boards::find($id);
        $board->delete();
        return null;
    }


}
