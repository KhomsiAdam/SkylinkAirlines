-- @block
CREATE TABLE admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    admin_name VARCHAR(128) NOT NULL,
    admin_password VARCHAR(128) NOT NULL
);
-- @block
CREATE TABLE users (
    users_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    users_firstname VARCHAR(128) NOT NULL,
    users_lastname VARCHAR(128) NOT NULL,
    users_email VARCHAR(128) NOT NULL UNIQUE,
    users_password VARCHAR(128) NOT NULL,
    users_dateofbirth DATE NOT NULL,
    users_country VARCHAR(128) NOT NULL,
    users_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- @block
-- INSERT INTO users (users_firstname, users_lastname, users_email, users_password, users_dateofbirth, users_country)
-- VALUES (
--   'John',
--   'Doe',
--   'johndoe@email.com',
--   'johndoe',
--   '1999-11-11',
--   'United States of America (USA)'
-- );
-- @block
CREATE TABLE flights (
    flight_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    flight_type VARCHAR(128) NOT NULL,
    flight_origin VARCHAR(128) NOT NULL,
    flight_destination VARCHAR(128) NOT NULL,
    flight_departure_time DATETIME NOT NULL,
    flight_return_time DATETIME,
    flight_price INT NOT NULL,
    flight_seats INT NOT NULL,
    flight_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    flight_updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- @block
-- INSERT INTO flights (flight_type, flight_origin, flight_destination, flight_departure_time, flight_return_time, flight_price, flight_seats)
-- VALUES
--   ('Round Trip', 'Rabat', 'Casablanca', '2021-04-24 06:00:00', '2021-04-25 06:00:00', '100', '60'),
--   ('One Way', 'Safi', 'Marrakesh', '2021-04-24 06:00:00', '', '50', '30');
-- @block
CREATE TABLE reservations (
    reserv_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    users_id INT NOT NULL,
    flight_id INT NOT NULL,
    reserv_type VARCHAR(128) NOT NULL,
    reserv_origin VARCHAR(128) NOT NULL,
    reserv_destination VARCHAR(128) NOT NULL,
    reserv_departure_time DATETIME NOT NULL,
    reserv_status VARCHAR(128) NOT NULL,
    reserv_seats INT NOT NULL,
    reserv_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    reserv_updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(users_id),
    FOREIGN KEY (flight_id) REFERENCES flights(flight_id)
);

-- @block
CREATE TABLE passengers (
    passengers_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    reserv_id INT NOT NULL,
    passengers_firstname VARCHAR(128) NOT NULL,
    passengers_lastname VARCHAR(128) NOT NULL,
    passengers_dateofbirth DATE NOT NULL,
    passengers_country VARCHAR(128) NOT NULL,
    passengers_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reserv_id) REFERENCES reservations(reserv_id)
);

-- -- @block
-- INSERT INTO reservations (users_id, flight_id, reserv_status)
-- VALUES ('1','1','Confirmed');

-- @block
SELECT *
FROM reservations
    INNER JOIN users ON users.users_id = reservations.users_id
    INNER JOIN flights ON flights.flight_id = reservations.flight_id

-- @block
SELECT * FROM passengers
INNER JOIN reservations
ON reservations.reserv_id = passengers.reserv_id
-- WHERE reservations.reserv_id=2

-- @block
SELECT * FROM reservations WHERE users_id=1 AND flight_id=1