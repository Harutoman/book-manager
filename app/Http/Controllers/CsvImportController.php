<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use SplFileObject;
use App\Book;
use Auth;
use Log;

class CsvImportController extends Controller
{
  public function store(Request $request)
  {
    // setlocaleを設定
    setlocale(LC_ALL, 'ja_JP.UTF-8');

    // アップロードしたファイルを取得
    // 'csv_file' はCSVファイルインポート画面の inputタグのname属性
    $uploaded_file = $request->file('csv_file');

    // アップロードしたファイルの絶対パスを取得
    $file_path = $request->file('csv_file')->path($uploaded_file);

    $file = new SplFileObject($file_path);
    $file->setFlags(SplFileObject::READ_CSV);
    $file->setCsvControl("\t");

    $row_count = 1;
    foreach ($file as $row)
    {
      // 1行目のヘッダーは取り込まない
      if ($row_count > 1)
      {
        $id            = $row[0];
        $parent_id     = $row[1];
        $user_id       = Auth::user()->id;
        $title         = $row[2];
        $title_kana    = $row[3];
        $subtitle      = $row[4];
        $subtitle_kana = $row[5];
        $isbn          = $row[6];
        $author        = $row[7];
        $author_kana   = $row[8];
        $publisher     = $row[9];
        $size          = $row[10];
        $series        = $row[11];
        $series_kana   = $row[12];
        $sales_date    = $row[13];
        $price         = $row[14];
        $url           = $row[15];
        $aff_url       = $row[16];
        $bdate         = $row[17];
        $sd_conv       = $row[18];
        $inmode        = $row[19];
        $c_dtm         = $row[20];
        $memo          = $row[21];

        $book = Book::create([
          'id'            => $id,
          'parent_id'     => $parent_id,
          'user_id'       => $user_id,
          'title'         => $title,
          'title_kana'    => $title_kana,
          'subtitle'      => $subtitle,
          'subtitle_kana' => $subtitle_kana,
          'isbn'          => $isbn,
          'author'        => $author,
          'author_kana'   => $author_kana,
          'publisher'     => $publisher,
          'size'          => $size,
          'series'        => $series,
          'series_kana'   => $series_kana,
          'sales_date'    => $sales_date,
          'price'         => $price,
          'url'           => $url,
          'aff_url'       => $aff_url,
          'bdate'         => $bdate,
          'sd_conv'       => $sd_conv,
          'inmode'        => $inmode,
          'c_dtm'         => $c_dtm,
          'memo'          => $memo
        ]);
      }
      $row_count++;
    }
    return redirect()->route('');
  }
}