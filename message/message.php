<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お便り</title>
    <link rel="stylesheet" href="message.css">
</head>
<body>
    <div id = "messageSend">
        <p>お便りを送信（送信した内容は全体公開され、更新後適用されます）
        <form method="post" action="">
            <div>
                <input type="text" name="name" maxlength="20" minlength="1" size="20" placeholder="名前" required>
            </div>
            <div>
                <textarea id = "input" name="messageText" rows="10" cols="75" maxlength="100" minlength="1" placeholder="メッセージ" required></textarea>
            </div>
            <div>
                <button type="submit">送信</button>
            </div>
        </form>
        </p>
    </div>

    <!--戻るボタン設置-->
    <div class = "back_btn">
        <p><a href="../index.php" target = "_blank">戻る
        </a></p>
    </div>

    <div>
        <?php
            // ファイル内行数取得
            $fp = fopen('messageLog.txt', 'r' );
            for( $count = 0; fgets( $fp ); $count++ );
            //60行までに抑える
            if($count < 60) {
                $line_num = $count;
            } else {
                $line_num = 60;   
            }
            
            //ファイル読み込み
            $contents = file('messageLog.txt', FILE_IGNORE_NEW_LINES);

            //開始行選択
            $start_index = count($contents) - $line_num;
            if ( $start_index < 0) {
                $start_index = 0;
            }

            //後ろから読み込む
            $pcheck = 0;
            for ($i = count($contents)-1; $i >= count($contents) - $line_num; $i--) {
                if($pcheck % 3 == 0) {
                    echo "<p>";
                    echo "日時：";
                } else if($pcheck % 3 == 1) {
                    echo "名前：";
                } else {
                    echo "メッセージ：";
                }

                echo $contents[$i] . '<br />';
                $pcheck++;

                if($pcheck % 3 == 0) {
                    echo "</p>";
                }
            }
        ?>
    </div>

    <!--メッセージを書き出す-->
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // フォームから送信されたデータの取得
            //最終行から表示するため反転
            $message = "<br>⇒" . $_POST['messageText'];

            /*未完成　センシティブワード
            if(!preg_match("/hello/", $_POST['messageText'])) {
                $message = "<br>⇒" . $_POST['messageText'];
                //改行を<br>に置換
                $message = str_replace(PHP_EOL, "<br>", $message);
            } else {
                $message = "<br>⇒" . $_POST['messageText'];
                $message = str_replace('hello', '*', $message);
            }
            */
            

            $name = $_POST['name'];
            $logTime = date("Y-m-d H:i:s");

            //出力
            //socket=メッセージの区切りの合図
            file_put_contents('messageLog.txt', $message."\n", FILE_APPEND | LOCK_EX);
            file_put_contents('messageLog.txt', $name."\n", FILE_APPEND | LOCK_EX);
            file_put_contents('messageLog.txt', $logTime."\n", FILE_APPEND | LOCK_EX);
        }
    ?>

    <noscript>JavaScriptが有効ではありません</noscript>
</body>
</html>