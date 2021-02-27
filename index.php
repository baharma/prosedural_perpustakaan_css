<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css?v=1.1" type="text/css"/>
    <title>Form Login</title>    
    <script language="JavaScript" type="text/javascript">
    <!-- 
        function validasi(){
            if(document.forms["masuk"].username.value==""){
                alert("Peringatan ! \n form username harus di isi")
                document.forms["masuk"].username.focus();
                return false;
            }
            if(document.forms["masuk"].password.value==""){
                alert("Peringatan ! \n form password harus di isi")
                document.forms["masuk"].password.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<h1 class="judul">Peminjaman Perpustakaan</h1>
    <section>
        <form method="POST" action="program/login.php" onsubmit="return validasi()" name="masuk">
        <h1 class="h1-login">Login</h1>
            <input type="text" name="username" placeholder="Masukan username" />
            <input type="password" name="password" placeholder="Masukan Password" />
            <input type="submit" value="Login" name="login">
        </form>
    </section>
</body>
</html> 