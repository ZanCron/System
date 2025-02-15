<?php

require '../config/function.php';
 

if (isset($_POST['submit_request'])) {

    $phone_number = validate($_POST['phone_number']);
    $document_id = validate($_POST['document_id']);
    $resident_id = validate($_POST['resident_id']);
    $firstname = validate($_POST['firstname']);
    $middlename = validate($_POST['middlename']);
    $lastname = validate($_POST['lastname']);
    $suffix = validate($_POST['suffix']);
    $birthdate = validate($_POST['birthdate']);
    $gender = validate($_POST['gender']);
    $civil_status = validate($_POST['civil_status']);
    $address = validate($_POST['address']);
    $purpose = validate($_POST['purpose']);
    $payment_method = validate($_POST['payment_method']);
    $reference_no = validate($_POST['reference_no']);
    
    $request_status = 'Pending';
    

    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/"; 
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $fullname = $firstname . "_" . $middlename . "_" . $lastname . $suffix . "_" . date("Ymd_His");
    $imageFileType = strtolower(pathinfo($_FILES["id_proof"]["name"], PATHINFO_EXTENSION));
    $target_file = $fullname . "." . $imageFileType;
    
    if (move_uploaded_file($_FILES["id_proof"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars($fullname . "." . $imageFileType) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    

    $data = [

        'document_id' => $document_id,
        'resident_id' => $resident_id,
        'firstname' => $firstname,
        'middlename' => $middlename,
        'lastname' => $lastname,
        'suffix' => $suffix,
        'birthdate' => $birthdate,
        'gender' => $gender,
        'civil_status' => $civil_status,
        'address' => $address,
        'id_proof' => $target_file,
        'purpose' => $purpose,

        'payment_method' => $payment_method,
        'reference_no' => $reference_no,

        'request_status' => $request_status,


    ];

    $result = insert('all_requests', $data);

    if ($result) {

        $message = 'Hi ' . $firstname . ' ' . $lastname . ', your request has been successfully submitted. Please wait for approval. Thank you!';

        sendSMSNotification($phone_number, $message, 'Request Submitted Successfully!', BASE_URL . '/user/dashboard', 'success');

    } else {

        redirect(BASE_URL .'/user/submit_request ?id='. $document_id, 'Failed to submit request.', 'error');

    }


}


?>
