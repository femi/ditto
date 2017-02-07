INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Bob', 'Samuel', '10/10/10', 'London', '07867667381', 'bob1@samuel.com', PASSWORD('pasSVSFSDAVAG343532424sword'), 'divorced', 'M', 'Sound guy!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Bob', 'Samuel', '10/10/10', 'London', '07867667382', 'bob2@samuel.com', 'password', 'divorced', 'M', 'Sound guy!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Bob', 'Samuel', '10/10/10', 'London', '07867667383', 'bob3@samuel.com', 'password', 'divorced', 'M', 'Sound guy!');
INSERT INTO users (fName, lName, dob, city, mobileNumber, email, hashedPassword, maritalStatus, sex, description)
      VALUES ('Bob', 'Samuel', '10/10/10', 'London', '07867667384', 'bob4@samuel.com', 'password', 'divorced', 'M', 'Sound guy!');
INSERT INTO albums (userId, albumName) VALUES (4, "boom");
INSERT INTO album_users (albumId, userId) VALUES (1, 1);
INSERT INTO album_users (albumId, userId) VALUES (1, 2);
INSERT INTO album_users (albumId, userId) VALUES (1, 3);
DELETE FROM albums
WHERE albumId = 1; 

SELECT * FROM album_users;
-- INSERT INTO albums (userId, albumName) VALUES (14, "awesome");
-- (userId, fName, lName, dob, city, lang, mobileNumber, email, hashedPassword, maritalStatus, sex, description)

-- UPDATE users
-- SET sex='F'
-- WHERE userId=1;
