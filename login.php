<?php
include "templates/login.html";
$checkRole !=0 ? header('location:index.php') : '';
// Digunakan untuk memanggil file header.php dan index.php
?>




<?php
if (isset($_POST['submit'])) {
    // Define Variable username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "
    SELECT * FROM user WHERE username='$username' && password='$password'
    ";

    // Execute query
    $eksekusi =$conn->query($query);

    //Query to array
    $data = mysqli_fetch_array($eksekusi);
    if ($data) {
        // Set Session
        $utils->setRole($data);
        
        //Cek Role Pada User
        $checkRole =$utils->checkRole();
        // If admin
        if ($checkRole == 1) {
            //Show
            echo "<script>alert('Login telah berhasil sebagai admin'); window.location.href='dashboard.php'</script>";
        } else {
            // Then Pelanggan
            echo "<script>alert('Login telah berhasil sebagai pelanggan'); window.location.href='index.php'</script>";
        } 
    } else {
            echo "<script>alert('Anda gagal login');</script>";
        }
    
}
?>