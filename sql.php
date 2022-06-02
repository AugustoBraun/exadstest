<?php

    
    namespace exadsTest;
    
    use PDO;
    
    // SQL File
    // ================================================================
 

    include('./_header.php');
?>
<div class="container">

    <?php include './nav.php'; ?>

    <div class="row">

        <div class="col-2"></div>

        <div class="col-8 mt-5">

        <pre>
        
        /*

# MySQL query to create tables and contents


CREATE TABLE IF NOT EXISTS `tv_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `channel` int(11) unsigned DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `tv_series` (`id`, `title`, `channel`, `genre`) VALUES
	(1, 'Stranger Things', 5, 'scary'),
	(2, 'Mr Robot', 8, 'thriller'),
	(3, 'The IT Crowd', 12, 'comedy');


CREATE TABLE IF NOT EXISTS `tv_series_intervals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_tv_series` int(11) unsigned NOT NULL,
  `week_day` tinyint(1) unsigned NOT NULL,
  `show_time` time NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_tv_series` (`id_tv_series`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `tv_series_intervals` (`id`, `id_tv_series`, `week_day`, `show_time`) VALUES
	(1, 1, 1, '21:00:00'),
	(2, 2, 2, '16:30:00'),
	(3, 3, 3, '13:15:00');




*/

</pre>

</div>

<div class="col-2"></div>

</div>

</div>
<?php
include('./_footer.php');
?>