<?
include('connection.php');

if (!isset($_GET["variable"]) || empty($_GET['variable'])) {
    header('Location: master.php');
    exit; // It's a good practice to call exit after a header redirect.
} else {
    $usernameinfo = urldecode($_GET['variable']);
    $usernameinfo = stripslashes($usernameinfo);
    $querysqluser = "SELECT  Id_u,Email, Telephone,CIN,ville,Date_nec,gender FROM `utilisateurs` where Nom_prenom = $usernameinfo";
    $resuser = $conn->query($querysqluser);
    while ($rowuser = $resuser->fetch_assoc()) {
        $ID = $rowuser['Id_u'];
        $tele_res = $rowuser["Telephone"];
        $email_res = $rowuser["Email"];
        $date_n = $rowuser["Dete_nec"];
        $ville = $rowuser['ville'];
        $gender = $rowuser["gender"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-body">

            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="cursor: pointer;" onclick="window.history.back();">Routour</li>
                </ol>
            </nav>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4><? echo $usernameinfo ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <? echo $usernameinfo ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><? echo $email_res ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <? echo $tele_res ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <? echo $gender ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ville</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <? echo $ville ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                    $querysqluser = "SELECT `ID_reservation`, `Validation`, `Id_u`, `date_de_debut`, `date_de_fin`, `ID_voiture`
                     FROM `reservation` WHERE Id_u = $ID";
                    $resuser = $conn->query($querysqluser);

                    // Check if there are rows returned
                    if ($resuser->num_rows > 0) {
                        while ($rowuser = $resuser->fetch_assoc()) {
                            $validation = $rowuser['Validation'];
                            $date1 = $rowuser['date_de_debut'];
                            $date2 = $rowuser['date_de_fin'];
                            $voitureidres = $rowuser['ID_voiture'];

                            // Query to fetch car details for each reservation
                            $querysqlvoiture = "SELECT `marque`, `module` FROM `voitures` WHERE `ID_voiture` = $voitureidres";
                            $resvoiture = $conn->query($querysqlvoiture);
                            $rowvoiture = $resvoiture->fetch_assoc();

                            // Display reservation details
                            if ($rowvoiture) {
                                $voituree = $rowvoiture['marque'] . " " . $rowvoiture['module'];
                            } else {
                                $voituree = "Unknown";
                            }
                    ?>
                            <div class="row gutters-sm">
                                <div class="col-sm-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Reservation</h6>
                                            <small><? echo $voituree ?></small><br>
                                            <small><? echo $validation ?></small><br>
                                            <small><? echo $date1 ?></small><br>
                                            <small><? echo $date2 ?></small><br>
                                            <button class="btn btn-info">Anuller</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>