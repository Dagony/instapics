CREATE DATABASE `instapics`;
USE `instapics`;

CREATE TABLE `instapics`.`users` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Index_email`(`email`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `instapics`.`user_profiles` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `name` TEXT NOT NULL,
  `profile_photo` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Index_user_id`(`user_id`),
  CONSTRAINT `FK_user_profiles_user_id` FOREIGN KEY `FK_user_profiles_user_id` (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `instapics`.`relationships` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `follower_id` INTEGER UNSIGNED NOT NULL,
  `followed_id` INTEGER UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Index_follower_id_followed_id`(`follower_id`, `followed_id`),
  CONSTRAINT `FK_relationships_follower_id` FOREIGN KEY `FK_relationships_follower_id` (`follower_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_relationships_followed_id` FOREIGN KEY `FK_relationships_followed_id` (`followed_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `instapics`.`photos` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `location` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_photos_user_id` FOREIGN KEY `FK_photos_user_id` (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `instapics`.`photo_comments` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `photo_id` INTEGER UNSIGNED NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_photo_comments_user_id` FOREIGN KEY `FK_photo_comments_user_id` (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_photo_comments_photo_id` FOREIGN KEY `FK_photo_comments_photo_id` (`photo_id`)
    REFERENCES `photos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;