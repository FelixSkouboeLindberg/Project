CREATE TABLE `classrooms` (`id` int(60) NOT NULL, `name` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `classrooms` (`id`, `name`) VALUES (1, 'billgates'),(2, 'steven bill'),(3, 'billiejobs'),(4, 'somepersonman');

CREATE TABLE `schools` (`id` int(60) NOT NULL, `name` varchar(255) NOT NULL, `location` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `schools` (`id`, `name`, `location`) VALUES (1, 'viborg skole', 'viborg'),(2, 'silkeborg skole', 'silkeborg'),(3, 'randers skole', 'randers'),(4, 'søndervang skole', 'kolding'),(5, 'kolding skole', 'kolding'),(6, 'mercantech', 'viborg'),(7, 'viborg skole', 'viborg'),(8, 'bryup skole', 'bryup'),(9, 'københavn skole', 'københavn'),(10, 'aarhus skole', 'aarhus'),(11, 'bew', 'bewbalew');

CREATE TABLE `students` (`id` int(60) NOT NULL, `name` varchar(255) NOT NULL, `schoolID` int(60) DEFAULT NULL, `classroomID` int(60) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `students` (`id`, `name`, `schoolID`, `classroomID`) VALUES (3, 'jon', 5, 2),(4, 'mark', 2, 1),(5, 'magnus', 5, 2),(6, 'hanne', 4, 1),(7, 'rasmus', 3, 1),(8, 'jonas', 3, 2),(9, 'laerke', 1, 1),(10, 'markus', 5, 2);

CREATE TABLE `studentteacher` (`id` int(60) NOT NULL, `teacherID` int(60) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `studentteacher` (`id`, `studentID`, `teacherID`) VALUES (1, 3, 3),(2, 5, 6);

CREATE TABLE `teachers` (`id` int(60) NOT NULL, `name` varchar(255) NOT NULL, `school` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `teachers` (`id`, `name`, `school`) VALUES (1, 'jan', 'kolding skole'),(2, 'bo', 'kolding skole'),(3, 'lone', 'kolding skole'),(4, 'anders', 'kolding skole'),(5, 'hans', 'silkeborg skole'),(6, 'peter', 'silkeborg skole'),(7, 'jens', 'silkeborg skole'),(8, 'per', 'silkeborg skole'),(9, 'søren', 'viborg skole'),(10, 'martin', 'viborg skole');

ALTER TABLE `classrooms` ADD PRIMARY KEY (`id`);
ALTER TABLE `schools` ADD PRIMARY KEY (`id`);
ALTER TABLE `students` ADD PRIMARY KEY (`id`), ADD KEY `classroomree` (`classroomID`), ADD KEY `schoolree` (`schoolID`);
ALTER TABLE `studentteacher` ADD PRIMARY KEY (`id`), ADD KEY `studentID` (`studentID`), ADD KEY `something` (`teacherID`);
ALTER TABLE `teachers` ADD PRIMARY KEY (`id`);

ALTER TABLE `classrooms` MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `schools` MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
ALTER TABLE `students` MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `studentteacher` MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `teachers` MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `students` ADD CONSTRAINT `classroomree` FOREIGN KEY (`classroomID`) REFERENCES `classrooms` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION, ADD CONSTRAINT `schoolree` FOREIGN KEY (`schoolID`) REFERENCES `schools` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE `studentteacher` ADD CONSTRAINT `something` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`id`), ADD CONSTRAINT `studentteacher_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON DELETECASCADE ON UPDATE NO ACTION;
COMMIT; 