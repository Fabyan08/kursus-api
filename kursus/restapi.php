<?php
include('koneksi.php');
if (function_exists($_GET['function'])) {
    $_GET['function']();
}
function get_kursus()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tabel_kursus");

    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message'
        => 'Success',
        'data' => $data
    );
    header('Content-Type:application/json');
    echo json_encode($response);
}

function get_kursus_id()
{
    global $connect;
    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }
    $query = "SELECT * FROM tabel_kursus WHERE id_nama= $id";
    $result = $connect->query($query);
    while ($row =
        mysqli_fetch_object($result)
    ) {
        $data[] = $row;
    }
    if ($data) {
        $response = array(
            'status' => 1,
            'message'
            => 'Success',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'No Data Found'
        );
    }

    header('Content-Type:application/json');
    echo json_encode($response);
}

// function delete_karyawan()
// {
//     global $connect;
//     $query = $connect->query("DELETE * FROM karyawan");

//     while ($row = mysqli_fetch_object($query)) {
//         $data[] = $row;
//     }
//     $response = array(
//         'message' => 'Success',
//         'data' => $data
//     );
//     header('Content-Type:application/json');
//     echo json_encode($response);
// }

// function update_karyawan()
// {
//     global $connect;
//     $query = $connect->query("UPDATE * FROM karyawan");

//     while ($row = mysqli_fetch_object($query)) {
//         $data[] = $row;
//     }
//     $response = array(
//         'message' => 'Success', 
//         'data' => $data
//     );
//     header('Content-Type:application/json');
//     echo json_encode($response);
// }
