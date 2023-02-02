-- CATEGORY FILL

INSERT INTO `category` (`categoryID`, `category_name`) VALUES ('1', 'CPU'), ('2', 'GPU'), ('3', 'MOBO'), ('4', 'RAM'), ('5','PSU'), ('6','Storage'), ('7','Cooling');

-- PRODUCT INSERTION

INSERT INTO `products` (`productID`, `categoryID`, `name`, `price`, `quantity`, `manufacturer`, `img_src`, `model`) VALUES ('1', '1', 'Intel Core i5-12600kf', '550', '12', 'Intel', 'Pictures\\Products\\CPU\\12600kf.jpg', 'Core i5');
INSERT INTO `cpus` (`productID`, `base_clock`, `boost_clock`, `core_count`, `thread_count`, `series`, `socketID`) VALUES ('1', '3.7', '4.9', '10', '16', 'i5', '1');

INSERT INTO `products` (`productID`, `categoryID`, `name`, `price`, `quantity`, `manufacturer`, `img_src`, `model`) VALUES ('2', '2', 'MSI GTX 1650 VENTUS XS', '400', '20', 'Nvidia', 'Prictures\\Products\\GPU\\GTX 1650.jpg', 'GTX 1650');
INSERT INTO `gpus` (`productID`, `base_clock`, `boost_clock`, `core_count`, `series`, `vendor`, `vram`, `vram_type`, `connector_type`) VALUES ('2', '1.48', '1.74', '896', 'GTX 1650', 'MSI', '4', 'GDDR5', 'None');

-- SOCKET FILL

INSERT INTO `sockets` (`socketID`, `socket_name`) VALUES ('1', 'LGA 1700');

-- INSERT TEST USER

INSERT INTO `users` (`userID`, `username`, `email`, `password`) VALUES (NULL, 'firstUser', 'firstUser@mail.com', '12345678');

-- INSERT TEST ORDER

INSERT INTO `orders` (`orderID`, `userID`, `date`, `address`, `paymentMethod`, `totalPrice`) VALUES (NULL, '1', '2023-02-02', 'Perusha 4, Pravets 2161, Bulgaria', 'Card', '700');

INSERT INTO `orders_have_products` (`orderID`, `productID`, `currentPrice`, `quantity`) VALUES ('1', '1', '400', '1'), ('1', '2', '300', '1');
