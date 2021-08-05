<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sinh_vien');

global $conn;


function connect_db()
{
    global $conn;
    if (!$conn) {
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($conn === false) {
            die("ERROR" . mysqli_connect_errno());
        }
    }
}

function disconnect_db() {
    global $conn;
    if ($conn) {
        mysqli_close($conn);
    }
}

function get_all_students() {
    global $conn;
    connect_db();
    $sql = 'select * from sinh_vien';
    $query = mysqli_query($conn, $sql);
    
    $res = [];

    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $res[] = $row;
        }
    }

    return $res;
}

function get_student($id) {
    global $conn;
    connect_db();
    $sql = "select * from sinh_vien where id = {$id}";

    $query = mysqli_query($conn, $sql);
    
    $res = [];

    if ($query) {
        $res[] = mysqli_fetch_assoc($query);
    }

    return $res;
}

function add_student($st_name, $home_town_id) {
    global $conn;
    connect_db();
    $st_name = addslashes($st_name);
    $home_town_id = addslashes($home_town_id);

    $sql = "insert into sinh_vien(name, home_town_id) values ('$st_name', '$home_town_id')";

    $query = mysqli_query($conn, $sql);
    return $query;
}

function edit_student($id, $st_name, $home_town_id) {
    global $conn;
    connect_db();

    $st_name = addslashes($st_name);
    $home_town_id = addslashes($home_town_id);

    $sql = "UPDATE sinh_vien SET name = '$st_name' , home_town_id = '$home_town_id' WHERE id = $id";

    $query = mysqli_query($conn, $sql);
    return $query;
}

function delete_student($id) {
    global $conn;
    connect_db();

    $sql = " DELETE FROM sinh_vien WHERE id=$id ";

    $query = mysqli_query($conn, $sql);
    return $query;
}

