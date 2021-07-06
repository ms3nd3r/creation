<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="set.css">
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
            $result= '$pts."点！！".$goodComment[$rnd]'; //この文字列を変数化
            $day='goodDay';
        }elseif($pts>=25){
            $result=  '$pts."。イイ感じですね"';
            $day='sosoDay';
        }else{
            $result= '$pts."点です。".$badComment[$rnd]';
            $day='badDay';
        }
    print '<div id=".$day.">';
    print  '<p>今日は・・・</p><p id="msg5">';
    print $result;//上の変数    

    ?> <!--いい一日だったね！とかよく頑張った！とか点数に応じてポジティブな一言-->

    今日の感情をツイートする→<a href="https://twitter.com/share?url=http://r03isc2t751.sub.jp/Emotion_meter/&hashtags=エモメーター&text=<?php print $souhyou.":今日はこんな過ごし方で".$pts."点な一日でした。";?>"
    rel="nofollow"
    target="_blank">tweet</a>
    </div>

</body>
</html>