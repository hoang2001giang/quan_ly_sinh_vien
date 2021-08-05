<?php
    require "students.php";
    $students = get_all_students();
    disconnect_db();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Danh sách sinh viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h3 class='text-info'>Danh sách sinh viên</h3>
    
    <a href='student_add.php'>Thêm sinh viên</a>
    <br></br>

    <table id='myTable' class='table table-striped' style='width: 50%; margin-left: 50px'>
        <thead>
            <tr>
                <td scope="col" style='width: 10%'>MSV</td>
                <td scope="col">Tên</td>
                <td scope="col">Quê quán</td>
                <td scope="col">Tùy chọn</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($students as $student) { ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['st_name']; ?></td>
                <td><?php echo $student['home_town_id']; ?></td>
                <td>
                    <form>
                        <input type='button' name='edit' value='Sửa' onclick="window.location.href = 'student_edit.php?id=<?php echo $student['id']; ?>'" />
                        <input type='hidden' name='id' value='<?php echo $student['id']; ?>' />
                        <input type='submit' name='delete' value='Xóa' href='student_delete.php'/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

</body>
</html>