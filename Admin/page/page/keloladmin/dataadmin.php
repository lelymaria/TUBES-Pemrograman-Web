<head>
    <style>
        .form{
          display:none;
        }
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
    </style>
</head>
<div class="container">

    <table>
        <input type="hidden" id="id">
        <tr>
          <td>Username</td>
          <td>:</td>
          <td>
            <input type="text" id="email">
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td>
            <input type="password" id="password">
          </td>
        </tr>
        <tr>
          <td>
            <button id="btn" onclick="insert()">
              Tambah
            </button>
            <button id="btn_update" onclick="update()" hidden>
              Update
            </button>
          </td>
        </tr>
    </table>
    
    <div class="konten" style="padding: 1px 0px 10px 10px;">
    <div class="kotak">
      <div class="kiri"> <h3>Kelola Admin</h3></div>
        <div class="kanan"> <button type="button" class="add" onClick="form_open()">Tambah Data</button> </div>
   
    </div>
        <table id="data" border="1" width="100%" cellpadding="10" cellspacing="0">
            <thead style="background-color: black; color: white; ">
                <tr>
                    <th align="center">No.</th>
                    <th>Nama User</th>
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
		xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/keloladmin/ajax.php?request=1", true);

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
						var email = NewRow.insertCell(1);
						var aksi_cell = NewRow.insertCell(2);

						nomer.innerHTML = val['nomer'];
						email.innerHTML = val['email']; 
						aksi_cell.innerHTML = '<button onclick="edit('+ val['id'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id'] +')">Hapus</button>'; 

					}
				} 

			}
		};

		xhttp.send();


	}

	function insert() {

		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;

		if(email != '' && password !=''){

			var data = { email : email, password : password };
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/keloladmin/ajax.php?request=2", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Insert successfully.");

						load();

						document.getElementById("email").value = "";
						document.getElementById("password").value = "";
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}

	}

	function edit(id) {
		var email = document.getElementById('email');
		var password = document.getElementById('password');
		var btn = document.getElementById('btn');
		var btn_edit = document.getElementById('btn_edit');
		var btn_update = document.getElementById('btn_update');

		btn.hidden = true;
		btn_update.hidden = false;

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/keloladmin/ajax.php?request=4&id="+id, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var response = JSON.parse(this.responseText);

				for (var key in response) {
					if (response.hasOwnProperty(key)) {
						var val = response[key];

						email.value = val['email']; 
						password.value = val['password'];
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
			xhttp.open("GET", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/keloladmin/ajax.php?request=3&id="+id, true);

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
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;


		if(email != '' && password !=''){

			var data = { id : id, email : email, password : password};
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/TUBES-Pemrograman-Web/Admin/page/page/keloladmin/ajax.php?request=5", true);

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