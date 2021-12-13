<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <title>Todo</title>
</head>
<body>
  <div class="content">
    <h2 class="title">Todo List</h2>
    <form action="/todo/create" method="POST">
    @csrf
    @error('content')
      <tr>
        <th>Error</th>
        <td>{{$message}}</td>
      </tr>
    @enderror
    <div class="insert">
      <input type="text" name="content">
      <button>追加</button>
    </div>
    </form>
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>{{$item->created_at}}</td>
        <td>
          <form action="/todo/update" method="POST">
          @csrf
            <input type="text" name="content" value="{{$form->content}}">　 <!-- {{$form->content}}で動かなくなってる？ -->
            <button>更新</button>
          </form>
        </td>
        <td>
          <form action="/todo/delete" method="POST">
          @csrf
            <button>削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>