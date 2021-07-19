<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>結果発表/エモメーター</title>
    <link rel="stylesheet" href="set.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <?php
    $souhyou=htmlspecialchars($_POST["souhyou"],ENT_QUOTES,"UTF-8");
    $hap = htmlspecialchars($_POST["happy"],ENT_QUOTES,"UTF-8");
    $fun = htmlspecialchars($_POST["fun"],ENT_QUOTES,"UTF-8");
    $sad = htmlspecialchars($_POST["sad"],ENT_QUOTES,"UTF-8");
    $ang = htmlspecialchars($_POST["anger"],ENT_QUOTES,"UTF-8");
    $goodComment = array("いい一日だったね！","最高だ！","よく頑張ったね！");
    $badComment = array("そういう日もある。","明日はきっと良いことあるよ。","お疲れ様です。");
    $pts = $hap+$fun-$sad-$ang;
        $rnd = mt_rand(0,2);
        if($pts>75){
            $result= $pts."点！！".$goodComment[$rnd]; //この文字列を変数化
            $day='goodDay';
            $msg='Gmsg';
        }elseif($pts>=25){
            $result=  $pts."点。イイ感じですね！";
            $day='sosoDay';
            $msg='Smsg;';
        }else{
            $result= $pts."点です。".$badComment[$rnd];
            $day='badDay';
            $msg='Bmsg';
        }
    print "<div id=".$day.">"; //結果によってCSSの指定を変更
    print "<h1>Emotions/Meter</h1>";
    print "<h2>今日はどんな一日だった？</h2>";
    print "<hr>";
    print  '<p id="today">今日は・・・</p><p class="'.$msg.'">';
    print $result;//上の変数    

    ?> <!--いい一日だったね！とかよく頑張った！とか点数に応じてポジティブな一言-->
    <hr>
    <p>今日の感情をツイートする→<a href="https://twitter.com/share?url=http://r03isc2t751.sub.jp/Emotion_meter/&hashtags=エモメーター&text=<?php print $souhyou.":今日はこんな過ごし方で".$pts."点な一日でした。";?>"
    rel="nofollow"
    target="_blank" class="twitter-share-button"  data-show-count="false" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Tweet</a>※Twitterに遷移します
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    
    </p>
    <a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">やり直す</a>
    </div>
    <footer>製作:ms3nd3r／<a href="https://github.com/ms3nd3r">GitHubプロフィールを見る</a>／<a href="https://ms3nd3r.github.io/homepage/">ホームページに移動する</a></footer>
</body>
</html>