
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);

INSERT into admins(username,password) VALUES('admin','admin');
INSERT into users(name,email,password,gender) VALUES('nuruddin','nuruddin@gmail.com','nuruddin','male');
INSERT into users(name,email,password,gender) VALUES('didar','didar@gmail.com','didar','male');
INSERT into users(name,email,password,gender) VALUES('mahin','mahin@gmail.com','saidur','male');

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Raspberry Pi'),
(2, 'Arduino'),
(3, 'Gizduino'),
(4, 'Sensor'),
(5, 'Module'),
(6, 'Capacitor'),
(7, 'Resistor'),
(8, 'Transistor'),
(9, 'Others'),
(10, 'Banana Pi');



CREATE TABLE IF NOT EXISTS `products` (
`prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_cost` decimal(10,2) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `prod_serial` varchar(50) NOT NULL,
  `prod_pic1` varchar(500) NOT NULL,
  `prod_pic2` varchar(500) NOT NULL,
  `prod_pic3` varchar(500) NOT NULL,
   PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `supplier` (
`supp_id` int(11) NOT NULL,
  `supp_name` varchar(100) NOT NULL,
  `supp_address` varchar(200) NOT NULL,
  `supp_contact` varchar(50) NOT NULL,
  `supp_email` varchar(50) NOT NULL,
  PRIMARY KEY (`supp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_contact`, `supp_email`) VALUES
(1, 'PICC', 'Manila, Phils.', '(987)-884-12', 'picc@email.moto!'),
(2, 'QUEZELCO', 'Infanta, Quezon', '45643534567879', 'emal'),
(4, 'Alcatroz, Inc.', 'Sta. Mesa Manila', '9435398928', 'none');


CREATE TABLE IF NOT EXISTS `order_info` (
`order_id` int(11) NOT NULL ,
  `user_id` int(11) NOT NULL,
  `track_num` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipping_add` varchar(500) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `order_details` (
`order_details_id` int(11) NOT NULL ,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_qty` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
ALTER TABLE `order_info`
 ADD PRIMARY KEY (`order_id`);


ALTER TABLE `order_details`
 ADD PRIMARY KEY (`order_details_id`);
 ALTER TABLE `order_details`
MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
 ALTER TABLE `order_info`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;


INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `category`, `supplier`, `prod_serial`, `prod_pic1`, `prod_pic2`, `prod_pic3`) VALUES
(11, 'Arduino Uno Rec3-1', 'Small Arduino Uno Blue', 0, '123.00', '125.00', 'Arduino', 'Alcatroz, Inc.', '1122330099', 'arduino mega 2560-1.jpg', 'Arduino Uno Rev3-1.jpg', '1.png'),
(12, 'Aruino Mega', 'ATMega Arduino', 391, '133.00', '155.00', 'Arduino', 'Alcatroz, Inc.', '341156780', 'Arduinomega2560-3.jpg', 'arduino mega 2560-1.jpg', '2.png'),
(14, 'Raspberry Pi 3', 'Model B+', 221, '700.00', '760.00', 'Raspberry Pi', 'PICC', '45422791', 'raspi2.jpg', 'raspi.jpg', 'raspi3.png'),
(15, 'Flame Sensor', 'Flame Sensor 3 Pins', 455, '450.00', '455.00', 'Sensor', 'QUEZELCO', '456523702', 'flame2.jpg', 'flamesensor1.jpg', 'flamesensor.png'),
(16, 'Sensor', 'Able to sense product', 700, '1500.00', '1500.00', 'Sensor', 'QUEZELCO', '890', 'ultrasonic sensor.png', 'motion sensor2.jpg', 'flamesensor1.jpg'),
(17, 'X9 THOR - Gaming Mouse', '7D Macro Programmable Gaming Mouse, Sensor: A714 Instan, LED: RGB 16.8 million colors, Interface : USB, DPI: 4800dpi, Cable Length: 1.8m nylon braided, Supported OS: Windows Vista, Win7/8/10, Mac OS X 10.5 or later, Linux, Chrome OS', 25, '1000.00', '2200.00', 'Others', 'Alcatroz, Inc.', '1353', 'x9thor.jpg', 'x92.jpg', 'x93.jpg');
