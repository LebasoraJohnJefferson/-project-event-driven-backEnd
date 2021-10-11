<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stores;

class StoresController extends Controller
{
    public function index(){
        return response()->json(Stores::all());
    }


    public function findById($user_id){
        $store_name=DB::table('stores')
        ->select('*')
        ->join('users','users.id','stores.owner_id')
        ->where('stores.store_id',$user_id)
        ->get();
        return response()->json($store_name);
    }

    public function addStore(Request $request){
        $this->validate($request,[
            'owner_id'=>'required',
            'store_name'=>'required',
            'store_description'=>'required',
            'store_image'=>'required',
        ]);

        $store = new Stores();
        $store->owner_id = $request->input('owner_id');
        $store->store_name = $request->input('store_name');
        $store->store_description = $request->input('store_description');
        $store->store_image = $request->input('store_image');
        $store->save();
        return response()->json($store);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'owner_id'=>'required',
            'store_name'=>'required',
            'store_description'=>'required',
            'store_image'=>'required',
        ]);

        $store = Stores::find($id);
        $store->owner_id = $request->input('owner_id');
        $store->store_name = $request->input('store_name');
        $store->store_description = $request->input('store_description');
        $store->store_image = $request->input('store_image');
        $store->save();
        return response()->json($store);
    }

    public function delete($id){
        Stores::findOrFail($id)->delete();
        return response()->json('successfully deleted',200);
    }

}
