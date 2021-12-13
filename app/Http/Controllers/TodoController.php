<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {   //データ取得するがされない
            $items = Todo::all();
            $form = Todo::find($request->id);
        return view('index',compact('items','form'));
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    //更新されない
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->content)->update($form);
        return redirect('/');
    }
    //削除できない
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
