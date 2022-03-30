<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;


class InquiryController extends Controller
{
    public function index(Request $request){
        
        $inquery = Inquiry::orderBy('id', 'desc')->get();
        return view('admin.pages.inquiry.index', [
            'inquery' => $inquery,
        ]);
    }

    public function detail(Request $request){
        $id = $request->id;
        $inquery = Inquiry::findOrFail($id);
        return response()->json(['result' => true, 'data' => $inquery]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $inquery = Inquiry::findOrFail($id);
        $inquery->delete();
        return response()->json(['result' => true, 'data' => $inquery]);
    }
}
