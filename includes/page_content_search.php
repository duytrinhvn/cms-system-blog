<!-- Page Content -->
    <div class="container">
		
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
				<?php 
					if( isset($_POST["searchSubmit"]) ){
						$searchInfo = $_POST["searchInfo"];
						include "includes/query_select_search.php";
					}
					else{
						echo "<h1>Result not found</h1>";
					}
					
				?>
                

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>