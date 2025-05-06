<?php
//* Used traits
Trait Model 
{
    use Database;
    
    protected $limit = 10;
    protected $offset = 0;
    public $errors = [];

    public function findId($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key ." && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key ." && ";
        }

        $query = rtrim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";

        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key ." && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key ." && ";
        }

        $query = rtrim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if($result)
            return $result[0];
        return false;
    }

    public function insert($data)
    {
        //removed unwanted data
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        } 
        $keys = array_keys($data);
        $query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
        //echo $query;
        $this->query($query, $data);
        return false;
    }

    public function update($id, $data, $id_column = 'id')
    {
        //removed unwanted data
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) 
        {
            $query .= $key . " = :" . $key .", ";
        }

        $query = trim($query, ", ");
        
        $query .= " where $id_column = :$id_column ";
        
        $data[$id_column] = $id;

        //echo $query;
        $this->query($query, $data);
        return false;
    }

    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column ";

        //echo $query;        
        $this->query($query, $data);
        return false;
    }
}
