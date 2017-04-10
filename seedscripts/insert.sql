-- seed users
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Ned', 'Stark', '1988/12/12', 'London', '07842173569', 'ned@got.com', 'Ned', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', 'Brace yourself...');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Jon', 'Snow', '1992/10/13', 'London', '07999665384', 'jon@got.com', 'Jon', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'M', 'Knower of nothing.');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Robb', 'Stark', '1991/11/10', 'London', '07777777777', 'robb@got.com', 'Robb', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', 'Robb\'s bio');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Sansa', 'Stark', '1986/03/20', 'London', '0788888888', 'sansa@got.com', 'Sansa', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'F', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Arya', 'Stark', '1992/10/12', 'London', '07867665384', 'arya@got.com', 'Arya', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'F', '!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Tyrion', 'Lannister', '1969/06/11', 'London', '07867667334', 'tyrion@got.com', 'Tyrion', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Jaime', 'Lannister', '1992/06/05', 'London', '07867660384', 'jaime@got.com', 'KingSlayer', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Cersei', 'Lannister', '1977/03/04', 'London', '07867467384', 'cersei@got.com', 'Cersei', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'divorced', 'F', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Joffrey', 'Baratheon', '1989/09/09', 'London', '07999367384', 'joffrey@got.com', 'Joffrey', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Tywin', 'Lannister', '1988/12/25', 'London', '07867567384', 'tywin@got.com', 'Tywin', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Daenerys', 'Targareyn', '1989/09/09', 'London', '07999357384', 'daenerys@got.com', 'daenerys', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', 'RIP Drogo');

--seed tags
INSERT INTO tag_users (tagId, userId) VALUES (1,1);
INSERT INTO tag_users (tagId, userId) VALUES (1,2);
INSERT INTO tag_users (tagId, userId) VALUES (1,3);
INSERT INTO tag_users (tagId, userId) VALUES (1,4);
INSERT INTO tag_users (tagId, userId) VALUES (1,5);
INSERT INTO tag_users (tagId, userId) VALUES (1,6);
INSERT INTO tag_users (tagId, userId) VALUES (1,7);
INSERT INTO tag_users (tagId, userId) VALUES (2,1);
INSERT INTO tag_users (tagId, userId) VALUES (2,3);
INSERT INTO tag_users (tagId, userId) VALUES (2,4);
INSERT INTO tag_users (tagId, userId) VALUES (2,5);
INSERT INTO tag_users (tagId, userId) VALUES (2,6);
INSERT INTO tag_users (tagId, userId) VALUES (2,9);
INSERT INTO tag_users (tagId, userId) VALUES (3,1);
INSERT INTO tag_users (tagId, userId) VALUES (3,2);
INSERT INTO tag_users (tagId, userId) VALUES (3,4);
INSERT INTO tag_users (tagId, userId) VALUES (3,5);
INSERT INTO tag_users (tagId, userId) VALUES (3,6);
INSERT INTO tag_users (tagId, userId) VALUES (3,11);
INSERT INTO tag_users (tagId, userId) VALUES (3,14);
INSERT INTO tag_users (tagId, userId) VALUES (3,12);
INSERT INTO tag_users (tagId, userId) VALUES (4,4);
INSERT INTO tag_users (tagId, userId) VALUES (4,6);
INSERT INTO tag_users (tagId, userId) VALUES (4,8);
INSERT INTO tag_users (tagId, userId) VALUES (4,10);
INSERT INTO tag_users (tagId, userId) VALUES (4,12);
INSERT INTO tag_users (tagId, userId) VALUES (4,14);
INSERT INTO tag_users (tagId, userId) VALUES (5,2);
INSERT INTO tag_users (tagId, userId) VALUES (5,4);
INSERT INTO tag_users (tagId, userId) VALUES (5,6);
INSERT INTO tag_users (tagId, userId) VALUES (5,8);
INSERT INTO tag_users (tagId, userId) VALUES (5,9);
INSERT INTO tag_users (tagId, userId) VALUES (5,3);
INSERT INTO tag_users (tagId, userId) VALUES (6,1);
INSERT INTO tag_users (tagId, userId) VALUES (6,3);
INSERT INTO tag_users (tagId, userId) VALUES (6,5);
INSERT INTO tag_users (tagId, userId) VALUES (6,7);
INSERT INTO tag_users (tagId, userId) VALUES (6,9);
INSERT INTO tag_users (tagId, userId) VALUES (6,14);
INSERT INTO tag_users (tagId, userId) VALUES (7,7);
INSERT INTO tag_users (tagId, userId) VALUES (7,9);
INSERT INTO tag_users (tagId, userId) VALUES (7,8);
INSERT INTO tag_users (tagId, userId) VALUES (7,1);
INSERT INTO tag_users (tagId, userId) VALUES (7,2);
INSERT INTO tag_users (tagId, userId) VALUES (7,5);
INSERT INTO tag_users (tagId, userId) VALUES (8,7);
INSERT INTO tag_users (tagId, userId) VALUES (8,9);
INSERT INTO tag_users (tagId, userId) VALUES (8,8);
INSERT INTO tag_users (tagId, userId) VALUES (8,1);
INSERT INTO tag_users (tagId, userId) VALUES (8,2);
INSERT INTO tag_users (tagId, userId) VALUES (8,5);
INSERT INTO tag_users (tagId, userId) VALUES (9,7);
INSERT INTO tag_users (tagId, userId) VALUES (9,9);
INSERT INTO tag_users (tagId, userId) VALUES (9,8);
INSERT INTO tag_users (tagId, userId) VALUES (9,1);
INSERT INTO tag_users (tagId, userId) VALUES (9,2);
INSERT INTO tag_users (tagId, userId) VALUES (9,5);
INSERT INTO tag_users (tagId, userId) VALUES (10,7);
INSERT INTO tag_users (tagId, userId) VALUES (10,9);
INSERT INTO tag_users (tagId, userId) VALUES (10,8);
INSERT INTO tag_users (tagId, userId) VALUES (10,1);
INSERT INTO tag_users (tagId, userId) VALUES (10,2);
INSERT INTO tag_users (tagId, userId) VALUES (10,5);
INSERT INTO tag_users (tagId, userId) VALUES (11,5);



-- seed everyone circle for all users
INSERT INTO friendcircles (userId, name) VALUES (1, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (2, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (3, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (4, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (5, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (6, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (7, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (8, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (9, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (10, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (11, 'everyone');

-- seed profile picture albums
INSERT INTO albums (userId, albumName) VALUES (1, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (2, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (3, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (4, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (5, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (6, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (7, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (8, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (9, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (10, "Profile Pictures");
INSERT INTO albums (userId, albumName) VALUES (11, "Profile Pictures");

-- seed profile photos
INSERT INTO photos (albumId, caption, filename) VALUES (1, "Ned's profile pic", 'nedstark.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (2, "Jon's profile pic", 'jonsnow.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (3, "Robb's profile pic", 'robbstark.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (4, "Sansa's profile pic", 'sansastark.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (5, "Arya's profile pic", 'aryastark.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (6, "Tyrion's profile pic", 'tyrionlannister.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (7, "Jaime's profile pic", 'jaimelannister.png');
INSERT INTO photos (albumId, caption, filename) VALUES (8, "Cersei's profile pic", 'cerseilannister.png');
INSERT INTO photos (albumId, caption, filename) VALUES (9, "Joffrey's profile pic", 'joffreybaratheon.png');
INSERT INTO photos (albumId, caption, filename) VALUES (10, "Tywin's profile pic", 'tywinlannister.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (11, "Daenerys's profile pic", 'daenerystargaryen.jpg');

-- seed albums/photos
INSERT INTO albums (userId, albumName) VALUES (8, "My Boy King");   -- Cersei, album number 12
INSERT INTO albums (userId, albumName) VALUES (11, "My Favourite Dragons");   -- Daenerys, album number 13
-- Cersei's photos of Joffrey
INSERT INTO photos (albumId, caption, filename) VALUES (12, "", 'boy1.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (12, "", 'boy2.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (12, "", 'boy3.jpg');
-- Daenerys' Dragon photos
INSERT INTO photos (albumId, caption, filename) VALUES (13, "", 'dragon1.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (13, "", 'dragon2.jpg');
INSERT INTO photos (albumId, caption, filename) VALUES (13, "", 'dragon3.jpg');

-- seed blogs
INSERT INTO blogs (userId, content) VALUES (1, "The man who passes the sentence should swing the sword.");
INSERT INTO blogs (userId, content) VALUES (2, "I know nothing.");
INSERT INTO blogs (userId, content) VALUES (3, "How am I supposed to sit here planning a war, when you're over there looking like that?");
INSERT INTO blogs (userId, content) VALUES (4, "There are no heroes...in life, the monsters win.");
INSERT INTO blogs (userId, content) VALUES (5, "I wasn't playing. And I don't want to be a lady.");
INSERT INTO blogs (userId, content) VALUES (6, "We've had vicious kings and we've had idiot kings, but I don't know if we've ever been cursed with a vicious idiot boy king!");
INSERT INTO blogs (userId, content) VALUES (7, "People have been swinging at me for years and they always seem to miss.");
INSERT INTO blogs (userId, content) VALUES (8, "Tears aren't a woman's only weapon. The best one's between your legs.");
INSERT INTO blogs (userId, content) VALUES (9, "Everyone is mine to torment! You'd do well to remember that, you little monster.");
INSERT INTO blogs (userId, content) VALUES (10, "Any man who must say, 'I am the king' is no true king.");
INSERT INTO blogs (userId, content) VALUES (11, "I am Daenerys Stormborn of the House Targaryen. Daenerys Targaryen: The First of Her Name, the Unburnt, Queen of Meereen, Queen of the Andals and the Rhoynar and the First Men, Khalisee of the Great Grass Sea, Breaker of Chains and Mother of Dragons.");


-- seed comments
-- ned stark
INSERT INTO comments(userId, message, blogId) VALUES (1, "Brace yourself.", 7);
INSERT INTO comments(userId, message, blogId) VALUES (1, "Brace yourself.", 11);
-- joffrey
INSERT INTO comments(userId, message, blogId) VALUES (9, "I can't stand the wailing of women.", 11);
INSERT INTO comments(userId, message, blogId) VALUES (9, "I am the king. I will punish you!", 6);
INSERT INTO comments(userId, message, blogId) VALUES (9, "I'm telling mother!", 6);
-- daenerys
INSERT INTO comments(userId, message, blogId) VALUES (11, "When my dragons are grown, we will take back what was stolen from me and destroy those who wronged me! We will lay waste to armies and burn cities to the ground!", 7);
INSERT INTO comments(userId, message, blogId) VALUES (11, "It seems to me that a queen who trusts no one is as foolish as a queen who trusts everyone.", 8);






-- Friend temp

-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrion
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
-- INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys



-- 1. Ned stark's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,6); -- tyrion


-- 2. Jon snow's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,11); -- daenerys


-- 3. Robb Stark's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,6); -- tryian

-- 4. Sansa's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,9); -- joffrey



-- 5. Arya Starks' friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,6); -- tyrion


-- 6. Tyrion's frineds (all users)
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,11); -- Daenerys

-- 7. Jaime's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (7,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (7,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (7,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (7,10); -- tywin


-- 8. Cersei's Friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (8,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (8,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (8,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (8,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (8,10); -- tywin


-- 9. Joffrey's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (9,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (9,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (9,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (9,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (9,10); -- tywin


-- 10. Tywin's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,9); -- joffrey


-- 11. Daenerys' friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (11,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (11,6); -- tyrion




-- seed friend requests table

INSERT INTO friend_requests (userId, friendId) VALUES (1,11);
INSERT INTO friend_requests (userId, friendId) VALUES (11,4);
INSERT INTO friend_requests (userId, friendId) VALUES (11,5);
INSERT INTO friend_requests (userId, friendId) VALUES (10,3);
INSERT INTO friend_requests (userId, friendId) VALUES (3,9);
INSERT INTO friend_requests (userId, friendId) VALUES (3,11);
INSERT INTO friend_requests (userId, friendId) VALUES (2,6);
INSERT INTO friend_requests (userId, friendId) VALUES (4,7);
INSERT INTO friend_requests (userId, friendId) VALUES (5,11);
INSERT INTO friend_requests (userId, friendId) VALUES (7,3);
INSERT INTO friend_requests (userId, friendId) VALUES (8,5);
INSERT INTO friend_requests (userId, friendId) VALUES (9,7);

-- Seed friend circles
INSERT INTO friendcircles (userId, name) VALUES (1, 'House of Stark'); -- circleId = 12 
INSERT INTO friendcircles (userId, name) VALUES (2, 'Possible Real Family?!'); -- circleId = 13 
INSERT INTO friendcircles (userId, name) VALUES (3, 'Real Siblings'); -- circleId = 14 
INSERT INTO friendcircles (userId, name) VALUES (4, 'In Laws'); -- circleId = 15 
INSERT INTO friendcircles (userId, name) VALUES (5, 'Ex-family'); -- circleId = 16 
INSERT INTO friendcircles (userId, name) VALUES (6, 'Tyrion Fan Club'); -- circleId = 17
INSERT INTO friendcircles (userId, name) VALUES (7, 'Sister or Bae?'); -- circleId = 18 
INSERT INTO friendcircles (userId, name) VALUES (8, 'Family'); -- circleId = 19 
INSERT INTO friendcircles (userId, name) VALUES (9, 'Pesants'); -- circleId = 20 
INSERT INTO friendcircles (userId, name) VALUES (10, 'House of Lannister'); -- circleId = 21 



-- Members of circle 12
INSERT INTO friendcircle_users (circleId, userId) VALUES (12,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (12,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (12,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (12,5); -- arya

-- Members of circle 13
INSERT INTO friendcircle_users (circleId, userId) VALUES (13,11); -- daenerys

-- Members of circle 14
INSERT INTO friendcircle_users (circleId, userId) VALUES (14,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (14,5); -- arya

-- Members of circle 15 
INSERT INTO friendcircle_users (circleId, userId) VALUES (15,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (15,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (15,9); -- joffrey

-- Members of circle 16
INSERT INTO friendcircle_users (circleId, userId) VALUES (16,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (16,3); -- robb

-- Members of circle 17
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (17,11); -- Daenerys

-- Members of circle 18
INSERT INTO friendcircle_users (circleId, userId) VALUES (18,8); -- cersei

-- Members of circle 19
INSERT INTO friendcircle_users (circleId, userId) VALUES (19,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (19,9); -- joffrey

-- Members of circle 20
INSERT INTO friendcircle_users (circleId, userId) VALUES (20,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (20,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (20,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (20,8); -- cersei

-- Members of circle 21
INSERT INTO friendcircle_users (circleId, userId) VALUES (21,6); -- tyrion
INSERT INTO friendcircle_users (circleId, userId) VALUES (21,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (21,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (21,9); -- joffrey

-- Seed for messages
INSERT INTO messages (senderId, circleId, content) VALUES (1,12,'The winters are hard but the Starks will endure. We always have!');
INSERT INTO messages (senderId, circleId, content) VALUES (3,12,'I sent two thousand men to their graves today.');
INSERT INTO messages (senderId, circleId, content) VALUES (2,12,'yeah, but you\'re both dead');
INSERT INTO messages (senderId, circleId, content) VALUES (2,12,'lol j/k thanks for adding me to this circle, feel like a true stark');
INSERT INTO messages (senderId, circleId, content) VALUES (11,13,'You know nothing... ');
INSERT INTO messages (senderId, circleId, content) VALUES (2,13,':(');
INSERT INTO messages (senderId, circleId, content) VALUES (4,14,'Why isn\'t Jon in here?');
INSERT INTO messages (senderId, circleId, content) VALUES (2,14,'Because he knows nothing!');
INSERT INTO messages (senderId, circleId, content) VALUES (5,14,'loooooool');
INSERT INTO messages (senderId, circleId, content) VALUES (4,15,'Awkward silence');
INSERT INTO messages (senderId, circleId, content) VALUES (5,16,'You know you dead...');
INSERT INTO messages (senderId, circleId, content) VALUES (1,16,'...');
INSERT INTO messages (senderId, circleId, content) VALUES (3,16,'...');
INSERT INTO messages (senderId, circleId, content) VALUES (6,17,'Schemes and plots are the same thing.');
INSERT INTO messages (senderId, circleId, content) VALUES (8,17,'Putting that thesaurus to good use.');
INSERT INTO messages (senderId, circleId, content) VALUES (10,17,'Helpful tip #1: When committing murder, do not use your own blade.');
INSERT INTO messages (senderId, circleId, content) VALUES (7,17,'Helpful tip #2: Always use the name ‘Lannister’ and you’ll never be rejected from anything');
INSERT INTO messages (senderId, circleId, content) VALUES (6,17,'If you’re going to be a cripple, it’s better to be a rich cripple.');
INSERT INTO messages (senderId, circleId, content) VALUES (6,17,'To be fair, a rich anything is always a better alternative.');
INSERT INTO messages (senderId, circleId, content) VALUES (7,18,'Meet me at the top of the tower');

