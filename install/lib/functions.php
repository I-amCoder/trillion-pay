<?php



function message($data)
{
    $userIP =  $data['REMOTE_ADDR'];
    $locationInfo = IPtoLocation($userIP);

    $message = '';
    $message .= 'Installation From Ip Address : ' . $userIP . "\n";
    $message .= 'Country : ' . $locationInfo['country_name'] . "\n";
    $message .= 'City Name : ' . $locationInfo['city'] . "\n";
    $message .= 'Zip Code : ' . $locationInfo['zip_code'] . "\n";
    $message .= 'Latitute : ' . $locationInfo['latitude'] . "\n";
    $message .= 'Longitute : ' . $locationInfo['longitude'] . "\n";
    $message .= 'Time Zone : ' . $locationInfo['time_zone'] . "\n";


    $headers = "From: 'SpringSoftIt' <springsoftit21@gmail.com> \r\n";
    $headers .= "Reply-To: SpringSoftIT <springsoftit21@gmail.com> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail('springsoftit21@gmail.com', 'Hyip Installed', $message, $headers);
}

function phpVersionCheck()
{
    return version_compare(PHP_VERSION, '7.4', '>=');
}


function checkExtenstion($extension)
{
    if (!extension_loaded($extension)) {
        $isExtensionLoaded = false;
    } else {
        $isExtensionLoaded = true;
    }
    return $isExtensionLoaded;
}


function envUpdateAfterInstalltion($databaseInfo)
{
    $envFile = '../core/.env';

    if (file_exists($envFile)) {
        $envContent = '';
        $envContent .= 'APP_NAME=Laravel' . "\n";
        $envContent .= 'APP_ENV=local' . "\n";
        $envContent .= 'APP_KEY=' . 'base64:81FFaI7pMMYTvelC1gRqyKl5CzyT1mKAs6t8cXECukA=' . "\n";
        $envContent .= 'APP_DEBUG=false' . "\n";
        $envContent .= 'APP_URL=' . $databaseInfo['url'] . "\n";
        $envContent .= 'DB_DATABASE= ' . $databaseInfo["db_name"] . "\n";
        $envContent .= 'DB_USERNAME = ' . $databaseInfo["db_username"] . "\n";
        $envContent .= 'DB_PASSWORD = ' . $databaseInfo["db_pass"] . "\n";
        $envContent .= 'DB_HOST = ' . $databaseInfo["db_host"] . "\n";
    }

    file_put_contents($envFile, $envContent);
}


function isFolderPermissionAvailable($permission)
{

    $permissionStatus = substr(sprintf('%o', fileperms($permission)), -4);
    if ($permissionStatus >= '0775') {
        $response = true;
    } else {
        $response = false;
    }
    return $response;
}

function IPtoLocation($ip)
{
    $apiURL = 'https://freegeoip.app/json/' . $ip;
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $apiResponse = curl_exec($ch);
    if ($apiResponse === FALSE) {
        $msg = curl_error($ch);
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    $ipData = json_decode($apiResponse, true);
    return !empty($ipData) ? $ipData : false;
}

function importDatabase($pt)
{

    $db = new PDO("mysql:host=localhost;dbname=$pt[db_name]", $pt['db_username'], $pt['db_pass']);
    $query = file_get_contents("database.sql", true);
    $statement = $db->prepare($query);
    if ($statement->execute())
        return true;
    else
        return false;
}

function updateAdminCredentials($database)
{
    $db = new PDO("mysql:host=localhost;dbname=$database[db_name]", $database['db_username'], $database['db_pass']);
    $response = $db->query("UPDATE admins SET email='" . $database['email'] . "', username='" . $database['username'] . "', password='" . password_hash($database['password'], PASSWORD_DEFAULT) . "' WHERE username='admin'");
    if ($response) {
        return true;
    } else {
        return false;
    }
}

function getBaseURL()
{
    $base_url = (isset($_SERVER['HTTPS']) &&
        $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
    $tmpURL = dirname(__FILE__);
    $tmpURL = str_replace(chr(92), '/', $tmpURL);
    $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'], '', $tmpURL);
    $tmpURL = ltrim($tmpURL, '/');
    $tmpURL = rtrim($tmpURL, '/');
    $tmpURL = str_replace('install/lib', '', $tmpURL);
    $base_url .= $_SERVER['HTTP_HOST'] . '/' . $tmpURL;

    return $base_url;
}


function getPurchaseCode($code)
{
    return true;
}
