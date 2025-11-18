CREATE TABLE student (
    student_id INT PRIMARY KEY,
    name VARCHAR(20), 
    major VARCHAR(20),
);

SELECT * FROM student; 

INSERT INTO student VALUES(1, 'Jack', 'Biology');
INSERT INTO student VALUES(2, 'Kate', 'Sociology')

INSERT INTO student(student_id, name) VALUES(3, 'Claire');
INSERT INTO student VALUES(4, 'Jackie', 'Business');
INSERT INTO student VALUES(5, 'Mike', 'Computer Science');

DROP TABLE student; 

CREATE TABLE student (
    student_id INT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    major VARCHAR(20) UNIQUE,
    -- PRIMARY KEY(student_id),
);

DROP TABLE student; 

CREATE TABLE student (
    student_id INT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    major VARCHAR(20) DEFAULT 'undecided', -- if feild is left empty it will be inserted as 'undecided'
    -- PRIMARY KEY(student_id),
);

DROP TABLE student;

CREATE TABLE student (
    student_id INT AUTO_INCREMENT, -- automatically increment the ID
    name VARCHAR(20) NOT NULL,
    major VARCHAR(20) UNIQUE,
    PRIMARY KEY(student_id),
);

DROP TABLE student;

-- ===========================================
-- UPDATE
-- ===========================================

CREATE TABLE student(
    student_id INT,
    name VARCHAR(20),
    major VARCHAR(20),
    PRIMARY KEY(student_id),
);

UPDATE student
SET major = 'Bio';
WHERE major = 'Biology';

UPDATE student
SET major = 'Comp Sci';
WHERE major = 'Computer Science';

UPDATE student
SET major = 'Biochemistry';
WHERE major = 'Bio' OR major = 'Comp Sci';

-- Change multiple columns
UPDATE student
SET name = 'Tom', major = 'undecided';
WHERE student_id = 1

-- Set all majors
UPDATE student
SET major = 'undecided';

---- ===========================================
-- DELETE
-- ===========================================

DELETE FROM student
WHERE student_id = 5; 

DELETE FROM student
WHERE name = 'Tom' AND major = 'undecided';

---- ===========================================
-- BASIC QUERIES
-- ===========================================

SELECT * FROM student;

SELECT name, major FROM student;

SELECT student.name, student.major FROM student;

SELECT student.name, student.major FROM student ORDER BY name;

SELECT * FROM student ORDER BY student_id ASC;

SELECT * FROM student ORDER BY student_id, major DESC;

SELECT *
FROM student
ORDER BY student_id DESC
LIMIT 2; -- only show two rows

SELECT *
FROM student
WHERE major = 'Biology';

SELECT name, major
FROM student
WHERE major = 'Chemisty' OR major = 'Biology';

SELECT name, major
FROM student
WHERE student_id