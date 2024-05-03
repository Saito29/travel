<?php
#start session 
session_start();

require ('config.php');

#display the data array
function dd($value)
{
    echo "<pre>", print_r($value, true), "</pre>";    
    die();
}

function executeQuery($sql, $data)
{
    global $conn;
    //prepare and bind the parameters
    $stmt = $conn->prepare($sql);
    $value = array_values($data);
    $types = str_repeat('s', count($value));
    $stmt->bind_param($types, ...$value);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $data = [])
{
    global $conn;
    // prepare and bind
    $sql = "SELECT * FROM $table";
    if (empty($data)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $data);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table, $data)
{
    global $conn;
    // prepare and bind
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    //sql = "SELECT * FROM users WHERE admin = 0 AND username = 'admin' LIMIT 1"
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $data);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

//Create users function
function create($table, $data)
{
    global $conn;
    //sql = "INSERT INTO users SET admin=?, firstName=?, lastName=?, email=?, password=?, profile=?"
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

#update users function
function update($table, $id, $data)
{
    global $conn;
    //sql = UPDATE users SET admin=?, firstName=?, lastName=?, username=?, email=?, password=?, profile=? WHERE id=?
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

#delete users functions
function delete($table, $id)
{
    global $conn;
    # sql = DELETE FROM users WHERE id=?
    $sql = "DELETE FROM $table WHERE id=? ";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

/*
$data = [
    'admin' => 0,
    'firstName' => 'Barry',
    'lastName' => 'Allen',
    'username' => 'Flash',
    'email' => 'flashAdmin@gmail.com',
    'password' => 'flash292',
    'profileImage' => ''
];

$id = update('users', 2, $data);
dd($id); */
