<!DOCTYPE html>
<html lang="en">

<head>
    <title>PTCI Student Council Election</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap & CSS -->
    <link rel="stylesheet" href="../../assets/css/home.css" />
        <link rel="stylesheet" href="../../src/stelcom-bootswatch/bootstrap.min.css" />

    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
     <link rel="website icon" type="png" sizes="32x32" href="../../img/logo/PTCI-logo.png">
</head>
<body>
    <!-- class for heading -->
   <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">PTCI Student Council Election</label>

            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="../private/login.php">Log In</a>
                <li><a href="../private/registration.php">Register</a>

            </ul>

    </nav>

<!--  Carousel -->
<div class="container">
    <aside class="carousel">
        <div class="carousel__wrapper">
            <div class="item" id="slide-0"><img src="../../assets/image-home/p1.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-1"><img src="../../assets/image-home/p2.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-2"><img src="../../assets/image-home/p3.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-3"><img src="../../assets/image-home/p1.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-4"><img src="../../assets/image-home/p2.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-5"><img src="../../assets/image-home/p3.jpg" alt=""
                    width="418" height="418" /></div>
            <div class="item" id="slide-6"><img src="../../assets/image-home/p1.jpg" alt=""
                    width="418" height="418" /></div>
        </div>
    </aside>
</div>
        
    
<!-- login Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
    });
</script>
</div>
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PTCI Student Council Election</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap & CSS -->
    <link rel="stylesheet" href="../../assets/css/home.css" />
    <link rel="stylesheet" href="../../src/stelcom-bootswatch/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
    <!-- class for heading -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">PTCI Student Council Election</label>
        <ul>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="../private/login.php">Log In</a></li>
            <li><a href="../private/registration.php">Register</a></li>
        </ul>
    </nav>
    <!--  Carousel -->
    <div class="container">
        <aside class="carousel">
            <div class="carousel__wrapper">
                <div class="item" id="slide-0"><img src="../../assets/image-home/p1.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-1"><img src="../../assets/image-home/p2.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-2"><img src="../../assets/image-home/p3.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-3"><img src="../../assets/image-home/p1.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-4"><img src="../../assets/image-home/p2.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-5"><img src="../../assets/image-home/p3.jpg" alt=""
                        width="418" height="418" /></div>
                <div class="item" id="slide-6"><img src="../../assets/image-home/p1.jpg" alt=""
                        width="418" height="418" /></div>
            </div>
        </aside>
    </div>

    
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
</body>
</html>
```



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

</body>

</html>