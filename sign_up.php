<?
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_prenom = $conn->real_escape_string($_POST['nom_complet']);
    $gender = $conn->real_escape_string($_POST['genre']);
    $date_nec = $conn->real_escape_string($_POST['date_naissance']);
    $email = $conn->real_escape_string($_POST['email']);
    $telephone = $conn->real_escape_string($_POST['numero_telephone']);
    $cin = $conn->real_escape_string($_POST['cin']);
    $ville = $conn->real_escape_string($_POST['ville']);
    $password = $_POST['pass'];

    $sql = "INSERT INTO utilisateurs (Nom_prenom, gender, Date_nec, Email,	password , Telephone, CIN, ville) 
            VALUES ('$nom_prenom', '$gender', '$date_nec', '$email','$password' ,'$telephone', '$cin', '$ville')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        $encodedVariable = urlencode($nom_prenom);
        header('Location: logged.php?variable=' . $encodedVariable);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/sign_up.css">
    <title>Responsive Regisration Form </title>
</head>

<body>
    <section class="container">
        <header>Registration Form</header>
        <form method="post" class="form">
            <div class="input-box">
                <label>Nom complet</label>
                <input type="text" name="nom_complet" placeholder="Entrez le nom complet" required />
            </div>
            <div class="input-box">
                <label>Adresse e-mail</label>
                <input type="email" name="email" placeholder="Entrez l'adresse e-mail" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Numéro de téléphone</label>
                    <input type="tel" name="numero_telephone" placeholder="Entrez le numéro de téléphone" required />
                </div>
                <div class="input-box">
                    <label>Date de naissance</label>
                    <input type="date" name="date_naissance" placeholder="Entrez la date de naissance" required />
                </div>
            </div>
            <div class="gender-box">
                <h3>Genre</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="genre" value="male" checked />
                        <label for="check-male">Masculin</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="genre" value="female" />
                        <label for="check-female">Féminin</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="genre" value="prefer_not_to_say" />
                        <label for="check-other">Préfère ne pas dire</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Adresse</label>
                <div class="column">
                    <input type="text" name="ville" placeholder="Entrez votre ville" required />
                </div>
                <label for="">Votre CIN</label>
                <div class="column">
                    <input type="text" name="cin" placeholder="CIN" required />
                </div>
            </div>
            <div class="input-box">
                <label>Password</label>
                <div class="column">
                    <input type="text" name="pass" required />
                </div>
            </div>
            <button type="submit">Suivant</button>
        </form>

    </section>
</body>

</html>