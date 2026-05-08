DROP DATABASE IF EXISTS studysphere;
CREATE DATABASE studysphere;
USE studysphere;

-- =========================
-- STUDENTS
-- =========================
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- =========================
-- SEMESTERS
-- =========================
CREATE TABLE semesters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20)
);

INSERT INTO semesters (name) VALUES 
('Semester 3'),
('Semester 4');

-- =========================
-- SUBJECTS
-- =========================
CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    semester_id INT,
    subject_name VARCHAR(100),
    FOREIGN KEY (semester_id) REFERENCES semesters(id)
);

INSERT INTO subjects (semester_id, subject_name) VALUES
(1,'C Programming'),
(1,'C++ Programming'),
(1,'Data Structures'),
(1,'Computer Networks'),
(1,'Mathematics'),
(2,'Web Development'),
(2,'RDBMS'),
(2,'Operating System'),
(2,'Discrete Structures');

-- =========================
-- TESTS
-- =========================
CREATE TABLE tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT,
    test_number INT,
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

INSERT INTO tests (subject_id, test_number)
SELECT s.id, t.n
FROM subjects s
JOIN (
    SELECT 1 n UNION SELECT 2 UNION SELECT 3 
    UNION SELECT 4 UNION SELECT 5 UNION SELECT 6
) t;

-- =========================
-- QUESTIONS (EMPTY FOR NOW)
-- =========================
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    test_id INT,
    question TEXT,
    opt1 VARCHAR(100),
    opt2 VARCHAR(100),
    opt3 VARCHAR(100),
    opt4 VARCHAR(100),
    correct ENUM('opt1','opt2','opt3','opt4'),
    FOREIGN KEY (test_id) REFERENCES tests(id)
);

-- =========================
-- RESULTS
-- =========================
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    test_id INT NOT NULL,
    score INT NOT NULL,
    total INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- SYLLABUS
-- =========================
CREATE TABLE syllabus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT,
    content TEXT,
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

-- =========================
-- FULL SYLLABUS (ALL SUBJECTS - 6 UNITS EACH)
-- =========================

INSERT INTO syllabus (subject_id, content) VALUES

-- C PROGRAMMING (1)
(1,'Unit 1: Introduction to C, History, Structure of Program, Compilation Process, Variables, Data Types'),
(1,'Unit 2: Constants, Keywords, Input Output, Operators, Expressions'),
(1,'Unit 3: Control Statements (if, switch), Loops (for, while, do-while)'),
(1,'Unit 4: Functions, Recursion, Arrays, Strings'),
(1,'Unit 5: Pointers, Dynamic Memory Allocation, Structures, Unions'),
(1,'Unit 6: File Handling, Preprocessor Directives, Storage Classes'),

-- C++ (2)
(2,'Unit 1: C++ Basics, Syntax, Data Types, I/O Streams'),
(2,'Unit 2: Control Statements, Functions, Overloading'),
(2,'Unit 3: Classes, Objects, Constructors, Destructors'),
(2,'Unit 4: Inheritance, Polymorphism, Encapsulation, Abstraction'),
(2,'Unit 5: Operator Overloading, Friend Functions, Templates'),
(2,'Unit 6: STL, Exception Handling, File Handling, Virtual Functions'),

-- DATA STRUCTURES (3)
(3,'Unit 1: Introduction, Complexity Analysis, Arrays'),
(3,'Unit 2: Searching and Sorting Algorithms'),
(3,'Unit 3: Linked Lists (Singly, Doubly, Circular)'),
(3,'Unit 4: Stack and Queue Implementation'),
(3,'Unit 5: Trees, BST, AVL Trees'),
(3,'Unit 6: Graphs, BFS, DFS, Hashing, Heap'),

-- COMPUTER NETWORKS (4)
(4,'Unit 1: Introduction, Types of Networks, Topology'),
(4,'Unit 2: OSI Model, TCP/IP Model'),
(4,'Unit 3: IP Addressing, Subnetting'),
(4,'Unit 4: Routing, Switching, Protocols'),
(4,'Unit 5: Transport Layer, TCP vs UDP'),
(4,'Unit 6: Network Security, Firewall, VPN, Wireless Networks'),

-- MATHEMATICS (5)
(5,'Unit 1: Algebra, Matrices, Determinants'),
(5,'Unit 2: Limits, Continuity, Differentiation'),
(5,'Unit 3: Integration, Applications'),
(5,'Unit 4: Differential Equations'),
(5,'Unit 5: Probability and Statistics'),
(5,'Unit 6: Vectors, Linear Algebra'),

-- WEB DEVELOPMENT (6)
(6,'Unit 1: HTML Basics, Forms, Elements'),
(6,'Unit 2: CSS, Flexbox, Grid, Responsive Design'),
(6,'Unit 3: JavaScript Basics, DOM, Events'),
(6,'Unit 4: PHP Basics, Server Side Programming'),
(6,'Unit 5: MySQL, CRUD Operations'),
(6,'Unit 6: APIs, Authentication, Deployment'),

-- RDBMS (7)
(7,'Unit 1: DBMS Concepts, ER Model'),
(7,'Unit 2: Relational Model, Keys, Constraints'),
(7,'Unit 3: SQL Basics, DDL, DML'),
(7,'Unit 4: Joins, Subqueries, Views'),
(7,'Unit 5: Normalization (1NF, 2NF, 3NF)'),
(7,'Unit 6: Transactions, ACID, Triggers'),

-- OPERATING SYSTEM (8)
(8,'Unit 1: OS Basics, Types of OS'),
(8,'Unit 2: Process Management, Threads'),
(8,'Unit 3: CPU Scheduling Algorithms'),
(8,'Unit 4: Memory Management'),
(8,'Unit 5: Deadlocks, Synchronization'),
(8,'Unit 6: File System, Security'),

-- DISCRETE STRUCTURES (9)
(9,'Unit 1: Set Theory, Relations, Functions'),
(9,'Unit 2: Logic, Propositional Logic'),
(9,'Unit 3: Combinatorics'),
(9,'Unit 4: Graph Theory, Trees'),
(9,'Unit 5: Recurrence Relations'),
(9,'Unit 6: Boolean Algebra, Cryptography Basics');
INSERT INTO questions (test_id, question, opt1, opt2, opt3, opt4, correct) VALUES

-- ======================
-- TEST 1 (Basics)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=1),
'Who developed C language?','Dennis Ritchie','James Gosling','Bjarne Stroustrup','Guido van Rossum','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=1),
'C language is which type?','Procedural','OOP','Markup','Functional','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=1),
'Main function starts with?','main()','start()','begin()','void()','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=1),
'printf() is used for?','output','input','math','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=1),
'C is a ___ language','compiled','interpreted','markup','none','opt1'),

-- ======================
-- TEST 2 (Control Statements)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=2),
'if statement is used for?','decision making','looping','storage','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=2),
'Switch works on?','integer','float','array','pointer','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=2),
'Loop that runs minimum once?','do-while','for','while','if','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=2),
'break statement means?','exit loop','skip iteration','continue','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=2),
'continue statement means?','skip iteration','exit program','stop loop','none','opt1'),

-- ======================
-- TEST 3 (Arrays & Strings)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=3),
'Array index starts from?','0','1','-1','2','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=3),
'Array stores?','same type elements','different types','only numbers','only chars','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=3),
'String ends with?','\\0','\\n','space','tab','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=3),
'gets() is used for?','string input','output','math','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=3),
'Array size is?','fixed','dynamic','infinite','none','opt1'),

-- ======================
-- TEST 4 (Pointers)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=4),
'Pointer stores?','address','value','data','function','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=4),
'* operator is used for?','value access','addition','loop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=4),
'& operator gives?','address','value','sum','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=4),
'Null pointer means?','points to nothing','zero','error','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=4),
'Pointer size is?','fixed','variable','none','array','opt1'),

-- ======================
-- TEST 5 (Functions)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=5),
'Function is?','block of code','loop','array','variable','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=5),
'Recursion means?','function calls itself','loop','array','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=5),
'Function returns?','value','loop','array','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=5),
'void means?','no return','return value','error','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=5),
'Arguments passed in?','function','loop','array','none','opt1'),

-- ======================
-- TEST 6 (File Handling)
-- ======================
((SELECT id FROM tests WHERE subject_id=1 AND test_number=6),
'File open function?','fopen','open','read','write','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=6),
'File close function?','fclose','close','end','stop','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=6),
'File reading function?','fscanf','input','readline','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=6),
'File writing function?','fprintf','print','write','none','opt1'),

((SELECT id FROM tests WHERE subject_id=1 AND test_number=6),
'malloc is used for?','dynamic memory','file','loop','none','opt1');
-- ======================
-- TEST 1 (Basics of C++)
-- ======================
INSERT INTO questions (test_id, question, opt1, opt2, opt3, opt4, correct) VALUES
((SELECT id FROM tests WHERE subject_id=2 AND test_number=1),
'Who developed C++?','Bjarne Stroustrup','Dennis Ritchie','James Gosling','Guido van Rossum','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=1),
'C++ is which type?','OOP','Procedural','Markup','Functional','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=1),
'Main function starts with?','int main()','start()','begin()','void()','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=1),
'cout is used for?','output','input','math','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=1),
'C++ is a ___ language','compiled','interpreted','markup','none','opt1'),

-- ======================
-- TEST 2 (Control Statements)
-- ======================
((SELECT id FROM tests WHERE subject_id=2 AND test_number=2),
'if statement is used for?','decision making','looping','storage','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=2),
'Switch works on?','integer','float','array','pointer','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=2),
'Loop that runs minimum once?','do-while','for','while','if','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=2),
'break statement means?','exit loop','skip iteration','continue','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=2),
'continue statement means?','skip iteration','exit program','stop loop','none','opt1'),

-- ======================
-- TEST 3 (Arrays & Strings)
-- ======================
((SELECT id FROM tests WHERE subject_id=2 AND test_number=3),
'Array index starts from?','0','1','-1','2','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=3),
'Array stores?','same type elements','different types','only numbers','only chars','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=3),
'String class header?','<string>','<stdio.h>','<math.h>','<conio.h>','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=3),
'cin is used for?','input','output','math','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=3),
'Array size is?','fixed','dynamic','infinite','none','opt1'),

-- ======================
-- TEST 4 (Pointers)
-- ======================
((SELECT id FROM tests WHERE subject_id=2 AND test_number=4),
'Pointer stores?','address','value','data','function','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=4),
'* operator is used for?','value access','addition','loop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=4),
'& operator gives?','address','value','sum','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=4),
'Null pointer means?','points to nothing','zero','error','loop','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=4),
'Pointer size is?','fixed','variable','none','array','opt1'),

-- ======================
-- TEST 5 (OOP Concepts)
-- ======================
((SELECT id FROM tests WHERE subject_id=2 AND test_number=5),
'Class is?','user defined type','loop','array','variable','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=5),
'Object is?','instance of class','function','loop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=5),
'Inheritance means?','reuse code','loop','array','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=5),
'Encapsulation means?','data hiding','loop','array','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=5),
'Polymorphism means?','many forms','loop','array','none','opt1'),

-- ======================
-- TEST 6 (File Handling)
-- ======================
((SELECT id FROM tests WHERE subject_id=2 AND test_number=6),
'File open class?','fstream','file','open','read','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=6),
'File close function?','close()','end','stop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=6),
'File reading?','ifstream','input','getline','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=6),
'File writing?','ofstream','print','write','none','opt1'),

((SELECT id FROM tests WHERE subject_id=2 AND test_number=6),
'new keyword is used for?','dynamic memory','file','loop','none','opt1');
-- ======================
-- TEST 1 (Basics of Data Structure)
-- ======================
INSERT INTO questions (test_id, question, opt1, opt2, opt3, opt4, correct) VALUES
((SELECT id FROM tests WHERE subject_id=3 AND test_number=1),
'Data structure is?','organized data','random data','only numbers','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=1),
'Linear data structure?','array','tree','graph','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=1),
'Non-linear data structure?','tree','array','stack','queue','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=1),
'Example of primitive data type?','int','array','stack','queue','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=1),
'Which is not data structure?','compiler','array','stack','queue','opt1'),

-- ======================
-- TEST 2 (Stack)
-- ======================
((SELECT id FROM tests WHERE subject_id=3 AND test_number=2),
'Stack follows?','LIFO','FIFO','random','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=2),
'Push operation means?','insert','delete','display','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=2),
'Pop operation means?','delete','insert','search','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=2),
'Top element accessed by?','peek','push','pop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=2),
'Stack overflow means?','full','empty','error','none','opt1'),

-- ======================
-- TEST 3 (Queue)
-- ======================
((SELECT id FROM tests WHERE subject_id=3 AND test_number=3),
'Queue follows?','FIFO','LIFO','random','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=3),
'Insertion in queue?','enqueue','dequeue','push','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=3),
'Deletion in queue?','dequeue','enqueue','pop','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=3),
'Front element accessed by?','front','rear','top','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=3),
'Queue overflow means?','full','empty','error','none','opt1'),

-- ======================
-- TEST 4 (Linked List)
-- ======================
((SELECT id FROM tests WHERE subject_id=3 AND test_number=4),
'Linked list stores?','nodes','values','arrays','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=4),
'Node contains?','data and link','only data','only link','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=4),
'Last node points to?','NULL','first node','itself','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=4),
'Linked list is?','dynamic','static','fixed','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=4),
'Traversal means?','visit nodes','delete nodes','insert nodes','none','opt1'),

-- ======================
-- TEST 5 (Tree)
-- ======================
((SELECT id FROM tests WHERE subject_id=3 AND test_number=5),
'Tree is?','non-linear','linear','array','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=5),
'Root node is?','top node','last node','middle node','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=5),
'Leaf node is?','no children','one child','two child','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=5),
'Binary tree has max children?','2','1','3','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=5),
'Height of tree means?','max depth','min depth','nodes','none','opt1'),

-- ======================
-- TEST 6 (Searching & Sorting)
-- ======================
((SELECT id FROM tests WHERE subject_id=3 AND test_number=6),
'Linear search is?','sequential','binary','random','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=6),
'Binary search requires?','sorted array','unsorted','tree','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=6),
'Bubble sort compares?','adjacent','random','all','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=6),
'Best case of binary search?','O(1)','O(n)','O(log n)','none','opt1'),

((SELECT id FROM tests WHERE subject_id=3 AND test_number=6),
'Worst case of linear search?','O(n)','O(1)','O(log n)','none','opt1');
SELECT COUNT(*) FROM questions;
SELECT * FROM students;
DROP TABLE results;
ALTER TABLE students ADD semester_id INT; 
