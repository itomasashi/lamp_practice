
-----------------------------------------------------------

-- 購入履歴

CREATE TABLE `Purchase_history` (
  `purchase_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------------------

-- 購入明細

CREATE TABLE `Purchase_details` (
  `details_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

------------------------------------------------------------

ALTER TABLE `Purchase_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY (`purchase_id`);

ALTER TABLE `Purchase_history`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`);
  

ALTER TABLE `Purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Purchase_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;