DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS topic;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS topic;


	CREATE TABLE category(
		categoryid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		categoryname VARCHAR(152) NOT NULL,
		categorydescription VARCHAR(152) NOT NULL
	) ENGINE=InnoDB;

CREATE TABLE user(
		id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		username VARCHAR(152) NOT NULL,
		userjoindate TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		password VARCHAR(1500) NOT NULL,
		remember_token VARCHAR(100),
		userpostcount INT,
		salt VARCHAR(100),
		md5hash VARCHAR(100)
	) ENGINE=InnoDB;


CREATE TABLE topic(
		topicid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		sticky INT NOT NULL,
		topicname VARCHAR(152) NOT NULL,
		content VARCHAR(1500) NOT NULL,
		userid INT NOT NULL,
		mostrecentpost TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		categoryid INT NOT NULL,
		CONSTRAINT t_userid FOREIGN KEY (userid) REFERENCES user(id),
		CONSTRAINT t_categoryid FOREIGN KEY (categoryid) REFERENCES category(categoryid)
	) ENGINE=InnoDB;



CREATE TABLE post(
		postid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		posttext VARCHAR(152) NOT NULL,
		postpostdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
		topicid INT NOT NULL,
		userid INT NOT NULL,
		CONSTRAINT p_topicid FOREIGN KEY (topicid) REFERENCES topic(topicid),
		CONSTRAINT p_userid FOREIGN KEY (userid) REFERENCES user(id)
	) ENGINE=InnoDB;




INSERT INTO category(categoryname, categorydescription) VALUES ('League of Legends', 'League of Legends'), ('Starcraft 2', 'Starcraft 2'), ('Call of Duty: Ghosts', 'Call of Duty: Ghosts');
INSERT INTO user(username, userjoindate, password, userpostcount) VALUES ('user1', '2014-07-15 04:53:04', '$2y$10$sM4idSqOjmU.ggknNDLcnOmaV.AlRIpd9wDcWjnkJaDtrII1hJhyC', 9), ('user2', '2014-07-15 04:53:04', '$2y$10$IqyubjpD95f8iDcGUCQL9uf.Qsqzvp9mxzc/9pjnjQqVDSb5BO1TK', 9), ('user3', '2014-07-15 04:53:04', '$2y$10$x.ph8fq56Xy2Zqm/.mNs1eF2luDZ2dN4dlZeSQeIBvdTmnNjwdxEG ', 9);
INSERT INTO topic(sticky, topicname, content, userid, categoryid) VALUES (1,'Need a team or more to complete your roster?','Need a team or more to complete your roster?',1,1),(0,'RP?','reputation points',2,1),(1,'How are we going to receive our reward?','I would like to know how I am gonna recieve the reward of the last tournament my team have won.',3,1),(0,'Terran Zerg or Protoss','Which race in starcraft is the best',1,2),(1,'Best New Units','What is the best unit',2,2),(0,'Imbalanced unit strengths','What is the most imbalanced unit in terms of ability',3,2),(0,'Looking for Ghosts clan?','im looking for a ghost clan',1,3),(1,'Do you prefer ghosts to other cod games','i think its worse',2,3),(0,'Ghosts Tournament','who will win',3,3);
INSERT INTO post(posttext, postpostdate, topicid, userid) VALUES ('i need a team','2014-07-15 04:53:04',1,1), ('i also need a team','2014-07-15 04:53:04',1,2), ('i too need a team','2014-07-15 04:53:04',1,3), ('i need reputation points','2014-07-15 04:53:04',2,1), ('reputation points','2014-07-15 04:53:04',2,2), ('reputation points!','2014-07-15 04:53:04',2,3), ('I agree with this thread','2014-07-15 04:53:04',3,1), ('In time.','2014-07-15 04:53:04',3,2), ('This is ','2014-07-15 04:53:04',3,3), ('Terran til i die','2014-07-15 04:53:04',4,1), ('Zerg are the best','2014-07-15 04:53:04',4,2), ('Protoss rules','2014-07-15 04:53:04',4,3), ('I have never played the new starcraft','2014-07-15 04:53:04',5,1), ('the new zerg units are the best','2014-07-15 04:53:04',5,2), ('i think terran units are the best','2014-07-15 04:53:04',5,3), ('ghosts are imba good','2014-07-15 04:53:04',6,1), ('terran marines are underpowered','2014-07-15 04:53:04',6,2), ('zerg rush','2014-07-15 04:53:04',6,3), ('are you a scrub?','2014-07-15 04:53:04',7,1), ('you seem like a scrub','2014-07-15 04:53:04',7,2), ('scrub','2014-07-15 04:53:04',7,3),  ('i thought cod 2 was best','2014-07-15 04:53:04',8,1), ('i like ghosts more than anything else','2014-07-15 04:53:04',8,2), ('ghosts rules!','2014-07-15 04:53:04',8,3) ,  ('i will win you are all scrubs','2014-07-15 04:53:04',9,1), ('my team is the best we will win','2014-07-15 04:53:04',9,2), ('i think the pro gamer team will win','2014-07-15 04:53:04',9,3);
INSERT INTO user(username, userjoindate, password, userpostcount, salt, md5hash) VALUES ('PZeta1', '2014-07-15 04:53:04', 'a40b34dd944fafd28591e1089dd5f697', 0, 'IDpkgm/Q1:OYoOR0y_2Cshoe#}b`>:', 'a40b34dd944fafd28591e1089dd5f697'), ('PZeta2', '2014-07-15 04:53:04', '6655c1029712904acab001136420f030', 0, '*9X[uuML<,JH,aCYwP3]=/S{r?dD2k', '6655c1029712904acab001136420f030'), ('PZeta3', '2014-07-15 04:53:04', '93341ba4ead824471cdfe9c276176059', 0, 'fYQ*{,g>u%ixnAP4\\P?aZO`{Q))G4W',  '93341ba4ead824471cdfe9c276176059'), ('PZeta4', '2014-07-15 04:53:04', '4923475f1b3be6faee12923ff8c5ed05', 0, 'zyC5-YZ~mx_JY2R}r-hqiNoivr|9w?', '4923475f1b3be6faee12923ff8c5ed05'), ('PZeta5', '2014-07-15 04:53:04', '1c4267a7c2f6d570a70a94a24ffc7096', 0, '~kG;3(!?cUWGaG+F^ej!2a]95L4}$+', '1c4267a7c2f6d570a70a94a24ffc7096');


passwords are :

fred
matthew 
glenn
5Edrt6QG9F
5Hoc7j3SQz
owGW79Mrkh
8p9j3yMLVv
8dG1DevhDU
