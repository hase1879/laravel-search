<!doctype html>
<html lang="ja">

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

{{-- 仮置き　カテゴリー --}}
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


<details>
    <summary>Details</summary>
    Something small enough to escape casual notice.
</details>


<div class="container">
    @foreach ($major_category_names as $major_category_name)
        <details>
            <summary>{{ $major_category_name }}</summary>
            @foreach ($categories as $category)
                @if ($category->major_category_name === $major_category_name)
                    <label class="samuraimart-sidebar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label><br>
                @endif
            @endforeach
        </details>
    @endforeach
</div>


<h1>大・中・小分類</h1>

<div class="container">

    {{-- 【東京支店】 --}}
    @foreach ($major_category_names as $major_category_name)
         <h2>{{ $major_category_name }}</h2>


        {{-- $minor_category_names（※コントローラーで重複を取り除いている。）--}}
        {{-- 【東京支店の総務部】 --}}

        {{-- 上のforeachで絞った東京、大阪、名古屋だけの３回回る --}}
        {{-- 下のforeachで東京に該当するのを、該当箇所だけ全て回す --}}
        {{-- 東京支店総務部、東京支店総務部、東京支店技術部、東京支店技術部と４回周したくない。絞ったレコードデータで２回だけ --}}
        @foreach ($aldescriptions as $aldescription)
            @if ($aldescription-> $major_category_name  === $major_category_name )
            <h2>{{ $aldescription->description }}</h2>
            @endif

                {{-- 総務部の全ての人事課出力 --}}
                @foreach ($categories as $category)
                    @if ($category->$description === $aldescription->$description)
                    <label class="samuraimart-sidebar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
                    @endif
                @endforeach

        @endforeach
    @endforeach
</div>



<!-- 折り畳み展開ポインタ -->
onclick属性:クリック時にイベント実行

<div onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
<a style="cursor:pointer;">▼ クリックで展開</a>
</div>
<!--// 折り畳み展開ポインタ -->

<!-- 折り畳まれ部分 -->
<div id="open" style="display:none;clear:both;">

<!--ここの部分が折りたたまれる＆展開される部分になります。
自由に記述してください。-->
<p>テスト１</p>
<p>テスト２</p>

</div>
<!--// 折り畳まれ部分 -->


</html>
