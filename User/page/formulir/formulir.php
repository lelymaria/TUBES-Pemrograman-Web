<div class="container">
    <div class="konten">
                <div class="horizontal"  id="data"   >      
                    <fieldset>
                        <legend>Data Pribadi</legend>
                            <table>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td><input type="text" name="nama" id="nama"  placeholder="Nama anda"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" ></td>
                            </tr>
                            <tr>
                                <td>No. NIK</td>
                                <td>:</td>
                                <td><input type="text" name="nik" id="nik"  placeholder="NIK anda"></td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td><input type="text" name="no_hp" id="no_hp"  placeholder="No. Handphone anda"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <select name="jenis_kelamin" id="jenis_kelamin">
                                      <option value="">- Pilih -</option>
                                      <option value="Laki-Laki">Laki - Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                </td>   
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>:</td>
                                <td><input type="text" name="alamat_rumah" id="alamat_rumah"  placeholder="Masukan alamat anda"></td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td>:</td>
                                <td><input type="textarea" name="tujuan" id="tujuan"  placeholder="Tujuan join member ini"></td>
                            </tr>
                            </table>
                            <div class="grup-offset">
                            <button name="submit" type="submit" id="submit" onclick='validasi()'  >Submit</button>
                            <button type="reset" >Reset</button>
                        </div>
                    </fieldset>
                </div>

    </div>
</div>

<script type="text/javascript">

function validasi() {
        let nama = document.getElementById("nama").value;
        let nik = document.getElementById("nik").value;
        let no_hp = document.getElementById("no_hp").value;
        let jenis_kelamin = document.getElementById("jenis_kelamin").value;
        let tujuan = document.getElementById("tujuan").value;
        let tanggal_lahir = document.getElementById("tanggal_lahir").value;
        let alamat_rumah = document.getElementById("alamat_rumah").value;
        let msg = document.getElementById('alert');

        if (nama != "" && nik != "" && no_hp !="" && jenis_kelamin !="" && tujuan !="" && alamat_rumah !="" 
        && tanggal_lahir !="") {
          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/config/ajaxfile.php", true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // Response
              let response = this.responseText;
              if (response == 1) {
                alert("Insert successfully.");
                // loadEmployees();
              }
            }
          };
          let data = {
            nama: nama,
            nik: nik,
            no_hp: no_hp,
            jenis_kelamin: jenis_kelamin,
            tujuan: tujuan,
            tanggal_lahir: tanggal_lahir,
            alamat_rumah: alamat_rumah,
          };
          xhttp.send(JSON.stringify(data));
        } else {
          alert('Data Harus Diisi');
          window.location = 'index.php?page=formulir';
          return false;
        }
      }

      loadEmployees();

      // Load records with GET request
      function loadEmployees() {
        let xhttp = new XMLHttpRequest();

        // Set GET method and ajax file path with parameter
        xhttp.open("GET", "../../config/ajaxfile.php?request=1", true);

        // Content-type
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // call on request changes state
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

            // Parse this.responseText to JSON object
            let response = JSON.parse(this.responseText);

            // Select <table id='empTable'> <tbody>
            let empTable =
              document.getElementById("empTable").getElementsByTagName("tbody")[0];

            // Empty the table <tbody>
            empTable.innerHTML = "";

            // Loop on response object
            for (let key in response) {
              if (response.hasOwnProperty(key)) {
                let val = response[key];

                // insert new row
                let NewRow = empTable.insertRow(-1);
                let no = NewRow.insertCell(0);
                let email = NewRow.insertCell(1);
                let tanggal_daftar = NewRow.insertCell(2);
                let action = NewRow.insertCell(3);

                no.innerHTML = val['no'];
                email.innerHTML = val['email'];
                tanggal_daftar.innerHTML = val['tanggal_daftar'];
                action.innerHTML = '  <a class="btn_edit" href="">UPDATE</a>  <a class="btn_delete" href="">DELETE</a>';
              }
            }
          }
        };

        // Send request
        xhttp.send();
      }
    </script>