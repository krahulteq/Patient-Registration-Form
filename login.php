<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "password";
$database = "patient_registration_form";
$conn = mysqli_connect($servername, $username, $password, $database);



$errorcheck = 0;
if (isset($_POST['login'])) {
    $email = $emailErr = "";
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }


    // die('login');
    if (empty($emailErr)) {
        // create a connection 
        // $sql = " SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$pass' ";
        $sql = " SELECT * FROM `user` WHERE `email` = '$email' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);


        // Check for login successfully!
        if ($num == 1) {
            $row = mysqli_fetch_array($result);
            if ($row) {
                // print_r($row);
                $_SESSION['id'] = $row['id'];
                $errorcheck = 1;
                // echo "success";
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Please enter correct details for login...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}

// getting user data from databse
$id = $_SESSION['id'];
$sql = "select*from user where id = $id";
$data = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($data);

$title = $row['title'];
$name = $row['name'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
$cellphone_p = $row['cellphone_p'];
$homephone = $row['homephone'];
$mobilephone = $row['mobilephone'];
$maritial = $row['maritial'];
$social = $row['social'];
$birth = $row['birth'];
$parents = $row['parents'];
$referred = $row['referred'];
$occupation = $row['occupation'];
$cellphone_s = $row['cellphone_s'];
$employer = $row['employer'];
$email = $row['email'];

$medication_p = $row['medication_p'];
$familydoctor = $row['familydoctor'];
$smoke = $row['smoke'];
$medication_list = $row['medication_list'];
$lastexam = $row['lastexam'];
$glasses = $row['glasses'];
$old = $row['old'];
$familyhistory = $row['familyhistory'];
$profile2 = $row['profile'];

$insurance_p = $row['insurance_p'];
$employer_p = $row['employer_p'];
$insured_p = $row['insured_p'];
$birth_p = $row['birth_p'];
$insured_ss_p = $row['insured_ss_p'];
$insurance_s = $row['insurance_s'];
$employer_s = $row['employer_s'];
$insured_s = $row['insured_s'];
$birth_s = $row['birth_s'];
$insured_ss_s = $row['insured_ss_s'];

// update query
if (isset($_POST['update'])) {
    $errorcheck = 0;
    $title_Err = $name_Err = $address_Err = $city_Err = $state_Err = $zip_Err = $cellphone_p_Err = $homephone_Err = $mobilephone_Err = $maritial_Err = $social_Err = $birth_Err = $parents_Err = $referred_Err = $occupation_Err = $cellphone_s_Err = $employer_Err = $email_Err = $medication_p_Err = $familydoctor = $smoke_Err = $medication_list_Err = $lastexam_Err = $glasses_Err = $familyhistory_Err = $profile_Err = $insurance_p_Err = $employer_p_Err = $insured_p_Err = $birth_p_Err = $insured_ss_p_Err = $insurance_s_Err = $employer_s_Err = $insured_s_Err = $birth_s_Err = $insured_ss_s_Err = "";

    //first section 
    $title = trim($_POST['title']);
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zip = trim($_POST['zip']);
    $cellphone_p = trim($_POST['cellphone_p']);
    $homephone = trim($_POST['homephone']);
    $mobilephone = trim($_POST['mobilephone']);

    $maritial = trim($_POST['maritial']);
    $social = trim($_POST['social']);
    $birth = trim($_POST['birth']);
    $parents = trim($_POST['parents']);
    $referred = trim($_POST['referred']);
    $occupation = trim($_POST['occupation']);
    $cellphone_s = trim($_POST['cellphone_s']);
    $employer = trim($_POST['employer']);

    //second section 
    $medication_p = trim($_POST['medication_p']);
    $familydoctor = trim($_POST['familydoctor']);
    $smoke = trim($_POST['smoke']);
    $medication_list = trim($_POST['medication_list']);
    $lastexam = trim($_POST['lastexam']);
    $glasses = trim($_POST['glasses']);
    if ($glasses == 'Yes') {
        $old = trim($_POST['old']);
    }
    $familyhistory = trim($_POST['familyhistory']);

    // profile pic validation
    $target_dir = "assets/images/";
    $profile = $_FILES['profile']['name'];
    $target_file = $target_dir . basename($_FILES["profile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    $allowed_image_extension = array("png", "jpg", "jpeg");

    // written by me
    // $profile = $name . '.' . $imageFileType;
    // $target_file = $target_dir . basename($profile);

    // Third section
    $insurance_p = trim($_POST['insurance_p']);
    $employer_p = trim($_POST['employer_p']);
    $insured_p = trim($_POST['insured_p']);
    $birth_p = trim($_POST['birth_p']);
    $insured_ss_p = trim($_POST['insured_ss_p']);

    $insurance_s = trim($_POST['insurance_s']);
    $employer_s = trim($_POST['employer_s']);
    $insured_s = trim($_POST['insured_s']);
    $birth_s = trim($_POST['birth_s']);
    $insured_ss_s = trim($_POST['insured_ss_s']);

    // PHP validation
    // First section
    if (empty($title)) {
        $title_Err = "Select Title";
        $errorcheck = 1;
    }
    if (empty($name)) {
        $name_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $name_Err = "Please enter character only";
        $errorcheck = 1;
    }
    if (empty($address)) {
        $address_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($city)) {
        $city_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($state)) {
        $state_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($zip)) {
        $zip_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($cellphone_p)) {
        $cellphone_p_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!is_numeric($cellphone_p)) {
        $cellphone_p_Err = "Enter numeric only";
        $errorcheck = 1;
    } elseif (strlen($cellphone_p) != 10) {
        $cellphone_p_Err = "Enter 10 digit only";
        $errorcheck = 1;
    }
    if (empty($homephone)) {
        $homephone_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!is_numeric($homephone)) {
        $homephone_Err = "Enter numeric only";
        $errorcheck = 1;
    } elseif (strlen($homephone) != 10) {
        $homephone_Err = "Enter 10 digit only";
        $errorcheck = 1;
    }
    if (empty($mobilephone)) {
        $mobilephone_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!is_numeric($mobilephone)) {
        $mobilephone_Err = "Enter numeric only";
        $errorcheck = 1;
    } elseif (strlen($mobilephone) != 10) {
        $mobilephone_Err = "Enter 10 digit only";
        $errorcheck = 1;
    }
    if (empty($maritial)) {
        $maritial_Err = "Select Maritial Status";
        $errorcheck = 1;
    }
    if (empty($social)) {
        $social_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($birth)) {
        $birth_Err = "Select birth date";
        $errorcheck = 1;
    }
    if (empty($parents)) {
        $parents_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($referred)) {
        $referred_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($occupation)) {
        $occupation_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($cellphone_s)) {
        $cellphone_s_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!is_numeric($cellphone_s)) {
        $cellphone_s_Err = "Enter numeric only";
        $errorcheck = 1;
    } elseif (strlen($cellphone_s) != 10) {
        $cellphone_s_Err = "Enter 10 digit only";
        $errorcheck = 1;
    }
    if (empty($employer)) {
        $employer_Err = "Can't be blank";
        $errorcheck = 1;
    }

    // second section
    if (empty($medication_p)) {
        $medication_p_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($familydoctor)) {
        $familydoctor_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($smoke)) {
        $smoke_Err = "Select smoke prefrence";
        $errorcheck = 1;
    }
    if (empty($medication_list)) {
        $medication_list_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($lastexam)) {
        $lastexam_Err = "Select last exam date";
        $errorcheck = 1;
    }
    if (empty($glasses)) {
        $glasses_Err = "Select lences prefrence";
        $errorcheck = 1;
    }
    if (empty($familyhistory)) {
        $familyhistory_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($profile)) {
    }
    // Check file size
    elseif ($_FILES["profile"]["size"] > 50000) {
        $profile_Err = 'Sorry, your file is greater than 50kb.';
        $errorcheck = 1;
    } elseif (!in_array($imageFileType, $allowed_image_extension)) {
        $profile_Err = 'Sorry, only JPG, JPEG & PNG files are allowed.';
        $errorcheck = 1;
    }

    //third section
    if (empty($insurance_p)) {
        $insurance_p_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($employer_p)) {
        $employer_p_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($insured_p)) {
        $insured_p_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($birth_p)) {
        $birth_p_Err = "Select birth date";
        $errorcheck = 1;
    }
    if (empty($insured_ss_p)) {
        $insured_ss_p_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($insurance_s)) {
        $insurance_s_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($employer_s)) {
        $employer_s_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($insured_s)) {
        $insured_s_Err = "Can't be blank";
        $errorcheck = 1;
    }
    if (empty($birth_s)) {
        $birth_s_Err = "Select birth date";
        $errorcheck = 1;
    }
    if (empty($insured_ss_s)) {
        $insured_ss_s_Err = "Can't be blank";
        $errorcheck = 1;
    }

    if ($errorcheck == 0) {

        if (!empty($profile)){
            move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
            $profile2 = $profile;
        }else{
            $profile = $profile2;
        }

        // $sql = "INSERT INTO user (name, email, city) 
        $sql = "UPDATE user SET `title` = '$title', `name` = '$name', `address` = '$address', `city` = '$city', `state` = '$state', `zip` = '$zip', `cellphone_p` = '$cellphone_p', `homephone` = '$homephone', `mobilephone` = '$mobilephone', `maritial` = '$maritial', `social` = '$social', `birth` = '$birth', `parents` = '$parents', `referred` = '$referred', `occupation` = '$occupation', `cellphone_s` = '$cellphone_s', `employer` = '$employer', `medication_p` = '$medication_p', `familydoctor` = '$familydoctor', `smoke` = '$smoke', `medication_list` = '$medication_list', `lastexam` = '$lastexam', `glasses` = '$glasses', `old` = '$old', `familyhistory` = '$familyhistory', `profile` = '$profile', `insurance_p` = '$insurance_p', `employer_p` = '$employer_p', `insured_p` = '$insured_p', `birth_p` = '$birth_p', `insured_ss_p` = '$insured_ss_p', `insurance_s` = '$insurance_s', `employer_s` = '$employer_s', `insured_s` = '$insured_s', `birth_s` = '$birth_s', `insured_ss_s` ='$insured_ss_s' 
        WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">You form is updated successfully..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $errorcheck = 1;
        } else {
            echo mysqli_error($conn);
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/ass2/assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./assets/js/script.js"></script>
    <title>Registration Form</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Signup</a>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <?php
    if ($errorcheck == 0) {
    ?>
        <div class="container mt-5">
            <h1>Please Login Here</h1>
            <hr><br>
            <form class="row g-3" method="post">
                <div class="col-md-6">
                    <label for="email" class="form-label">E-Mail</label>
                    <span class="error">*<?php echo $emailErr; ?></span>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="col-12">
                    <button type="submit" name="login" id="login" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    <?php
    }
    ?>

    <div class="container" id="hideAfterFormSubmit">
        <?php
        if ($errorcheck == 1) {
        ?>
            <h2 class="form-head">PATIENT UPDATE FORM</h2>
            <div class="container mt-4">
                <form action="" method="post" enctype="multipart/form-data" id="form">
                    <div class="row ms-3 me-3">
                        <div class="col-md-2 c-border cell-blue">Title</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title1" name="title" <?php echo ($title=='Dr.')?'checked':'' ?> value="Dr.">
                                <label class="form-check-label" for="title">Dr.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title2" name="title" <?php echo ($title=='Mr.')?'checked':'' ?>  value="Mr.">
                                <label class="form-check-label" for="title">Mr.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title3" name="title" <?php echo ($title=='Ms.')?'checked':'' ?> value="Ms.">
                                <label class="form-check-label" for="title">Ms.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title4" name="title" <?php echo ($title=='Mrs.')?'checked':'' ?> value="Mrs.">
                                <label class="form-check-label" for="title">Mrs.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title5" name="title" <?php echo ($title=='Miss.')?'checked':'' ?> value="Miss">
                                <label class="form-check-label" for="title">Miss</label>
                            </div>
                            <span id="titleErr" class="error" name="error"> <?php echo $title_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Marital Status</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial1" <?php echo ($maritial=='Single')?'checked':'' ?> value="Single">
                                <label class="form-check-label" for="maritial">Single</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial2" <?php echo ($maritial=='Married')?'checked':'' ?> value="Married">
                                <label class="form-check-label" for="maritial">Married</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial3" <?php echo ($maritial=='Widowed')?'checked':'' ?> value="Widowed">
                                <label class="form-check-label" for="maritial">Widowed</label>
                            </div>
                            <span id="maritialErr" class="error" name="error"> <?php echo $maritial_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $name; ?>" value="<?php echo $name; ?>" id="name" name="name" class="input" placeholder="Enter your Name" value="">
                            <span id="nameErr" class="error" name="error"> <?php echo $name_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Social Security#</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $social; ?>" id="social" name="social" class="input" placeholder="Enter Social Security">
                            <span id="socialErr" class="error" name="error"> <?php echo $social_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Address</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $address; ?>" id="address" name="address" class="input" placeholder="Enter your address">
                            <span id="addressErr" class="error" name="error"> <?php echo $address_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Birth Date</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="date" value="<?php echo $birth; ?>" id="birth" name="birth" class="input" max="2022-11-11">
                            <span id="birthErr" class="error" name="error"> <?php echo $birth_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">City</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $city; ?>" id="city" name="city" class="input" placeholder="Enter your city">
                            <span id="cityErr" class="error" name="error"> <?php echo $city_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Parents/Guardian</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $parents; ?>" id="parents" name="parents" class="input" placeholder="Enter parents/guardian">
                            <span id="parentsErr" class="error" name="error"> <?php echo $parents_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">State </div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $state; ?>" id="state" name="state" class="input" placeholder="Enter your state">
                            <span id="stateErr" class="error" name="error"> <?php echo $state_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Referred By</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $referred; ?>" id="referred" name="referred" class="input" placeholder="Enter your reference">
                            <span id="referredErr" class="error" name="error"> <?php echo $referred_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Zip</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $zip; ?>" id="zip" name="zip" class="input" placeholder="Enter your zipcode">
                            <span id="zipErr" class="error" name="error"> <?php echo $zip_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Occupation</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $occupation; ?>" id="occupation" name="occupation" class="input" placeholder="Enter your occupation">
                            <span id="occupationErr" class="error" name="error"> <?php echo $occupation_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $cellphone_p; ?>" id="cellphone_p" name="cellphone_p" class="input" placeholder="Enter cell phone">
                            <span id="cellphone_pErr" class="error" name="error"> <?php echo $cellphone_p_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $cellphone_s; ?>" id="cellphone_s" name="cellphone_s" class="input" placeholder="Enter cell phone">
                            <span id="cellphone_sErr" class="error" name="error"> <?php echo $cellphone_s_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Home Phone </div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $homephone; ?>" id="homephone" name="homephone" class="input" placeholder="Enter home phone">
                            <span id="homephoneErr" class="error" name="error"> <?php echo $homephone_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Employer's Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $employer; ?>" id="employer" name="employer" class="input" placeholder="Enter employer name">
                            <span id="employerErr" class="error" name="error"> <?php echo $employer_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Mobile Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $mobilephone; ?>" id="mobilephone" name="mobilephone" class="input" placeholder="Enter mobile phone">
                            <span id="mobilephoneErr" class="error" name="error"> <?php echo $mobilephone_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Employer's Email</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" value="<?php echo $email; ?>" id="email" name="email" class="input" placeholder="Enter Employer email" disabled>
                            <span id="emailErr" class="error" name="error"> <?php echo $email_Err; ?> </span>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row ms-1 me-1">
                            <div class="col-md-4 c-border cell-blue">Other Condition(s)</div>
                            <div class="col-md-8 c-border cell-l-blue">
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Medications are you presently taking</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <textarea value="" id="medication_p" name="medication_p" cols="30" rows="1" class="input" placeholder="<?php echo $medication_p; ?>"><?php echo $medication_p; ?></textarea>
                                <span id="medication_pErr" class="error" name="error"> <?php echo $medication_p_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Name of family docter</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="text" value="<?php echo $familydoctor; ?>" id="familydoctor" name="familydoctor" class="input" placeholder="Enter your family doctor name">
                                <span id="familydoctorErr" class="error" name="error"> <?php echo $familydoctor_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Do you smoke?</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="smoke1" <?php echo ($smoke=='Yes')?'checked':'' ?> name="smoke" value="Yes">
                                    <label class="form-check-label" for="smoke">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="smoke2" <?php echo ($smoke=='No')?'checked':'' ?> name="smoke" value="No">
                                    <label class="form-check-label" for="smoke">No</label>
                                </div>
                                <span id="smokeErr" class="error" name="error"> <?php echo $smoke_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">List any allergies to medications</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <textarea value="" id="medication_list" name="medication_list" cols="30" rows="1" class="input" placeholder="<?php echo $medication_list; ?>"><?php echo $medication_list; ?></textarea>
                                <span id="medication_listErr" class="error" name="error"> <?php echo $medication_list_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Date of last exam</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="date" value="<?php echo $lastexam; ?>" id="lastexam" name="lastexam" class="input" max="">
                                <span id="lastexamErr" class="error" name="error"> <?php echo $lastexam_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Did you ever where glasses or contact lenses?</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="glasses1" <?php echo ($glasses=='Yes')?'checked':'' ?> name="glasses" value="Yes">
                                    <label class="form-check-label" for="glasses">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="glasses2" <?php echo ($glasses=='No')?'checked':'' ?> name="glasses" value="No">
                                    <label class="form-check-label" for="glasses">No</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input value="<?php echo $old; ?>" style="display: none;" type="text" name="old" id="old" placeholder="How old are they?">
                                </div>
                                <span id="glassesErr" class="error" name="error"> <?php echo $glasses_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Family history of eye disorders</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <textarea value="" id="familyhistory" name="familyhistory" cols="30" rows="1" class="input" placeholder="<?php echo $familyhistory; ?>"><?php echo $familyhistory; ?></textarea>
                                <span id="familyhistoryErr" class="error" name="error"> <?php echo $familyhistory_Err; ?> </span>
                            </div>
                            <div class="col-md-4 c-border cell-blue">Profile Pic</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="file" id="profile" name="profile" class="input" accept="image/png, image/jpg, image/jpeg" placeholder="Select profile pic">
                                <img src="assets/images/<?php echo $profile2; ?>" alt="">
                                <span id="profileErr" class="error" name="error"> <?php echo $profile_Err; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5 mb-5">
                        <div class="row ms-1 me-1">
                            <div class="col-md-6 c-border cell-blue center">Primary Insurance</div>
                            <div class="col-md-6 c-border cell-blue center">Secondary Insurance</div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Insurance Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insurance_p; ?>" id="insurance_p" name="insurance_p" class="input" placeholder="Enter insurance name">
                                <span id="insurance_pErr" class="error" name="error"> <?php echo $insurance_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insurance Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insurance_s; ?>" id="insurance_s" name="insurance_s" class="input" placeholder="Enter insurance name">
                                <span id="insurance_sErr" class="error" name="error"> <?php echo $insurance_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Employer</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $employer_p; ?>" id="employer_p" name="employer_p" class="input" placeholder="Enter employer name">
                                <span id="employer_pErr" class="error" name="error"> <?php echo $employer_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Employer</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $employer_s; ?>" id="employer_s" name="employer_s" class="input" placeholder="Enter employer name">
                                <span id="employer_sErr" class="error" name="error"> <?php echo $employer_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insured_p; ?>" id="insured_p" name="insured_p" class="input" placeholder="Enter insured name">
                                <span id="insured_pErr" class="error" name="error"> <?php echo $insured_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insured_s; ?>" id="insured_s" name="insured_s" class="input" placeholder="Enter insured name">
                                <span id="insured_sErr" class="error" name="error"> <?php echo $insured_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Birth Date</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="date" value="<?php echo $birth_p; ?>" id="birth_p" name="birth_p" class="input" max="2022-11-29">
                                <span id="birth_pErr" class="error" name="error"> <?php echo $birth_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Birth Date</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="date" value="<?php echo $birth_s; ?>" id="birth_s" name="birth_s" class="input" max="2022-11-29">
                                <span id="birth_sErr" class="error" name="error"> <?php echo $birth_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Insured's SS#</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insured_ss_p; ?>" id="insured_ss_p" name="insured_ss_p" class="input" placeholder="Enter insured ss">
                                <span id="insured_ss_pErr" class="error" name="error"> <?php echo $insured_ss_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insured's SS# </div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" value="<?php echo $insured_ss_s; ?>" id="insured_ss_s" name="insured_ss_s" class="input" placeholder="Enter insured ss">
                                <span id="insured_ss_sErr" class="error" name="error"> <?php echo $insured_ss_s_Err; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="container btn-div mb-2">
                        <button type="submit" class="btn" name="update" id="update">Update</button>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>