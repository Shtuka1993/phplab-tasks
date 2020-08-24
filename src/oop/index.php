<?php
    include_once('app.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Examples for web</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container mt-3">
        <h2>WEB Examples</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#request">Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#cookie">Cookie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#session">Session</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="request" class="container tab-pane active"><br>
                <h3>Request</h3>
                <p>Request all parameters - <b><?php print_r($requestAll); ?></b></p>
                <p>Request selected parameters - <b><?php print_r($requestSelected); ?></b></p>
                <p>Request get test parameter - <b><?php echo $requestTestGet; ?></b></p>
                <p>Request post test parameter - <b><?php echo $requestTestPost; ?></b></p>
                <p>Request post or get test parameter - <b><?php echo $requestTestQuery; ?></b></p>
                <p>Request has parameter test - <b><?php echo $requestHasTest?"TRUE":"FALSE"; ?></b></p>
                <p>User IP - <b><?php echo $ip; ?></b></p>
                <p>User Brouser - <b><?php echo $brouser; ?></b></p>
            </div>
            <div id="cookie" class="container tab-pane fade"><br>
                <h3>Cookie</h3>
                <p>Cookies all - <b><?php print_r($cookiesAll); ?></b></p>
                <p>Cookies check if there is test - <b><?php echo $cookieCheck?"TRUE":"FALSE"; ?></b></p>
                <p>Cookies show test - <b><?php echo $cookieTest; ?></b></p>
                <p>Cookies after removing test 1 - <b><?php print_r($cookiesAllUpdated); ?></b></p>
            </div>
            <div id="session" class="container tab-pane fade"><br>
                <h3>Session</h3>
                <p>Session all - <b><?php print_r($sessionVariables); ?></b></p>
                <p>Session started - <b><?php echo $sessionStarted?"TRUE":"FALSE"; ?></b></p>
                <p>Check data deleting - <b><?php echo $checkDataDeleting ?></b></p>
                <p>Session message - <b><?php echo $sessionMessage; ?></b></p>
                <p>Session data after clearing - <b><?php print_r($sessionVariablesAfterClearing); ?></b></p>
            </div>
        </div>
    </div>

    </body>
</html>