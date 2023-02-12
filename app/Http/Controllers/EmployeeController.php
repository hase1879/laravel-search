<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // フォームからのデータ取得方法を記述
        //!== null 空欄でない場合
        if ($request->category !== null) {
            // where句とpaginateを実装。
            // $productsにProductモデルによりテーブルからデータを必要件数（ページネーション）を
            // 引き抜いて表示。
            //where('検索するフィールド分類名',値)＝該当レコードデータ
            $products = Product::where('category_id', $request->category)->paginate(15);
            //count()で商品数を表示
            $total_count = Product::where('category_id', $request->category)->count();
            //find関数は、行（row,レコード）ごとデータを引き出す
            $category = Category::find($request->category);
        } else {
            $products = Product::paginate(15);
            $total_count = "";
            $category = null;
        }

        // Categoryモデルにより、categoriesテーブルの全データを取得
       $employees = Employee::all();
    // pluck('該当カラム')＝該当カラムの全てのフィールドデータを取得
    // unique()は重複分を除去してデータ取得してくれる
    // ここでmajor_category_namesカラムを取得し、indexビューにお届けしている
    // 所属支社の重複取り除き、カラムデータを取得
       $所属支社s = Employee::pluck('所属支社')->unique();

       $所属支社部署s = Employee::all()->unique(function ($item) {
        return $item['所属支社'].$item['所属部署'];
        });

       //products.indexを表示するときに、compactにて指定のデータ群を持っていく。
       return view('employees.index', compact('products', 'category', 'Employees', '所属支社s', 'total_count','所属支社部署s'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
