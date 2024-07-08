<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム画面</title>
    <!--CSS-->
    <link rel="stylesheet" href="./Home/Home.css">
</head>
<body>
  <?php
    //ログ
    file_put_contents('Log.txt', date("Y/m/d H:i:s")."\n", FILE_APPEND | LOCK_EX);
  ?>

  <!--挨拶-->
  <h1 style="font-size: 300%">Thanks for coming</h1>

  <!--活動歴-->
  <div id = 'count'>
    <script src = "./Home/Home.js"></script>
    <script>
        const insertC = document.querySelector('#count');
        insertC.insertAdjacentHTML('beforebegin', "<h2>活動開始：" + firstTime + "</h2>");
        insertC.insertAdjacentHTML('beforebegin', "<h2>" + middle.year + "</h2>");
    </script>
  </div>

  <!--紹介文-->
  <div id = 'profile'>
    <strong>
      Vtuberのいぬぶき はいるです!
      <br>初めて０からプログラミングしてホームページを作ってみました！
      <br>気軽に覗いていってね！
    </strong>
  </div>

  <!--リンク-->
  <div id = "SuperLink">
    <h3 id = 'LinkForm'>各種リンク</h3>
    <p id = "link">
      <a href = "https://youtube.com/@inubukihairu?si=COMb_zSSpzBoXma">YOUTUBE</a>
      <br>
      <a href = "https://x.com/inubukihairu?s=21&t=1zHVrGlz3yOqP13Ke_HeMw">Twitter</a>
      <br>
      <h3 id = 'LinkForm'>各種タグ</h3>
      <h4>
        FN:#はるとも
        <br>FA:#はるArt
        <br>総合:#いぬぶきはいる
      </h4>
    </p>
  </div>

  <!--メール-->
  <div id = 'mail'>
    <h3 style="font-size: 130%">
      依頼などはこちらまで:inubukihairu@gmail.com
      <br>※またはTwitterのDM
    </h3>
  </div>

  <!--各種アクセス-->
  <div id = "SuperLink">
    <h3 id = 'LinkForm'>各ページへのアクセス</h3>
    <p id = "link">
      <a href = "./Diary/Diary.html">info・日記</a>
      <br>
      <a href = "./Profile/Profile.html">プロフィール</a>
      <br>
      <a href = "./Update/Update.html">更新履歴</a>
      <br>
      <a href = "./message/message.php">質問やお便り</a>
      <br>
    </p>
    <strong>【自己紹介】はじめまして！新人Vtuberのいぬぶきはいるです！</strong><br>
    <iframe width="424" height="238" src="https://www.youtube.com/embed/FrP4ZqbBlsE" title="【自己紹介】はじめまして！新人Vtuberのいぬぶきはいるです！" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>

  <!--JS無効時-->
  <noscript>
    JavaScriptが有効ではありません
  </noscript>
</body>
</html>