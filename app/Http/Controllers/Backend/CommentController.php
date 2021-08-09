<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest\addCommentRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CommentController extends Controller
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
        $this->middleware('can:list-comments', ['only' => ['index']]);
        $this->middleware('can:update-comments', ['only' => ['updateStatus']]);
        $this->middleware('can:delete-comments', ['only' => ['destroy']]);
        $this->middleware('can:show-comments', ['only' => ['show']]);
    }

    public function index()
    {
        $comment = $this->comment
            ->select(DB::raw('count(*) as countComment,name,numberPhone,product_id'))
            ->groupBy('product_id', 'name', 'numberPhone')
            ->where('status', '=', 1)
            ->paginate(5);
        return view('backend.Comment.index', ['comment' => $comment]);
    }

    public function addComment(addCommentRequest $request, $id)
    {
        $data = request()->except('_token');
        $data['product_id'] = $id;
        $addComment = $this->comment::create($data);

        return redirect()->back();
    }

    public function show($id)
    {
        $showComments = $this->comment::where('product_id', $id)->get();
        return view('backend.Comment.showCommentsOfProduct', ['showCommentProduct' => $showComments]);
    }

    public function delete($id)
    {
        Comment::destroy($id);
        return response()->json('Xóa thành công !');
    }

    public function updateStatus(Request $request, $id)
    {
        $status = request()->status;
        $commentUpdate = $this->comment::find($id);
        $result = 0;
        if ($status > config('common.Comments.status.Inactive')) {
            Comment::where('id', $id)->update(['status' => 0]);
            $result = 0;
        } else {
            Comment::where('id', $id)->update(['status' => 1]);
            $result = 1;
        }
        return $result;
    }
}
