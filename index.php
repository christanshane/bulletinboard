<?php require 'process.php' ?>
<?php
        $mysqli = new mysqli('localhost','root','','bulletinboard') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM articles") or die($mysqli->error);
    ?>
<!DOCTYPE html>
    <head>
        <title>Bulletin Board</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </head>
    <body>
    <?php
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-"<?=$_SESSION['msg_type']?>>
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                Bulletin Board
                    <ul class="float-right">
                        <a href="create.php">
                            <button class="btn btn-sm btn-success">
                                Create New <i class="fas fa-plus-square"></i>
                            </button>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead class="white bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td>
                                                <a href="view.php?view=<?php echo $row['id']; ?>">
                                                    <?php echo $row['article_title'] ?> 
                                                </a>
                                            </td>
                                            <td><?php echo $row['article_content'] ?></td>
                                            <td><?php echo $row['date_created'] ?></td>
                                            <td>
                                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">
                                                    Edit
                                                </a>
                                                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                     <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>