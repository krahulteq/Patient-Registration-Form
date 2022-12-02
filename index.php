<?php
$errorcheck = 1;
if (isset($_POST['submit'])) {

    $errorcheck = 0;

    $title_Err = $name_Err = $address_Err = $city_Err = $state_Err = $zip_Err = $cellphone_p_Err = $homephone_Err = $mobilephone_Err = $maritial_Err = $social_Err = $birth_Err = $parents_Err = $referred_Err = $occupation_Err = $cellphone_s_Err = $employer_Err = $email_Err = $medication_p_Err = $familydoctor_Err = $medication_list_Err = $lastexam_Err = $glasses_Err = $familyhistory_Err = $profile_Err = $insurance_p_Err = $employer_p_Err = $insured_p_Err = $birth_p_Err = $insured_ss_p_Err = $insurance_s_Err = $employer_s_Err = $insured_s_Err = $birth_s_Err = $insured_ss_s_Err = "";

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
    $email = trim($_POST['email']);

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
    $profile = $name . '.' . $imageFileType;
    $target_file = $target_dir . basename($profile);

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
    if (empty($email)) {
        $email_Err = "Can't be blank";
        $errorcheck = 1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_Err = "Invalid email format";
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
    if (empty($_FILES["profile"]["name"])) {
        $profile_Err = 'Please select image';
        $errorcheck = 1;
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
        $servername = 'localhost';
        $username = 'root';
        $password = 'password';
        $database = 'patient_registration_form';

        $conn = mysqli_connect($servername, $username, $password, $database);
        // $sql = "INSERT INTO user (name, email, city) 
        $sql = "INSERT INTO user ( title, name, address, city, state, zip, cellphone_p, homephone, mobilephone, maritial, social, birth, parents, referred, occupation, cellphone_s, employer, email, medication_p, familydoctor, medication_list, lastexam, glasses, old, familyhistory, profile, insurance_p, employer_p, insured_p, birth_p, insured_ss_p, insurance_s, employer_s, insured_s, birth_s, insured_ss_s ) 
        VALUES ('$title', '$name', '$address', '$city', '$state', '$zip', '$cellphone_p', '$homephone', '$mobilephone', '$maritial', '$social', '$birth', '$parents', '$referred', '$occupation', '$cellphone_s', '$employer', '$email', '$medication_p', '$familydoctor', '$medication_list', '$lastexam', '$glasses', '$old', '$familyhistory', '$profile', '$insurance_p', '$employer_p', '$insured_p', '$birth_p', '$insured_ss_p', '$insurance_s', '$employer_s', '$insured_s', '$birth_s', '$insured_ss_s') ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">You have registered successfully..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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

    <div class="container" id="hideAfterFormSubmit">
        <?php
        if ($errorcheck == 1) {
        ?>
            <h2 class="form-head">PATIENT REGISTRATION FORM</h2>
            <div class="container mt-4">
                <form action="" method="post" enctype="multipart/form-data" id="form">
                    <div class="row ms-3 me-3">
                        <div class="col-md-2 c-border cell-blue">Title</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title1" name="title" value="Dr.">
                                <label class="form-check-label" for="title">Dr.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title2" name="title" value="Mr.">
                                <label class="form-check-label" for="title">Mr.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title3" name="title" value="Ms.">
                                <label class="form-check-label" for="title">Ms.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title4" name="title" value="Mrs.">
                                <label class="form-check-label" for="title">Mrs.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="title5" name="title" value="Miss">
                                <label class="form-check-label" for="title">Miss</label>
                            </div>
                            <span id="titleErr" class="error" name="error"> <?php echo $title_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Marital Status</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial1" value="Single">
                                <label class="form-check-label" for="maritial">Single</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial2" value="Married">
                                <label class="form-check-label" for="maritial">Married</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="maritial" id="maritial3" value="Widowed">
                                <label class="form-check-label" for="maritial">Widowed</label>
                            </div>
                            <span id="maritialErr" class="error" name="error"> <?php echo $maritial_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="name" name="name" class="input" placeholder="Enter your Name" value="">
                            <span id="nameErr" class="error" name="error"> <?php echo $name_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Social Security#</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="social" name="social" class="input" placeholder="Enter Social Security">
                            <span id="socialErr" class="error" name="error"> <?php echo $social_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Address</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="address" name="address" class="input" placeholder="Enter your address">
                            <span id="addressErr" class="error" name="error"> <?php echo $address_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Birth Date</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="date" id="birth" name="birth" class="input" max="2022-11-11">
                            <span id="birthErr" class="error" name="error"> <?php echo $birth_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">City</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="city" name="city" class="input" placeholder="Enter your city">
                            <span id="cityErr" class="error" name="error"> <?php echo $city_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Parents/Guardian</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="parents" name="parents" class="input" placeholder="Enter parents/guardian">
                            <span id="parentsErr" class="error" name="error"> <?php echo $parents_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">State </div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="state" name="state" class="input" placeholder="Enter your state">
                            <span id="stateErr" class="error" name="error"> <?php echo $state_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Referred By</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="referred" name="referred" class="input" placeholder="Enter your reference">
                            <span id="referredErr" class="error" name="error"> <?php echo $referred_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Zip</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="zip" name="zip" class="input" placeholder="Enter your zipcode">
                            <span id="zipErr" class="error" name="error"> <?php echo $zip_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Occupation</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="occupation" name="occupation" class="input" placeholder="Enter your occupation">
                            <span id="occupationErr" class="error" name="error"> <?php echo $occupation_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="cellphone_p" name="cellphone_p" class="input" placeholder="Enter cell phone">
                            <span id="cellphone_pErr" class="error" name="error"> <?php echo $cellphone_p_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Cell Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="cellphone_s" name="cellphone_s" class="input" placeholder="Enter cell phone">
                            <span id="cellphone_sErr" class="error" name="error"> <?php echo $cellphone_s_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Home Phone </div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="homephone" name="homephone" class="input" placeholder="Enter home phone">
                            <span id="homephoneErr" class="error" name="error"> <?php echo $homephone_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Employer's Name</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="employer" name="employer" class="input" placeholder="Enter employer name">
                            <span id="employerErr" class="error" name="error"> <?php echo $employer_Err; ?> </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-2 c-border cell-blue">Mobile Phone</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="mobilephone" name="mobilephone" class="input" placeholder="Enter mobile phone">
                            <span id="mobilephoneErr" class="error" name="error"> <?php echo $mobilephone_Err; ?> </span>
                        </div>
                        <div class="col-md-2 c-border cell-blue">Employer's Email</div>
                        <div class="col-md-4 c-border cell-l-blue">
                            <input type="text" id="email" name="email" class="input" placeholder="Enter Employer email">
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
                                <textarea id="medication_p" name="medication_p" cols="30" rows="1" class="input" placeholder="Enter your present medications"></textarea>
                                <span id="medication_pErr" class="error" name="error"> <?php echo $medication_p_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Name of family docter</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="text" id="familydoctor" name="familydoctor" class="input" placeholder="Enter your family doctor name">
                                <span id="familydoctorErr" class="error" name="error"> <?php echo $familydoctor_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Do you smoke?</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="smoke1" name="smoke" value="Yes">
                                    <label class="form-check-label" for="smoke">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="smoke2" name="smoke" value="No">
                                    <label class="form-check-label" for="smoke">No</label>
                                </div>
                                <span id="smokeErr" class="error" name="error"> <?php echo $smoke_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">List any allergies to medications</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <textarea id="medication_list" name="medication_list" cols="30" rows="1" class="input" placeholder="Enter allergies Medication list"></textarea>
                                <span id="medication_listErr" class="error" name="error"> <?php echo $medication_list_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Date of last exam</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="date" id="lastexam" name="lastexam" class="input" max="">
                                <span id="lastexamErr" class="error" name="error"> <?php echo $lastexam_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Did you ever where glasses or contact lenses?</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="glasses1" name="glasses" value="Yes">
                                    <label class="form-check-label" for="glasses">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="glasses2" name="glasses" value="No">
                                    <label class="form-check-label" for="glasses">No</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input style="display: none;" type="text" name="old" id="old" placeholder="How old are they?">
                                </div>
                                <span id="glassesErr" class="error" name="error"> <?php echo $glasses_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4 c-border cell-blue">Family history of eye disorders</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <textarea id="familyhistory" name="familyhistory" cols="30" rows="1" class="input" placeholder="Enter family history of eye disorders"></textarea>
                                <span id="familyhistoryErr" class="error" name="error"> <?php echo $familyhistory_Err; ?> </span>
                            </div>
                            <div class="col-md-4 c-border cell-blue">Profile Pic</div>
                            <div class="col-md-8 c-border cell-l-blue">
                                <input type="file" id="profile" name="profile" class="input" accept="image/png, image/jpg, image/jpeg" placeholder="Select profile pic">
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
                                <input type="text" id="insurance_p" name="insurance_p" class="input" placeholder="Enter insurance name">
                                <span id="insurance_pErr" class="error" name="error"> <?php echo $insurance_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insurance Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="insurance_s" name="insurance_s" class="input" placeholder="Enter insurance name">
                                <span id="insurance_sErr" class="error" name="error"> <?php echo $insurance_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Employer</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="employer_p" name="employer_p" class="input" placeholder="Enter employer name">
                                <span id="employer_pErr" class="error" name="error"> <?php echo $employer_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Employer</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="employer_s" name="employer_s" class="input" placeholder="Enter employer name">
                                <span id="employer_sErr" class="error" name="error"> <?php echo $employer_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="insured_p" name="insured_p" class="input" placeholder="Enter insured name">
                                <span id="insured_pErr" class="error" name="error"> <?php echo $insured_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insured's Name</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="insured_s" name="insured_s" class="input" placeholder="Enter insured name">
                                <span id="insured_sErr" class="error" name="error"> <?php echo $insured_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Birth Date</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="date" id="birth_p" name="birth_p" class="input" max="2022-11-29">
                                <span id="birth_pErr" class="error" name="error"> <?php echo $birth_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Birth Date</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="date" id="birth_s" name="birth_s" class="input" max="2022-11-29">
                                <span id="birth_sErr" class="error" name="error"> <?php echo $birth_s_Err; ?> </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-2 c-border cell-blue">Insured's SS#</div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="insured_ss_p" name="insured_ss_p" class="input" placeholder="Enter insured ss">
                                <span id="insured_ss_pErr" class="error" name="error"> <?php echo $insured_ss_p_Err; ?> </span>
                            </div>
                            <div class="col-md-2 c-border cell-blue">Insured's SS# </div>
                            <div class="col-md-4 c-border cell-l-blue">
                                <input type="text" id="insured_ss_s" name="insured_ss_s" class="input" placeholder="Enter insured ss">
                                <span id="insured_ss_sErr" class="error" name="error"> <?php echo $insured_ss_s_Err; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="container btn-div mb-2">
                        <button type="submit" class="btn" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- *********************Show after form submit********************* -->
    <div class="container showafter mt-4" id="showAfterFormSubmit">
        <?php
        if ($errorcheck == 0) {
            // die('1111111111111111111');
        ?>
            <h3 class="output">Your form is submitted successfully..</h3>
            <hr>
            <div class="container mt-4">
                <?php
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                    echo '<img src="' . $target_file . '" alt="" style="height: 500px; width: 800px"><br><br>';
                } else {
                    $profile_Err = 'Sorry, there was an error uploading your file.';
                }
                ?>
            </div>
            <hr>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        Title: <span id="your_title" class="output"> <?php echo $title; ?> </span> <br>
                        Name: <span id="your_name" class="output"> <?php echo $name; ?> </span> <br>
                        Address: <span id="your_address" class="output"> <?php echo $address; ?> </span> <br>
                        City: <span id="your_city" class="output"> <?php echo $city; ?> </span> <br>
                        State: <span id="your_state" class="output"> <?php echo $state; ?> </span> <br>
                        Zip: <span id="your_zip" class="output"> <?php echo $zip; ?> </span> <br>
                        Cell Phone: <span id="your_cellphone_p" class="output"> <?php echo $cellphone_p; ?> </span> <br>
                        Home Phone: <span id="your_homephone" class="output"> <?php echo $homephone; ?> </span> <br>
                        Mobile Phone: <span id="your_mobilephone" class="output"> <?php echo $mobilephone; ?> </span> <br>
                    </div>
                    <div class="col-md-6">
                        Maritial Status: <span id="your_maritial" class="output"> <?php echo $maritial; ?> </span> <br>
                        Social Security: <span id="your_social" class="output"> <?php echo $social; ?> </span> <br>
                        Birth Date: <span id="your_birth" class="output"> <?php echo $birth; ?> </span> <br>
                        Parents/Guardian: <span id="your_parents" class="output"> <?php echo $parents; ?> </span> <br>
                        Referred By: <span id="your_referred" class="output"> <?php echo $referred; ?> </span> <br>
                        Occupation: <span id="your_occupation" class="output"> <?php echo $occupation; ?> </span> <br>
                        Cell phone: <span id="your_cellphone_s" class="output"> <?php echo $cellphone_s; ?> </span> <br>
                        Employer's Name: <span id="your_employer" class="output"> <?php echo $employer; ?> </span> <br>
                        Employer's Email: <span id="your_email" class="output"> <?php echo $email; ?> </span> <br>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container mt-4">
                <span style="font-weight: bold">Other Condition(s) <?php echo $title; ?> </span><br>
                Medication are you presen taking: <span id="your_medication_p" class="output"> <?php echo $medication_p; ?> </span> <br>
                Name of family doctor: <span id="your_familydoctor" class="output"> <?php echo $familydoctor; ?> </span> <br>
                Do you smoke?: <span id="your_smoke" class="output"> <?php echo $smoke; ?> </span> <br>
                List any allergies to medications: <span id="your_medication_list" class="output"> <?php echo $medication_list; ?> </span> <br>
                Date of last exam: <span id="your_lastexam" class="output"> <?php echo $lastexam; ?> </span> <br>
                Did you ever where glasses or contact lenses?: <span id="your_glasses" class="output"> <?php echo $glasses; ?> </span>
                <span id="your_old" class="old"> <?php echo $old; ?> </span> <br>
                Family history of eye disorders: <span id="your_familyhistory" class="output"> <?php echo $familyhistory; ?> </span> <br>
                Profile Pic: <span id="your_profile" class="output"> <?php echo $profile; ?> </span> <br>
            </div>
            <hr>
            <div class="container mt-4 mb-2">
                <div class="row">
                    <div class="col-md-6">
                        Insurance Name: <span id="your_insurance_p" class="output"> <?php echo $insurance_p; ?> </span> <br>
                        Employer: <span id="your_employer_p" class="output"> <?php echo $employer_p; ?> </span> <br>
                        Insured's Name: <span id="your_insured_p" class="output"> <?php echo $insured_p; ?> </span> <br>
                        Birth Date: <span id="your_birth_p" class="output"> <?php echo $birth_p; ?> </span> <br>
                        Insured's SS#: <span id="your_insured_ss_p" class="output"> <?php echo $insured_ss_p; ?> </span> <br>
                    </div>
                    <div class="col-md-6">
                        Insurance Name: <span id="your_insurance_s" class="output"> <?php echo $insurance_s; ?> </span> <br>
                        Employer: <span id="your_employer_s" class="output"> <?php echo $employer_s; ?> </span> <br>
                        Insured's Name: <span id="your_insured_s" class="output"> <?php echo $insured_s; ?> </span> <br>
                        Birth Date: <span id="your_birth_s" class="output"> <?php echo $birth_s; ?> </span> <br>
                        Insured's SS#: <span id="your_insured_ss_s" class="output"> <?php echo $insured_ss_s; ?> </span> <br>
                    </div>
                </div>
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