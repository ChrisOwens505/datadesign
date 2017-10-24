--
--
--
--
--
-- DROP TABLE IF EXISTS vote;
-- DROP TABLE IF EXISTS post*/;
-- DROP TABLE IF EXISTS profile;
--
CREATE TABLE profile(
--
--
	     profileId BINARY(16) NOT NULL,
	     profileActivationToken CHAR (32),
	     profileUsername BINARY(16),
	     profileHandle VARCHAR (32) NOT NULL,
--
	     profileEmail VARCHAR(128),
--
	     profileHash CHAR(128) NOT NULL,
	     profilePhone VARCHAR(32),
	     profileSalt CHAR(64) NOT NULL,
	     UNIQUE(profileEmail),
	     UNIQUE(profilePhone),--
	     PRIMARY Key(profileId)
--
);
--
CREATE TABLE post(
	postId BINARY(16) NOT NULL,
	postProfileId BINARY(16) NOT NULL,
	postContent VARCHAR(240) NOT NULL,
	--
	postDate DATETIME(6)	NOT NULL,
	--
	INDEX(postProfileId),
	--
	FOREIGN KEY(postProfileId) REFERENCES profile(profileId),
	--
	PRIMARY KEY(postId)
);
CREATE TABLE vote(
	--
	voteProfileId BINARY(16)NOT NULL,
	votePostId BINARY(16) NOT NULL,
	votDate DATETIME(6) NOT NULL,
	--
	INDEX(voteProfileId),
	INDEX (votePostId),
	--
	FOREIGN KEY(voteProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(votePostId) REFERENCES post(postId),
	--
	PRIMARY KEY(voteProfileId, votePostId)
);
CREATE TABLE comments(
	--
	commentsId BINARY(16) NOT NULL,
	commentsProfileId BINARY(16) NOT NULL,
	commentsPostId BINARY(16),
	commentsCommentsId BINARY(16),
	commentsContent VARCHAR(2000)NOT NULL,
	commentsDate DATETIME(6) NOT NULL,
	--
	INDEX(commentsProfileId),
	INDEX(commentsPostId),
	--
	FOREIGN KEY(commentsProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(commentsPostId) REFERENCES post(postId),
	FOREIGN KEY (commentsCommentsId) REFERENCES comments(commentsId),
	--
	PRIMARY KEY(commentsId)
);