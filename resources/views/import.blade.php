@extends('layouts.app')

@section('content')
<p>CSVファイルを選択してください</p>
<form role="form" method="post" action="import/import-csv" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" name="csv_file">
  <div class="form-group">
    <button type="submit" class="ui blue button">インポート</button>
  </div>
</form>
@endsection
