<?php


require_once __DIR__."/BACK/helpers.php";
require_once __DIR__."/BACK/get_edit_student.php";
require_once __DIR__."/BACK/validation.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <script src="./scripts/jq.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./bootstrap.js"></script>
    <script src="./scripts/index.js"></script>

    
    <section id="Edit" class="py-5">
        <div class="container">
            <div class="header">
                <img src="./public/images/logo.png" alt="" class="mx-auto mb-5 d-block">
            </div>
            <div class="box m-auto px-3 py-4 rounded-4 mt-4">
                <i class="fa-solid fa-rotate-left back d-none" onclick=""></i>
                <h4 class="text-center mb-4">Edit Student</h4>
                <form data-type="add" action="BACK/edit.php" method="POST">
                   <input type="hidden" class="form-control input" name="student_id"  value="<?= old('id')?>">

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control input" name="firstName" placeholder="First Name *"  autocomplete="off" value="<?= old('firstName')?>">
                        
                    </div><?= getError("firstName"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control input" name="lastName" placeholder="Last Name *"  autocomplete="off" value="<?= old('lastName')?>">
                        
                    </div> <?= getError("lastName"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" class="form-control input" name="email" placeholder="Email *"  autocomplete="off" value="<?= old('email')?>">
                         
                    </div><?= getError("email"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" class="form-control input" name="password" placeholder="password *"  autocomplete="off" value="<?= old('password')?>">
                    </div>
                     <?= getError("password"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                        <input type="text" class="form-control input" name="age" placeholder="Age *"  autocomplete="off" value="<?= old('age')?>">
                    </div>
                     <?= getError("age"); ?>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-mobile-button"></i></span>
                        <input type="text" class="form-control input" name="phone" placeholder="Phone *"  autocomplete="off" value="<?= old('phone')?>">
                    </div>
                     <?= getError("phone"); ?>
                    <div class="input-group">
                        <button class="btn text-light d-block w-100 btn-success btn-info" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
    



</body>

</html>