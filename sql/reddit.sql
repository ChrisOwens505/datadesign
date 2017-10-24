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
   VALUES(UNHEX(REPLACE('a8455409-ec73-401b-82c0-ab7f04282198', '-', '')), '6cf9945d30cd0b69cb2e330446eee283', 'MacJ', 'MacJ@gmail.com',
		 '184b4a1a974c698a80718d1bf3f6fd5f428fd2bba71f47816c90c2f66477ab418c0d5d99b9a8e1e82786fa7ac2',
		 'cf0282112368a2309040a5fb1877d6df6d46fb'
);

   INSERT INTO post(postId, postProfileId, postContent, postDate)
   VALUES (UNHEX(REPLACE('d792e4cf-6274-42e7-b901-6f279a1cfbca', '-', '')), UNHEX(REPLACE('a8455409-ec73-401b-82c0-ab7f04282198', '-', '')),
		  'This is a post', '2017-16-17'
);

   INSERT INTO comments(commentsId, commentsProfileId, commentsPostId, commentsContent, commentsDate)
   VALUES (UNHEX(REPLACE('e3b8acf4-93e3-4126-be77-a5b4c60040b2', '-', '')), UNHEX(REPLACE('a8455409-ec73-401b-82c0-ab7f04282198', '-', '')),
		  UNHEX(REPLACE('d792e4cf-6274-42e7-b901-6f279a1cfbca', '-', '')), 'This is a comment', '2017-10-17'
);

   SELECT profileEmail, profileUserName, profileId
   FROM profile
   WHERE profileEmail LIKE 'MacJ%';

   SELECT postId, postContent, postDate
   FROM post
   WHERE postDate = '10-16-17';

   SELECT commentsId, commentsContent, commentsDate
   FROM comments
   WHERE commentsContent LIKE '%is a%';

   UPDATE profile
   SET profileUserName = 'MacJ'
   WHERE profileId = 'a8455409-ec73-401b-82c0-ab7f04282198';

   UPDATE post
   SET postContent = 'this is a post'
   WHERE postId = 'd792e4cf-6274-42e7-b901-6f279a1cfbca';

   UPDATE comments
   SET commentsContent = 'this is a comment'
   WHERE commentsId = 'e3b8acf4-93e3-4126-be77-a5b4c60040b2';

   DELETE FROM profile
   WHERE profileId = 'a8455409-ec73-401b-82c0-ab7f04282198';

   DELETE FROM post
   WHERE postId = 'd792e4cf-6274-42e7-b901-6f279a1cfbca';

   DELETE FROM comments
   WHERE commentsId = 'e3b8acf4-93e3-4126-be77-a5b4c60040b2';