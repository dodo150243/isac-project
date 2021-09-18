drop DATABASE isac_project;
CREATE DATABASE isac_project CHARACTER SET utf8  COLLATE  utf8_general_ci;

CREATE TABLE tbl_address(
address_id int(11) NOT NULL AUTO_INCREMENT,
numhome_b varchar(250) NOT NULL,
village_b varchar(250) NOT NULL,
sub_distric_b      varchar(250) NOT NULL, 
district_b     varchar(250) NOT NULL,  
province_b varchar(250) NOT NULL,
zipcode_b  int(5) NOT NULL,
numhome_c varchar(250) NOT NULL,
village_c varchar(250) NOT NULL,
sub_district_c  varchar(250) NOT NULL,      
district_c      varchar(250) NOT NULL,  
province_c varchar(250) NOT NULL,
zipcode_c int(5) NOT NULL,
 PRIMARY KEY(address_id)
);

CREATE TABLE tbl_social(
social_id int(11) NOT NULL AUTO_INCREMENT,
facebook varchar(250) NOT NULL,
line varchar(250) NOT NULL,
phone_number int(10) NOT NULL,
 PRIMARY KEY(social_id)
);

CREATE TABLE tbl_education(
education_id int(11) NOT NULL AUTO_INCREMENT,
education_level varchar(250) NOT NULL,
year_first int(4) NOT NULL,
year_finish int(4) NOT NULL,
faculty varchar(250) NOT NULL,
major varchar(250) NOT NULL,
section varchar(250) NOT NULL,
 PRIMARY KEY(education_id)
);

CREATE TABLE tbl_job(
job_id int(11) NOT NULL AUTO_INCREMENT,
occupation varchar(250) NOT NULL,
start_date date NOT NULL,
company_name varchar(250) NOT NULL,
company_address varchar(250) NOT NULL,
contact int(10) NOT NULL,
 PRIMARY KEY(job_id)

);

CREATE TABLE tbl_img(
img_id int(11) NOT NULL AUTO_INCREMENT,
imges varchar(250) NOT NULL,
 PRIMARY KEY(img_id)

);

CREATE TABLE alumni_user(
	alumni_id int(11) NOT NULL AUTO_INCREMENT,
    stu_id int(11) NOT NULL,
    password varchar(250) NOT NULL,
    name_prefix varchar(250) NOT NULL,         
    alumni_fname varchar(250) NOT NULL,       
    alumni_lname  varchar(250) NOT NULL,     
    alumni_fname_eng   varchar(250) NOT NULL,   
    alumni_lname_eng    varchar(250) NOT NULL,     
    alumni_code varchar(13) NOT NULL,         
    d_m_y_birth date NOT NULL, 
    nationality  varchar(250) NOT NULL,        
    religion      varchar(250) NOT NULL,    
    blood_type varchar(250) NOT NULL,
    address_id int(11) NOT NULL,
    social_id  int(11) NOT NULL,
    education_id int(11) NOT NULL,
    job_id int(11) NOT NULL,
    img_id int(11) NOT NULL,
    PRIMARY KEY(alumni_id),
	FOREIGN KEY(address_id) REFERENCES tbl_address(address_id),
	FOREIGN KEY(social_id) REFERENCES tbl_social(social_id),
	FOREIGN KEY(education_id) REFERENCES tbl_education(education_id),
    FOREIGN KEY(job_id) REFERENCES tbl_job(job_id),
    FOREIGN KEY(img_id) REFERENCES tbl_img(img_id)
);