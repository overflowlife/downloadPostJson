<?php
$json = '[{"status":400,"msg":"parameter d is required."}]';
if(isset($_POST['d'])){
    $json = $_POST['d'];
}
if(isset($_GET['d'])){
    $json = $_GET['d'];
}
/*Thanks to
--------------------------------------------------------
|                                                      |
| https://qiita.com/fallout/items/3682e529d189693109eb |
|                                                      |
--------------------------------------------------------
*/
//-- Content-Type
header('Content-Type: text/plain');
//-- ウェブブラウザが独自にMIMEタイプを判断する処理を抑止する
header('X-Content-Type-Options: nosniff');
//-- ダウンロードファイルのサイズ
header('Content-Length: ' . strlen($json));
//-- ダウンロード時のファイル名
header('Content-Disposition: attachment; filename="content.json"');
//-- keep-aliveを無効にする
header('Connection: close');
//-- readfile()の前に出力バッファリングを無効化する ※詳細は後述
while (ob_get_level()) { ob_end_clean(); }

echo $json;