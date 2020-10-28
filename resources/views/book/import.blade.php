@extends('layouts.app')

@section('content')
<div class="card mb-3 text-center" max-width="1500px" max-height="1500px">
  <b class="mt-3 mb-3 h4">TSVファイルを選択し、Importボタンを押して下さい</b>
  <form role="form" method="post" action="import/import-tsv" enctype="multipart/form-data" onsubmit="return import_check()">
    {{ csrf_field() }}
    <input id="file1" type="file" name="tsv_file">
    <div class="form-group">
      <button id="submit1" type="submit" class="btn btn-primary mt-3">インポート</button>
    </div>
  </form>
</div>

<script>
  // ファイルが選択されていない時、インポートボタンを押せない様にする。   
  function import_check() {
    if(document.getElementById("file1").files.length == 0) {
      alert("ファイルを選択してください！");
      return false;
    }
  }
</script>
@endsection
