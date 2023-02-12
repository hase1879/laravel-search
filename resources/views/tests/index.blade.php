aiueo<br>

<?php

$user_names = ['abc', 'sdafjoi'];

//$user_namesから要素を１つずつ$user_nameに入れ、処理を回していく
//今回はechoなので、出力。
foreach ($user_names as $user_name){
    echo $user_name .'<br>';
    echo $user_name .'<br>';
}
?>
{{-- データを全件表示する一覧画面と、検索結果の一覧表示画面は、同じviewファイル・Controllerのメソッドを使います。
検索boxに何か入力された場合は、Controllerのメソッド内のif文を通ってデータを絞り込み、絞り込んだデータのみを一覧
画面のviewに返します。検索boxに何も入力されていない場合は、if文を通らず、データ全件をviewへ返します。 --}}
<html>
    <head>
        <title>User List</title>
    </head>

    <body>
        <div>
            <form action="{{ route('tests.index') }}" method="GET">
              <input type="text" name="keyword" value="{{ $keyword }}">
              <input type="submit" value="検索">
            </form>
          </div>
          {{-- //*検索機能ここまで*// --}}

          <h1>
            <span>My Book List</span>
            <a href="{{ route('tests.create') }}">[Add]</a>
          </h1>

          <table>
            {{-- tr:行　th:見出しセル　td:データセル --}}
            <tr>
              <th>著書名</th><th>著者名</th>
            </tr>

          {{-- //* 保存されているレコードを一覧表示*// --}}
            @forelse ($tests as $test)
              <tr>
                <td><a href="{{ route('tests.show' , $test) }}">{{ $test->title }}</td></a>
                <td>{{ $test->author }}</td>
              </tr>
            @empty
              <td>No posts!!</td>
            @endforelse
          </table>
    </body>

</html>
