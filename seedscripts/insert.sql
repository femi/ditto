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

-- seed albums?

-- seed photos?

-- seed blogs
INSERT INTO blogs (userId, content) VALUES (1, "Pete's first blog");
INSERT INTO blogs (userId, content) VALUES (2, "Beth's first blog");
INSERT INTO blogs (userId, content) VALUES (3, "Isabel's first blog");
INSERT INTO blogs (userId, content) VALUES (4, "Thomas's first blog");
INSERT INTO blogs (userId, content) VALUES (5, "David's first blog");
INSERT INTO blogs (userId, content) VALUES (6, "Esther's first blog");
INSERT INTO blogs (userId, content) VALUES (7, "Kevin's first blog");
INSERT INTO blogs (userId, content) VALUES (8, "Gandalf's first blog");
INSERT INTO blogs (userId, content) VALUES (9, "Ovid's first blog");
INSERT INTO blogs (userId, content) VALUES (10, "Femi's first blog");



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



