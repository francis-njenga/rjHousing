
CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `propertyType` varchar(100) NOT NULL, 
  `submitType` varchar(100) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `bedroom` int(50) NOT NULL, 
  `kitchen` int(50) NOT NULL,  
  `areaSize` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `county` varchar(100) NOT NULL,
  `constituency` varchar(100) NOT NULL,  
  `image` varchar(300) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `aid` int(50) NOT NULL,  
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `currentStatus` varchar(100) 
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `agent` (
  `aid` int(50) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `aemail` varchar(100) NOT NULL,
  `aphone` varchar(20) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `aimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




  ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

  ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `agent`
  ADD PRIMARY KEY (`aid`);
  
  ALTER TABLE `agent`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

    ALTER TABLE `user`
    ADD PRIMARY KEY (`uid`)

    ALTER TABLE `user`
    MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
