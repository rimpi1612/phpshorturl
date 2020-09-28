CREATE TABLE IF NOT EXISTS `test_short_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` TEXT NOT NULL,
  `short_url` varchar(16) NOT NULL,
  `url_label` varchar(64) NOT NULL,
  `hit_count` int(11) NOT NULL,
  `url_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `test_short_url`
--

INSERT INTO `test_short_url` (`id`, `long_url`, `short_url`, `url_label`, `hit_count`, `url_status`) VALUES
(1, 'https://www.cnbc.com/2020/09/28/tiktok-ban-judge-blocks-order-banning-downloads-from-us-app-stores-.html', 'TikTokBan', 'TikTok Ban Block', 0, 0);