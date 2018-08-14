-- Creating default user
CREATE USER 'default'@'%' IDENTIFIED BY 'secret';

-- Create database and user
CREATE DATABASE IF NOT EXISTS `hammer` COLLATE 'utf8_general_ci';
GRANT ALL ON `hammer`.* TO 'default'@'%';

-- Reload to populate
GRANT RELOAD,PROCESS ON *.* TO 'default'@'%';

FLUSH PRIVILEGES;
