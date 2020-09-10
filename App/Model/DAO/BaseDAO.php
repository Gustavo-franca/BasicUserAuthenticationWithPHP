<?php
    
    namespace App\Model\DAO;

    use App\Database\Connection;

    class BaseDAO {

        private $connection;

        public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function select($sql)
    {
        if(!empty($sql))
        {
            return $this->connection->query($sql);
        }
    }

    public function insert($table, $cols, $values)
    {
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            $params    = $cols;
            $columns   = str_replace(":", "", $cols);

            $stmt = $this->connection->prepare("INSERT INTO $table ($columns) VALUES ($params)");
            $stmt->execute($values);

            return $stmt->rowCount();
        }else{
            return false;
        }
    }

    public function update($table, $cols, $values, $where=null)
    {
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            if($where)
            {
                $where = " WHERE $where ";
            }

            $stmt = $this->connection->prepare("UPDATE $table SET $cols $where");
            $stmt->execute($values);

            return $stmt->rowCount();
        }else{
            return false;
        }
    }

    public function delete($table, $where=null)
    {
        if(!empty($table))
        {
            /*
                DELETE usuario WHERE id = 1
            */

            if($where)
            {
                $where = " WHERE $where ";
            }

            $stmt = $this->connection->prepare("DELETE FROM $table $where");
            $stmt->execute();

            return $stmt->rowCount();
        }else{
            return false;
        }
    }

    }

?>