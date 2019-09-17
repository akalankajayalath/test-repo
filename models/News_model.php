<?php

include_once 'config/Db_con.php';





Class News_model{

	



	public function Get_news()

	{
		$today=date("Y-m-d");

		$sql="SELECT news_id,news_catgory,news_thumb_image,news_title,news_contation1,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active

		FROM tbl_news WHERE news_active='1' and  news_date='$today' ORDER BY news_id DESC limit 1";

		$pdo = DB_con::db_conect();

		$stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);



	}



	public function get_news_byId($news_id){

		$sql="SELECT news_id,news_catgory,news_title,news_contation1,news_thumb_image,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active

		FROM tbl_news WHERE news_id='".$news_id."'";

		$pdo =DB_con::db_conect();

		$stmt = $pdo->prepare($sql);

        $stmt->execute();

        $data = $stmt->fetch();

        return $data;



	}

	public function Get_local_news($id)

	{

		$sql="SELECT news_id,news_catgory,news_title,news_contation1,news_thumb_image,news_contation2,news_cover_img,news_hover_img,news_title_img,news_date,news_time,news_active

		FROM tbl_news WHERE news_active='1' AND news_catgory=".$id." ORDER BY news_id DESC";

		$pdo = DB_con::db_conect();

		$stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);



	}



	public function Get_vedio()

	{

		$sql="SELECT vedio_id,vedio_title,vedio_link,vedio_active

		FROM tbl_vedio WHERE vedio_active='1' ORDER BY video_add_date DESC";

		$pdo = DB_con::db_conect();

		$stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);



	}

}

?>