-- CATEGORY FILL

INSERT INTO `category` (`categoryID`, `category_name`) VALUES ('1', 'CPU'), ('2', 'GPU'), ('3', 'MOBO'), ('4', 'RAM'), ('5','PSU'), ('6','Storage'), ('7','Cooling');

-- PRODUCT INSERTION

INSERT INTO `products` (`productID`, `categoryID`, `name`, `price`, `quantity`, `manufacturer`, `img_src`, `model`) VALUES ('1', '1', 'Intel Core i5-12600kf', '550', '12', 'Intel', 'Pictures\\Products\\CPU\\12600kf.jpg', 'Core i5');
INSERT INTO `cpus` (`productID`, `base_clock`, `boost_clock`, `core_count`, `thread_count`, `series`, `socketID`) VALUES ('1', '3.7', '4.9', '10', '16', 'i5', '1');

-- SOCKET FILL

INSERT INTO `sockets` (`socketID`, `socket_name`) VALUES ('1', 'LGA 1700');
