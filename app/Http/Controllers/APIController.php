<?php
namespace App\Http\Controllers;
use App\Boards;
use App\Posts;
use App\Replies;
use Illuminate\Http\Request;


class APIController extends Controller
    {

        public function getBoard($board){
            $boardObj = Boards::find($board);
            $data['posts']=$data['posts']=$boardObj->posts()->orderBy('id','desc')->paginate(10);;
            $data['replies']=array();
            foreach($data['posts'] as $post){
                array_push($data['replies'],Replies::where('posts_id',$post['id'])->get());
            }
            $data['pageName']=$board;
            return response()->json($data);

        }

        public function getPost(Posts $post){
            $post->replies = $post->replies()->get();
            return response()->json($post);
        }

        public function getBoardList(){
            return response()->json(Boards::all());
        }

        public function newComment(Request $request){
            $p = $request->post();
            $reply= new Replies();
            $reply->posts_id = $p['pid'];
            $reply->replyText=$p['replyText'];
            $reply->save();
            return $reply;
        }




    }
        ?>
