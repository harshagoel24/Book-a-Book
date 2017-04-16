-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 07:58 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookabook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--


-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `name` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `mrp` int(11) NOT NULL,
  `short_des` text NOT NULL,
  `summary` text NOT NULL,
  `rent_prices` int(11) NOT NULL,
  `times_rented` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10024 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`name`, `author`, `mrp`, `short_des`, `summary`, `rent_prices`, `times_rented`, `isbn`, `cover_pic`, `user_id`, `id`, `category_id`) VALUES
('UV', 'UV', 1000, 'kuch bhi', 'bohot kuch', 100, 12, '54626', '', NULL, 10000, NULL),
('Digital Fortress', 'Dan Brown ', 0, 'Digital Fortress is a techno-thriller novel written by American author Dan Brown and published in 1998 by St. Martin s Press. The book explores the theme of government surveillance of electronically stored information on the private lives of citizens, and the possible civil liberties and ethical implications using such technology.', '', 0, 0, 'ISBN 0-312-18087-X (', 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c9/DigitalFortress.jpg/220px-DigitalFortress.jpg', NULL, 10011, NULL),
('Playing It My Way', 'Sachin Tendulkar\r\n B', 0, 'Playing It My Way is the autobiography of former Indian cricketer Sachin Tendulkar. It was launched on 5 November 2014 in Mumbai.[ 3] [ 4] [ 5]  The book summarises Tendulkar s early days, his 24 years of international career and aspects of his life that have not been shared publicly.[ 6] ', 'In the book, Tendulkar mentioned an incident where he recounted a conversation with Greg Chappell, the then coach of the Indian cricket team, just before the 2007 Cricket World Cup in which Chappell suggested that Tendulkar should take over the captaincy from Rahul Dravid, then the team captain. Chappell however denied this, stating that he never contemplated Tendulkar replacing Dravid as captain.[ 7]  Tendulkar also mentioned in the book that John Wright "took over as coach of India in 2005", when Wright actually took over five years earlier.[ 8] ', 0, 0, '978-14-736-0520-6 ', 'https://upload.wikimedia.org/wikipedia/en/thumb/9/93/Playingitmywaybookcover.jpeg/220px-Playingitmywaybookcover.jpeg', NULL, 10012, NULL),
('The 3 Mistakes Of My', 'Chetan Bhagat ', 0, 'The 3 Mistakes of My Life is the third novel written by Chetan Bhagat. The book was published in May 2008 and had an initial print-run of 420,000. The novel follows the story of three friends and is based in the city of Ahmedabad in western India.', 'This is the third best seller novel by Chetan Bhagat.', 0, 0, '', 'https://upload.wikimedia.org/wikipedia/en/1/1d/3_Mistakes_of_My_Life.jpg', NULL, 10013, NULL),
('One Night @ the Call', 'Chetan Bhagat ', 0, 'One Night @ the Call Center is a novel written by Chetan Bhagat and first published in 2005. The novel revolves around a group of six call center employees working at the Connexions call center in Gurgaon, Haryana, India. It takes place during one night, during which all of the leading characters confront some aspect of themselves or their lives they would like to change. The story uses a literal deus ex machina, when the characters receive a phone call from God.', 'The book was the second best-selling novel from the award winning author after Five Point Someone.', 0, 0, 'ISBN 81-291-0818-6 (', 'https://upload.wikimedia.org/wikipedia/en/thumb/7/79/One_Night_%40_Call_Center.jpg/200px-One_Night_%40_Call_Center.jpg', NULL, 10015, NULL),
('Two Lives (non-ficti', 'Vikram Seth ', 0, 'Vikram Seth s second non-fiction work, Two Lives, is the story of a century and of a love affair across an ethnic divide. As the name suggests, it is a story of two extraordinary lives, that of his great uncle, Shanti Behari Seth, and of his German Jewish great aunt, Hennerle Gerda Caro.', 'Two Lives is divided into five parts, beginning with the teenage author going to live with his uncle and aunt in England for higher studies at the Tonbridge School. His first year is followed by intense travel in Europe. After completing his A-levels, Seth moves on to continue his education at Oxford and Stanford, all the while remaining in contact with his guardian uncle and aunt.', 0, 0, '0-316-72774-1 ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Gaius_Julius_Caesar_%28100-44_BC%29.JPG/30px-Gaius_Julius_Caesar_%28100-44_BC%29.JPG', NULL, 10017, NULL),
('A Suitable Boy', 'Vikram Seth ', 0, 'A Suitable Boy is a novel by Vikram Seth, published in 1993. At 1349 pages (1488 pages softcover) and 591,552 words, the book is one of the longest novels ever published in a single volume in the English language.[ 1] [ 2] [ 3] [ 4]  A sequel, to be called A Suitable Girl, is due for publication in 2016.[ 5] ', '', 0, 0, '0-06-017012-3 ', 'https://upload.wikimedia.org/wikipedia/en/f/f6/Asuitableboy.jpg', NULL, 10018, NULL),
('The Immortals Of Mel', 'Amish Tripathi ', 0, 'The Immortals of Meluha is the first novel of the Shiva trilogy series by Amish Tripathi. The story is set in the land of Meluha and starts with the arrival of the Tibetan tribal Shiva. The Meluhan believe that Shiva is their fabled saviour Neelkanth. Shiva decides to help the Meluhans in their war against the Chandravanshis, who had joined forces with a cursed group called Nagas; however, in his journey and the resulting fight that ensues, Shiva learns how his choices actually reflected who he aspires to be and how it led to dire consequences.', 'Tripathi had initially decided to write a book on the philosophy of evil, but was dissuaded by his family members, so he decided to write a book on Shiva, one of the Hindu Gods. He decided to base his story on a radical idea that all Gods were once human beings; it was their deeds in the human life that made them famous as Gods. After finishing writing The Immortals of Meluha, Tripathi faced rejection from many publication houses. Ultimately when his agent decided to publish the book himself, Tripathi embarked on a promotional campaign. It included posting a live-action video on YouTube, and making the first chapter of the book available as a free digital download, to entice readers.', 0, 0, '978-93-80658-74-2 ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Secretofthenagasrelease2.jpg/170px-Secretofthenagasrelease2.jpg', NULL, 10019, NULL),
('The Secret of the Na', 'Amish Tripathi ', 0, 'The Secret of the Nagas is the second novel of the Shiva trilogy series by the Indian author Amish Tripathi. The story takes place in the imaginary land of Meluha and narrates how the inhabitants of that land are saved from their wars by a nomad named Shiva. It begins from where its predecessor, The Immortals of Meluha, left off, with Shiva trying to save Sati from the invading Naga. Later Shiva takes his troop of soldiers and travels far east to the land of Branga, where he wishes to find a clue to reach the Naga people. Shiva also learns that Sati s first child is still alive, as well as her twin sister. His journey ultimately leads him to the Naga capital of Panchavati, where he finds a surprise waiting for him.', 'Tripathi started writing The Secret of the Nagas while the first part of the trilogy was being released. He relied on his knowledge of geography and history to expand the locations visited in the story. The book was released on 12 August 2011, and was published by Westland Press. Before its release, the author confessed that many revelations would be present in the book, including the true nature of many characters. Two theatrical trailers were created for showing in multiplex cinema halls, as Tripathi believed that the film-going audience also reads his books, and that would create publicity.', 0, 0, '978-93-8065-879-7 ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Secretofthenagasrelease.jpg/300px-Secretofthenagasrelease.jpg', NULL, 10020, NULL),
('The Oath of the Vayu', 'Amish Tripathi ', 0, 'The Oath of the Vayuputras is a 2013 novel by Indian author Amish Tripathi and the final book in his Shiva trilogy. The book was released on 27 February 2013, through Westland Press and completes the mythical story about an imaginary land Meluha and how its inhabitants were saved by a nomad named Shiva. Starting from where the previous installment left off, Shiva discovers that Somras is the true evil in The Oath of the Vayuputras. Shiva then declares a holy war on those who seek to continue to use it, mainly the Emperors Daksha and Dilipa, who are being controlled by the sage Bhrigu. The battle rages on and Shiva travels to the land of Pariha to consult with Vayuputras, a legendary tribe. By the time he returns, the war has ended with Sati, his wife, being murdered. An enraged Shiva destroys the capital of Meluha and Somras is wiped out of history. The story concludes with Shiva and his associates being popularized as Gods for their deeds and accomplishments.', 'Tripathi had confirmed in September 2011 that he was writing The Oath of the Vayuputras, with Westland announcing the release date as 27 February 2013. The book was longer than the previous installments of the series and Tripathi clarified that all the loose ends left out in the previous book would be addressed, with the death of certain characters. Following the release of the cover art, it was announced that the publication rights of the books have been bought by both US and UK publisher houses. Like The Immortals of Meluha and The Secret of the Nagas, the book contained innovative marketing techniques, including launching interactive apps, merchandise and a music album titled Vayuputras, containing music inspired by different events in the series.', 0, 0, '9789382618348 ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/The_Oath_of_the_Vayuputras_release.jpg/220px-The_Oath_of_the_Vayuputras_release.jpg', NULL, 10021, NULL),
('And Then There Were ', 'Agatha Christie ', 0, 'And Then There Were None is a mystery novel by Agatha Christie, widely considered her masterpiece and described by her as the most difficult of her books to write.[ 2]  It was first published in the United Kingdom by the Collins Crime Club on 6 November 1939 as Ten Little Niggers,[ 3]  after the British blackface song which serves as a major plot point.[ 4] [ 5]  The U.S. edition was not released until December 1939 with the title changed to the last five words in the original American version of the nursery rhyme: And Then There Were None.[ 6] ', 'In the novel, ten people are lured into coming to an island under different pretexts, e.g. offers of employment or to enjoy a late summer holiday, or to meet with old friends. All have been complicit in the death(s) of other human beings but either escaped justice or committed an act that was not subject to legal sanction. The guests are charged with their respective "crimes" by a gramophone recording after dinner the first night and informed that they have been brought to the island to pay for their actions. They are the only people on the island, and cannot escape due to the distance from the mainland and the inclement weather, yet gradually all ten are killed in turn, in a manner that seems to parallel the ten deaths in the nursery rhyme. Nobody else seems to be left alive on the island by the time of the apparent last death. A confession, in the form of a postscript to the novel, unveils how the killings took place and who was responsible.', 0, 0, '', 'https://upload.wikimedia.org/wikipedia/en/2/26/And_Then_There_Were_None_US_First_Edition_Cover_1940.jpg', NULL, 10022, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `rented_books`
--

CREATE TABLE IF NOT EXISTS `rented_books` (
  `rented_price` int(11) NOT NULL,
  `date_of_ret` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_of_issue` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `book_id` (`book_id`),
  UNIQUE KEY `renter_id` (`renter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rented_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `sold_books`
--

CREATE TABLE IF NOT EXISTS `sold_books` (
  `seller_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `nett` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_till_ret` date NOT NULL,
  `date_of_sale` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `book_id` (`book_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `seller_id` (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sold_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `phn_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `m_status` tinyint(1) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_seller` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13103703 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `phn_no`, `address`, `m_status`, `email_id`, `id`, `is_seller`) VALUES
('Utkarsh Verma', NULL, '', '', 0, '', 13103453, 0),
('Harsha Goyal', NULL, '', '', 1, '', 13103690, 0),
('Shrey Bhasin', NULL, '', '', 0, '', 13103695, 0),
('Baruni Malhotra', NULL, '', '', 1, '', 13103702, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rented_books`
--
ALTER TABLE `rented_books`
  ADD CONSTRAINT `rented_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rented_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `rented_books_ibfk_3` FOREIGN KEY (`renter_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sold_books`
--
ALTER TABLE `sold_books`
  ADD CONSTRAINT `sold_books_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sold_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `sold_books_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
