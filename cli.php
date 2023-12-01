<?php

declare(strict_types=1);

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;

try {
    $db = new Database('mysql', [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'faithacademy'
    ], 'root', '');

    $db->beginTransaction();

    // Insert data
    $insertData = [
        'full_name' => 'opopp',
        'student_id' => 543223789123,
        'dob' => '2001-09-02',
        'guardian_info' => 'kololl@gmail.com',
        'password' => 'password23mnbb',
        'confirm_password' => 'password23mnbb'
    ];

    $db->insertStudentDetails($insertData);

    // Commit the transaction
    $db->commit();

    // Search for inserted data
    $search = "opopp";
    $result = $db->searchStudentByName($search);

    // Logging (example): Log the result without exposing it to the user
    //error_log('Database result: ' . json_encode($result));

    // ...

    // Do something with $result if needed

} catch (PDOException $error) {
    // Rollback the transaction if an error occurs
    $db->rollback();

    // Display the detailed error message
    //echo "Error: " . $error->getMessage() . PHP_EOL;
    //echo "SQL Query: " . $insertQuery . PHP_EOL;

} finally {
    // Move this outside the transaction block
    $sqlFile = file_get_contents("./database.sql");

    // Wrap table creation in a try-catch block to handle the "table already exists" error
    try {
        $db->query($sqlFile);
    } catch (PDOException $existingTableError) {
        // If the error is due to the table already existing, ignore it
        if ($existingTableError->getCode() != 1050) {
            throw $existingTableError;
        }
    }
}
