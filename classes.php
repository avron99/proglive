<?php

class Article
{
	var $id;
	var $title;
	var $content;
	var $preview;
	function Article($id, $title, $content)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
        $this->preview = mb_substr($content, 0 ,15,'UTF-8');
	}
	
	//  Функция для вывода статьи
	function view()
	{
		echo "<h1>$this->title</h1><p>$this->content</p><p>$this->preview</p>";
	}
}

class NewsArticle extends Article
{
	var $datetime;

	function NewsArticle($id, $title, $content)
	{
		parent::Article($id, $title, $content);
		$this->datetime = time();
	}
	
	//  Функция для вывода статьи
	function view()
	{
		echo "<h1>$this->title</h1><span style='color: red'>".
				strftime('%d.%m.%y', $this->datetime).
				" <b>Новость</b></span><p>$this->content</p><p>$this->preview</p>";
	}
}

class CrossArticle extends Article
{
	var $source;
	
	function CrossArticle($id, $title, $content, $source)
	{
		parent::Article($id, $title, $content);
		$this->source = $source;
	}

	function view()
	{
		parent::view();
		echo '<small>'.$this->source.'</small>';
	}
}


class ImgArticle extends Article
{
var $img;

function ImgArticle ($id, $title, $content, $img)
{
parent::Article($id, $title, $content);
$this->img=$img;
}
function view()
	{
		echo '<h1>'.$this->title.'</h1><p>'.$this->content.'</p><p>'.$this->preview.'</p><br><img src="'.$this->img.'">';
	}

}


class ArticleList
{
	var $alist;
	
	function add(Article $article)
	{
		$this->alist[] = $article;
	}
	
	//  Вывод статей
	function view()
	{
		foreach($this->alist as $article)
		{
			$article->view();
			echo '<hr />';
		}
	}
    function del($id)
    {
        foreach($this->alist as $key=>$article)
        {

            if($article->id==$id)
            {
                unset($this->alist[$key]);
                return true;
            }

        }

    }

}

class ReverseArticleList extends ArticleList
{

    function view()
    {
        foreach(array_reverse($this->alist) as $article)
        {
            $article->view();
            echo '<hr />';
        }
    }


}

?>