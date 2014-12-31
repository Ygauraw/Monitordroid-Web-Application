Monitordroid-Web-Application
============================

Server Application for Monitordroid


The goal of this project is to give users the ability to control their Android mobile devices from any web browser. 

Previously it was a major networking challenge to send packets to a device on a 3G/4G data connection due to mobile
firewalls, but Monitordroid navigates around this by using Google's Cloud Messaging API to send remote commands to the
device. 

I own currently own a paid hosting service at http://www.monitordroid.com/ which is a platform for sending commands 
to the device. A Premium Account can currently be purchased for only $9.99/yr and will allow you to easily connect to your devices without having to worry about creating a database or doing any PHP coding. However, the Monitordroid mobile application can still be controlled for free by the Monitordroid-Web-Application if the proper settings in the code are changed. A guide on setting up a GCM-Capable server can be found at: http://www.androidhive.info/2012/10/android-push-notifications-using-google-cloud-messaging-gcm-php-and-mysql/

After your PHP/MySQL servers are setup, copy the Monitordroid-Web-Application source-code into your web directory and change the db_functions.php and config.php files on the server side to connect to your database. On the mobile-side, change The CommonUtilities class to set your device up to register to your server (http://yourpublicipaddress/register.php). You will also have to change the postData method in each class that posts information to the server (LocationService, Contact, CallLogGetter, etc.) to point towards your public server url or ip address and the respective post-receiving file. 

The reason I decided to make Monitordroid open-source is that I believe it has the potential to become a very useful,
powerful tool if talented developers are able to create new features themselves. The networking and basic feature foundation has been laid and is very stable, giving open-source contributors the freedom to create features for Monitordroid that will truly allow users to control their devices, anywhere. 


UPDATE: The database structure and command to create it is as follows:

Table structure for table `gcm_users`
--

DROP TABLE IF EXISTS `gcm_users`;
CREATE TABLE IF NOT EXISTS `gcm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contacts` text CHARACTER SET utf8 NOT NULL,
  `smsdata` mediumtext CHARACTER SET utf8 NOT NULL,
  `smssentdata` mediumtext CHARACTER SET utf8 NOT NULL,
  `calllogs` text CHARACTER SET utf8 NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=327 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_regid`, `name`, `email`, `contacts`, `smsdata`, `smssentdata`, `calllogs`, `latitude`, `longitude`, `created_at`)
