<?php
include_once 'config/Db_con.php';


Class News_model{
	

	public function Get_news()
	{
		$sql="SELECT news_id,news_catgory,news_title,news_contation1,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active
		FROM tbl_news WHERE news_active='1' ORDER BY news_date DESC";
		$pdo = DB_con::db_conect();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function get_news_byId($news_id){
		$sql="SELECT news_id,news_catgory,news_title,news_contation1,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active
		FROM tbl_news WHERE news_id='".$news_id."'";
		$pdo =DB_con::db_conect();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;

	}
	public function Get_local_news()
	{
		$sql="SELECT news_id,news_catgory,news_title,news_contation1,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active
		FROM tbl_news WHERE news_active='1' AND news_catgory='1' ORDER BY news_id ASC";
		$pdo = DB_con::db_conect();
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}
?>