CREATE TABLE `players` (
	`id` int AUTO_INCREMENT NOT NULL,
    `name` varchar(255) NOT NULL,
    `dateOfBirth` date NOT NULL,
    `image` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `players_statistics` (
	`id` int AUTO_INCREMENT NOT NULL,
    `player_id` int NOT NULL,
    `position` varchar(255) NOT NULL,
    `number` int NOT NULL,
    `goals` int NOT NULL,
    `assists` int NOT NULL,
    `yellowCards` int NOT NULL,
    `redCards` int NOT NULL,
    `gamesPlayed` int NOT NULL,
	PRIMARY KEY (`id`),
    FOREIGN KEY (`player_id`) REFERENCES `players`(`id`) ON DELETE CASCADE
);

CREATE TABLE `players_faults` (
	`id` int AUTO_INCREMENT NOT NULL,
    `player_id` int NOT NULL,
    `faults` TEXT NOT NULL,
	PRIMARY KEY (`id`),
    FOREIGN KEY (`player_id`) REFERENCES `players`(`id`) ON DELETE CASCADE
);

CREATE TABLE `trainings` (
	`id` int AUTO_INCREMENT NOT NULL,
    `date` date NOT NULL,
    `description` text NOT NULL,
	PRIMARY KEY (`id`)
);