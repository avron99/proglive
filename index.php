<?php require_once 'classes.php';?>
<html>
<body>
<form action="" method="POST">

    <input name="reverse" type="submit" value="reverse!" />
    <input name="normal" type="submit" value="normal!" />
</form>

</body>
</html>

<?php
header("Content-Type: text/html; charset=utf-8");
require_once 'classes.php';
error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');


$list = new ArticleList();
$reverse = new ReverseArticleList();


for($i=1;$i<4;$i++){
 $newsArticle=new NewsArticle($i,'статья'.$i,'Парк в Южной Корее станет вторым парком развлечений компании 20th Century Fox. Строительство первого началось в Малайзии в декабре 2013 года. Там аттракционы оформят в стиле самых известных фильмов и мультфильмов, снятых киностудией, в том числе «Ледникового периода», «Чужого против хищника», «Планеты обезьян», «Ночи в музее» и «Титаника». Парк планируется открыть в 2016 году.'.$i);
 $crossArticle=new CrossArticle($i,'статья'.$i,'На сегодняшний день в Сеуле действует тематический парк Lotte World. Он был открыт в 1989 году и считается одним из самых больших крытых парков развлечений в мире. Темы аттракционов в основном связаны с известными сказками, легендами и мифами, например, сражениями викингов и приключениями Синдбада.'.$i,'url'.$i);
  $imgArticle = new imgArticle($i, 'сатья с картинкой'.$i, 'текст с картинкой'.$i, 'http://aboutme.org.ua/wp-content/uploads/2013/02/616.jpg');
 $list->add($newsArticle);

    $list->add($crossArticle);
    $reverse->add($newsArticle);
    $reverse->add($crossArticle);
    $list->add($imgArticle);
    $reverse->add($imgArticle);
   
}
$list->del('1');
if (!empty($_POST['reverse'])) {

    $reverse->view();
    }
    if(!empty($_POST['normal'])){
    $list->view();

}



?>