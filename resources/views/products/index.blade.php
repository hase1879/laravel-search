<!doctype html>
<html lang="ja">

<br>
<h3>検索フォーム（GET）について=========================================</h3>
<br>

{{-- GETメソッドはURL末尾にパラメータを追加して送信。 --}}
<form action="{{ route('products.index') }}" method="get" class="serch-form">
    <input type="text" placeholder="ふりがなで検索" name="keyword">
    <input type="submit" value="検索">
</form>

<table>
    <tr>
        <th>所属部署</th>
        <th>氏名</th>
    </tr>
    {{-- // 配列の中身を順番に取り出し、表形式で出力する --}}
    @foreach ($results as $result)
        <tr><td>{{$result->所属部署}}</td><td>{{$result->氏名}}</td></tr>
    @endforeach

</table>

<br>
<h3>フォームについて=========================================</h3>
<br>

{{-- <form action="データ送信先URL" method="post"> --}}
{{-- postがデータ送信、getがデータ取得 --}}
<form>
    {{-- テキストボックス --}}
    <label>氏名</label>
    <input type="text" placeholder="名前を入力してください">
    <br>

    {{-- セレクトボックス --}}
    <label>年代</label>
    <select>
        <option>10代以下</option>
        <option>20代</option>
        <option>30代</option>
        <option>40代以上</option>
    </select>
    <br>

    {{-- テキストエリア（複数行入力可） --}}
    <label>お問い合わせ内容</label>
    <textarea></textarea>
    <br>

    {{-- ラジオボタン --}}
    {{-- name属性は統一 --}}
    <label>男性</label><input type="radio" name="gender">
    <label>女性</label><input type="radio" name="gender">
    <label>その他</label><input type="radio" name="gender">
    <br>

    {{-- チェックボックス --}}
    <label>利用規約に同意する</label>
    <input type="checkbox">
    <br>
    <br>

    {{-- 送信ボタン --}}
    <input type="submit" value="送信">

    {{-- リセットボタン(フォーム入力内容を初期値にする) --}}
    <input type="reset" value="リセット">
</form>

<br>
<h3>検索機能サンプル=========================================</h3>
<br>




  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">商品検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">

          {{-- 検索フォーム。ルート先。 --}}
          {{-- ページを取得し、飛ばす --}}
          <form method="GET" action="{{ route('products.index')}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">商品名</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">商品カテゴリ</label>
              <div class="col-sm-3">
                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                  <option value="">未選択</option>

                  {{-- 肉類等のデータを入れる --}}
                  {{-- 連想配列でidとcategory_name（テーブルにおいて、同レコード）を入れる --}}
                  @foreach($categories as $id => $所属支社)
                  <option value="{{ $id }}">
                    {{ $所属支社 }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

<br>
<h3>カテゴリー絞り込み=========================================</h3>
<br>

<div class="row">
    {{-- <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div> --}}
    <div class="col-9">
         <div class="container">
            {{-- $categoryに入力されたら --}}
             @if ($category !== null)
                 <a href="{{ route('products.index') }}">トップ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                 <h1>{{ $category->name }}の商品一覧{{$total_count}}件</h1>
             @endif
         </div>
        <div class="container mt-4">
            <div class="row w-100">
                {{-- $productsは、大本は、$request->category --}}
                @foreach($products as $product)
                <div class="col-3">
                    <a href="{{route('products.show', $product)}}">
                        <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samuraimart-product-label mt-2">
                                {{$product->name}}<br>
                                <label>￥{{$product->price}}</label>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>


<br>
<h3>=========================================</h3>
<br>

<a href="{{ route('products.create') }}"> Create New Product</a>

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category ID</th>
        <th >Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->category_id }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a href="{{ route('products.show',$product->id) }}">Show</a>
                <a href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<br>
<h3>==参考======================</h3>
<br>

<div class="container">
    {{-- コントローラから受け取った、変数major_category_controller（
        categoryテーブルのmajor_category_controllerカラムの重複を取り除いたデータが入っている）を下記のコードで１つずつ処理していく。 --}}
    @foreach ($major_category_names as $major_category_name)
    {{-- 第一陣の”本”を出力 --}}
        <h2>{{ $major_category_name }}</h2>
        {{-- 変数categories（categoriesテーブルの全データが入っている） --}}
        {{-- 本のビジネス --}}
        @foreach ($categories as $category)
            {{-- 引数$major_category_nameと同じ場合。 --}}
            @if ($category->major_category_name === $major_category_name)
            {{-- {{ route('products.index', ['category' => $category->id]) }} は、idを取得し、リンクを飛び、productコントローラを通る際にidを渡すので、コントローラーのindexクラスで表示データを絞り込む--}}
                 <label class="samuraimart-sidebar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
            @endif
        @endforeach
    @endforeach
</div>

<br>
<h3>==大・中・小分類======================</h3>
<br>

<div class="container">

    @foreach ($所属支社s as $所属支社)
        <details>
            <summary>{{ $所属支社 }}</summary>

            @foreach ($所属支社_部署s as $所属支社_部署)
                @if ($所属支社_部署-> 所属支社  === $所属支社 )
                <h3>{{ $所属支社_部署->所属部署 }}</h3>
                @endif

                    @foreach ($categories as $category)
                        @if ($category->所属部署 === $所属支社_部署-> 所属部署)
                        <label class="samuraimart-sidebar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->氏名 }}</a></label><br>
                        @endif
                    @endforeach
            @endforeach
        <details>
    @endforeach
</div>

<br>
<h3>==【テンプレ】折り畳み機能===================</h3>
<br>

<details>
    <summary>Details</summary>
    Something small enough to escape casual notice.
</details>

<h3>階層構造を付ける</h3>
<details>
    <summary>Details</summary>
        <details>
            <summary>Details</summary>
            Something small enough to escape casual notice.
        </details>
</details>

<br>
<h3>=========================================</h3>
<br>
