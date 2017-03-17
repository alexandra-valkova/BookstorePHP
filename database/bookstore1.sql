CREATE TABLE IF NOT EXISTS Genres (
    id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(30) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Books (
    id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(50) NOT NULL UNIQUE,
    author varchar(30) NOT NULL,
    genre_id int unsigned NOT NULL,
    FOREIGN KEY (genre_id) REFERENCES Genres(id),
    cover varchar(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS Users (
    id int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(16) NOT NULL UNIQUE,
    password varchar(20) NOT NULL,
    name varchar(50) NOT NULL,
    type tinyint(1) NOT NULL
);

INSERT INTO GENRES (name) VALUES
('Fantasy'),
('Science Fiction'),
('Horror'),
('Romance'),
('Young Adult'),
('Fiction'),
('Classics'),
('Contemporary'),
('Crime'),
('Dystopian');

INSERT INTO BOOKS (title, author, genre_id, cover) VALUES
('A Game of Thrones', 'George R.R. Martin', 1, "a-game-of-thrones.jpg"),
('An Abundance of Katherines', 'John Green', 5, "an-abundance-of-katherines.jpg"),
('A Walk to Remember', 'Nicholas Sparks', 4, "a-walk-to-remember.jpg"),
('Before I Fall', 'Lauren Oliver', 5, "before-i-fall.jpg"),
("Cat's Cradle", 'Kurt Vonnegut', 6, "cat's-cradle.gif"),
('City of Bones', 'Cassandra Clare', 1, "city-of-bones.jpg"),
('Clockwork Angel', 'Cassandra Clare', 1, "clockwork-angel.jpg"),
('Daughter of Smoke & Bone', 'Laini Taylor', 1, "daughter-of-smoke-and-bone.jpg"),
('Dear John', 'Nicholas Sparks', 4, "dear-john.jpg"),
('Divergent', 'Veronica Roth', 10, "divergent.jpg"),
('Eleanor & Park', 'Rainbow Rowell', 5, "eleanor-and-park.jpg"),
('It', 'Steven King', 3, "it.jpg"),
('Looking for Alaska', 'John Green', 5, "looking-for-alaska.jpg"),
('Murder on the Orient Express', 'Agatha Christie', 9, "murder-on-the-orient-express.jpg"),
('Paper Towns', 'John Green', 5, "paper-towns.jpg"),
('Pride and Prejudice', 'Jane Austen', 7, "pride-and-prejudice.jpg"),
('The Fault in Our Stars', 'John Green', 5, "the-fault-in-our-stars.jpg"),
('The Host', 'Stephenie Meyer', 2, "the-host.jpg"),
('The Hound of the Baskervilles', 'Arthur Conan Doyle', 9, "the-hound-of-the-baskervilles.jpg"),
('The Hunger Games', 'Suzanne Collins', 10, "the-hunger-games.jpg"),
('The Perks of Being a Wallflower', 'Stephen Chbosky', 5, "the-perks-of-being-a-wallflower.jpg"),
('The Selection', 'Kiera Kass', 10, "the-selection.jpg"),
('Thirteen Reasons Why', 'Jay Asher', 5, "thirteen-reasons-why.jpg"),
('To Kill a Mockingbird', 'Harper Lee', 7, "to-kill-a-mockingbird.jpg"),
('Twilight', 'Stephenie Meyer', 4, "twilight.jpg"),
('Самодива', 'Краси Зуркова', 8, 'самодива.jpg');

INSERT INTO USERS (username, password, name, type) VALUES
('admin', 'admin', 'admin', 1);