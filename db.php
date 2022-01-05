<?php

if (!isset($_SESSION)) {
    session_start();
}

class DB
{

    private static $db = null;

    function __construct()
    {
        if (is_null(self::$db)) {
            self::$db = mysqli_connect("127.0.0.1", "root", "", "library_true");
        }

        try {
            if (!self::$db) {
                throw new error("MYSQL connect error:" . mysqli_connect_error());
            }
        } catch (error $e) {
            die("Message:" . $e->getMessage());
        }
        self::$db->query("SET NAMES UTF8");
    }

    public function escape_string($str)
    {
        return self::$db->real_escape_string(htmlspecialchars($str));
    }

    public function exarray($data, $p = " , ", $s = " = ")
    {
        $array = [];
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $v = $this->escape_string($v);
                if ($s === "LIKE") {
                    $sql = "`$k` $s '%{$v}%'";
                    $array[] = $sql;
                } else {
                    $sql = "`$k` $s '{$v}'";
                    $array[] = $sql;
                }
            }
        } else {
            $array[] = $data;
        }
        $array = join(" $p ", $array);
        return $array;
    }

    public function select($table, $where = "1", $o = "AND", $other = "", $LIKE = " = ")
    {
        $sql = self::$db->query("SELECT * FROM `$table`WHERE " . $this->exarray($where, $o, $LIKE) . " $other");
        $data = [];
        while ($r = $sql->fetch_array()) {
            $data[] = $r;
        }
        return $data;
    }

    public function select_once($table, $where = "1", $o = "AND", $other = "", $LIKE = " = ")
    {
        $sql = self::$db->query("SELECT * FROM `$table` WHERE " . $this->exarray($where, $o, $LIKE) . " $other");
        return $sql->fetch_array();
    }

    public function insert($table, $data)
    {
        $sql = self::$db->query("INSERT `$table` SET" . $this->exarray($data));
        return self::$db->insert_id;
    }

    public function update($rows, $data, $where, $o = "AND")
    {
        self::$db->query("UPDATE `$rows` SET " . $this->exarray($data) . " WHERE " . $this->exarray($where, $o));
        return false;
    }

    public function delete($rows, $where, $o = "AND")
    {
        self::$db->query("DELETE FROM `$rows` WHERE" . $this->exarray($where, $o));
        return false;
    }
}
