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
username VARCHAR(30) NOT NULL UNIQUE,
hashedPassword VARCHAR(100) NOT NULL,
maritalStatus VARCHAR(25),
sex VARCHAR (10),
privacy INT(1) NOT NULL,
description VARCHAR(1000),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (userId)
);

CREATE TABLE blogs (
blogId INT(10) AUTO_INCREMENT,
userId INT(10) NOT NULL,
content VARCHAR(10000) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (blogId)
);

CREATE TABLE albums (
albumId INT(10) AUTO_INCREMENT,
userId INT(10) NOT NULL,
isProfile BOOLEAN NOT NULL DEFAULT False,
albumName VARCHAR(200),
isRestricted INT NOT NULL DEFAULT 0, -- defaults to public --
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
validator TINYINT NOT NULL,
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
message VARCHAR(1000) NOT NULL,
userId INT(10) NOT NULL,
photoId INT(10),
albumId INT(10),
blogId INT(10),
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
validator TINYINT NOT NULL,
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
validator TINYINT NOT NULL,
PRIMARY KEY (dislikeId)
);

CREATE TABLE messages (
messageId INT(10) NOT NULL AUTO_INCREMENT,
senderId INT(10) NOT NULL,
receiverId INT(10),
circleId INT(10),
-- messageDate DATE NOT NULL,
content VARCHAR(1000) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
validator TINYINT NOT NULL,
PRIMARY KEY (messageId)
);

CREATE TABLE friend_requests (
userId INT(10) NOT NULL,
friendId INT(10) NOT NULL,
createdAt DATETIME NOT NULL DEFAULT NOW(),
updatedAt DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT NOW(),
PRIMARY KEY (userId, friendId)
);

ALTER TABLE album_friendcircles ADD FOREIGN KEY (circleId) REFERENCES friendcircles(circleId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE album_friendcircles ADD FOREIGN KEY (albumId) REFERENCES albums(albumId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE albums ADD FOREIGN KEY (userId) REFERENCES users(userId);
ALTER TABLE album_users ADD FOREIGN KEY (albumId) REFERENCES albums(albumId) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE blogs ADD FOREIGN KEY (userId) REFERENCES users(userId);
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
ALTER TABLE friend_requests ADD FOREIGN KEY (userId) REFERENCES users(userId);
ALTER TABLE friend_requests ADD FOREIGN KEY (friendId) REFERENCES users(userId);

-- ALTER TABLE albums ADD FOREIGN KEY (dislikeId) REFERENCES dislikes(dislikeId);
-- ALTER TABLE album_users ADD FOREIGN KEY (circleId) REFERENCES friendcircles(circleId);


-- ============= create custom constraints and apply them ====================

-- A dislike shouldn't have more than one foreign key reference to a blog, photo, album, or comment.
delimiter //
DROP TRIGGER IF EXISTS dislikesOnlyOneNotNullInsert //
CREATE TRIGGER dislikesOnlyOneNotNullInsert BEFORE INSERT ON dislikes
	FOR EACH ROW
	BEGIN
		IF NEW.blogId IS NOT NULL AND NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NOT NULL AND NEW.albumId IS NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NULL AND NEW.albumId IS NOT NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.commentId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this wall cause the insert to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//
DROP TRIGGER IF EXISTS dislikesOnlyOneNotNullUpdate //
CREATE TRIGGER dislikesOnlyOneNotNullUpdate BEFORE UPDATE ON dislikes
	FOR EACH ROW
	BEGIN
		IF NEW.blogId IS NOT NULL AND NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NOT NULL AND NEW.albumId IS NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NULL AND NEW.albumId IS NOT NULL AND NEW.commentId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.blogId IS NULL AND NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.commentId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the update to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//

-- A comment shouldn't have more than one foreign key references to a photo, album or blog.
DROP TRIGGER IF EXISTS commentsOnlyOneNotNullInsert //
CREATE TRIGGER commentsOnlyOneNotNullInsert BEFORE INSERT ON comments
	FOR EACH ROW
	BEGIN
		IF NEW.photoId IS NOT NULL AND NEW.albumId IS NULL AND NEW.blogId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.photoId IS NULL AND NEW.albumId IS NOT NULL AND NEW.blogId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.blogId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the insert to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//
DROP TRIGGER IF EXISTS commentsOnlyOneNotNullUpdate //
CREATE TRIGGER commentsOnlyOneNotNullUpdate BEFORE UPDATE ON comments
	FOR EACH ROW
	BEGIN
		IF NEW.photoId IS NOT NULL AND NEW.albumId IS NULL AND NEW.blogId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.photoId IS NULL AND NEW.albumId IS NOT NULL AND NEW.blogId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.photoId IS NULL AND NEW.albumId IS NULL AND NEW.blogId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the update to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//

-- A message is either to an individual or a friend circle - it can't be both.
DROP TRIGGER IF EXISTS messagesBothNotNullInsert //
CREATE TRIGGER messagesBothNotNullInsert BEFORE INSERT ON messages
	FOR EACH ROW
	BEGIN
		IF NEW.receiverId IS NOT NULL AND NEW.circleId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.receiverId IS NULL AND NEW.circleId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the insert to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//
DROP TRIGGER IF EXISTS messagesBothNotNullUpdate //
CREATE TRIGGER messagesBothNotNullUpdate BEFORE UPDATE ON messages
	FOR EACH ROW
	BEGIN
		IF NEW.receiverId IS NOT NULL AND NEW.circleId IS NULL THEN
			SET NEW.validator = 1;
		ELSEIF NEW.receiverId IS NULL AND NEW.circleId IS NOT NULL THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the update to abort, since validtor is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//

-- Album privacy settings are either 0 for friends (EVERYONE), 1 for friends circles, or 2 for friends of friends.
DROP TRIGGER IF EXISTS albumPrivacyInsert //
CREATE TRIGGER albumPrivacyInsert BEFORE INSERT ON albums
	FOR EACH ROW
	BEGIN
		IF NEW.isRestricted >= 0 AND NEW.isRestricted <= 2 THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the update to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//
DROP TRIGGER IF EXISTS albumPrivacyUpdate //
CREATE TRIGGER albumPrivacyUpdate BEFORE UPDATE ON albums
	FOR EACH ROW
	BEGIN
		IF NEW.isRestricted >= 0 AND NEW.isRestricted <= 2 THEN
			SET NEW.validator = 1;
		ELSE
			-- this will cause the update to abort, since validator is defined as NOT NULL
			SET NEW.validator = NULL;
		END IF;
	END;//
delimiter ;
