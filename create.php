<html>
    <head>
        <title>
            Create Article
        </title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once 'process.php' ?>
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
                <div class="col-md-8 md-offset-2">
                    <h1>Create new post</h1>
                    <form action="process.php" method="POST">
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="description">Content</label>
                            <textarea rows="5" class="form-control" name="content" ></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="save">
                                Create
                            </button>
                            <a href="http://cosmodev.com/bulletinboard/">
                                <button class="btn btn-default">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>