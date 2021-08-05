<?php
require "students.php";

$student_id = isset($_GET['id']) ? $_GET['id'] : "0";

$data = get_student($student_id)[0];

if (!empty($_POST['edit_student'])) {
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
        edit_student($data['id'], $data['st_name'], $data['home_town_id']);
        header('location: students_list.php');
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Sửa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h3 class='text-info'>Sửa sinh viên</h3>

    <a href='students_list.php'>Trở về</a>
    <br></br>

    <form method='post' action='student_edit.php?id=<?php echo $data['id']; ?>' style='width: 40%; margin-left: 50px;'>
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" value='<?php echo $data['st_name']; ?>'>
            <p class='text-danger'><?php if (isset($err['st_name'])) echo $err['st_name'] ?></p>
        </div>
        <div class="form-group">
            <label for="home_town">Quê quán</label>
            <input type="text" class="form-control" name="home_town_id" value='<?php echo $data['home_town_id']; ?>'>
            <p class='text-danger'><?php if (isset($err['home_town_id'])) echo $err['home_town_id'] ?></p>
        </div>
        <input type="hidden" name="id" value='<?php echo $data['id']; ?>' />
        <input type="submit" class="btn btn-success" name='edit_student' value="Sửa" />
        
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>