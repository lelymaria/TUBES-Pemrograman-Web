<div class="container">
    <div class="konten" style="padding: 1px 0px 10px 10px;">
        <h3>Event XTC</h3>
       
        <table id="data" border="1" width="100%" cellpadding="10" cellspacing="0">
            <thead style="background-color: black; color: white; ">
                <tr>
                    <th align="center">No.</th>
                    <th>Nama Acara</th>
                    <th>Tanggal Acara</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        <br>
    </div>
</div>

<script type="text/javascript">
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

                    nomer.innerHTML = val['nomer'];
                    nama_acara.innerHTML = val['nama_acara'];
                    tanggal_acara.innerHTML = val['tanggal_acara'];
                }
            } 

        }
    };

    xhttp.send();


}
</script>