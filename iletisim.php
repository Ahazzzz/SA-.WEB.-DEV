<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Bilgileri</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="overflow-x: hidden;">

    <div class="container">
        <div style="margin-left: -19%;">
            <div class="row justify-content-center align-items-center" style="height: 100vh; margin-top: 4%;">
                <div class="col-md-8" style="color: black;">
                    <div class="card-body">
                        <h5 class="card-title text-center">İletişim Bilgileri</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">İsim</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Cinsiyet</th>
                                    <th scope="col">Mesaj</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Veritabanından veya dosyadan form bilgilerini alın
                                // Örneğin, form verilerini içeren bir dosyadan okuyabilirsiniz
                                $dosya = fopen("iletisim_bilgileri.txt", "r") or die("Dosya açılamadı!");
                                while (!feof($dosya)) {
                                    $veri = fgets($dosya);
                                    $bilgiler = explode("|", $veri);
                                    echo "<tr>";
                                    echo "<td>" . $bilgiler[0] . "</td>";
                                    echo "<td>" . $bilgiler[1] . "</td>";
                                    echo "<td>" . $bilgiler[2] . "</td>";
                                    echo "<td>" . $bilgiler[3] . "</td>";
                                    echo "<td>" . $bilgiler[4] . "</td>";
                                    echo "</tr>";
                                }
                                fclose($dosya);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
