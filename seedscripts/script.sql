-- Remove old database if it exists and rebuild
DROP DATABASE IF EXISTS hatebook;
CREATE DATABASE hatebook;
USE hatebook;

-- Create tables
CREATE TABLE users (
userId INT(10) AUTO_INCREMENT,
fName VARCHAR(20) NOT NULL,
lName VARCHAR(20) NOT NULL,
dob DATE NOT NULL,
city VARCHAR(20),
mobileNumber VARCHAR(15) NOT NULL UNIQUE,
email VARCHAR(100) NOT NULL UNIQUE,
hashedPassword VARCHAR(100) NOT NULL,
maritalStatus VARCHAR(25),
sex VARCHAR (10),
description VARCHAR(1000),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (userId)
);

CREATE TABLE blogs (
blogId INT(10) AUTO_INCREMENT,
content VARCHAR(10000) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (blogId)
);


CREATE TABLE albums (
albumId INT(10) AUTO_INCREMENT,
userId INT(10) NOT NULL,
albumName VARCHAR(200),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (albumId)
);

CREATE TABLE album_users (
albumId INT(10) NOT NULL,
userId INT(10) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW()
);

CREATE TABLE photos (
photoId INT(10) AUTO_INCREMENT,
albumId INT(10),
caption VARCHAR(1000),
filename VARCHAR(500),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (photoId),
FOREIGN KEY (albumId) REFERENCES albums(albumId)
);

CREATE TABLE comments (
commentId INT(10) AUTO_INCREMENT,
comment VARCHAR(1000) NOT NULL,
userId INT(10) NOT NULL,
photoId INT(10),
albumId INT(10),
blogId INT(10),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (commentId)
);


CREATE TABLE friendcircles (
circleId INT(10) AUTO_INCREMENT,
userId INT(10),
name VARCHAR(100),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (circleId),
FOREIGN KEY (userId) REFERENCES users(userId)
);

CREATE TABLE friendcircle_users (
circleId INT(10) NOT NULL,
userId INT(10) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
FOREIGN KEY (circleId) REFERENCES friendcircles(circleId),
FOREIGN KEY (userId) REFERENCES users(userId),
PRIMARY KEY (circleId, userId)
);

CREATE TABLE album_friendcircles (
albumId INT(10) NOT NULL,
circleId INT(10) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (albumId, circleId)
);


CREATE TABLE dislikes (
dislikeId INT(10) NOT NULL AUTO_INCREMENT,
userId INT(10) NOT NULL,
blogId INT(10),
photoId INT(10),
albumId INT(10),
commentId INT(10),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (dislikeId)
);

CREATE TABLE messages (
messageId INT(10) AUTO_INCREMENT,
senderId INT(10) NOT NULL,
receiverId INT(10,
circleId INT(10),
messageDate DATE,
content VARCHAR(10000),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (messageId)
);

ALTER TABLE album_friendcircles ADD FOREIGN KEY (circleId) REFERENCES friendcircles(circleId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE album_friendcircles ADD FOREIGN KEY (albumId) REFERENCES albums(albumId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE albums ADD FOREIGN KEY (userId) REFERENCES users(userId);
ALTER TABLE album_users ADD FOREIGN KEY (albumId) REFERENCES albums(albumId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE comments ADD FOREIGN KEY (userId) REFERENCES users(userId);
ALTER TABLE comments ADD FOREIGN KEY (photoId) REFERENCES photos(photoId);
ALTER TABLE comments ADD FOREIGN KEY (albumId) REFERENCES albums(albumId);
ALTER TABLE comments ADD FOREIGN KEY (blogId) REFERENCES blogs(blogId);
ALTER TABLE dislikes ADD FOREIGN KEY (userId) REFERENCES users(userId);
ALTER TABLE dislikes ADD FOREIGN KEY (blogId) REFERENCES blogs(blogId);
ALTER TABLE dislikes ADD FOREIGN KEY (photoId) REFERENCES photos(photoId);
ALTER TABLE dislikes ADD FOREIGN KEY (albumId) REFERENCES albums(albumId);
ALTER TABLE dislikes ADD FOREIGN KEY (commentId) REFERENCES comments(commentId);
ALTER TABLE messages ADD FOREIGN KEY (senderId) REFERENCES users(userId);
ALTER TABLE messages ADD FOREIGN KEY (receiverId) REFERENCES users(userId);
ALTER TABLE messages ADD FOREIGN KEY (circleId) REFERENCES friendcircles(circleId);

-- ALTER TABLE albums ADD FOREIGN KEY (dislikeId) REFERENCES dislikes(dislikeId);
-- ALTER TABLE album_users ADD FOREIGN KEY (circleId) REFERENCES friendcircles(circleId);


-- ============= create custom constraints ====================

-- A dislike shouldn't have more than one foreign key reference to a blog, photo, album, or comment.
CREATE ASSERTION dislikesOnlyOneNotNull
	CHECK ((blogId IS NOT NULL AND photoId IS NULL AND albumId IS NULL AND commentId IS NULL)
		OR (blogId IS NULL AND photoId IS NOT NULL AND albumId IS NULL AND commentId IS NULL)
		OR (blogId IS NULL AND photoId IS NULL AND albumId IS NOT NULL AND commentId IS NULL)
		OR (blogId IS NULL AND photoId IS NULL AND albumId IS NULL AND commentId IS NOT NULL));
-- A comment shouldn't have more than one foreign key references to a photo, album or blog.
CREATE ASSERTION commentsOnlyOneNotNull; 
	CHECK ((photoId IS NOT NULL AND albumId IS NULL AND blogId IS NULL)
		OR (photoId IS NULL AND albumId IS NOT NULL AND blogId IS NULL)
		OR (photoId IS NULL AND albumId IS NULL AND blogId IS NULL));
-- A message is either to an individual or a friend circle - it can't be both. 
CREATE ASSERTION messagesBothNotNull;
	CHECK ((receiverId IS NOT NULL AND circleId IS NULL)
		OR (receiverId IS NULL AND circleId IS NOT NULL));

-- Apply these contraints
ALTER TABLE dislikes ADD CONSTRAINT dislikesOnlyOneNotNull;
ALTER TABLE comments ADD CONSTRAINT commentsOnlyOneNotNull;
ALTER TABLE messages ADD CONSTRAINT messagesBothNotNull;
