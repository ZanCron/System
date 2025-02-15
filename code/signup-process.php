<?php

require '../config/function.php';

if (isset($_POST['send_otp'])) {

    $phone_number = validate($_POST['phone']);

        if (empty($phone_number)) {
            redirect( BASE_URL . '/user/signup', 'Please fill all required fields!', 'warning');
            exit();
        }

        $result = getUser('users',$phone_number);

        if ($result->num_rows > 0) {
           
            redirect( BASE_URL . '/user/signup', 'Phone number already registered!', 'warning');
            exit();

        } else {

            $otp = rand(100000, 999999); 

            $_SESSION['otpIn'] = true;
            $_SESSION['otpInUser'] = [
                'otp' => $otp,
            ];
    
            $_SESSION['regIn'] = true;
            $_SESSION['regInUser'] = [
                'phone_number' => $phone_number,
            ];
            
            
            $bcrypt_otp = password_hash($otp, PASSWORD_BCRYPT);
            $message = 'Your One-Time Password (OTP) is ' . $otp . '. Please let us know if you require any assistance.';
            sendSMSNotification($phone_number, $message, 'OTP sent successfully!', BASE_URL . '/user/verification', 'success');
            exit(0);

        }
}

if (isset($_POST['verify_otp'])) {  

    $otp_code = validate($_POST['otp']);
    $phone_number = validate($_POST['phone']);

    if (empty($otp_code)) {
        redirect( BASE_URL . '/user/verification', 'Please fill all required fields!', 'warning');
        exit();
    }

        $otp = isset($_SESSION['otpInUser']['otp']) ? $_SESSION['otpInUser']['otp'] : '';
        $phone = isset($_SESSION['regInUser']['phone_number']) ? $_SESSION['regInUser']['phone_number'] : '';

        if ((string)$otp_code === (string)$otp && (string)$phone_number === (string)$phone) {

            redirect( BASE_URL . '/user/registration', 'Verification Success! Fill in the other fields.', 'success' );

        } else {

            redirect(BASE_URL . '/user/verification', 'Invalid OTP Code', 'error');

        }

}  

if (isset($_POST['register_resident'])) {

    $firstname = validate($_POST['firstname']);
    $middlename = validate($_POST['middlename']);
    $lastname = validate($_POST['lastname']);
    $suffix = validate($_POST['suffix']);
    $birthdate = validate($_POST['birthdate']);
    $gender = validate($_POST['gender']);
    $civil_status = validate($_POST['civil_status']);
    $address = validate($_POST['address']);

    $phone_number = validate($_POST['phone']);
    $username = validate($_POST['username']);
    $r_password = validate($_POST['r_password']);

    $role = 'resident';
   


    if (
        empty($firstname) || empty($lastname) || empty($birthdate) || empty($gender) || 
        empty($civil_status) || empty($address) || empty($phone_number) || 
        empty($r_password)
    ) {
        redirect(BASE_URL . '/user/registration', 'Please fill all required fields!', 'warning');
        exit();
    }

    $bcrypt_password = password_hash($r_password, PASSWORD_BCRYPT);

    $data = [
        'firstname' => $firstname,
        'middlename' => $middlename,
        'lastname' => $lastname,
        'suffix' => $suffix,
        'birthdate' => $birthdate,
        'gender' => $gender,
        'civil_status' => $civil_status,
        'address' => $address,

        'phone_number' => $phone_number,
        'username' => $username,
        'hash_password' => $bcrypt_password,

        'role' => $role,

    ];

    $result = insert('users', $data);

    if ($result) {

        $message = 'Hi ' . $firstname . ', I am pleased to inform you that your account has been successfully created. Thank you for choosing our services.';

        registerSession();
        sendSMSNotification($phone_number, $message, 'Account Created Successfully!', BASE_URL . '/user/login', 'success');

    } else {

        redirect(BASE_URL .'/user/registration', 'Failed to create account.', 'error');

    }


}


?>
