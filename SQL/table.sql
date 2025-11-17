-- INT --  Whole Numbers
-- DECIMAL(M,N) -- Decimal Numbers - Exact Value
-- VARCHAR(x) -- String of text of lengh x
-- BLOB -- Binary Large Object, Stores Large data
-- DATE -- 'YYYY-MM-DD'
-- TIMESTAMP -- 'YYYY-MM-DD HH:MM:SS' used for recording


CREATE TABLE student (
    student_id INT PRIMARY KEY,
    name VARCHAR(20), 
    major VARCHAR(20),
);

DESCRIBE student; 


DROP TABLE student;

ALTER TABLE student ADD gpa DECIMAL(3, 2);

ALTER TABLE student DROP COLUMN gpa;


