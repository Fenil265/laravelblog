<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;

class DateRangeController extends Controller
{
    function index()
    {
        return view('date_range');
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            if($request->from_date != '')
            {
                $data = DB::table('posts')
                    ->whereDate('created_at', $request->from_date)
                    ->get();
                $posts = $data;
                $data = view('posts.index', compact('posts'))->render();
//                return  $html;

//                return view('posts.filtered_post', compact('posts'));
            }
            else
            {
                $data = 'opps';
            }
            return json_encode($data);
        }
    }
}
