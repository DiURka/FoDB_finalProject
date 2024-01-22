<?
$prev = $page - 1;
$next = $page + 1;
$filterParam = isset($_GET['filter']) ? '&filter=' . $_GET['filter'] : '';
$sortParam = isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : '';
?>
<nav>
    <ul class="container pagination justify-content-center mb-5">
        <li class="prevBtn">
            <a href="index.php?page=<?=$prev?><?=$filterParam?><?=$sortParam?>" class="page-link">
                <span class="full-text">&laquo; Previous</span>
                <span class="short-text">&laquo;</span>
            </a>
        </li>
        <? for($i = 1; $i <= $pages; $i++):?>
            <?
                if($page == $i): $active = 'active';
                else: $active = '';
                endif;
            ?>
            <li>
                <a href="index.php?page=<?=$i?><?=$filterParam?><?=$sortParam?>" class="page-link <?=$active?>">
                    <?=$i;?>
                </a>
            </li>
        <? endfor;?>
        <li class="nextBtn">
            <a href="index.php?page=<?=$next?><?=$filterParam?><?=$sortParam?>" class="page-link">
                <span class="full-text">Next &raquo;</span>
                <span class="short-text">&raquo;</span>
            </a>
        </li>
    </ul>
	<script>
  		// pagination
		const pageLinks = document.querySelectorAll(".page-link");
		
		// disable pag.
		function disablePag() {
		  const currentPage = document.querySelector(".page-link.active");
		  const prevBtn = pageLinks[0];
		  const nextBtn = pageLinks[pageLinks.length - 1];
		
		  if (currentPage.innerText == "1") {
		    prevBtn.classList.add("disabled");
		  } else {
		    prevBtn.classList.remove("disabled");
		  }
		
		  if (currentPage.innerText == pageLinks.length - 2) {
		    nextBtn.classList.add("disabled");
		  } else {
		    nextBtn.classList.remove("disabled");
		  }
		} disablePag();
  	</script>
</nav>
