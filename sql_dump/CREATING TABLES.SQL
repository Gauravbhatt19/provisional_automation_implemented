#buffer TABLEs

CREATE TABLE buffer(ref_no INT(10) NOT NULL ,FOREIGN KEY(ref_no) REFERENCES refer_table(ref_no), name VARCHAR(50) NOT NULL,msg VARCHAR(2000) NOT NULL,father_name  VARCHAR(50) NOT NULL, email_id  VARCHAR(500) NOT NULL,yearofadmin INT(5) NOT NULL DEFAULT '17',type enum('REG','BACK') NOT NULL DEFAULT 'BACK',provisional_sem INT(5) NOT NULL DEFAULT '00', last_modify DATETIME DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE buffer2_subjects( ref_no INT(10) NOT NULL ,FOREIGN KEY(ref_no) REFERENCES refer_table(ref_no),subjects VARCHAR(500) NOT NULL, max_credit1 INT(5) NOT NULL DEFAULT '100',max_credit2 INT(5) NOT NULL DEFAULT '50',credit1 INT(5) NOT NULL DEFAULT '0',credit2 INT(5) NOT NULL DEFAULT '0',back_type enum('REGULAR','INTERNAL','SPECIAL'),mnth_yr  VARCHAR(200) NOT NULL DEFAULT '0', last_modify DATETIME DEFAULT CURRENT_TIMESTAMP);

#Subject Table
CREATE TABLE subjects (
  subcode varchar(7) NOT NULL,
  name varchar(300) NOT NULL,
  branch enum('CSE','CE','ECE','EE','ME') DEFAULT NULL,
  sem int(11) DEFAULT '1',
  batch int(11) DEFAULT '17',
  id int(11) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  credit1 int(5) NOT NULL DEFAULT '100',
  credit2 int(5) NOT NULL DEFAULT '50'
);
#Reference Table
CREATE TABLE refer_table (
  ref_no INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(300) NOT NULL,
  branch enum('CSE','CE','ECE','EE','ME'),
  roll_no DECIMAL(15,0) NOT NULL,
  stat enum('Success','Reject','Apply'),
  last_modify DATETIME DEFAULT CURRENT_TIMESTAMP,
  compile_time  DATETIME,
  gar_id INT(20) NOT NULL UNIQUE
 );

#users Table
CREATE TABLE users(
type enum('compiler','admin'),
userid VARCHAR(300) NOT NULL PRIMARY KEY,
pass VARCHAR(300) NOT NULL,
last_login  DATETIME DEFAULT CURRENT_TIMESTAMP,
last_logout  DATETIME DEFAULT CURRENT_TIMESTAMP,
no_of_systems INT(5) NOT NULL DEFAULT '0'
);
