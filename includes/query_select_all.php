<?php
$query = "SELECT * FROM posts";
$querySelectAll = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($querySelectAll)){
	$post_id = $row['post_id'];
	$post_title = $row["post_title"];
	$post_author = $row["post_author"];
	$post_user = $row["post_user"];
	$post_date = $row["post_date"];
	$post_image = $row["post_image"];
	$post_content = substr($row["post_content"], 0, 100)."...";
	$post_tags = $row["post_tags"];
	$post_comment_count = $row["post_comment_count"];

	//Blog Post
	echo "<h2>";
	echo "<a href='post.php?p_id={$post_id}'>{$post_title}</a>";
	echo "</h2>";
	echo "<p class='lead'>";
	echo "by <a href='index.php'>{$post_author}</a>";
	echo "</p>";
	echo "<p><span class='glyphicon glyphicon-time'></span>{$post_date}</p>";
	echo "<hr>";
	echo "<img width='300px' height='100px' class='img-responsive' src='images/{$post_image}' alt=''>";
	echo "<hr>";
	echo "<p>{$post_content}</p>";
	echo "<a class='btn btn-primary' href='#''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
}
?>