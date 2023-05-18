

"<script type='text/javascript'> document.location = 'indexs.php'; </script>"

<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nama_pemesan = $_POST['nama_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$nama_tamu = $_POST['nama_tamu'];
$id_kamar = $_POST['id_kamar'];

//mengirim ke databases
mysqli_query($koneksi, "insert into pesanan values('','$cek_in','$cek_out','$jml_kamar','$nama_pemesan','$email_pemesan','$hp_pemesan','$nama_tamu','$id_kamar','1')");

//Sesudah Menginput Di alihkan Ke halaman index

?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";

$emailditerima = $_POST['email_pemesan'];
$nama_pemesan = $_POST['nama_pemesan'];
$id_kamar = $_POST['id_kamar'];
$tanggal_checkin = $_POST['cek_in'];
$tanggal_checkout = $_POST['cek_out'];
$jml_tamu = $_POST['jml_kamar'];
$no_telp  = $_POST['hp_pemesan'];
$total_harga = $jml_tamu * $harga_kamar;
$selected_room = explode('|', $id_kamar);
$no_kamar = $selected_room[0];
$id_kamar = $selected_room[1];
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// ID Kamar yang diinginkan // Ganti dengan ID kamar yang diinginkan

// Query untuk mengambil data dari tabel fasilitas_kamar berdasarkan ID Kamar
$sql = "SELECT * FROM fasilitas_kamar WHERE id_kamar = $no_kamar";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data hasil query
    while ($row = $result->fetch_assoc()) {
        $idFasilitas = $row["id_fasilitas"];
        $fasilitas = $row["fasilitas"];
        $harga = $row["harga"];

        // Lakukan sesuatu dengan data yang telah diambil
       
    }
} else {
    echo "Tidak ada data fasilitas untuk ID Kamar $idKamar.";
}

$conn->close();
$total_harga = $harga * $jml_kamar;
$hasil_format = number_format($total_harga, 0, ',', '.');
$harga_satuan =  number_format($harga, 0, ',', '.');
$mail = new PHPMailer;
 
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "tls://smtp.gmail.com"; //host mail server
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "nikmataja03@gmail.com";   //nama-email smtp          
$mail->Password = "volc xxix hvxq ijme";           //password email smtp
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   
 
$mail->From = "nikmataja03@gmail.com"; //email pengirim
$mail->FromName = " Rep Hotel"; //nama pengirim
 
$mail->addAddress($email_pemesan); //email penerima

$mail->isHTML(true);
$logoPath = 'logo.png';
$mail->addAttachment($logoPath, 'logo.png');
$mail->Subject =  "Bukti Pemesanan"; //subject
$mail->Body    = '  <html>
<head>
    <style>
        .header {
            text-align: center;
            background-color: #f2f2f2;
            padding: 20px;
        }
        table {
            border: 1px solid black;
            padding: 25px;
            width: 100%;
          }
       
          
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="cid:logo.png" alt="Detail Pemesanan" class="logo" />
        <h2>Bukti Pemesanan Hotel</h2>
        <a>Terima kasih telah memesan kamar di hotel kami dengan senang hati kami mengonfirmasi pesanan Anda dengan rincian sebagai berikut:</a>
    </div>
    <table>
        <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td>'.$nama_pemesan.'</td>
        </tr>
        <tr>
        <td>Nama Kamar</td>
        <td>:</td>
        <td>'.$id_kamar.'</td>
    </tr>
        <tr>
            <td>Tanggal Checkin</td>
            <td>:</td>
            <td>'.$tanggal_checkin.'</td>
        </tr>
        <tr>
            <td>Tanggal Checkout</td>
            <td>:</td>
            <td>'.$tanggal_checkout.'</td>
        </tr>
          <tr>
            <td>Nomor Telfon</td>
            <td>:</td>
            <td>'.$no_telp.'</td>
        </tr>
        <tr>
            <td>Jumlah Kamar</td>
            <td>:</td>
            <td>0'.$jml_tamu.'</td>
        </tr>
        <tr>
            <td>Harga per Kamar</td>
            <td>:</td>
            <td>Rp.'.$harga_satuan.'</td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td>Rp.'.$hasil_format.'</td>
        </tr>
    </table>
    <div class="header"><a>Mohon perhatikan bahwa kamar anda telah kami pastikan tersedia pada tanggal '.$tanggal_checkin.'</a></div>
    <div class="footer">
        Terima kasih atas pemesanan Anda!
    </div>
</body>
</html>' ; //isi email



$mail->AltBody = "PHP mailer"; //body email (optional)
 
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
	echo "Message has been sent successfully";
    
}


// Matikan instance PHPMailer

?>
