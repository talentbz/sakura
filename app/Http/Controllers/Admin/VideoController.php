<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use DataTables;

class VideoController extends Controller
{
    public function index(Request $request) {
        return view('admin.pages.video.index', [
        ]);
    }
    public function add(Request $request) {
        return view('admin.pages.video.create', [
        ]);
    }
    public function add_post(Request $request) {
        $video = new Video;
        $video->url = $request->url;
        $video->search_key = $request->search_key;
        $video->save();
        return response()->json(['data' => 'save']);
    }
    public function edit(Request $request, $id) {
        $video = Video::findOrFail($id);
        return view('admin.pages.video.edit', [
            'video' => $video,
        ]);
    }
    public function edit_post(Request $request) {
        $video = Video::findOrFail($request->id);
        $video->url = $request->url;
        $video->search_key = $request->search_key;
        $video->save();
        return response()->json(['updated' => true]);
    }
    public function delete(Request $request){
        Video::where('id', $request->id)->delete();
        return response()->json(['result' => true]);
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::get();
            return Datatables::of($data)
                            ->editColumn('url', function($row){
                                return  '<div>'.$row->url.'</div>';
                            })
                            ->addColumn('created_at', function($row){
                                return  date("Y-m-d", strtotime($row->created_at));
                            })
                            ->addColumn('action', function($row){
                                return  '<a href="'.route('admin.video.edit', ['id' => $row->id]).'" class="text-success edit" >
                                            <i class="mdi mdi-pencil font-size-18"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="text-danger confirm_delete" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#myModal">
                                            <i class="mdi mdi-delete font-size-18"></i>
                                        </a>';
                            })
                            ->escapeColumns([])
                            ->make(true);
        }
  
    }
}
