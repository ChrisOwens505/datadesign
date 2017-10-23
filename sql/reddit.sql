-- DROP TABLE IF EXISTS vote;
-- DROP TABLE IF EXISTS post;
-- DROP TABLE IF EXISTS profile;

CREATE TABLE profile(
	profileid BINARY(16) NOT NULL,
	profileactivationtoken CHAR (32),
	profileusername CHAR(128) NOT NULL,
	profilehandle VARCHAR (32) NOT NULL,
	profileemail VARCHAR(128),
	profilehash CHAR(128) NOT NULL,
	profilephone VARCHAR(32),
	profilesalt CHAR(64) NOT NULL,
	UNIQUE(profileemail),
	UNIQUE(profileusername),
	PRIMARY Key(profileid)
);
--
CREATE TABLE post(
	postid BINARY(16) NOT NULL,
	postprofileid BINARY(16) NOT NULL,
	postcontent VARCHAR(140) NOT NULL,
	postdate DATETIME(6)	NOT NULL,
	INDEX(postprofileid),
	FOREIGN KEY(postprofileid) REFERENCES profile(profileid),
	PRIMARY KEY(postid)
);

CREATE TABLE vote(
	voteprofileid BINARY(16)NOT NULL,
	votepostid BINARY(16) NOT NULL,
	votdate DATETIME(6) NOT NULL,
	INDEX(voteprofileid),
	INDEX (votepostid),
	FOREIGN KEY(voteprofileid) REFERENCES profile(profileid),
	FOREIGN KEY(votepostid) REFERENCES post(postid),
	PRIMARY KEY(voteprofileid, votepostid)
);

CREATE TABLE comments(
	commentsid BINARY(16) NOT NULL,
	commentsprofileid BINARY(16) NOT NULL,
	commentspostid BINARY(16),
	commentsCommentsid BINARY(16),
	commentscontent VARCHAR(2000)NOT NULL,
	commentsdate DATETIME(6) NOT NULL,
	INDEX(commentsprofileid),
	INDEX(commentspostid),
	FOREIGN KEY(commentsprofileid) REFERENCES profile(profileid),
	FOREIGN KEY(commentspostid) REFERENCES post(postid),
	FOREIGN KEY (commentsCommentsid) REFERENCES comments(commentsid),
	PRIMARY KEY(commentsid)
);

INSERT INTO profile(profileId, profileActivationToken, profileUserName, profileEmail, profileHash, profileSalt)
VALUES(UNHEX(REPLACE(
);
