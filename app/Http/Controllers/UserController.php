<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class UserController extends Controller
{
    function index(){

        $data = Item::all();
        return view('welcome')->with("data",$data);
    }

    function insert(Request $req){
        $item = new Item;
        $item->name = $req->name;
        $item->complete = "no";
        $item->save();
        return redirect()->back();
    }

    function delete($id){
        $del = Item::find($id);
        $del-> delete();
        return redirect()->back()->withSuccess('Your Item Deleted');
    }
    function update($id){
        $com = Item::find($id);
        
        if( $com->complete == 'no' ){

            $com->complete = 'yes';
            $com -> update();
        }
        else{
            $com->complete = 'no';
            $com->update();
        }

        

        return redirect()->back()->withSuccess('Your Item Deleted');
    }
}
