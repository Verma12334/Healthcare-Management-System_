CREATE TABLE patient (
    pid int primary key AUTO_INCREMENT,
    name VARCHAR(100),
    dob DATE,
    gender enum('M','F','O'),
    age INT,
    email VARCHAR(100),
    contact_no VARCHAR(15),
    hostel enum('Umium','Subansiri','Siang','Manas','Lohit','Kameng','Kapili','Dhansiri','Disang','Dihing','Dibang','Brahmaputra','Barak'),
    course enum('Phd','MA','Msc','Mtec','BDes','Btech'),
    blood_group enum('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'),
    pass_wrd VARCHAR(255)
);

