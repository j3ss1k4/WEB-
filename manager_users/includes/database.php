<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
function query($sql, $data = [], $check = false)
{
    global $conn;
    $kq = false;
    // echo $sql;
    // die();
    try {
        $statement = $conn->prepare($sql);
        if (!empty($data)) {
            $kq = $statement->execute($data);
        } else {
            $kq = $statement->execute();
        }
    } catch (Exception $exp) {
        echo $exp->getMessage() . '<br>';
        die();
    }
    if ($check)
        return $statement;
    return $kq;
}
function insert($table, $data)
{
    $key = array_keys($data);
    $arr_key = implode(',', $key);
    $valuetb = ':' . implode(',:', $key);
    $sql = 'INSERT INTO ' . $table . '(' . $arr_key . ') VALUES(' . $valuetb . ')';
    $kqua = query($sql, $data);
    return $kqua;
}
function update($table, $data, $condition = '')
{
    $update = '';
    foreach ($data as $key => $value) {
        $update .= $key . '= :' . $key . ',';
    }
    $update = trim($update, ',');
    if (!empty($condition)) {
        $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
    } else {
        $sql = 'UPDATE ' . $table . ' SET ' . $update;
    }
    $kq = query($sql, $data);
    return $kq;
}
function delete($table, $condition = '')
{
    if (!empty($condition)) {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
    } else {
        $sql = 'DELETE FROM ' . $table;
    }
    $kq = query($sql);
    return $kq;
}
// lấy nhiều dòng dữ liệu
function getRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}
// lấy một dòng dữ liệu
function oneRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetch(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}
//  đếm số dòng dữ liệu
function getRows($sql)
{
    $kq = query($sql, '', true);
    if (!empty($kq)) {
        return $kq->rowCount();
    }
}
