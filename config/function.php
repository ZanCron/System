<?php 

define('BASE_URL', 'http://localhost/system'); 

session_start();

include 'database.php';

function validate($inputData){

    global $conn;
    $validateData = mysqli_real_escape_string($conn, $inputData);
    return trim($validateData);

}

function getAlertDetails($statusType) {
    switch ($statusType) {
        case 'success':
            return ['alert-success', '<i class="fas fa-check-circle mt-1"></i>'];
        case 'error':
            return ['alert-danger', '<i class="fas fa-exclamation-circle mt-1"></i>'];
        case 'warning':
            return ['alert-warning', '<i class="fas fa-exclamation-triangle mt-1"></i>'];
        case 'info':
        default:
            return ['alert-info', '<i class="fas fa-info-circle mt-1"></i>'];
    }
}

function alertMessage() {
    if (isset($_SESSION['status'])) {
        $statusType = isset($_SESSION['status_type']) ? $_SESSION['status_type'] : 'info';
        $statusMessage = $_SESSION['status'];
        
        list($alertClass, $icon) = getAlertDetails($statusType);
        
        echo '<div id="alert" class="alert ' . $alertClass . ' alert-dismissible fade show d-flex align-items-center" role="alert">';
        echo $icon . '<small class="mb-0 ms-3">' . $statusMessage . '</small>';
        echo '</div>';
        
        unset($_SESSION['status']);
        unset($_SESSION['status_type']);
    }
}

function statusMessage() {
    if (isset($_SESSION['status'])) {
        $statusType = isset($_SESSION['status_type']) ? $_SESSION['status_type'] : 'info';
        $statusMessage = $_SESSION['status'];
        
        list($alertClass, $icon) = getAlertDetails($statusType);
        
        echo '<div id="alert" class="alert ' . $alertClass . ' alert-dismissible fade show d-flex align-items-center position-absolute top-0 end-0 m-3 shadow" role="alert" style="z-index: 1050; min-width: 250px;">';
        echo $icon . '<small class="mb-0 ms-3">' . $statusMessage . '</small>';
        echo '</div>';
        
        unset($_SESSION['status']);
        unset($_SESSION['status_type']);
    }
}

function redirect($url, $status, $statusType = 'info'){
    $_SESSION['status'] = $status;
    $_SESSION['status_type'] = $statusType; 
    header('Location: ' . $url);
    exit(0);
}

function sendSMSNotification($phone_number, $message, $status, $url, $info){
    $safe_message = escapeshellarg($message);
    $safe_phone = escapeshellarg($phone_number);

    $command = "py ../send_sms.py $safe_phone $safe_message";
    $output = shell_exec($command);

    if (strpos($output, 'error') !== false || strpos($output, 'failed') !== false) {
        redirect('index.php', 'Error to Send SMS', 'error');
        exit(0);
    } else {
        redirect($url, $status, $info);
        exit(0);
    }
}

function getUser($tableName, $userDetails) {
    global $conn;
    $table = validate($tableName);
    $user = validate($userDetails);
    $query = "SELECT * FROM $table WHERE phone_number = '$user' OR username = '$user'";
    return mysqli_query($conn, $query);
}


function getAll($tableName, $status = NULL){
    global $conn;
    $table = validate($tableName);
    $status = validate($status);
    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status = '0'";
    } else {
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn, $query);
}

function getById($tableName, $id) {
    global $conn;
    $table = validate($tableName);
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return mysqli_query($conn, $query);
}

function insert($tableName, $data){
    global $conn;
    $table = validate($tableName);
    $columns = array_keys($data);
    $values = array_map(function($value) use ($conn) {
        return "'" . mysqli_real_escape_string($conn, $value) . "'";
    }, $data);
    $finalColumn = implode(',', $columns);
    $finalValues = implode(',', $values);
    $query  = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn, $query);
    return $result;
}


function logoutSession(){

    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUser']);

}

function otpSession(){

    unset($_SESSION['otpIn']);
    unset($_SESSION['otpInUser']);

}

function registerSession(){

    unset($_SESSION['regIn']);
    unset($_SESSION['regInUser']);

}

function displayCopyright() {
    $currentYear = date("Y");
    echo "&copy; $currentYear";
}

function displayCurrentTime() {
    date_default_timezone_set('Asia/Manila'); 
    return date('h:i:s A'); 
}

function getInitials($firstname, $lastname) {
    $firstInitial = !empty($firstname) ? substr($firstname, 0, 1) : '';
    $lastInitial = !empty($lastname) ? substr($lastname, 0, 1) : '';
    return strtoupper($firstInitial . $lastInitial);
}

function getAdminInitials($username) {
    $adminInitial = !empty($username) ? substr($username, 0, 1) : '';
    return strtoupper($adminInitial);
}

function restrictMobileAccess() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileDevices = '/android|iphone|ipad|ipod|blackberry|opera mini|iemobile|mobile/i';

    if (preg_match($mobileDevices, $userAgent)) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Access Restricted</title>
            <!-- Bootstrap CSS -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <style>
                body {
                    height: 100vh;
                    background-color: #f8f9fa;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: 'Poppins', Arial, sans-serif;
                }
                .card {
                    border-radius: 15px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    font-size: 2rem;
                    color: #343a40;
                }
                p {
                    font-size: 1rem;
                    color: #6c757d;
                }
                @media (max-width: 576px) {
                    h1 {
                        font-size: 1.5rem;
                    }
                    p {
                        font-size: 0.9rem;
                    }
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-md-6 col-lg-4'>
                        <div class='card p-4 text-center'>
                            <h1>Access Restricted</h1>
                            <p>Our website is only accessible on desktops or laptops.<br>Please switch to a desktop device for the best experience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS (Optional) -->
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
        </body>
        </html>
        ";
        exit();
    }
}

function getRequestBadge($status) {
    $badgeClass = '';
    $displayText = '';

    switch (strtolower($status)) {
        case 'pending':
            $badgeClass = 'bg-warning text-white';
            $displayText = 'Waiting for Approval';
            break;
        case 'approved':
            $badgeClass = 'bg-success text-white';
            $displayText = 'Approved';
            break;
        case 'disapproved':
            $badgeClass = 'bg-danger text-white';
            $displayText = 'Disapproved';
            break;
        case 'completed':
            $badgeClass = 'bg-primary text-white';
            $displayText = 'Completed';
            break;
        case 'cancelled':
            $badgeClass = 'bg-secondary text-white';
            $displayText = 'Cancelled';
            break;
        case 'rejected':
            $badgeClass = 'bg-danger text-white';
            $displayText = 'Rejected';
            break;
        default:
            $badgeClass = 'bg-light text-dark';
            $displayText = htmlspecialchars($status);
    }

    return '<span class="' . $badgeClass . ' px-3 py-1 rounded-pill fw-bold">' . $displayText . '</span>';
}




?>