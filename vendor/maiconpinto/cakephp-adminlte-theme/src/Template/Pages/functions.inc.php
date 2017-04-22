<?php 
use Cake\Datasource\ConnectionManager;




function getSessions($where=null)
{
   // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select * from sessions where ' . $where . ';');
    else $stmt = $conn->execute('select * from sessions;');
    
    // Read one row.
    //$row = $stmt->fetch('assoc');
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
    // Read rows through iteration
    /*foreach ($rows as $row) {
    
    } */
    
    return $rows;
}


function getUsers($where=null)
{
   // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select * from users where ' . $where . ';');
    else $stmt = $conn->execute('select * from users;');
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
    // Read rows through iteration
    /*foreach ($rows as $row) {
    
    } */
    
    return $rows;
}

function getGroups($where=null)
{
   // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select * from groups where ' . $where . ';');
    else $stmt = $conn->execute('select * from groups;');
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
    return $rows;
}


function getGuestSessions()
{
   return getSessions('user_id=(select id from users where username="guest")');
}

function getOnlineSessions()
{
   return getSessions('expire>curdate()');
}


function getExpiredSessions()
{
   return getSessions('expire<=curdate()');
}

function getMobileSessions()
{
   return getSessions("os like 'Android%' or os like 'iOS%'");
}


function getSessionsBrowsersList($where=null)
{
   // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select distinct(browser) from sessions where ' . $where . ';');
    else $stmt = $conn->execute('select distinct(browser) from sessions;');
    
    // Read one row.
    //$row = $stmt->fetch('assoc');
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
    // Read rows through iteration
    /*foreach ($rows as $row) {
    
    } */
    
    return $rows;
}


function getSessionsOSList($where=null)
{
    // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select distinct(os) from sessions where ' . $where . ';');
    else $stmt = $conn->execute('select distinct(os) from sessions;');
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
    return $rows;
}


function getSessionsHourList($where=null)
{
    // my_connection is defined in your database config
    $conn = ConnectionManager::get('default');
    
    if($where!=null) $stmt = $conn->execute('select distinct(hour(lastlog)), day(lastlog), month(lastlog), lastlog from sessions where ' . $where . ' order by lastlog;');
    else $stmt = $conn->execute('select distinct(hour(lastlog)), day(lastlog), month(lastlog), lastlog from sessions order by lastlog;');
    
    
    // Read all rows.
    $rows = $stmt->fetchAll();
    
   
    return $rows;
}


function getOSCount($os)
{
    return count(getSessions(' os="' . $os . '"'));
}


?>