<?php
require_once './functions.php';

define('PER_PAGE', 5);

$airports = require './airports.php';
$url = $_SERVER['REQUEST_URI'];
$url = ($url === '/') ? $url.'?' : $url.'&';

#var_dump($url);
#var_dump($_GET);

// Filtering
/**
 * Here you need to check $_GET request if it has any filtering
 * and apply filtering by First Airport Name Letter and/or Airport State
 * (see Filtering tasks 1 and 2 below)
 */
if (isset($_GET['filter_by_first_letter'])) {
    $airports =  filterByFirstLetter($airports, $_GET['filter_by_first_letter']);
}

if (isset($_GET['filter_by_state'])) {
    $airports =  filterByState($airports, $_GET['filter_by_state']);
}

// Sorting
/**
 * Here you need to check $_GET request if it has sorting key
 * and apply sorting
 * (see Sorting task below)
 */
if (isset($_GET['sort'])) {
    $airports =  sortByKey($airports, $_GET['sort']);
}

$pagesCount = pagination($airports, PER_PAGE);
$request = $_GET;

// Pagination
/**
 * Here you need to check $_GET request if it has pagination key
 * and apply pagination logic
 * (see Pagination task below)
 */
if (isset($_GET['page'])) {
    $page = ( $_GET['page'] > $pagesCount ) ? 1 : $_GET['page'];

} else {
    $page = 1;
}
$airports = getPagination($airports, PER_PAGE, $page);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Airports</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">

    <h1 class="mt-5">US Airports</h1>

    <!--
        Filtering task #1
        Replace # in HREF attribute so that link follows to the same page with the filter_by_first_letter key
        i.e. /?filter_by_first_letter=A or /?filter_by_first_letter=B

        Make sure, that the logic below also works:
         - when you apply filter_by_first_letter the page should be equal 1
         - when you apply filter_by_first_letter, than filter_by_state (see Filtering task #2) is not reset
           i.e. if you have filter_by_state set you can additionally use filter_by_first_letter
    -->
    <div class="alert alert-dark">
        Filter by first letter:

        <?php foreach (getUniqueFirstLetters(require './airports.php') as $letter): ?>
            <a href="<?= generateUrl($request, 'filter_by_first_letter', $letter) ?>"><?= $letter ?></a>
        <?php endforeach; ?>

        <a href="/" class="float-right">Reset all filters</a>
    </div>

    <!--
        Sorting task
        Replace # in HREF so that link follows to the same page with the sort key with the proper sorting value
        i.e. /?sort=name or /?sort=code etc

        Make sure, that the logic below also works:
         - when you apply sorting pagination and filtering are not reset
           i.e. if you already have /?page=2&filter_by_first_letter=A after applying sorting the url should looks like
           /?page=2&filter_by_first_letter=A&sort=name
    -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href="<?= generateUrl($request, 'sort', 'name') ?>">Name</a></th>
            <th scope="col"><a href="<?= generateUrl($request, 'sort', 'code') ?>">Code</a></th>
            <th scope="col"><a href="<?= generateUrl($request, 'sort', 'state') ?>">State</a></th>
            <th scope="col"><a href="<?= generateUrl($request, 'sort', 'city') ?>">City</a></th>
            <th scope="col">Address</th>
            <th scope="col">Timezone</th>
        </tr>
        </thead>
        <tbody>
        <!--
            Filtering task #2
            Replace # in HREF so that link follows to the same page with the filter_by_state key
            i.e. /?filter_by_state=A or /?filter_by_state=B

            Make sure, that the logic below also works:
             - when you apply filter_by_state the page should be equal 1
             - when you apply filter_by_state, than filter_by_first_letter (see Filtering task #1) is not reset
               i.e. if you have filter_by_first_letter set you can additionally use filter_by_state
        -->
        <?php foreach ($airports as $airport): ?>
        <tr>
            <td><?= $airport['name'] ?></td>
            <td><?= $airport['code'] ?></td>
            <td><a href="<?= generateUrl($request, 'filter_by_state', $airport['state']) ?>"><?= $airport['state'] ?></a></td>
            <td><?= $airport['city'] ?></td>
            <td><?= $airport['address'] ?></td>
            <td><?= $airport['timezone'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!--
        Pagination task
        Replace HTML below so that it shows real pages dependently on number of airports after all filters applied

        Make sure, that the logic below also works:
         - show 5 airports per page
         - use page key (i.e. /?page=1)
         - when you apply pagination - all filters and sorting are not reset
    -->
    <nav aria-label="Navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item<?= ($page == 1)?' active':'' ?>"><a class="page-link" href="<?= generateURL($request, 'page', 1) ?>"><?= 1 ?></a></li>
            <?php if ($pagesCount > PER_PAGE) { ?>
                <?php if ($page > ( PER_PAGE + 2 )) { ?>
                    <li class="page-item">...</li>
                <?php } ?>
                <?php
                    $start = ( ( $page - PER_PAGE ) <= 1 ) ? 2 : ( $page - PER_PAGE );
                    $end = ( ( $page + PER_PAGE ) >= $pagesCount ) ? $pagesCount - 1 : ( $page + PER_PAGE );
                    for ($i = $start; $i <= $end; $i++) {
                ?>
                    <li class="page-item<?= ($i == $page)?' active':'' ?>"><a class="page-link" href="<?= generateURL($request, 'page', $i) ?>"><?= $i ?></a></li>
                <?php } ?>
                <?php if ($page <= ( $pagesCount - PER_PAGE - 2 )) { ?>
                    <li class="page-item">...</li>
                <?php } ?>
                <li class="page-item<?= ($page == $pagesCount)?' active':'' ?>"><a class="page-link" href="<?= generateURL($request, 'page', $pagesCount) ?>"><?= $pagesCount ?></a></li>
            <? } ?>
        </ul>
    </nav>

</main>
</html>
