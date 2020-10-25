CREATE TABLE `image_uploads` (
    `id`       INT(55)      NOT NULL AUTO_INCREMENT,
    `filename` VARCHAR(255) NOT NULL,
    `filesize` INT(55)      NOT NULL,
    `date`     DATE         NOT NULL DEFAULT '0000-00-00',
    `time`     TIME         NOT NULL DEFAULT '00:00:00',
    `filetype` VARCHAR(20)  NOT NULL,
    `ip`       VARCHAR(40)  NOT NULL,
    `tags`     VARCHAR(60)  NOT NULL,
    PRIMARY KEY (`id`)
)
    AUTO_INCREMENT = 1;
