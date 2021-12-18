<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

  /* reset.cssここから */

    html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
    margin:0;
    padding:0;
    border:0;
    outline:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

body {
    line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section {
    display:block;
}

nav ul {
    list-style:none;
}

blockquote, q {
    quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
    content:'';
    content:none;
}

a {
    margin:0;
    padding:0;
    font-size:100%;
    vertical-align:baseline;
    background:transparent;
}

ins {
    background-color:#ff9;
    color:#000;
    text-decoration:none;
}

mark {
    background-color:#ff9;
    color:#000;
    font-style:italic;
    font-weight:bold;
}

del {
    text-decoration: line-through;
}

abbr[title], dfn[title] {
    border-bottom:1px dotted;
    cursor:help;
}

table {
    border-collapse:collapse;
    border-spacing:0;
}

hr {
    display:block;
    height:1px;
    border:0;  
    border-top:1px solid #cccccc;
    margin:1em 0;
    padding:0;
}

input, select {
    vertical-align:middle;
}

/* reset.cssここまで */
/* style.cssここから */

body {
  background-color: #111BDC;
}

.content {
  background-color: #FFFFFF;
  padding: 30px;
  width: 50vw;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border-radius: 10px;
}

.title {
  font-weight: bold;
  font-size: 24px;
  margin-bottom: 15px;
}

.insert {
  display: flex;
  justify-content: space-between;
  margin-bottom: 30px;
}

.input-add {
  width: 80%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
  outline: none;
  appearance: none;
}

.button-add {
  text-align: left;
  border: 2px solid #dc70fa;
  font-size: 12px;
  color: #dc70fa;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}

table {
  text-align: center;
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
}

tr {
  height: 50px;
}

.input-update {
  width: 90%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  appearance: none;
  font-size: 14px;
  outline: none;
}

.button-update {
  text-align: left;
  border: 2px solid #fa9770;
  font-size: 12px;
  color: #fa9770;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}

.button-delete {
  text-align: left;
  border: 2px solid #71fadc;
  font-size: 12px;
  color: #71fadc;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}


  </style>
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
        <input type="text" name="content" class="input-add">
        <button class="button-add">追加</button>
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
          <input type="hidden" name="id" value="{{$item->id}}">
          <input type="text" name="content" value="{{$item->content}}" class="input-update">
        </td>
        <td>
          <button class="button-update">更新</button>
          </form>
        </td>
        <td>
          <form action="/todo/delete" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <button class="button-delete">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>