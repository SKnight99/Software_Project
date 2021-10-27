<?php
// ================================
// CONFIGURATION START
// ================================
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'general_ledger_account');
define('USE_PCONNECT', 'false');
define('DB_CHARSET', "utf8mb4"); // utf8
// ================================
// CONFIGURATION END
// ================================

// =============================================================

// ================================
// DATABASE START
// ================================
function tep_db_connect($server = DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD, $database = DB_DATABASE, $link = 'db_link')
{
    global $$link;
    if (USE_PCONNECT == 'true') {
        $server = 'p:' . $server;
    }
    $$link = mysqli_connect($server, $username, $password, $database);
    if (!mysqli_connect_errno()) {
        mysqli_set_charset($$link, 'utf8');
    }
    @mysqli_query($$link, 'set session sql_mode=""');
    return $$link;
}

function tep_db_close($link = 'db_link')
{
    global $$link;
    return mysqli_close($$link);
}

function tep_query($query, $link = 'db_link')
{
    global $$link;
    $result = mysqli_query($$link, $query);
    return $result;
}

function tep_fetch_object($db_query)
{
    return mysqli_fetch_object($db_query);
}

function tep_fetch_array($db_query)
{
    return mysqli_fetch_array($db_query, MYSQLI_ASSOC);
}

function tep_num_rows($db_query)
{
    return mysqli_num_rows($db_query);
}

function tep_data_seek($db_query, $row_number)
{
    return mysqli_data_seek($db_query, $row_number);
}

function tep_insert_id($link = 'db_link')
{
    global $$link;
    return mysqli_insert_id($$link);
}

function tep_free_result($db_query)
{
    return mysqli_free_result($db_query);
}

function tep_fetch_fields($db_query)
{
    return mysqli_fetch_field($db_query);
}

function tep_output($string)
{
    return htmlspecialchars($string);
}

function tep_input($string, $link = 'db_link')
{
    global $$link;
    return mysqli_real_escape_string($$link, $string);
}

function tep_affected_rows($link = 'db_link')
{
    global $$link;
    return mysqli_affected_rows($$link);
}

function tep_get_server_info($link = 'db_link')
{
    global $$link;
    return mysqli_get_server_info($$link);
}
// ================================
// DATABASE END
// ================================

// =============================================================

// ================================
// GENERAL START
// ================================
function redirect($url, $parameters = '')
{
    return "<script>window.location='" . $url . "" . $parameters . "'</script>";
}
function alert($string)
{
    return "<script>alert('" . $string . "')</script>";
}
function script($string)
{
    return "<script>" . $string . "</script>";
}
// ================================
// GENERAL END
// ================================

// =============================================================

// ================================
// INITIATE START
// ================================
$conn = tep_db_connect();
mysqli_set_charset($conn, DB_CHARSET);
tep_query("SET time_zone = '+8:00'");
session_start();
// ================================
// INITIATE END
// ================================
