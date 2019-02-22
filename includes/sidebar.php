            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <div class="input-group">
                        <form name="login" method="post" action="includes/login.php">
                            <div class="form-group">
                                <input placeholder="Username" name="username" type="text" class="form-control">
                            </div>

                            <div class="input-group">
                                <input placeholder="Password" name="password" type="password" class="form-control">
                                <br>
                                <input class="btn btn-primary" name="login_submit" type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                    <form name="search" method="post" action="search.php">
                        <input name="searchInfo" type="text" class="form-control">
                        <input name="searchSubmit" type="submit" value="SUBMIT">

                    </form>
                    </div>
                    <!-- /.input-group -->
                </div>
              

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
							<ul class="list-unstyled">
								<?php 
									$querySideBar = "SELECT * FROM categories";
									$resultSideBar = mysqli_query($connection, $querySideBar);

									while($row = mysqli_fetch_assoc($resultSideBar)){
										$cat_title = $row["cat_title"];
                                        $cat_id = $row["cat_id"];
										echo "<li><a href='category.php?c_id={$cat_id}'>{$cat_title}</a></li>";
									}
								?>
							</ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->