<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris Başarılı</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="app.css",>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

      <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kullanıcı adı ve şifreyi kontrol et
    if ($email === "G221210074@sakarya.edu.tr" && $password === "G221210074") {
        // Kullanıcı doğrulandıysa hoş geldin mesajı göster
        echo "Hoşgeldin " . $email . "<br>Girişiniz Onaylandı.";
    } else {
        // Kullanıcı adı veya şifre yanlışsa hata mesajı göster ve login sayfasına yönlendir
        echo "Kullanıcı e-postası veya şifre hatalı";
    }
}
?>

</body>
</html>