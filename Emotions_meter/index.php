<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>エモメーター</title>
    <link rel="stylesheet" href="set.css">
    <!-- <script type="text/javascript" src="test.js"></script> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
<?php
  //カウント数が記録してあるファイルを読み書きできるモードで開く
  $fp = fopen('count.dat', 'r+b');

  //ファイルを排他ロックする
  flock($fp, LOCK_EX);

  //ファイルからカウント数を取得する
  $count = fgets($fp);

  //カウント数を1増やす
  $count++;
?>
    <form action="result.php" method="post">
    <div class="main">
    <h1>Emotions/Meter</h1>
    <h2>今日はどんな一日だった？</h2>
    <div class="counter-area">
    <!-- ファイルから取得したカウント数を表示する -->
    <span class="access-count">このサイトは今まで<?php echo $count; ?>回利用されました！！！</span>
  </div><!-- /.counter-area -->
    <hr>
    <p class="prm"  style="width:400px">嬉しい：<input class="mdl-slider mdl-js-slider" type="range" id="happySlider" min="0" max="100" step="1" value="0" name="happy"><span id="msg1"></span>pts<br>
    何があったか：<input type="text" size="50" name="txt1"></p>
    <p class="prm" style="width:400px">楽しい：<input class="mdl-slider mdl-js-slider" type="range" id="funSlider" min="0" max="100" step="1" value="0" name="fun"><span id="msg2"></span>pts<br>
    何があったか：<input type="text" size="50" name="txt2" ></p>
    <p class="prm" style="width:400px">泣いた：<input class="mdl-slider mdl-js-slider" type="range" id="sadSlider" min="0" max="100" step="1" value="0" name="sad"><span id="msg3"></span>pts<br>
    何があったか：<input type="text" size="50" name="txt3"></p>
    <p class="prm" style="width:400px">怒った：<input class="mdl-slider mdl-js-slider" type="range" id="angerSlider" min="0" max="100" step="1" value="0" name="anger"><span id="msg4"></span>pts<br>
    何があったか：<input type="text" size="50" name="txt4"></p>
    
        <script>    //jsファイル管理にするとエラー出ちゃうから直接入れてます、ごめんなさい
            function inputChange(event){
                msg1.innerText = happySlider.value;
                msg2.innerText = funSlider.value;
                msg3.innerText = sadSlider.value;
                msg4.innerText = angerSlider.value;
            }
            
            let happySlider = document.getElementById('happySlider');
            happySlider.addEventListener('input', inputChange);
            let msg1 = document.getElementById('msg1');

            let funSlider = document.getElementById('funSlider');
            funSlider.addEventListener('input', inputChange);
            let msg2 = document.getElementById('msg2');

            let sadSlider = document.getElementById('sadSlider');
            sadSlider.addEventListener('input', inputChange);
            let msg3 = document.getElementById('msg3');

            let angerSlider = document.getElementById('angerSlider');
            angerSlider.addEventListener('input', inputChange);
            let msg4 = document.getElementById('msg4');
        </script>

    <hr>
    <p class="souhyou"><strong>総評:</strong><input type="text" size="100" name="souhyou"><br>書くときのヒント・上に書いた4つの感情の内訳を基にすると書きやすいよ！</p>
    <input type="submit" value="今日一日のポイントを見たい、ツイートしたい人はこちら" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
    <div class="push"></div>
    </div>
    </form>
    <footer>　　製作:ms3nd3r　　／　　<a href="https://github.com/ms3nd3r">GitHubプロフィールを見る</a>　　／　　<a href="https://ms3nd3r.github.io/homepage/">ホームページに移動する　　</a></footer>
<?php
  //ポインターをファイルの先頭に戻す
  rewind($fp);

  //最新のアクセス数をファイルに書き込む
  fwrite($fp, $count);

  //ファイルのロックを解除する
  flock($fp, LOCK_UN);

  //ファイルを閉じる
  fclose($fp);
?>
</body>
</html>