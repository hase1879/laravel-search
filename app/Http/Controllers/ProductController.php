<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // カテゴリーの絞り込み
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
       $categories = Category::all();

        // pluck('該当カラム')＝該当カラムの全てのフィールドデータを取得
        // unique()は重複分を除去してデータ取得してくれる
        // ここでmajor_category_namesカラムを取得し、indexビューにお届けしている
       $major_category_names = Category::pluck('major_category_name')->unique();
       $所属支社s = Category::pluck('所属支社')->unique();

       $所属支社_部署s = Category::all()->unique(function ($item) {
        return $item['所属支社'].$item['所属部署'];
        });

        // 検索機能
        // keywordというパラメータがあれば
        if($request->keyword !== null){
            $results = Category::where('氏名','like', '%{{$request->keyword}}%')->get();
        }else{
            $results = Category::all();
        }

        //フォームを機能させるために各情報を取得し、viewに返す
        // $categories = Category::all();
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

    //    products.indexを表示するときに、compactにて指定のデータ群を持っていく。
       return view('products.index', compact('products', 'category', 'categories', 'major_category_names', 'total_count','所属支社s','所属支社_部署s','searchWord','categoryId','results'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        return to_route('products.index');


        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $categoryId = $request->input('categoryId'); //カテゴリの値

        $query = Product::query();
        //商品名が入力された場合(isset)、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、m_categoriesテーブルからcategory_idが一致する商品を$queryに代入
        if (isset($categoryId)) {

            $query->where('category_id', $categoryId);
        }

        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $products = $query->orderBy('category_id', 'asc')->paginate(15);

        //m_categoriesテーブルからgetLists();関数でcategory_nameとidを取得する
        $category = new MCategory;
        $categories = $category->getLists();

        return view('searchproduct', [
            'products' => $products,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId,
        ]);

        // //「\\」「%」「_」などの記号を文字としてエスケープさせる
        // public static function escapeLike($str)
        // {
        //     return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->update();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index');
    }
}
