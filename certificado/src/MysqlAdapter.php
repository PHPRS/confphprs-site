<?php 

class MysqlAdapter implements Adapter {

    private $connection;
    
    public function __construct($host, $database, $user, $pass) {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->connection = $pdo;
    }

    public function findAttendee($email, $id_event) {
        
        $sql = " SELECT id, name, email, type, data, file
                FROM    attendee
                WHERE   email   = :email
                AND     id_event  = :id_event
        ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam('email', $email);
        $statement->bindParam('id_event', $id_event);
        $statement->execute();

        return $statement->fetchAll();
    }


    public function findEvent($id) 
    {
        
        $sql = " SELECT id, name
                FROM    event
                WHERE     id  = :id
        ";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam('id', $id);
        $statement->execute();

        return $statement->fetch();

    }


    public function getAllEvent() 
    {
        
        $sql = " SELECT id, name
                FROM    event
        ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }
}