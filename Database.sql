CREATE TABLE IF NOT EXISTS students_detail(
    Full_Name varchar(255) NOT NULL,
    Student_ID bigint(20) unsigned NOT NULL,
    Grade_Level tinyint(10) NOT NULL,
    Date_Of_Birth date NOT NULL,
    Parent_Guardian_Information varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Confirm_Password varchar(255) NOT NULL,
    Created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (Student_ID),
    UNIQUE KEY (Parent_Guardian_Information)
);
