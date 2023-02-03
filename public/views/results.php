<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/results.css">
    <title>Register</title>
</head>

<body>
<?php include "menu.php"; ?>

<div class="container">
    <div class="icon">
        <img src="public/img/icon.svg">
    </div>

    <div class="formContainer">
        <div class="headerText">
            Train Lookup
        </div>
        <div class="messages">
            <?php
            if(isset($results)){

                if($results[0] == '' || $results[1] == '' || $results[2] == '') {
                    print("Invalid search query, try again.");
                    return;
                }

                print($results[0]." -> ".$results[1].", ".$results[2]);

                if(sizeof($results[3]) > 0) {
                    echo("<br><br>Found trains: <br>");

                    $trains = $results[3];
                    foreach ($trains as $train) {
                        $urlIterator = 0;
                        $url = '<a href=trainresults?train=';

                        $splitTrain = explode(' ', $train);
                        foreach($splitTrain as $trainURLPart) {
                            $url .= $trainURLPart;
                            if($urlIterator == sizeof($splitTrain) - 1) break;
                            else $url .= '+';
                            $urlIterator++;
                        }
                        $url .= ">";
                        echo $url;

                        print($train);

                        echo("</a>");
                        echo("<br>");
                    }
                }

                else {
                    echo("<br><br>No matching trains found.");
                }
            }
            ?>
        </div>
    </div>
</body>