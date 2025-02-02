use job_portal;
show tables;
select * from users;
select * from applicants;
select * from companies;
select * from job_listings;
select * from job_applications;
DESCRIBE applicants; 

-- INSERT INTO `companies` (`user_id`, `com_name`, `com_email`, `com_phone`, `com_address`, `com_website`, `com_description`, `logo`, `updated_at`, `created_at`)
-- VALUES (3, 'Test Company', 'test@gmail.com', '9876543210', 'Kathmandu', 'https://google.com', 'Description here', 'logo.png', '2025-01-29 11:49:54', '2025-01-29 11:49:54');

SHOW CREATE TABLE companies;

ALTER TABLE job_listings MODIFY COLUMN jobid BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY;
SHOW CREATE TABLE job_listings;

        
-- ALTER TABLE job_listings MODIFY COLUMN jobid BIGINT UNSIGNED AUTO_INCREMENT; 

SET SQL_SAFE_UPDATES = 0;
UPDATE applicants SET resume = 'default_resume.pdf' WHERE resume IS NULL;
SET SQL_SAFE_UPDATES = 1;


