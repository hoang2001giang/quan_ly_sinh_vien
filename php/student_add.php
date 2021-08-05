<?php
require "students.php";
if (!empty($_POST['add_student'])) {
    $data = [];
    $data['st_name'] = $_POST['st_name'];
    $data['home_town_id'] = $_POST['home_town_id'];

    $err = [];
    if (empty($data['st_name'])) {
        $err['st_name'] = 'Hãy nhập tên';
    }

    if (empty($data['home_town_id'])) {
        $err['home_town_id'] = 'Hãy nhập quê quán';
    }

    if (!$err) {
        add_student($data['st_name'], $data['home_town_id']);
        header('location: students_list.php');
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Thêm sinh viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h3 class='text-info'>Danh sách sinh viên</h3>

    <a href='students_list.php'>Trở về</a>
    <br></br>

    <form method='post' action='student_add.php' style='width: 40%; margin-left: 50px;'>
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A">
            <p class='text-danger'><?php if (isset($err['st_name'])) echo $err['st_name'] ?></p>
        </div>
        <div class="form-group">
            <label for="home_town">Password</label>
            <input type="text" class="form-control" name="home_town_id" placeholder="vd: 1">
            <p class='text-danger'><?php if (isset($err['home_town_id'])) echo $err['home_town_id'] ?></p>
        </div>
        <input type="submit" class="btn btn-success" name='add_student' value="Thêm"></input>
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>