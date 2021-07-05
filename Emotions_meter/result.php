<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $souhyou=$_POST["souhyou"];
    $hap = $_POST["happy"];
    $fun = $_POST["fun"];
    $sad = $_POST["sad"];
    $ang = $_POST["anger"];
    $pts = 0;
    $goodComment = array("いい一日だったね！","今日は最高だ！","よく頑張ったね！");
    $badComment = array("そういう日もある","明日はきっと良いことあるよ","お疲れ様です。")
    ?>
    <p>今日は・・・</p><p id="msg5"><?php 
        $pts = $hap+$fun-$sad-$ang;
        $rnd = mt_rand(0,2);
        if($pts>= 100){
            print $goodComment[$rnd];
        }elseif($pts<50){
            print "イイ感じですね";
        }else{
            print $badComment[$rnd];
        }
    ?> <!--いい一日だったね！とかよく頑張った！とか点数に応じてポジティブな一言-->
    
    今日の感情をツイートする→<a href="https://twitter.com/share" class="twitter-share-button" 
    data-url="ここに授業用のドメインを入れる" data-text="<?php print $souhyou ?>：こんな一日を過ごしていました。" data-via="【ユーザ名】" 
    data-size="large" data-related="ms3nd3r" data-count="【カウント表示の種類】" 
    data-hashtags="エモメーター">tweet</a>  <!--可能なら総評のテキストを持ってきてツイート出来るようにする-->
    <script>//twitter用
    !function(d,s,id)
    {var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>

</body>
</html>