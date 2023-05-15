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
$message = '<p>Kepada ' . $nama_pemesan . ',</p>';
$message .= '<p>Terima kasih telah memesan kamar di hotel kami. Kami dengan senang hati mengkonfirmasi pemesanan Anda dengan rincian sebagai berikut:</p>';
$message .= '<table>';
$message .= '<tr><td>ID Pemesanan:</td><td>' . $id_kamar . '</td></tr>';
$message .= '<tr><td>Tanggal Check-in:</td><td>' . $tanggal_checkin . '</td></tr>';
$message .= '<tr><td>Tanggal Check-out:</td><td>' . $tanggal_checkout . '</td></tr>';
$message .= '<tr><td>Jumlah Kamar yang di Pesan:</td><td>' . $jml_tamu . '</td></tr>';
$message .= '<tr><td>Nomor Telepon:</td><td>' . $no_telp . '</td></tr>';
$message .= '<tr><td>Status:</td><td>PENDING</td></tr>';
$message .= '</table>';
$message .= '<p>Mohon perhatikan bahwa kamar Anda telah kami pastikan tersedia pada tanggal ' . $tanggal_checkin . '. Jika Anda ingin mengubah pemesanan atau memiliki pertanyaan lain, silakan hubungi kami segera.</p>';
$message .= '<p>Kami tunggu kedatangan Anda di hotel kami!</p>';


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
$mail->Username = "Revalinof57@gmail.com";   //nama-email smtp          
$mail->Password = "rpqh qgyl uqtb humo";           //password email smtp
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   
 
$mail->From = "evalinof57@gmail.com"; //email pengirim
$mail->FromName = "Bukti Pemesanan"; //nama pengirim
 
$mail->addAddress($email_pemesan); //email penerima
 
$mail->isHTML(true);
 
$mail->Subject =  "Hotel Bocchuro"; //subject
$mail->Body    = $message ; //isi email
 

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
