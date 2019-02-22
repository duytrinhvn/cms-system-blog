<?php
$query = " SELECT * FROM posts WHERE post_tags LIKE '%$searchInfo%' ";
$querySelectAll = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($querySelectAll)){
	$cat_title = $row["post_title"];
	$cat_author = $row["post_author"];
	$cat_user = $row["post_user"];
	$cat_date = $row["post_date"];
	$cat_image = $row["post_image"];
	$cat_content = substr($row["post_content"], 0, 100)."...";
	$cat_tags = $row["post_tags"];
	$cat_comment_count = $row["post_comment_count"];

	//Blog Post
	$str = <<<EOD
	<h2>
	<a href="#">{$cat_title}</a>
	</h2>
	<p class="lead">
	by <a href="index.php">{$cat_author}</a>
	</p>
	<p><span class="glyphicon glyphicon-time"></span>{$cat_date}</p>
	<hr>
	<img height="100px" width="300px" class="img-responsive" src="images/{$cat_image}" alt="">
	<hr>
	<p>{$cat_content}</p>
	<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
EOD;
	echo $str;
}
?>