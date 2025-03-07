<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        dd('test');
        //Eloquent（エロクアント）
        $values = Test::all();

        $count = Test::count();

        $first = Test::findOrFail(1);

        $whereAAA = Test::where('text', '=', 'aaa');

        //クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'aaa')
            ->select('id', 'text')
            ->get();

        dd($values, $count, $first, $whereAAA, $queryBuilder);

        return view('tests.test', compact('values'));
    }
}
