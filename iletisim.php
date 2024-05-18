<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Kontrol</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    table {
        width: 100%;
    }
</style>

</head>
<body>

<section class="p-5 text-center">
    <div class="container">
        <h2 class="mb-3 font-weight-bold" id="iletisimkontrolbaslik">İLETİŞİM KONTROL</h2>
        <i class="fas fa-code" id="iconn"></i>
        <hr class="cizgi">
    </div>
</section>
<br><br>

<table class="table">
    <thead class="table">
        <tr>
            <th colspan="5" id="basliklar">
                <h3>GELEN BİLGİLER</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td id="basliklar">İsminiz</td>
            <td id="basliklar">
                <?php echo isset($_POST['isim']) ? $_POST['isim'] : "Veri alınamadı."; ?>
            </td>
        </tr>
        <tr>
            <td id="basliklar">E-Mail</td>
            <td id="basliklar">
                <?php echo isset($_POST['email']) ? $_POST['email'] : "Veri alınamadı."; ?>
            </td>
        </tr>
        <tr>
            <td id="basliklar">Telefon</td>
            <td id="basliklar">
                <?php echo isset($_POST['telefon']) ? $_POST['telefon'] : "Veri alınamadı."; ?>
            </td>
        </tr>
        <tr>
            <td id="basliklar">Mesajınız</td>
            <td id="basliklar">
                <?php echo isset($_POST['mesaj']) ? $_POST['mesaj'] : "Veri alınamadı."; ?>
            </td>
        </tr>
    </tbody>
</table>

<?php
$servername = "localhost"; // MySQL sunucu adı
$username = "root"; // MySQL kullanıcı adı (varsayılan olarak root)
$password = ""; // MySQL şifre (varsayılan olarak boş)
$database = "iletisim_bilgileri"; // Kullanılacak veritabanı adı
$table = "iletisim_bilgileri"; // Kullanılacak tablo adı

// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form verilerini al
$isim = isset($_POST['isim']) ? $_POST['isim'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefon = isset($_POST['telefon']) ? $_POST['telefon'] : '';
$mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : '';

// SQL sorgusuyla veritabanına ekle
$sql = "INSERT INTO iletisim_bilgileri (isim, email, telefon, mesaj) VALUES ('$isim', '$email', '$telefon', '$mesaj')";

if ($conn->query($sql) === TRUE) {
    echo "Yeni kayıt oluşturuldu.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

// Veritabanından gelen kayıtları tablo olarak göster
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>İsim</th><th>E-Mail</th><th>Telefon</th><th>Mesaj</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["isim"]."</td><td>".$row["email"]."</td><td>".$row["telefon"]."</td><td>".$row["mesaj"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Veritabanında herhangi bir kayıt bulunamadı.";
}
$conn->close();
?>
</body>
</html>