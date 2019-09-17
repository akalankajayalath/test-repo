<?php
include_once 'models/News_model.php';

$news=new News_model;
$one_news=$news->Get_news();

foreach ($one_news as $key => $value) {
	echo $value['news_contation1']."</br>";
}
?>