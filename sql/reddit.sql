 --
 --
 --
 --
 --
DROP TABLE IF EXISTS vote;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS profile;
   --
 CREATE TABLE profile(
 --
 --
   profileid BINARY(16) NOT NULL
 --
   profileemail VARCHAR(128)
 --
   profilehash   CHAR(128) NOT NULL
   profilephone VARCHAR(32)
   profilesalt CHAR(64) NOT NULL
   UNIQUE(profileemail)
   UNIQUE(profilephone)
 --
   PRIMARY Key(profileid)
 );
 --
 CREATE TABLE post(
   postid BINARY(16) NOT NULL
   postprofileid BINARY(16) NOT NULL
   postcontent VARCHAR(140 NOT NULL
 --
   postdate DATETIME(6)	NOT NULL
 --
   INDEX(postprofileid)
 --
   FOREIGN KEY(postprofileid) REFERENCES profile(profileid)
 --
	PRIMARY KEY(postid)
);
 CREATE TABLE vote(
 --
	 voteprofileid BINARY(16)NOT NULL
	 votepostid BINARY(16) NOT NULL
	 votdate DATETIME(6) NOT NULL
 --
	 INDEX(voteprofileid)
	 INDEX (votepostid)
 --
	 FOREIGN KEY(voteprofileid) REFERENCES profile(profileid)
	 FOREIGN KEY(votepostid) REFERENCES post(postid)
 --
	 PRIMARY KEY(voteprofileid, votepostid)
 );