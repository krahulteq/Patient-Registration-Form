$(document).ready(function () {
    $('#form').submit(function () {
        let errorcheck = 0;
        // Error removing if input is correct/valid
        var removeErr = document.getElementsByName('error');
        for (i = 0; i < removeErr.length; i++)
            removeErr[i].innerHTML = "";


        var title = "";
        var ele = document.getElementsByName('title');
        for (i = 0; i < ele.length; i++)
            if (ele[i].checked)
                title = ele[i].value;

        var name = $("#name").val();
        name = name.trim();
        var letters = /^[A-Za-z\s]+$/;

        var address = $("#address").val();
        address = address.trim();
        var city = $("#city").val();
        city = city.trim();
        var state = $("#state").val();
        state = state.trim();
        var zip = $("#zip").val();
        zip = zip.trim();
        var cellphone_p = $("#cellphone_p").val();
        cellphone_p = cellphone_p.trim();
        var homephone = $("#homephone").val();
        homephone = homephone.trim();
        var mobilephone = $("#mobilephone").val();
        mobilephone = mobilephone.trim();

        var maritial = "";
        var ele = document.getElementsByName('maritial');
        for (i = 0; i < ele.length; i++)
            if (ele[i].checked)
                maritial = ele[i].value;

        var social = $("#social").val();
        social = social.trim();
        var birth = $("#birth").val();
        birth = birth.trim();
        var pattern = /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/;

        var parents = $("#parents").val();
        parents = parents.trim();
        var referred = $("#referred").val();
        referred = referred.trim();
        var occupation = $("#occupation").val();
        occupation = occupation.trim();
        var cellphone_s = $("#cellphone_s").val();
        cellphone_s = cellphone_s.trim();
        var employer = $("#employer").val();
        employer = employer.trim();
        var email = $("#email").val();
        email = email.trim();
        // var emailexist = emailexist(email);
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        //second section 
        var medication_p = $("#medication_p").val();
        medication_p = medication_p.trim();
        var familydoctor = $("#familydoctor").val();
        familydoctor = familydoctor.trim();

        var smoke = "";
        var ele = document.getElementsByName('smoke');
        for (i = 0; i < ele.length; i++)
            if (ele[i].checked)
                smoke = ele[i].value;

        var medication_list = $("#medication_list").val();
        medication_list = medication_list.trim();
        var lastexam = $("#lastexam").val();
        lastexam = lastexam.trim();
        var glasses = "";
        var ele = document.getElementsByName('glasses');
        for (i = 0; i < ele.length; i++)
            if (ele[i].checked)
                glasses = ele[i].value;

        if (glasses == "yes") {
            var old = $("#old").val();
            old = old.trim();
        }

        var familyhistory = $("#familyhistory").val();
        familyhistory = familyhistory.trim();

        // file validation
        var fileInput = $('#profile');
        var fileToUpload = fileInput.val();
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (fileToUpload == "") {
            
        } else if (!allowedExtensions.exec(fileToUpload)) {
            $('#profileErr').html("Sorry, only JPG, JPEG & PNG files are allowed.");
            errorcheck = 1;
        } else if ($('#profile')[0].files[0].size > 50000) {
            $('#profileErr').html("Sorry, your file is greater than 50kb.");
            errorcheck = 1;
        }

        // Third section
        var insurance_p = $("#insurance_p").val();
        insurance_p = insurance_p.trim();
        var employer_p = $("#employer_p").val();
        employer_p = employer_p.trim();
        var insured_p = $("#insured_p").val();
        insured_p = insured_p.trim();
        var birth_p = $("#birth_p").val();
        birth_p = birth_p.trim();
        var insured_ss_p = $("#insured_ss_p").val();
        insured_ss_p = insured_ss_p.trim();

        var insurance_s = $("#insurance_s").val();
        insurance_s = insurance_s.trim();
        var employer_s = $("#employer_s").val();
        employer_s = employer_s.trim();
        var insured_s = $("#insured_s").val();
        insured_s = insured_s.trim();
        var birth_s = $("#birth_s").val();
        birth_s = birth_s.trim();
        var insured_ss_s = $("#insured_ss_s").val();
        insured_ss_s = insured_ss_s.trim();

        // First section
        if (title == null || title == "") {
            $('#titleErr').html("Select Title");
            errorcheck = 1;
        }
        if (name == null || name == "") {
            $('#nameErr').html("Can't be blank");
            errorcheck = 1;
        } else if (!name.match(letters)) {
            $('#nameErr').html("Enter characters only");
            errorcheck = 1;
        }
        if (address == null || address == "") {
            $('#addressErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (city == null || city == "") {
            $('#cityErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (state == null || state == "") {
            $('#stateErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (zip == null || zip == "") {
            $('#zipErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (cellphone_p == null || cellphone_p == "") {
            $('#cellphone_pErr').html("Can't be blank");
            errorcheck = 1;
        } else if (isNaN(cellphone_p)) {
            $('#cellphone_pErr').html("Enter numeric only");
            errorcheck = 1;
        } else if (cellphone_p.length != 10) {
            $('#cellphone_pErr').html("Enter 10 digit only");
            errorcheck = 1;

        }
        if (homephone == null || homephone == "") {
            $('#homephoneErr').html("Can't be blank");
            errorcheck = 1;
        } else if (isNaN(homephone)) {
            $('#homephoneErr').html("Enter numeric only");
            errorcheck = 1;
        } else if (homephone.length != 10) {
            $('#homephoneErr').html("Enter 10 digit only");
            errorcheck = 1;

        }
        if (mobilephone == null || mobilephone == "") {
            $('#mobilephoneErr').html("Can't be blank");
            errorcheck = 1;
        } else if (isNaN(mobilephone)) {
            $('#mobilephoneErr').html("Enter numeric only");
            errorcheck = 1;
        } else if (mobilephone.length != 10) {
            $('#mobilephoneErr').html("Enter 10 digit only");
            errorcheck = 1;


        }
        if (maritial == null || maritial == "") {
            $('#maritialErr').html("Select Maritial Status");
            errorcheck = 1;
        }
        if (social == null || social == "") {
            $('#socialErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (birth == null || birth == "") {
            $('#birthErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (parents == null || parents == "") {
            $('#parentsErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (referred == null || referred == "") {
            $('#referredErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (occupation == null || occupation == "") {
            $('#occupationErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (cellphone_s == null || cellphone_s == "") {
            $('#cellphone_sErr').html("Can't be blank");
            errorcheck = 1;
        } else if (isNaN(cellphone_s)) {
            $('#cellphone_sErr').html("Enter numeric only");
            errorcheck = 1;
        } else if (cellphone_s.length != 10) {
            $('#cellphone_sErr').html("Enter 10 digit only");
            errorcheck = 1;

        }
        if (employer == null || employer == "") {
            $('#employerErr').html("Can't be blank");
            errorcheck = 1;

        }
        if (email == null || email == "") {
            $('#emailErr').html("Can't be blank");
            errorcheck = 1;
        } else if (!email.match(validRegex)) {
            $('#emailErr').html("Invalid email format");
            errorcheck = 1;
        // } else if (emailexist == 1) {
        //     $('#emailErr').html("Email already exist");
        //     errorcheck = 1;
        }
        if (medication_p == null || medication_p == "") {
            $('#medication_pErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (familydoctor == null || familydoctor == "") {
            $('#familydoctorErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (smoke == null || smoke == "") {
            $('#smokeErr').html("Select smoke prefrence");
            errorcheck = 1;
        }
        if (medication_list == null || medication_list == "") {
            $('#medication_listErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (lastexam == null || lastexam == "") {
            $('#lastexamErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (glasses == null || glasses == "") {
            $('#glassesErr').html("select lences prefrence");
            errorcheck = 1;
        }
        if (familyhistory == null || familyhistory == "") {
            $('#familyhistoryErr').html("Can't be blank");
            errorcheck = 1;

            //third section
        }
        if (insurance_p == null || insurance_p == "") {
            $('#insurance_pErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (employer_p == null || employer_p == "") {
            $('#employer_pErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (insured_p == null || insured_p == "") {
            $('#insured_pErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (birth_p == null || birth_p == "") {
            $('#birth_pErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (insured_ss_p == null || insured_ss_p == "") {
            $('#insured_ss_pErr').html("Can't be blank");
            errorcheck = 1;

        }
        if (insurance_s == null || insurance_s == "") {
            $('#insurance_sErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (employer_s == null || employer_s == "") {
            $('#employer_sErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (insured_s == null || insured_s == "") {
            $('#insured_sErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (birth_s == null || birth_s == "") {
            $('#birth_sErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (insured_ss_s == null || insured_ss_s == "") {
            $('#insured_ss_sErr').html("Can't be blank");
            errorcheck = 1;
        }
        if (errorcheck == 0) {
            console.log('no error continue form submission');
        } else {
            return false;
        }
    });
    // show hide lenses preference
    $("input[name$='glasses']").click(function () {
        var test = $(this).val();
        if (test == 'No') {
            $('#old').hide();
        } else {
            $('#old').show();
        }
    });
    var test = "";
    var ele = document.getElementsByName('glasses');
    for (i = 0; i < ele.length; i++)
        if (ele[i].checked)
        test = ele[i].value;
    if (test == 'No') {
        $('#old').hide();
    } else if(test == 'Yes'){
        $('#old').show();
    }

    // it provide current date to max attribute in date type input
    const date = new Date();

    var day = date.getDate();
    if (day.toString().length == 1) {
        day = '0' + day;
    }
    let month = date.getMonth() + 1;
    if (month.toString().length == 1) {
        month = '0' + month;
    }
    let year = date.getFullYear() - 18;
    let currentDate = `${year}-${month}-${day}`;
    console.log(currentDate);
    document.getElementById('birth').setAttribute('max', currentDate)
    document.getElementById('lastexam').setAttribute('max', currentDate)
    document.getElementById('birth_p').setAttribute('max', currentDate)
    document.getElementById('birth_s').setAttribute('max', currentDate)

    
});