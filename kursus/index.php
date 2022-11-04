<?php
include('koneksi.php');
$api_url = 'http://localhost/kursus/restapi.php?function=get_kursus';
// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0, 9);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Pembelajaran</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
</head>

<body>

    <div class="container">
        <br />

        <h3 align="center">Kursus Pembelajaran</h3>
        <br />
        <div align="right" style="margin-bottom:5px;">
            <!-- <button type="button" name="add_button" id="add_button" class="btn
btn-success btn-xs">Add</button> -->
            <!-- <a href="tambah.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA HALAMAN</a>
            <a name="add_button" id="add_button" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA MODAL</a> -->
        </div>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL</th>
                        <th>FOTO</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user_data as $user) {
                    ?>
                        <tr>
                            <!-- <td><?php //echo $no++ 
                                        ?></td> -->
                            <td><?php echo $user->id_nama ?></td>
                            <td><?php echo $user->nama ?></td>
                            <td><?php echo $user->deskripsi ?></td>
                            <td><?php echo $user->tanggal ?></td>
                            <td><?php echo $user->foto ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $user->id ?>" class="btn btn-sm btn-primary">EDIT</a>
                                <a href="hapus.php?id=<?php echo $user->id ?>" class="btn btn-sm btn-danger">HAPUS</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_button').click(function() {
            $('#action').val('insert');
            $('#button_action').val('Insert');
            $('.modal-title').text('Add Data');
            $('#apicrudModal').modal('show');
        });
    });

    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });
    });
</script>

</html>