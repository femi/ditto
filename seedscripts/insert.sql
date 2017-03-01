-- seed users
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Pete', 'Meltzer', '1988/12/12', 'London', '07842173569', 'pete@meltzer.com', 'pete', PASSWORD('pasSVSFSDAVAG343532424sword'), 'single', 'M', 'Lover of fresh air.');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Beth', 'Meltzer', '1991/11/10', 'London', '07777777777', 'beth2@meltzer.com', 'beth', PASSWORD('pass2386792384756word'), 'single', 'F', 'Pete\'s sista!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Isabel', 'Rosina', '1986/03/20', 'London', '0788888888', 'isabel@rosina.com', 'isabel', PASSWORD('p981624g2assword'), 'married', 'F', 'hai');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Thomas', 'Meltzer', '1992/10/12', 'London', '07867665384', 'thomas@meltzer.com', 'thomas', PASSWORD('passwor1923846d'), 'single', 'M', 'PhD!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('David', 'Blaine', '1992/10/13', 'London', '07999665384', 'david@blaine.com', 'david', PASSWORD('passwo7541098rd'), 'single', 'M', 'Creepy fucker');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Esther', 'Lol', '1992/10/10', 'London', '07867667334', 'esther@lol.com', 'esther', PASSWORD('pa3728497ssword'), 'single', 'F', 'Queen of the nigt');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Kevin', 'Bryson', '1992/06/05', 'London', '07867660384', 'kevin@bryson.com', 'kevin', PASSWORD('pass9871324word'), 'married', 'M', 'Oh noooooooooo!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Gandalf', 'Grey', '1977/03/04', 'London', '07867467384', 'gandalf@grey.com', 'gandalf', PASSWORD('passw928374ord'), 'divorced', 'M', 'He\'s a wizard, Harry.');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description) 
      VALUES ('Colonel', 'Ovid', '1988/12/25', 'London', '07867567384', 'colonel@ovid.com', 'colonel', PASSWORD('passwo987rd'), 'married', 'M', 'Serious');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, username, hashedPassword, maritalStatus, sex, description)
      VALUES ('Femi', 'Bants', '1989/09/09', 'London', '07999367384', 'femi@bants.com', 'femi', PASSWORD('passwo234rd'), 'single', 'M', 'Fucking legend.');

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

INSERT INTO friendcircles (userId, name) VALUES (1, 'everyone');
INSERT INTO friendcircles (userId, name) VALUES (2, '2Face++');
INSERT INTO friendcircles (userId, name) VALUES (2, 'Colleagues');
INSERT INTO friendcircles (userId, name) VALUES (3, 'Clowns');
INSERT INTO friendcircles (userId, name) VALUES (4, 'Pears');
INSERT INTO friendcircles (userId, name) VALUES (5, 'Crabby');
INSERT INTO friendcircles (userId, name) VALUES (6, 'LobSTARRY');
INSERT INTO friendcircles (userId, name) VALUES (7, 'Fwends');
INSERT INTO friendcircles (userId, name) VALUES (10, 'BanterBus');
INSERT INTO friendcircles (userId, name) VALUES (10, 'Chicks');
INSERT INTO friendcircles (userId, name) VALUES (1, 'Alpha');

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


-- 1. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,3);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,4);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,5);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,6);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,7);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,8);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,9);
INSERT INTO friendcircle_users (circleId, userId) VALUES (1,10);

-- 2. everyone including self
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,1);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,3);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,4);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,5);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,6);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,7);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,8);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,9);
INSERT INTO friendcircle_users (circleId, userId) VALUES (2,10);

-- 3. 
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,1);
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (3,4);

-- 4. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,3);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,1);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,5);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,6);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,7);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,8);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,9);
INSERT INTO friendcircle_users (circleId, userId) VALUES (4,10);
-- 5. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,3);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,4);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,1);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,6);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,7);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,8);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,9);
INSERT INTO friendcircle_users (circleId, userId) VALUES (5,10);
-- 6. for friends circle 'everyone' contains every other user
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,2);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,3);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,4);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,5);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,1);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,7);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,8);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,9);
INSERT INTO friendcircle_users (circleId, userId) VALUES (6,10);
-- 7. has no friends
-- 8. has no friends
-- 9. has no friends
-- 10. has no friends

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


