@extends('layouts.app')

@section('content')
<p>TSVファイルを選択してください</p>
<form role="form" method="post" action="import/import-tsv" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" name="tsv_file">
  <div class="form-group">
    <button type="submit" class="ui blue button">インポート</button>
  </div>
</form>
@endsection
