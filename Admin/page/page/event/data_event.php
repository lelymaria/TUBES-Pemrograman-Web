<head>
    <style>
        .form{
          display:none;
        }
        .btn_update{
            background: green;
            color:white;
            text-decoration:none;
            padding:5px;
            font-weight:600;
            border-radius:5px;
            font-size:12px;
        }
		.btn_tambah{
            background: blue;
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
        .add{
          background:blue ;
            color:white;
            text-decoration:none;
            padding:10px;
            margin-left:80%;  
            font-weight:600;
            border-radius:5px;
            font-size:12px;
            width:150px;
        }
        .kotak{
          display:flex;
          align-content:center;
          width:100%;
          justify-content:space-between;
        }
        .kiri{
          width:40%;
        }
        .kanan{
          width:50%;
          margin:auto 20px;
        }

		
		input,
 textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px; 
}

 input:hover,
 textarea:hover {
    -webkit-transition: border-color 0.3s ease-in-out;
    -moz-transition: border-color 0.3s ease-in-out;
    transition: border-color 0.3s ease-in-out;
    border: 1px solid #aaa;
}
    </style>
</head>
<div class="container">

    <table>
        <input type="hidden" id="id">
        <tr>
          <td>Nama Acara</td>
          <td>:</td>
          <td>
            <input type="text" id="nama_acara">
          </td>
        </tr>
        <tr>
          <td>Tanggaal Acara</td>
          <td>:</td>
          <td>
            <input type="date" id="tanggal_acara">
          </td>
        </tr>
        <tr>
          <td>
            <button class="btn_tambah" id="btn" onclick="insert()">
              Tambah
            </button>
            <button class="btn_update" id="btn_update" onclick="update()" hidden>
              Update
            </button>
          </td>
        </tr>
    </table>
    
    <div class="konten" style="padding: 1px 0px 10px 10px;">
    <div class="kotak">
      	<div class="kiri"> <h3>Kelola Event</h3></div>
    </div>
        <table id="data" border="1" width="100%" cellpadding="10" cellspacing="0">
            <thead style="background-color: black; color: white; ">
                <tr>
                    <th align="center">No.</th>
                    <th>Nama Acara</th>
                    <th>Tanggal Acara</th>
                    <th align="center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        <br>
        <div class="form">
          HALOOOOOO
        </div>
    </div>
</div>

   

<script>
	load();

	function load() {
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/event/ajax.php?request=1", true);

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
						var nama_acara = NewRow.insertCell(1);
                        let tanggal_acara = NewRow.insertCell(2);
						var aksi_cell = NewRow.insertCell(3);

						nomer.innerHTML = val['nomer'];
                        nama_acara.innerHTML = val['nama_acara'];
                        tanggal_acara.innerHTML = val['tanggal_acara'];
						aksi_cell.innerHTML = '<button class="btn_update" onclick="edit('+ val['id'] +')" id="btn_edit">Edit</button> &bull; <button class="btn_delete" onclick="hapus('+ val['id'] +')">Hapus</button>'; 

					}
				} 

			}
		};

		xhttp.send();


	}

	function insert() {

		var nama_acara = document.getElementById('nama_acara').value;
        var tanggal_acara = document.getElementById('tanggal_acara').value;

		if(nama_acara != '' && tanggal_acara !=''){

			var data = { nama_acara : nama_acara, tanggal_acara : tanggal_acara };
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/event/ajax.php?request=2", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Insert successfully.");

						load();

						document.getElementById("nama_acara").value = "";
						document.getElementById("tanggal_acara").value = "";
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}

	}

	function edit(id) {
		var tanggal_acara = document.getElementById('tanggal_acara');
        let nama_acara = document.getElementById('nama_acara');
		var btn = document.getElementById('btn');
		var btn_edit = document.getElementById('btn_edit');
		var btn_update = document.getElementById('btn_update');

		btn.hidden = true;
		btn_update.hidden = false;

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/event/ajax.php?request=4&id="+id, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var response = JSON.parse(this.responseText);

				for (var key in response) {
					if (response.hasOwnProperty(key)) {
						var val = response[key];

						
                        nama_acara.value = val['nama_acara'];
                        tanggal_acara.value = val['tanggal_acara']; 
						document.getElementById("id").value = val['id'];

					}
				} 

			}
		};

		xhttp.send();
	}

	function hapus(id) {
		var xhttp = new XMLHttpRequest();
		var konfirmasi = confirm("Yakin ? Mau di Hapus ?");

		if (konfirmasi) {
			xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/event/ajax.php?request=3&id="+id, true);

			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Delete successfully.");

						load();
					}

				}
			};

			xhttp.send();
		}
	}

	function update() {

		var id = document.getElementById('id').value;
		var nama_acara = document.getElementById('nama_acara').value;
        var tanggal_acara = document.getElementById('tanggal_acara').value;


		if(nama_acara != '' && tanggal_acara !=''){

			var data = { id : id, nama_acara : nama_acara, tanggal_acara : tanggal_acara};
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/event/ajax.php?request=5", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Update successfully.");

						load();
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}
	}
</script>