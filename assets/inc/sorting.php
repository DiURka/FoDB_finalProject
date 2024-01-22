<div class="sorting d-inline-flex align-items-center gap-4">
    <div class="dropdown h-auto">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by
        </button>
        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
            <li><a class="dropdown-item" href="?sort=default<?= $sort === 'default' ? '&filter=default' : '' ?>#posts">Default</a></li>
            <li><a class="dropdown-item" href="?sort=name&filter=<?= $filter ?>#posts">Name</a></li>
            <li><a class="dropdown-item" href="?sort=rating&filter=<?= $filter ?>#posts">Rating</a></li>
          	<li><a class="dropdown-item" href="?sort=price_asc&filter=<?= $filter ?>#posts">Price ascending</a></li>
        	<li><a class="dropdown-item" href="?sort=price_desc&filter=<?= $filter ?>#posts">Price descending</a></li>
            <!-- add other sorting options here -->
        </ul>
    </div>    
    <form method="GET" class="d-inline-flex align-items-center gap-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" value="gov" <?= $_GET['filter'] === 'gov' ? 'checked' : '' ?>>
            <label class="form-check-label" for="filterGov">
                Government
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" value="priv" <?= $_GET['filter'] === 'priv' ? 'checked' : '' ?>>
            <label class="form-check-label" for="filterPriv">
                Private
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</div>
