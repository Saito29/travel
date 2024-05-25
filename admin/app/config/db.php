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

function selectAll($table, $conditions = [])
{
    global $conn;
    // prepare and bind
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
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
function deleted($table, $id)
{
    global $conn;
    # sql = DELETE FROM users WHERE id=?
    $sql = "DELETE FROM $table WHERE id=? ";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

#Getting the publish post
function getPublishPost(){
    global $conn;

    #sql = SELECT * FROM post WHERE status='published AND is_Active = 1
    $sql = "SELECT p.*, u.username, FROM post AS p JOIN users AS u ON p.postedBy=u.username WHERE p.status='published' AND p.is_Active = ?";

    $stmt = executeQuery($sql, ['is_Active' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

#Getting the publish post
function searchPosts($term){
    $match = '%'. $term . '%';

    global $conn;

    #sql = SELECT * FROM post WHERE status='published AND is_Active = 1
    $sql = "SELECT * FROM post 
            WHERE status='published', is_Active = ? 
            AND title LIKE ? OR description LIKE ?";

    $stmt = executeQuery($sql, ['is_Active' => 1, 'title' => $match, 'description' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}