<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * 建立一個新的控制器實例。
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 顯示使用者所有任務的清單。
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$tasks=auth()->user()->tasks()->paginate(2);
        $tasks=auth()->user()->tasks;

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);    }

    /**
     * 建立新的任務。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //驗證接收到的表單輸入並建立新的任務
        //讓 name 欄位為必填，且它必須少於 255 字元
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        //建立任務
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        return redirect('/tasks');
    }
}