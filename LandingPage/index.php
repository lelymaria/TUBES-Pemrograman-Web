<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landing Page</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="page-top">
        <!-- Awal Navbar -->
        <div class="nav" id="header">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                    Join To XTC
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <div class="nav-links">
                <a href="#about" >Sejarah</a>
                <a href="#panduan" >Panduan</a>
                <a href="#table">Table</a>
                <a href="../User/login/login.php" >Sign In</a>
            </div>
        </div>
        <!-- Akhir Navbar -->

        <!-- hero Secction -->
        <div class="hero">
            <div class="konten">
                <h5 class="flag"> WELCOME TO WEBSITE</h5>
                <p><b>Exalt To Creativity</b></p>
            </div>
        </div>
        <section class="about" id="about">
            <div class="max-width">
                <h2 class="title">Sejarah</h2>
                <div class="about-content">
                    <div class="column left">
                        <img src="foto.jpg" alt="gambar">
                    </div>
                    <div class="column right">
                        <div class="text">Exalt To Creativity</div>
                        <p>XTC merupakan komunitas otomotif yang berdiri pada tahun 1982 oleh 7 orang pemuda Bandung. Kemudian 
                            XTC berganti nama menjadi menjadi Exalt To Creativity dengan simbol kelompok berupa bendera berwarna 
                            paling atas putih-biru, muda-biru tua. Di tengahnya ada simbol lebah yang secara 
                            harfiah oleh anggota kelompok XTC dimaknai sebagai solidaritas antaranggota. Bila 
                            salah satu di antara mereka ada yang diserang, maka yang lainnya akan membela seperti 
                            halnya lebah. <br>
                            XTC didirikan pada tanggal 31 Desember 1982 di kota Bandung. Lambang XTC adalah seekor LEBAH. 
                            Artinya lebah sangat berguna hasilnya dapat membuat madu, suka akan keindahan (Bunga).
                            XTC adalah Putih, Biru Muda dan Biru Tua yang melambangkan masa muda yang Putih.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="panduan" id="panduan">
            <div class="max-width">
                <h2 class="title">Panduan Pendaftaran</h2>
                <div class="panduan-content">
                    <div class="column left">
                        <p>Exalt To Creativity membuka pendaftaran bagi kalian yang ingin Bersosial, Berbagi, 
                            Belajar, dan Bermain bersama Komunitas XTC untuk menjadi anggota inti.
                        </p>
                    </div>
                    <div class="column right">
                        <p>Langkah pertama mendaftar adalah klik tombol sign in, jika belum memiliki akun, 
                            harap sign up terlebih dahulu. Kemudian lengkapi data dan berkas yang diminta.
                        </p>
                    </div>
                </div>
                <a href="../User/login/register.php" class="btn">Daftar</a>
            </div>
        </section>
        <section class="table" id="table">
        <div class="max-width">
                <h2 class="title">Data Anggota </h2>
                <div class="panduan-content">
                    <div class="column left">
                        <table id="data" width="100%" border="1" cellpadding="10">
                            <thead style="background-color: black; color: white; ">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="../User/login/register.php" class="btn">Daftar</a>
            </div>
        </section>
        

        <footer>
            <div class="box">
                <div class="max-width">
                    <div class="head">Media Sosial</div>
                    <a href="https://www.facebook.com/groups/287546321653500/?ref=share" class="fa fa-facebook"></a>
                    <a href="https://instagram.com/xtc_indonesia?utm_medium=copy_link" class="fa fa-instagram"></a>
                </div>
                
            </div>

        </footer>
        <script>
            tampil_anggota();

            function tampil_anggota() {
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/kelolauser/ajax-user.php?request=8", true);

                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        var response = JSON.parse(this.responseText);
                        var empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                        empTable.innerHTML = "";

                        for (var key in response) {
                            if (response.hasOwnProperty(key)) {
                                var val = response[key];

                                var NewRow = empTable.insertRow(-1); 
                                let nomer = NewRow.insertCell(0);
                                var nama = NewRow.insertCell(1);
                                let jenis_kelamin = NewRow.insertCell(2);
                                let tanggal_lahir = NewRow.insertCell(3);

                                nomer.innerHTML = val['nomer'];
                                nama.innerHTML = val['nama']; 
                                jenis_kelamin.innerHTML = val['jenis_kelamin'];
                                tanggal_lahir.innerHTML = val['tanggal_lahir'];
                            }
                        } 

                    }
                };

                xhttp.send();


            }
        </script>
    </body>
</html>