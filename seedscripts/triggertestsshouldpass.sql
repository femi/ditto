-- messages 
INSERT INTO messages (senderId, receiverId, messageDate, content) VALUES (1, 2, "2017-01-20", "Hi!");
INSERT INTO messages (senderId, circleId, messageDate, content) VALUES (1, 2, "2017-01-20", "Hi everyone!");

-- comments
INSERT INTO comments (userId, photoId, message) VALUES (1, 1, "You look great!");
INSERT INTO comments (userId, albumId, message) VALUES (1, 2, "What a lovely collection of photos.");
INSERT INTO comments (userId, blogId, message) VALUES (1, 3, "I fundamentally disagree with everything you said in this blog.");

-- dislikes
INSERT INTO dislikes (userId, blogId) VALUES (1, 1);
INSERT INTO dislikes (userId, photoId) VALUES (1, 1);
INSERT INTO dislikes (userId, albumId) VALUES (1, 1);
-- INSERT INTO dislikes (userId, commentId) VALUES (1, 1);
