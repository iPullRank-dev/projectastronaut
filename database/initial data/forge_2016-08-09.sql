# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: forge
# Generation Time: 2016-08-09 17:48:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table copytext
# ------------------------------------------------------------

DROP TABLE IF EXISTS `copytext`;

CREATE TABLE `copytext` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a` mediumtext COLLATE utf8_unicode_ci,
  `b` mediumtext COLLATE utf8_unicode_ci,
  `c` mediumtext COLLATE utf8_unicode_ci,
  `d` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `copytext` WRITE;
/*!40000 ALTER TABLE `copytext` DISABLE KEYS */;

INSERT INTO `copytext` (`id`, `quad`, `a`, `b`, `c`, `d`)
VALUES
	(1,'unnatural_link','One thing Google takes very seriously is the existence of unnatural links pointing back to your website, but lucky for them, you have awesome link building skills! Your link profile is made up of quality links from a diverse set of domains and your anchor text appears to be natural, cheers to that! You understand that link building means nothing if it is not associated with organic search traffic and a loyal customer base. From natural, editorial links to effective content promotion via social influencers, you\'re a \"white hat\" pro!','Unnatural linking can be a major hit to your site so we’re glad you have it under control. It’s not hard to see why you’re scoring well in this area. You celebrate domain diversity and your anchor text appears to be natural. While you deserve kudos for a good link profile, we see many opportunity areas to kick it up a notch. A little more optimization and you’ll be killing it in organic search traffic!','One thing Google takes very seriously is the existence of unnatural links pointing to your website. While you understand the value of link building, your link profile could use some improvement. Link popularity means nothing if links are not from quality sources and do not lead to organic search visibility and loyal customers. There are numerous white hat tactics for building high quality links through content marketing. Your brand should capitalize on these tactics moving forward.','One thing Google takes very seriously is the existence of unnatural links pointing to your website. Currently, you’re in the danger zone for major penalties. When it comes to your link profile, \"black hat\" tactics such as purchasing links, excessive link exchanges, blog spam, comment spam and online directories are a sure way of getting hit with Google penalties that can take up to several months to resolve. While proper link building methods can seem exhaustive and time-consuming, it is crucial to the success of your online business.'),
	(2,'spam_score','Spam is the four-letter word that no online marketer wants to hear but you\'ve managed to keep your link profile squeaky clean! Your great domain diversity is nothing short of stellar and when it comes to meaty content and internal links, you\'ve got it going on. Less is more when it comes to spam flags and your count is under five. Way to go rock star!','Spam is the four-letter word that strikes fear in the hearts of all online marketers so we’re glad you have it under control. Google has nothing bad to say about your content, internal links or domain diversity hence the reason for your great spam score. However, there IS a thin line between a good and bad spam score,and in order to avoid an unfortunate stumble into the dark side, we would love to recommend ways to raise your score from good to excellent!','Spam is the four-letter word that no online marketer wants to hear and your spam score could stand to be improved. You understand how crucial a low spam score is, but you\'re having trouble achieving it. Did you know there are over 17 unique factors considered when calculating your spam score? That\'s 17 opportunities to improve yours! High domain diversity, meaty content and internal links are some of the ways you can propel your spam score to new heights.\n','Spam is the four-letter word that all online marketers hate to hear, but your link profile has been flagged for it. Your spam score is crucial to the long-term success of your site and if you don\'t tackle the issue immediately, Google penalties and long recovery times are looming in the horizon. Flags such as high external link counts, thin content and low site link diversity can be disastrous to the success of your online business but don\'t be discouraged. There are 17 unique factors that determine your spam score which gives you 17 chances to turn things around before it is too late! \n'),
	(3,'trust_metrics','In the matter of Trust Metrics, your site is as trustworthy as they come! Your domain is considered an authority and you\'re in a good link neighborhood. Also, Google considers you a trusted source of content. You\'ve ensured that all links coming in and going out are of the highest quality, which keeps your spam percentage between 0% to .01%. Pat yourself on the back because you\'re a \"white hat\" winner!\n','Your Trust Metrics are commendable but we think you can make it even better! While your site is considered a trusted source, there is room to improve your link neighborhood. Your goal should be a spam percentage between 0% and .01% - you\'re almost there! Your site is definitely \"white hat\" approved but why not become a \"white hat\" pro? Let us help.\n','We\'ve noticed that you\'re working hard to score high on Trust Metrics but you\'re not quite where you should be. With all the tips out there on Google Rankings, it\'s easy to think that an abundance of site links and high page rank is enough to be considered a trustworthy domain. Newsflash, domain authority and diversity are far superior contributors to stellar Trust Metrics. While Trust Metrics can be a complex animal to conquer solutions are right around the corner.\n','Your domain Trust Metrics are hanging by a thread and we\'re worried. But don\'t lose hope, most sites that score low on Trust Metrics can turn things around if they stay committed to the process. Factors such as which sites point to your domain and user signals can have massive impact. Did you know your spam percentage should be between 0% and .01%? We aren\'t trying to scare you, but unless you act now, Google penalties are most likely in your near future. \n'),
	(4,'link_popularity','You\'re so popular that even Google\'s raving about you! Your link popularity is through the roof which attracts lots of eyes to your content. Your domain is linking to many power players of the web and your link distribution is impressive. You understand that while keywords, anchor text and pagerank are important factors; domain authority and diversity are crucial. Congrats on being part of the SEO cool crowd!\n','Your link popularity has even Google impressed but why stop there? Push your domain authority to the max with more quality links and distribution. We think you’re doing fine already but that extra kick makes a big difference in your rankings. Plus, don’t you want to know why the A students are doing better? We thought so.\n','Your site is performing but is it truly reaching its maximum potential? We\'re confident you can do better but being savvy to the current climate of SEO is crucial. Your domain points to many sites but that alone is not the only power player you should be striving for. The SEO industry is moving at lightning speed so keywords, anchor text and page rank alone won\'t cut it. Domain authority and diversity are the cool kids on the block, and if you haven\'t utilized them you\'re missing out on some major traffic and ranking power.','There\'s a severe disconnect in the link popularity and visibility of your site which can cause you some major headaches with Google. We\'re confident you can turn things around but being savvy to the current climate of SEO is crucial. Your domain is associated with low-quality spam and it\'s affecting your rankings. Link popularity is directly associated with the diversity and distribution of the content. Domain distribution and diversity are the cool kids on the block and you haven\'t made the cut. Get with the program and watch your site really take off!\r');

/*!40000 ALTER TABLE `copytext` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
