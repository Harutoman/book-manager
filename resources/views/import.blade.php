@extends('layouts.app')

@section('content')
<p>CSVファイルを選択してください</p>
<form role="form" method="post" action="import/import-csv" enctype="multipart/form-data">
{{ csrf_field() }}
  {{-- name属性を Controller で使用します。 --}}
    <input type="file" name="csv_file">
    <div class="form-group">
        {{-- // CSSフレームワークに semantic-ui を使用しておりますので、 clss属性はご使用の環境に合わせて変更してください。 --}}
        <button type="submit" class="ui blue button">インポート</button>
    </div>
</form>
@endsection
