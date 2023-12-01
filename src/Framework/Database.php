<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOException;

class Database
{
    private PDO $connection;

    public function __construct(
        string $driver,
        array $config,
        string $username,
        string $password
    ) {
        $config = http_build_query(data: $config, arg_separator: ';');
        $dsn = "{$driver}:{$config}";

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("Unable to connect to database");
        }
    }

    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }

    public function rollback()
    {
        if ($this->connection->inTransaction()) {
            $this->connection->rollBack();
        }
    }

    public function insertStudentDetails(array $data)
    {
        $insertQuery = "INSERT INTO students_detail (`Full_Name`, `Student_ID`, `Date_Of_Birth`, `Parent_Guardian_Information`, `Password`, `Confirm_Password`)
                        VALUES (:full_name, :student_id, :dob, :guardian_info, :password, :confirm_password)";

        $insertStmt = $this->connection->prepare($insertQuery);

        foreach ($data as $key => $value) {
            $insertStmt->bindValue(":$key", $value, $this->getPdoType($value));
        }

        $insertStmt->execute();
    }

    public function searchStudentByName(string $name)
    {
        $selectQuery = "SELECT * FROM students_detail WHERE `Full_Name` = :full_name";

        $selectStmt = $this->connection->prepare($selectQuery);
        $selectStmt->bindValue(':full_name', $name, PDO::PARAM_STR);
        $selectStmt->execute();

        return $selectStmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function query(string $query)
    {
        $this->connection->query($query);
    }

    private function getPdoType($value)
    {
        // Determine and return PDO type based on the value
        // Add more cases as needed
        return is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    }
}
