<?php
    require 'dbh.php';
    if (isset($_POST['submit-search'])) {
        // $search = mysqli_real_escape_string($conn, $_POST['search']);
        // $sql = "SELECT * FROM universities WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
        // $result = mysqli_query($conn, $sql);
        // $queryResult = mysqli_num_rows($result);

		$search = $_POST['search'];
		$query = "SELECT * FROM universities WHERE title LIKE ? OR content LIKE ?";
        $stmt = $conn->prepare($query);
        $searchTerm = "%$search%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $queryResult = $result->num_rows;
    }
?>

<div class="container">
	<?include('filters.php')?>
  	<section class="search-results">
        <?if ($queryResult > 0) {?>
            <div class="search-num w-100 text-center mt-5 mb-2">
                <? if ($queryResult == 1) {
                  echo "There is ".$queryResult." result found:";
              	} else {
                	echo "There are ".$queryResult." results found:";
              	}?>
            </div>
            <div id="posts" class="universities gap-4 mb-5">
                <?while ($row = mysqli_fetch_assoc($result)) {?>
                    <div class="university">
                        <div class="uni__info">
                            <div class="rate__block d-flex flex-column align-items-center">
                                <img src="assets/images/<?=$row['id']?>.jpg" alt="" class="unImg">
                                <div class="rating">
                                    <i class="star fa-star far"></i> 
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <i class="star fa-star far"></i>
                                    <span><?$avgRating = $row['rating']; echo "$avgRating"?> / 5.0</span>
                                    <span name="stars-filled" value=<?=$avgRating?>></span>
                                </div>
                            </div>
                            <a href="<?=$row['link']?>">
                              	<h2>
                              		<?=$row['title']?>
                          		</h2>
                            </a>
                            <p class="over__hidden-5">
                            	<?=$row['content']?>
                            </p>
                          	<a href="?id=<?=$row['id']?>"> 
                              <div class="btn-static view">
                              	View more
                              </div>
                          	</a>
                        </div>
                    </div>
                <?}?>
            </div>
        <?} else {?>
            <div class="search-num w-100 text-center mt-5 mb-2">No results found :(</div> 
        <?}?>
  	</section>
</div>