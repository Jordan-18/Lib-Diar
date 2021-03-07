<!-- Sambung database -->
<?php
    $conn = mysqli_connect("localhost","root","","lib-diar");

function query($query){
    global $conn;
// ambil data (fecth) dari objek $result
// ada 4 cara
// mysqli_fetch_row()       //Mengembalikan array numerik
// mysqli_fetch_assoc()     //Mengembalikan array assosiative
// mysqli_fetch_array()     //Dapat mengembalikan keduanya(berat)
// mysqli_fetch_object()    //mengembalikan object
    $result = mysqli_query($conn,$query);
    $rows =[];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

// sistem Cari 
function cari($keyword){
    $query = "SELECT * FROM library
            WHERE
            Author LIKE '%$keyword%' 
            OR
            NamaDiary  LIKE '%$keyword%'
            ";
    return query($query);
}
function cari2($keyword){
    $query = "SELECT * FROM super_admin
            WHERE
            USER LIKE '%$keyword%' 
            ";
    return query($query);
}

// register
function register($data){
    global $conn;

    $user = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 =mysqli_real_escape_string($conn, $data["password2"]);

    // cek konfirmasi password

    $result=mysqli_query($conn, "SELECT user FROM register WHERE 
                USER = '$user'");

    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('username sudah terdaftar');
        </script>
        "; 
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
            alert('konfirmasi passsword tidak sesuai');
        </script>
        ";
        return false;
    }

    // return 1;

    // enkripsi password

    $password = password_hash($password, PASSWORD_DEFAULT);
    // password = md5(password);

    // tambahkan user
    mysqli_query($conn, "INSERT INTO register VALUES('','$user','$password')");

    return mysqli_affected_rows($conn);
}
function tambah($data){
    global $conn;
    $Author = htmlspecialchars($data["Author"]);
    $Nama = htmlspecialchars($data["NamaDiary"]);
    $Time = htmlspecialchars($data["Time"]);
    $Text = htmlspecialchars($data["Text"]);
    $GAMBAR = upload();
    if( !$GAMBAR ){
        return false;
    }
// upload gambar^

// QUERY INSERT DATA
    $query = "INSERT INTO library VALUES ('','$Nama','$Author','$Time','$Text','$GAMBAR')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload(){

    $NAMAFILE = $_FILES['GAMBAR']['name'];
    $UKURANFILE = $_FILES['GAMBAR']['size'];
    $error = $_FILES['GAMBAR']['error'];
    $tmpName =$_FILES['GAMBAR']['tmp_name'];

// cek apakah tidak ada gambar yg di upload 
    if($error === 4){
        echo"<script>
            alert('Pilih Gambar terlebih dahulu !');
            </script>";
            return false;
    }
// cek apa yg di upload gambar apa bukan 
    $ekstensiGambarvalid =['jpg','png','jpeg','jfif'];
    $ekstensiGambar =explode('.',$NAMAFILE);
    $ekstensiGambar =strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarvalid)){
        echo"<script>
        alert('Yang anda Upload bukan gambar yang sesuai');
        </script>";
    }

// cek jika ukuran terlalu besar
    if( $UKURANFILE > 1000000){
        echo"<script>
        alert('Ukuran Gambar terlalu besar');
        </script>";
    return false;
    }
// generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;

// lolos pengecekan 
 move_uploaded_file($tmpName,'img/' . $namaFileBaru);

    return $namaFileBaru;
}
// function delete
function hapus($ID){
    global $conn;
    mysqli_query($conn,"DELETE FROM library WHERE id = '$ID'");


    return mysqli_affected_rows($conn);
}
// function ubah
function ubah($data){
    global $conn;

    $ID = $data["ID"];
    $Author = htmlspecialchars($data["Author"]);
    $Nama = htmlspecialchars($data["NamaDiary"]);
    $Time = htmlspecialchars($data["Time"]);
    $Text = htmlspecialchars($data["Text"]);
    $GAMBARLAMA =htmlspecialchars($data["GAMBARLAMA"]);
    
// CEK APAKAH USER PILIH GAMBAR BARU ATAU TIDAK 
 if( $_FILES['GAMBAR']['error'] === 4){
     $GAMBAR = $GAMBARLAMA;
 }else {
     $GAMBAR = upload();
 }  

// QUERY UNSERT DATA
    $query = "UPDATE library SET 
                Author = '$Author',
                NamaDiary = '$Nama',
                Time = '$Time',
                Text = '$Text',
                GAMBAR = '$GAMBAR'

                WHERE id = $ID;
                ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// function comment($data){
//     global $conn;

//     $nama = htmlspecialchars($data["name"]);
//     $email = htmlspecialchars($data["email"]);
//     $Phone = htmlspecialchars($data["Phone"]);
//     $pesan = htmlspecialchars($data["pesan"]);


//     $query = "INSERT INTO komentar VALUES ('','$nama','$email','$Phone','$pesan')";
//     mysqli_query($conn,$query);

//     return mysqli_affected_rows($conn);
// }
?>