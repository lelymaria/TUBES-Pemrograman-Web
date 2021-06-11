<head>
    <style>
         .btn_edit{
            background: green;
            color:white;
            text-decoration:none;
            padding:5px;
            font-weight:600;
            border-radius:5px;
            font-size:12px;
        }
        .btn_delete{
            background: red ;
            color:white;
            text-decoration:none;
            padding:5px;
            font-weight:600;
            border-radius:5px;
            font-size:12px;
        }
    </style>
</head>
<div class="container">
    <div class="konten" style="padding: 1px 0px 10px 10px;">
        <h3>Kelola User</h3>
       
        <table id="empTable" border="1" width="100%" cellpadding="10" cellspacing="0">
            <thead style="background-color: black; color: white; ">
                <tr>
                    <th align="center">No.</th>
                    <th>Nama User</th>
                    <th>Tanggal Daftar</th>
                    <th align="center">Aksi</th>
                </tr>
            </thead>
            <tbody id="empTable">
            
            </tbody>
        </table>
        <br>
    </div>
</div>

    <script type="text/javascript">
      function hapus(id) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Yakin ? Mau di Hapus");

        if (konfirmasi) {
          xhttp.open("GET", "../../config/ajaxfile.php?request=3&id="+id, true);

          xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              let response = this.responseText;

              if (response == 1) {
                alert("Sukses");

                loadEmployees();
              }
            }
          };

          xhttp.send();
        }

      }
      function validasi() {
        let menu = document.getElementById("menu").value;
        let harga = document.getElementById("harga").value;
        let detail = document.getElementById("detail").value;
        let img = document.getElementById("img").value;
        let msg = document.getElementById('alert');

        if (menu != "" && harga != "") {
          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "../proses/ajaxfile.php", true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // Response
              let response = this.responseText;
              if (response == 1) {
                alert("Insert successfully.");
                loadEmployees();
              }
            }
          };
          let data = {
            menu: menu,
            harga: harga,
            detail: detail,
            img: img,
          };
          xhttp.send(JSON.stringify(data));
        } else {
          alert('Data Harus Diisi');
          window.location = 'dashboard.php';
          return false;
        }
      }

      loadEmployees();

      // Load records with GET request
      function loadEmployees() {
        let xhttp = new XMLHttpRequest();

        // Set GET method and ajax file path with parameter
        xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/kelolauser/ajax-user.php?request=1", true);

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
                let nomer = NewRow.insertCell(0);
                let nama = NewRow.insertCell(1);
                let tanggal_lahir = NewRow.insertCell(2);
                let action = NewRow.insertCell(3);

                nomer.innerHTML = val['nomer'];
                nama.innerHTML = val['nama'];
                tanggal_lahir.innerHTML = val['tanggal_lahir'];
                action.innerHTML = ' <a href="?page=detail_user&id='+val['id']+'" class="btn_delete">DETAIL</a>';
              }
            }
          }
        };

        // Send request
        xhttp.send();
      }
    </script>