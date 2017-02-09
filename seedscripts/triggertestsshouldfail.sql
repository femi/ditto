-- Messages
INSERT INTO messages (senderId, receiverId, circleId, messageDate, content) VALUES (1, 2, 2, "2017-01-20", "Hi!");

-- Comments
INSERT INTO comments (userId, photoId, albumId, message) VALUES (1, 1, 1, "This is really banal!");
INSERT INTO comments (userId, albumId, photoId, blogId, message) VALUES (1, 2, 1, 1, "These are all rubbish..");

-- dislikes
INSERT INTO dislikes (userId) VALUES (1);
INSERT INTO dislikes (userId, blogId, photoId) VALUES (1, 1, 1);
INSERT INTO dislikes (userId, blogId, photoId, albumId) VALUES (1, 1, 1, 1);
INSERT INTO dislikes (userId, blogId, photoId, albumId, commentId) VALUES (1, 1, 1, 1, 1);
