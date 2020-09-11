<?php
    
    namespace App\Model\DAO;

    use App\Database\Connection;
    use PDO;
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

    public function findOneBy($table,$columns,$column,$value){
        if(!empty($table) && !empty($value) && !empty($columns))
        {
            $param   = ":".$column;

            $stmt = $this->connection->prepare("SELECT $columns FROM $table WHERE $column = $param LIMIT 1");
            $stmt->execute(array("$param" => $value));
     
            return $stmt->fetchAll(\PDO::FETCH_OBJ)[0];   
        }else{
            return false;
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
            $columns = explode(',',$cols);
            $setColumns = "";
            foreach ($columns as $column) {
                $setColumns .= "$column = :$column,";
            }
            $setColumns = trim($setColumns,',');



            if($where)
            {
                $where = " WHERE $where ";
            }

            $stmt = $this->connection->prepare("UPDATE $table SET $setColumns $where");
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