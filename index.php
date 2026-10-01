<?php
session_start();

require_once __DIR__ . "/BACK/helpers.php";
require_once __DIR__ . "/BACK/validation.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <script src="./scripts/jq.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./bootstrap.js"></script>
    <script src="./scripts/index.js"></script>

    
    <section id="Registration" class="py-5">
        <div class="container">
            <div class="header">
                <img src="./public/images/logo.png" alt="" class="mx-auto mb-5 d-block">
            </div>
            <div class="box m-auto px-3 py-4 rounded-4 mt-4">
                <i class="fa-solid fa-rotate-left back d-none" onclick=""></i>
                <h4 class="text-center mb-4">Students System</h4>
                <form data-type="add" action="BACK/register.php" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control input" name="firstName" placeholder="First Name *" autocomplete="off" value="<?= old('firstName') ?>">

                    </div><?= getError("firstName"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control input" name="lastName" placeholder="Last Name *" autocomplete="off" value="<?= old('lastName') ?>">

                    </div> <?= getError("lastName"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" class="form-control input" name="email" placeholder="Email *" autocomplete="off" value="<?= old('email') ?>">

                    </div><?= getError("email"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" class="form-control input" name="password" placeholder="password *" autocomplete="off" value="<?= old('password') ?>">
                    </div>
                    <?= getError("password"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                        <input type="text" class="form-control input" name="age" placeholder="Age *" autocomplete="off" value="<?= old('age') ?>">
                    </div>
                    <?= getError("age"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-mobile-button"></i></span>
                        <input type="text" class="form-control input" name="phone" placeholder="Phone *" autocomplete="off" value="<?= old('phone') ?>">
                    </div>
                    <?= getError("phone"); ?>
                    <div class="input-group">
                        <button class="btn text-light d-block w-100 btn-success" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="search-Section" class="pb-5">
        <div class="container w-50 m-auto">
            <form action="" method="POST" id="search">
                <div class="input-group mb-3 ">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" class="form-control input " name="search" placeholder="Search..." autocomplete="off">

                </div>
                <button class="btn text-light d-block mt-4 w-100 btn-success " type="submit">Search</button>
            </form>
        </div>
    </section>
    <section id="Data" class="pb-5">
        <div class="container">
            <p class="alert alert-warning text-center d-none no-data">There are no data</p>
            <div class="cover">
                <table class="table table-light table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include __DIR__ . "/components/tr_students.php"; ?>
                    </tbody>
                </table>
             <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php include __DIR__ . "/components/pages.php"; ?>
                </ul>
            </nav>
            </div>
        </div>
    </section>



</body>

</html>