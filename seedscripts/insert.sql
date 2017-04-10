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
      VALUES ('Tyrian', 'Lannister', '1969/06/11', 'London', '07867667334', 'tyrian@got.com', 'Tyrian', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Jaime', 'Lannister', '1992/06/05', 'London', '07867660384', 'jaime@got.com', 'King Slayer', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'single', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Cersei', 'Lannister', '1977/03/04', 'London', '07867467384', 'cersei@got.com', 'Cersei', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'divorced', 'F', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Joffrey', 'Baratheon', '1989/09/09', 'London', '07999367384', 'joffrey@got.com', 'Joffrey', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Tywin', 'Lannister', '1988/12/25', 'London', '07867567384', 'tywin@got.com', 'Tywin', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', '');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Daenerys', 'Targareyn', '1989/09/09', 'London', '07999367384', 'joffrey@got.com', 'Joffrey', '$2y$10$sR3feliw1PhLJKxU70pLAO4mYRLn7.v/5yaklJODT8kRnt99s17rW', 'married', 'M', '');


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
INSERT INTO photos (albumId, caption) VALUES (1, "Pete's profile pic");
INSERT INTO photos (albumId, caption) VALUES (2, "Beth's profile pic");
INSERT INTO photos (albumId, caption) VALUES (3, "Isabel's profile pic");
INSERT INTO photos (albumId, caption) VALUES (4, "Thomas's profile pic");
INSERT INTO photos (albumId, caption) VALUES (5, "David's profile pic");
INSERT INTO photos (albumId, caption) VALUES (6, "Esther's profile pic");
INSERT INTO photos (albumId, caption) VALUES (7, "Kevin's profile pic");
INSERT INTO photos (albumId, caption) VALUES (8, "Gandalf's profile pic");
INSERT INTO photos (albumId, caption) VALUES (9, "Ovid's profile pic");
INSERT INTO photos (albumId, caption) VALUES (10, "Femi's profile pic");
INSERT INTO photos (albumId, caption) VALUES (11, "Femi's profile pic");


-- seed albums 
INSERT INTO albums (userId, albumName) VALUES (1, "Pete's album");
INSERT INTO albums (userId, albumName) VALUES (1, "Pete's second album");
INSERT INTO albums (userId, albumName) VALUES (2, "Beth's album");
INSERT INTO albums (userId, albumName) VALUES (3, "Isabel's album");
INSERT INTO albums (userId, albumName) VALUES (4, "Thomas's album");
INSERT INTO albums (userId, albumName) VALUES (5, "David's album");
INSERT INTO albums (userId, albumName) VALUES (6, "Esther's album");
INSERT INTO albums (userId, albumName) VALUES (7, "Kevin's album");
INSERT INTO albums (userId, albumName) VALUES (8, "Gandalf's album");
INSERT INTO albums (userId, albumName) VALUES (9, "Ovid's album");
INSERT INTO albums (userId, albumName) VALUES (10, "Femi's album");

-- seed photos
INSERT INTO photos (albumId, caption) VALUES (1, "Pete's profile pic");
INSERT INTO photos (albumId, caption) VALUES (2, "Beth's profile pic");
INSERT INTO photos (albumId, caption) VALUES (3, "Isabel's profile pic");
INSERT INTO photos (albumId, caption) VALUES (4, "Thomas's profile pic");
INSERT INTO photos (albumId, caption) VALUES (5, "David's profile pic");
INSERT INTO photos (albumId, caption) VALUES (6, "Esther's profile pic");
INSERT INTO photos (albumId, caption) VALUES (7, "Kevin's profile pic");
INSERT INTO photos (albumId, caption) VALUES (8, "Gandalf's profile pic");
INSERT INTO photos (albumId, caption) VALUES (9, "Ovid's profile pic");
INSERT INTO photos (albumId, caption) VALUES (10, "Femi's profile pic");

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

-- seed album users (deprecated)
INSERT INTO album_friendcircles (albumId, circleId) VALUES (1, 1);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (2, 1);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (3, 1);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (4, 1);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (5, 1);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (6, 4);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (7, 3);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (8, 9);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (9, 3);
INSERT INTO album_friendcircles (albumId, circleId) VALUES (2, 2);

-- Friend temp
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys


-- 1. Ned stark's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,5); -- arya


-- 2. Jon snow's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,11); -- daenerys


-- 3. Robb Stark's friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,6); -- tryian

-- 4. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys

-- 5. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys
-- 6. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys

-- 7. has no friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys
-- 8. has no friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys
-- 9. has no friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (,1); -- ned
INSERT INTO friendcircle_users (circleId, userId) VALUES (,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (,3); -- robb
INSERT INTO friendcircle_users (circleId, userId) VALUES (,4); -- sansa
INSERT INTO friendcircle_users (circleId, userId) VALUES (,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (,9); -- joffrey
INSERT INTO friendcircle_users (circleId, userId) VALUES (,10); -- tywin
INSERT INTO friendcircle_users (circleId, userId) VALUES (,11); -- Daenerys
-- 10. has no friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,5); -- arya
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,6); -- tyrian
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,7); -- jaime
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,8); -- cersei
INSERT INTO friendcircle_users (circleId, userId) VALUES (10,9); -- joffrey


-- 11. has no friends
INSERT INTO friendcircle_users (circleId, userId) VALUES (11,2); -- jon
INSERT INTO friendcircle_users (circleId, userId) VALUES (11,6); -- tyrian




-- seed friend requests table
INSERT INTO friend_requests (userId, friendId) VALUES (3,6);
INSERT INTO friend_requests (userId, friendId) VALUES (7,8);
INSERT INTO friend_requests (userId, friendId) VALUES (7,9);
INSERT INTO friend_requests (userId, friendId) VALUES (7,10);
INSERT INTO friend_requests (userId, friendId) VALUES (8,10);
INSERT INTO friend_requests (userId, friendId) VALUES (8,9);
INSERT INTO friend_requests (userId, friendId) VALUES (8,7);
INSERT INTO friend_requests (userId, friendId) VALUES (8,6);
INSERT INTO friend_requests (userId, friendId) VALUES (9,5);
INSERT INTO friend_requests (userId, friendId) VALUES (9,4);
INSERT INTO friend_requests (userId, friendId) VALUES (9,3);
INSERT INTO friend_requests (userId, friendId) VALUES (9,2);
INSERT INTO friend_requests (userId, friendId) VALUES (10,1);


