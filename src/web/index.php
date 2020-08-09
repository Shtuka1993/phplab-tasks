<?php
require_once './functions.php';

define('PER_PAGE', 5);

$airports = require './airports.php';

// Filtering
/**
 * Here you need to check $_GET request if it has any filtering
 * and apply filtering by First Airport Name Letter and/or Airport State
 * (see Filtering tasks 1 and 2 below)
 */

/** First of all generate state filtering(if it is set) - so we have array of available letters before filtering by letter  */
if (isset($_GET['filter_by_state'])) {
    $airports = filterByState($airports, $_GET['filter_by_state']);
}

/**
 * Lets generate updated letters array - after applying of filtering
 */
$letters = getUniqueFirstLetters($airports);

if (isset($_GET['filter_by_first_letter'])) {
    $airports = filterByFirstLetter($airports);
}

// Sorting
/**
 * Here you need to check $_GET request if it has sorting key
 * and apply sorting
 * (see Sorting task below)
 */
if (isset($_GET['sort'])) {
    $airports = sortByKey($airports, $_GET['sort']);
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
    $page = ($_GET['page'] > $pagesCount) ? 1 : $_GET['page'];

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

        <?php foreach ($letters as $letter): ?>
            <a href="<?php echo(generateUrl($request, 'filter_by_first_letter', $letter, true)); ?>" <?php echo(($_GET['filter_by_first_letter'] == $letter) ? 'class="font-weight-bold"' : ''); ?>><?php echo($letter); ?></a>
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
            <th scope="col"><a href="<?php echo(generateUrl($request, 'sort', 'name', false)); ?>" <?php echo(($_GET['sort'] == "name") ? 'class="font-italic"' : ''); ?>>Name</a>
            </th>
            <th scope="col"><a href="<?php echo(generateUrl($request, 'sort', 'code', false)); ?>" <?php echo(($_GET['sort'] == "code") ? 'class="font-italic"' : ''); ?>>Code</a>
            </th>
            <th scope="col"><a href="<?php echo(generateUrl($request, 'sort', 'state', false)); ?>" <?php echo(($_GET['sort'] == "state") ? 'class="font-italic"' : ''); ?>>State</a>
            </th>
            <th scope="col"><a href="<?php echo(generateUrl($request, 'sort', 'city', false)); ?>" <?php echo(($_GET['sort'] == "city") ? 'class="font-italic"' : ''); ?>>City</a>
            </th>
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
                <td><?php echo($airport['name']); ?></td>
                <td><?php echo($airport['code']); ?></td>
                <td>
                    <a href="<?php echo(generateUrl($request, 'filter_by_state', $airport['state'], true)); ?>"><?php echo($airport['state']); ?></a>
                </td>
                <td><?php echo($airport['city']); ?></td>
                <td><?php echo($airport['address']); ?></td>
                <td><?php echo($airport['timezone']); ?></td>
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
            <li class="page-item<?php echo(($page == 1) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo(generateURL($request, 'page', 1, false)); ?>"><?php echo(1); ?></a>
            </li>
            <?php if ($pagesCount > PER_PAGE) { ?>
                <?php if ($page > (PER_PAGE + 2)) { ?>
                    <li class="page-item">...</li>
                <?php } ?>
                <?php
                $start = (($page - PER_PAGE) <= 1) ? 2 : ($page - PER_PAGE);
                $end = (($page + PER_PAGE) >= $pagesCount) ? $pagesCount - 1 : ($page + PER_PAGE);
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li class="page-item<?php echo(($i == $page) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo(generateURL($request, 'page', $i, false)); ?>"><?php echo($i); ?></a>
                    </li>
                <?php } ?>
                <?php if ($page <= ($pagesCount - PER_PAGE - 2)) { ?>
                    <li class="page-item">...</li>
                <?php } ?>
                <li class="page-item<?php echo(($page == $pagesCount) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo(generateURL($request, 'page', $pagesCount, false)); ?>"><?php echo($pagesCount); ?></a>
                </li>
            <? } elseif ($pagesCount > 1) {
                for ($i = 2; $i <= $pagesCount; $i++) {
                    ?>
                    <li class="page-item<?php echo(($i == $page) ? ' active' : ''); ?>"><a class="page-link" href="<?php echo(generateURL($request, 'page', $i, false)); ?>"><?php echo($i); ?></a>
                    </li>
                <?php }
            }
            ?>
        </ul>
    </nav>

</main>
</html>
