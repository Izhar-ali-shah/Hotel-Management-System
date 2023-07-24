
Create database Hostel;
use Hostel



Create TABLE rooms 
(room_id int , 
room_vacancy int , 
current_students int , 
CONSTRAINT PK_ROOMS PRIMARY KEY (room_id));


Create table Student_info (
     student_id int,
     First_name varchar(225),
     Last_name varchar(225),
     Phone varchar(225),
     address varchar(225),
     sex char,
     year int ,
     dob DATE ,
     s_email varchar(225),
     room_id int,
     CONSTRAINT PK_Student_info PRIMARY KEY (student_id),
    CONSTRAINT FK_Std_info FOREIGN KEY (room_id)
     REFERENCES rooms (room_id));



 Create table student_attendence(
     student_id int PRIMARY KEY,
     DATE DATE,
     is_present BOOLEAN,
     is_absent BOOLEAN,
     is_leave BOOLEAN,
    CONSTRAINT FK_Student_info FOREIGN KEY (student_id)
     REFERENCES Student_info (student_id));

CREATE TABLE dishes (
    dish_id INT PRIMARY key,
    dish_1 VARCHAR(50),
    dish_2 VARCHAR(50),
    dish_3 VARCHAR(50)
);

CREATE  TABLE mess (day VARCHAR(20) PRIMARY key , 
mess_timmings varchar(255), 
dish_id int,
CONSTRAINT fk_mess FOREIGN KEY (dish_id) REFERENCES dishes(dish_id));

Create TABLE fees (
    fees_info_id int,
    monthly_fees int,
    discount_rate int,
    tax int,
    mess_fees int,
    late_fees int,
    addmission_fee int,
    other_activity int,
    security_fee int,
    student_id int,
    CONSTRAINT PK_fee PRIMARY KEY (fees_info_id),
    CONSTRAINT FK_fee FOREIGN KEY (student_id) REFERENCES Student_info(student_id));


Create table Parent (
    student_id int , 
    father_name varchar(225),
    mother_name VARCHAR(225),
    father_job_title VARCHAR(225),
    mother_job_title VARCHAR(225),
    CONSTRAINT PK_parent PRIMARY KEY (student_id),
    CONSTRAINT FK_parent FOREIGN KEY (student_id) REFERENCES Student_info (student_id)); 

CREATE TABLE employee (
    emp_id int PRIMARY KEY,
    emp_first_name varchar(225),
    emp_last_name varchar(255),
    cell_no int,
    address_of_e varchar(225),
    is_active VARCHAR(255),
    job_title varchar(255),
    doj_date varchar(255),
    doe_date varchar(255));

Create table salary (
    emp_id int,
    basic_salary int,
    increment_yearly_salary int,
    bonus_salary int,
    CONSTRAINT PK_salary PRIMARY KEY (emp_id),
    CONSTRAINT FK_salary FOREIGN KEY (emp_id) REFERENCES employee (emp_id));


Create table users_student (
    user_name varchar(255),
    user_password varchar (255),
    student_id int,
    CONSTRAINT PK_users PRIMARY KEY (user_name),
    CONSTRAINT FK_U FOREIGN KEY (student_id) REFERENCES Student_info (student_id));


Create table users_emp (
    user_name varchar(255),
    user_password varchar (255),
    emp_id int,
    CONSTRAINT PK_users_emp PRIMARY KEY (emp_id),
    CONSTRAINT FK_E FOREIGN KEY (emp_id) REFERENCES employee (emp_id));

Create table Admin_log (
    Admin_id VARCHAR(100) PRIMARY KEY,
    user_name VARCHAR(100),
    pass varchar(100),
    email varchar(100)
    ); 

ALTER TABLE mess
ADD order_id int;