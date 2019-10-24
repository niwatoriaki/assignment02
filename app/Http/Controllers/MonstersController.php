<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;
class MonstersController extends Controller
{
    //
    public function index()
    {
        $row = DB::table('monsters')->get();
        $data =['row'=>$row];
        return view('monsters.index',$data);
    }
    public function create(){
        return view('monsters.create');
    }
    public function submit(HelloRequest $request){
        $param=['name'=>$request->name,
                'species'=>$request->species,
                'height'=>$request->height,
                'weight'=>$request->weight
            ];
        DB::table('monsters')->insert($param);
        return view('monsters.complete');
    }
    public function list($id = 'none'){
        $monster = DB::table('monsters')->where('id',$id)->get();
        $data = ['row'=>$monster];
        return view('monsters.list',$data);
    }
    public function edit($id = ''){
        $monster = DB::table('monsters')->where('id',$id)->get();
        $data = ['row'=>$monster];
        return view('monsters.edit',$data);
    }
    public function update(HelloRequest $request,$id=''){
        $param=['name'=>$request->name,
                'species'=>$request->species,
                'height'=>$request->height,
                'weight'=>$request->weight
            ];
        DB::table('monsters')->where('id',$id)->update($param);
        return redirect('/monsters');
    }
    public function delete($id=''){
        DB::table('monsters')->where('id',$id)->delete();
        return redirect('/monsters');
    }



}
