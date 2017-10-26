<html>
    <head>
        <title>Belajaphp.net - Codeigniter Datatable</title>
    </head>
    <body>
        <div class="container">
            <h3>DATA KARYAWAN</h3>
            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr><th>NIS</th><th>NAMA</th><th>GENDER</th><th>KELS</th><th>ACTION</th></tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#table').DataTable({
                    "ajax" : "http://localhost/epko/class/admin/getsiswa.php",
                    "columns" : [
                        { "data" : "nis" },
                        { "data" : "name" },
                        { "data" : "kelas" },
                        { "data" : "gender" }                        
                    ]
                });
            });
        </script>
 
    </body>
</html>