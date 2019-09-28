-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2018 at 05:41 PM
-- Server version: 5.1.73
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farma_new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_us_id` int(10) UNSIGNED NOT NULL,
  `about_us_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_us_id`, `about_us_details`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non velit dui. Vestibulum tempor arcu odio, vel condimentum ipsum euismod sit amet. Duis luctus viverra iaculis. Donec dapibus nibh in ligula iaculis consequat. Curabitur vitae felis congue, pellentesque nisi ut, bibendum est. Vivamus suscipit fringilla nisl eu interdum. Vivamus ut suscipit sapien.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at ex id mi vulputate egestas sed ac libero. Curabitur ut maximus mauris. Mauris tincidunt fermentum risus. Nunc viverra sapien sit amet sollicitudin tincidunt. Aenean nisi libero, gravida et euismod ac, iaculis luctus orci. Aliquam erat volutpat. Mauris ut lobortis lectus. Phasellus eu enim leo. Curabitur bibendum suscipit nulla, sed mollis felis pharetra ut. Fusce ac gravida lectus. Fusce vel urna vel elit molestie finibus vitae sit amet est. Aliquam tristique mauris neque, quis tristique neque imperdiet id. Aliquam vel tellus sit amet urna ullamcorper vestibulum vitae at nibh. Aliquam tristique ultricies nunc non hendrerit.\r\n\r\nPellentesque imperdiet tincidunt libero nec interdum. Vestibulum sed fermentum diam, eget vulputate nisl. Cras scelerisque est ac nulla rhoncus, eu efficitur tellus porttitor. Sed ut suscipit augue, non vestibulum urna. Donec elementum sit amet lorem vitae ornare. Duis ac porttitor metus. Nam commodo pulvinar nisi at lobortis. Nam ultricies ullamcorper dui, et luctus orci. Sed ac eros ultrices, consequat nisi id, ornare ex. Vivamus congue a quam a pharetra. Curabitur dignissim, justo vel efficitur tempus, lacus nulla gravida nisl, fermentum rutrum nisl lacus vitae urna. Fusce ut ornare orci, id feugiat felis. Praesent id faucibus lorem.\r\n\r\nNulla eu interdum elit. Pellentesque semper congue consequat. In placerat ornare aliquet. Quisque aliquet, justo finibus tristique scelerisque, mi nisl tincidunt ipsum, vel egestas justo justo at purus. Donec sit amet risus eros. Suspendisse rhoncus convallis tincidunt. Cras interdum sagittis nisi a condimentum.\r\n\r\nNulla semper consectetur enim, convallis mattis sem posuere quis. Proin sagittis sem ex. Aenean consectetur interdum laoreet. Aliquam vel mattis sem. Nulla facilisi. Maecenas rutrum, neque id rutrum eleifend, nibh lectus interdum nunc, a consectetur massa erat eget neque. Aliquam sed sem ornare, ornare sapien id, laoreet metus. Nam suscipit libero vel ante auctor porta. Etiam pellentesque, mi eget venenatis faucibus, ligula diam tristique leo, ac fringilla orci mauris et dui. Nam odio ante, euismod id elit nec, malesuada aliquet erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi tincidunt justo id mi convallis, sit amet consequat diam facilisis. Proin sit amet accumsan tortor, sit amet ornare magna. Vivamus quis quam tellus.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(10) UNSIGNED NOT NULL,
  `admin_user_ref_user_type_id` int(11) NOT NULL,
  `admin_user_ref_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_user_piva_position` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `admin_user_name` varchar(50) NOT NULL,
  `admin_user_password_hash_value` varchar(250) NOT NULL,
  `admin_user_active` tinyint(4) DEFAULT '1',
  `admin_user_update_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `admin_user_ref_user_type_id`, `admin_user_ref_pharmacy_id`, `admin_user_piva_position`, `admin_user_name`, `admin_user_password_hash_value`, `admin_user_active`, `admin_user_update_date_time`) VALUES
(1, 1, NULL, 0, 'admin', 'sha256:1000:vRCdzr4pO1hgZfmigfeqsruwxJY9wYIl:uFnkhCsuztNevSu9bC93JogxKC7RRGnk', 1, '2017-03-29 21:03:03'),
(2, 2, 1, 0, '00519170807', 'sha256:1000:J697QGZ+IfGMo6tdxi+YQn7VwIoPSbRg:S0UJ+I7/ORUH2z/CxO2AV+pCrxkPhGOZ', 1, '2018-02-10 17:59:25'),
(3, 2, 2, 0, '08113401213', 'sha256:1000:ioPO2NMbJ7MeVNBGc4a3rNLSt/zGljjp:yBABRKlghbcZEKBsRKeEVBQyN9+9B+Rh', 1, '2018-02-10 17:59:25'),
(4, 2, 3, 0, '07404850724', 'sha256:1000:kqUOiuUIuyNtaMm7X9PAkzjrNy4C8jWv:ssjkqflhMOyTfLCuuX/zJ+Ns2jBqz0kF', 1, '2018-02-10 17:59:25'),
(5, 2, 4, 0, '03435160795', 'sha256:1000:kEPkT0Vkkq2XG+y5o+JYz13jFDHmf8bg:VQI9ik75dUBWLTQXGMZk+vtVuUOoMS8m', 1, '2018-02-10 17:59:25'),
(6, 2, 5, 0, '03485240794', 'sha256:1000:gCJDqtoPNEdJBi2ROPk+Mlk99onVbQPe:qnhCVsdxD50OvuKfZ8FDpYEXX2IoFHRr', 1, '2018-02-10 17:59:25'),
(7, 2, 6, 0, '01732350762', 'sha256:1000:Yg62npxBcbooxmdZynrYhVpYzkFR3nt0:LVIcUOdc4Se//4pzegxsJVhp7GCoSpy/', 1, '2018-02-10 17:59:25'),
(8, 2, 7, 0, '00440740793', 'sha256:1000:xGeLDRylfHqYSY5bF7jZZgzkr6mUiDxu:mYxssGXsq7tTf0+xly03lKaZ2fEUE3+m', 1, '2018-02-10 17:59:25'),
(9, 2, 8, 0, '08236831213', 'sha256:1000:6ThuQGwfmd7/Zxi0/BPSCUyl1o2nYppE:ESvaizbZFITnAeYeBkp+piMjOBJgp6nd', 1, '2018-02-10 17:59:25'),
(10, 2, 9, 0, '03427100791', 'sha256:1000:FBfdzcJcW4nxMu51aER6+orMI4QhJDnY:TX1KgOB9zMsNocbjqAGchKjyP52VAZyR', 1, '2018-02-10 17:59:25'),
(11, 2, 10, 0, '02284270424', 'sha256:1000:vZdGqRauFurI8FHSNlkzECErS1Xi2U05:205G9OuXhtH8MJVaR6eFO0hH73IEVcFK', 1, '2018-02-10 17:59:25'),
(12, 2, 11, 0, '00709750806', 'sha256:1000:eINoyas3Ow8jOIpppus3PV9/Mw/OEgYl:+KaTgyTM5kyYSIYPm7wA74nMM440D6M0', 1, '2018-02-10 17:59:25'),
(13, 2, 12, 0, '05483670484', 'sha256:1000:7V72cV1+jLw9YCqcTVFqoa4r22quKO2Z:EoEgnv+P4SmMIvAifghJklBtdYB7tX3k', 1, '2018-02-10 17:59:25'),
(14, 2, 13, 0, '00385910781', 'sha256:1000:Q9eFGsmwhiz2pNTNtNPu670+vYP54J4Z:jVftFyE1C++r/BtoS4v+ocKf0cvhXmrl', 1, '2018-02-10 17:59:25'),
(15, 2, 14, 0, '01589520590', 'sha256:1000:uEALbmv24sdtkSWvPCySpAJHf8e569WH:vdaoG/1UEOZQmCv1om5AQ0dzG3QBEsNt', 1, '2018-02-10 17:59:25'),
(16, 2, 15, 0, '06119241211', 'sha256:1000:sg1SZojHYSOhkXRG/yOQBPzWz4ugAxqV:1xS7BSGy0ajukhTHiN88DJv+mQNp8fRK', 1, '2018-02-10 17:59:25'),
(17, 2, 16, 0, '01569640806', 'sha256:1000:bARougceVn66BpZ5FRLR85uuuVos6AAl:wVxqiV3ZZDPJQQ8UulHQSRQwIybTcZbn', 1, '2018-02-10 17:59:25'),
(18, 2, 17, 0, '00124010802', 'sha256:1000:MqVob0s1EKofQDDMQd7DbinAS41gptdl:ysjY6AQq82rpCwD2Y0ksYQSKft/dREJR', 1, '2018-02-10 17:59:25'),
(19, 2, 18, 0, '03215150792', 'sha256:1000:gksmwV2hkdQva7jN9mBTDyjhpbBeUAOV:DWqXY+wdmCpMwdLRJ5Bnpu9umbWebA4t', 1, '2018-02-10 17:59:26'),
(20, 2, 19, 0, '00621740802', 'sha256:1000:28dLehmUEzAApOSJxKgkRstDEax/pugC:/ssdUY/eoUNrqaavNVsPZS/h+Wsgn5tw', 1, '2018-02-10 17:59:26'),
(21, 2, 20, 0, '02559350737', 'sha256:1000:FPs7faBHaey2aGhlTy6ZGoyMXbmatKRf:lyLDGotOa1fn0XL6+LsLMffUQtqWe+gb', 1, '2018-02-10 17:59:26'),
(22, 2, 21, 0, '03138150796', 'sha256:1000:91OlSasiTJlZDGeHukFOhVbAnl5vqiGP:jcmJZeJoclKiG7hu1GYTkRsG44zDni5z', 1, '2018-02-10 17:59:26'),
(23, 2, 22, 0, '04060890755', 'sha256:1000:0NhuU2MAssEtP1yt6y/Y8ZAlEoT9tUzW:v+sZ/T8Zzic4i9QMZQ3tGDsUApJvlYFm', 1, '2018-02-10 17:59:26'),
(24, 2, 23, 0, '02131520468', 'sha256:1000:qlMUCPBh15JGJmRTqKn/UGo6vgB+RH0N:OkkMuBVqAp7qIO40w1HDb68FlDi2b2AP', 1, '2018-02-10 17:59:26'),
(25, 2, 24, 0, '02058620739', 'sha256:1000:w/N9IHA0PgTQvYqloT4q38oxq2HYi5dR:GcJ5DbK9k98gvPbQDKrwhThaD260tC5R', 1, '2018-02-10 17:59:26'),
(26, 2, 25, 0, '02090950599', 'sha256:1000:E4yw29fxnkRTtXeTOaREtWulRYZbHXO7:ENt1Hvy/4RjyPXNV5bF4bGVZnL1gDE8g', 1, '2018-02-10 17:59:26'),
(27, 2, 26, 0, '00925280786', 'sha256:1000:yx/q1OnlvfnBZOmUF4eBS0AVB0g89X8h:/KsNALbh5rMsYGd7gQZzjagEXCEPJFB0', 1, '2018-02-10 17:59:26'),
(28, 2, 27, 0, '02101490619', 'sha256:1000:XID8rcIfHkpxobyKGAGS9dqpABv1urim:O+QYPTIMH37D3X8ZQBIhZLupfddZ9uh5', 1, '2018-02-10 17:59:26'),
(29, 2, 28, 0, '04074360613', 'sha256:1000:mDJAOHE8FI9rb0wzIo1FVMW7tttNgM9q:UDSiylB+g2NtjKO88az6K0PrK9N9EWTB', 1, '2018-02-10 17:59:26'),
(30, 2, 29, 0, '04329610960', 'sha256:1000:aZhEQ97gIvHXMDh55NP+hyq+arwtlsVx:uWcTxcbVmixAdGsIxEwOQqFzSszIiIzk', 1, '2018-02-10 17:59:26'),
(31, 2, 30, 0, '03193290784', 'sha256:1000:MCJ1gTUbugr5GkmAbEFgalvSnKmNe0fW:gmwn4NL8j7ldaWoJWWG4ZhxtFfl4bebV', 1, '2018-02-10 17:59:26'),
(32, 2, 31, 0, '03367560798', 'sha256:1000:hoXpHrbw93aM3mbvwgIW0oWoBv7g9G+N:mdB7BKW4S5o3xaxzOfYztXauYBkm0KlH', 1, '2018-02-10 17:59:26'),
(33, 2, 32, 0, '07908661007', 'sha256:1000:vgCe5K9JHbK1ia0/Yz6HlhPQZ0Habsoh:hqO8Oob0MNgs1CFWo0dGSXqfNf7Q9Xcv', 1, '2018-02-10 17:59:26'),
(34, 2, 33, 0, '01086560594', 'sha256:1000:7ZKXadPCi4MRxYMpinYhFUa574kZjrAR:Gy3A2m9FSwjGLfkx7yiRy6PnuP1UGAo/', 1, '2018-02-10 17:59:26'),
(35, 2, 34, 0, '03849860618', 'sha256:1000:D3q2tb3eazn8zUchfL6Zts+Bl+tT0oJD:Y6l92ILKa8OZ38Hzv+dlNFwQr5rdZkGq', 1, '2018-02-10 17:59:26'),
(36, 2, 35, 0, '07111920968', 'sha256:1000:VHIcEZC9i++rryVR272VKPIBIMr1/npK:U3aNXs4b4kDL/72FwAlIloimrxQOrn5U', 1, '2018-02-10 17:59:26'),
(37, 2, 36, 0, '02218940225', 'sha256:1000:z8S3NQLbNvxg0GPLC9vNxpV5yT7+iYSu:G66cGhIk0WM8mHNfCYhXtMOiAWQsntf8', 1, '2018-02-10 17:59:26'),
(38, 2, 37, 0, '02516810427', 'sha256:1000:to6VpG0zkj5XSzN+Ci2YrzhXPpRogov7:5O/9zyTwnZItUBbhhxdgjbcPCS+bw0o2', 1, '2018-02-10 17:59:26'),
(39, 2, 38, 0, '03711740724', 'sha256:1000:2jFjr21oi69fSQRvtprYZEp6m5D409Cq:TxwwpdNsRJlJgy1pbadeOuTrDwkjGE3a', 1, '2018-02-10 17:59:26'),
(40, 2, 39, 0, '03398250617', 'sha256:1000:Yp95CV20avyEsE3NGnr4Eg0SeZv25rM0:DruuIRa+nAqRwyLeq6Mqo1REVe8pF/Ge', 1, '2018-02-10 17:59:26'),
(41, 2, 40, 0, '03344160787', 'sha256:1000:rxyBrEWvl3NNJBsivqI62+c17Lapk5Fj:4+QGmQP4kdXxIgt+kOzXRMga7Y0bY9mZ', 1, '2018-02-10 17:59:26'),
(42, 2, 41, 0, '01585950478', 'sha256:1000:yqJ7a7gzQHv0H55Bn9oweCLkJg0FxLX5:HS9+5ksBNUQvZv/3LAskKOC5ufVCYK3c', 1, '2018-02-10 17:59:26'),
(43, 2, 42, 0, '00666670658', 'sha256:1000:uz45GawaXQ4+oduHbQIFm0z7UON/w2wo:0S+inSTr6zEh1MBJVdIAjzjLROGEhBe6', 1, '2018-02-10 17:59:26'),
(44, 2, 43, 0, '02138230657', 'sha256:1000:mjhaNmAR0YggRMKvlCym9qJe3mDCamSn:I33MLm6vUdK8yMDhrMFU9y9aNNzPoi4W', 1, '2018-02-10 17:59:26'),
(45, 2, 44, 0, '04507280727', 'sha256:1000:0S3VkELYOVw8Zrz80DgCTXblK7tfGO8/:msblQ4Ya3eysTiWINxyZeIW+8BprKpep', 1, '2018-02-10 17:59:26'),
(46, 2, 45, 0, '02810580734', 'sha256:1000:vq+489cqLidRiotu1RKcGO0J7lp0SzER:O0AeYvzO5SXPWJF9HFPqipvkug+REoVj', 1, '2018-02-10 17:59:26'),
(47, 2, 46, 0, '00000000001', 'sha256:1000:LHmMS7GL5T5SLxs6U/7eZCbECEB3pSbi:DuKxv1uAv1o6wHWNZcRfLsu8weih/OwB', 1, '2018-02-10 17:59:26'),
(48, 2, 47, 0, '02594430783', 'sha256:1000:pquOBuSNMUpMJiSm6BeDKaVGMhrbtlKi:jxn8kWDuPcZlm2NipVOdrcYgUuABs5p7', 1, '2018-02-10 17:59:26'),
(49, 2, 48, 0, '00726870629', 'sha256:1000:R7oRYfQOwdeq12Q0BUEYhJJw8CGPIBZ1:yHUCKh5nCZSGZ56+vMLYFraojO7FUSVu', 1, '2018-02-10 17:59:26'),
(50, 2, 49, 0, '00310180732', 'sha256:1000:2ZczaEVXyhmquu8+Jb/0tDnZTpmJFlNI:+1s4UZS5DFMyWIMclqVDKX1f037ScnGT', 1, '2018-02-10 17:59:26'),
(51, 2, 50, 0, '07592070630', 'sha256:1000:q34gGaYQpIMgcFKuP5SZFbnNEGlP+r4j:cMZNP14HPGWGwS+rVv/cNzLABLk26EsQ', 1, '2018-02-10 17:59:26'),
(52, 2, 51, 0, '02815140641', 'sha256:1000:eXrkhzQKU6GjqdHvMaNLU8b0h6Y71egc:H+itoR/C9CLSHOWicLVnTB/kZ8GLe/Ky', 1, '2018-02-10 17:59:26'),
(53, 2, 52, 1, '02815140641/1', 'sha256:1000:V9ZnEIs3sDbLkNMapBDMCpx389tYCfXH:rIgUtnHiTmh9B6TDOL41Sw22Al/QbQMl', 1, '2018-02-10 17:59:26'),
(54, 2, 53, 0, '07498970636', 'sha256:1000:H+Jf+n3Odfety1JE51qgfaBalaWn9QwD:dhk5rP+69JPhu4FivW8CBckA1Xk2/5MW', 1, '2018-02-10 17:59:26'),
(55, 2, 54, 0, '03464660715', 'sha256:1000:9G9cBIZ9B4Gs/tVeinZqDs/+fPilsDPT:m3EeIcdAecCfE25Halsq6s0D1cTCHIdZ', 1, '2018-02-10 17:59:26'),
(56, 2, 55, 0, '07795591218', 'sha256:1000:ZcHcpsG5gRakW/MZAaIeO5mHe2qjP4aG:ab3aOLPLVImL0FGy+OEGy9l0p9k8O90v', 1, '2018-02-10 17:59:26'),
(57, 2, 56, 0, '01938100797', 'sha256:1000:v4bZHxiGSKTvfMl8ctzVtUOD8O2iHztj:KTIJd/9McEGAMPlAnY3j+584E+mSZrXs', 1, '2018-02-10 17:59:26'),
(58, 2, 57, 0, '07885890728', 'sha256:1000:QPTUFEXKJfAZ724DAgeUp4APSZ/GZC9f:mpIBuWTolIgV4yQs3KTkm+CuN9Cb/ubt', 1, '2018-02-10 17:59:26'),
(59, 2, 58, 0, '07551100725', 'sha256:1000:RuIz/Eo8PHqZiyqJUC4dnMnVDZFNr2+4:Ay1Lvtikhod0S+yYWBhYxkozIuHjsqpG', 1, '2018-02-10 17:59:26'),
(60, 2, 59, 0, '05817991218', 'sha256:1000:HnMjKkbGuz7ZjXvm8g1Tjv/evjuLmA2a:LRj2t2/2uEkGDLquf4gwZi75FoxRMJ3d', 1, '2018-02-10 17:59:26'),
(61, 2, 60, 0, '02407820618', 'sha256:1000:aFW72mmCIxAsjjywrj3RK2KA8tzUuEjk:KlWuS3xg9T8SOsNKncuUThLS66HVe2KI', 1, '2018-02-10 17:59:26'),
(62, 2, 61, 0, '05636891219', 'sha256:1000:ZVutNs7Zbkz90f+4QPLRAlU4lyMY4Psr:BdrWpowPsnwz07AbDYd4GLWGXaZMIiYv', 1, '2018-02-10 17:59:26'),
(63, 2, 62, 1, '05636891219/1', 'sha256:1000:6/4zkckJpoqdVu35wnkaQAVOppHcC4WH:NOnbOt19HwYyClh3dXNGlM9K6Itb4nvI', 1, '2018-02-10 17:59:26'),
(64, 2, 63, 0, '06633611212', 'sha256:1000:IS6ShvIHHRKRokLyksGjvf6dvCV9jn4k:BZAp5xpdXygXyjWO8vXfaXGUhh/trdPz', 1, '2018-02-10 17:59:26'),
(65, 2, 64, 0, '07734770725', 'sha256:1000:Y8h/h8OkYNvZLtcidGl1gh24DPx0/l0Y:/5PWyUTYrGmJNc3MU5YUSlWVRkhGJ0dY', 1, '2018-02-10 17:59:26'),
(66, 2, 65, 0, '02687010732', 'sha256:1000:pSSuXYDbipZaMQpVmO2C45e5lGOK2eff:ZWJu5DO37FdjBxZ7NFDZ+dn4C46Xd367', 1, '2018-02-10 17:59:26'),
(67, 2, 66, 0, '01903010732', 'sha256:1000:TiyBugf8Rzwk4xmtqLDkrdEOl5BefLud:x6acJvcjy3p5UbfPvw9NLzejGKxuwGOj', 1, '2018-02-10 17:59:26'),
(68, 2, 67, 0, '01120721210', 'sha256:1000:LNylMIad7cOny0vlRQ1hSwsXkDWFCXrM:DUUQlcHGvSElxQNubZMfwReJZg3F4eUY', 1, '2018-02-10 17:59:26'),
(69, 2, 68, 0, '02037520612', 'sha256:1000:QTZHNOSuI4SLf/Yi6pmDbwEriaTZ2CcT:kODdZE4K0IshPiuD+vC7z5y/U/cNNuo7', 1, '2018-02-10 17:59:26'),
(70, 2, 69, 0, '07885050729', 'sha256:1000:bcrIazWYEPqnRlKphY07+Y99+thqxss7:2AB9zohvizMSThwT0r2WY8NZhO4k0PD6', 1, '2018-02-10 17:59:26'),
(71, 2, 70, 0, '02432750467', 'sha256:1000:TnuY7DATCSJLkfrJEN522NvB30CGKfBQ:rm7wz9x3uXKEEphZOEGzaw6IkI2EGLV2', 1, '2018-02-10 17:59:26'),
(72, 2, 71, 0, '01290480118', 'sha256:1000:HxGHG6peClEjiwxyfSX+wyGQW9MdbRvm:bFVndAb1P7IWhK0dH2qCB3WwrwJ7FMoG', 1, '2018-02-10 17:59:26'),
(73, 2, 72, 0, '02398380713', 'sha256:1000:JbnR/dnGyV3zuzqpvmgcBz4qDs5N9jgD:FpjAeiifDCwrNLZFtsiUor1yksguDdDc', 1, '2018-02-10 17:59:26'),
(74, 2, 73, 0, '02668920784', 'sha256:1000:m6jYRjKw9zVMnEBaLlge1zQuwBvR7SSa:eTyPFnDMLfFcQndbIRdn8QguL+PTdA19', 1, '2018-02-10 17:59:26'),
(75, 2, 74, 0, '02109900445', 'sha256:1000:L1URw/FWBDHbSBVi+YLWKHZ5yg2+LA4P:YWx0I6HOPGcyQa7u+GtrTDzfwmIJLzFc', 1, '2018-02-10 17:59:26'),
(76, 2, 75, 0, '02376640971', 'sha256:1000:BN8E0AiI+eplTnt+dv0YUEnnfvWRylCv:n1sNdXpVRuA+bOc01Uh9W4A6xIRpkzxi', 1, '2018-02-10 17:59:26'),
(77, 2, 76, 1, '08236831213/1', 'sha256:1000:b3MVEmxqqe+ZoMr0OQH61/Ze8Rx2ODZa:bj1H4tEIMvY2+kHMagl/PL/qIyEvPDye', 1, '2018-02-10 17:59:26'),
(78, 2, 77, 0, '01317920476', 'sha256:1000:VPjmhHWOvvz6LOe0zkVRVjXUUHVG+Cp6:oPtjy8QzFF/hCPOkzNIAJ9omlTcB2/SV', 1, '2018-02-10 17:59:26'),
(79, 2, 78, 0, '07884900726', 'sha256:1000:3Pu8lCB+7tvS0cTpH+wywnOiKYPCHUWM:Y7XXEh2taLa7AvxKbKmq6fyxzzfMbYlK', 1, '2018-02-10 17:59:26'),
(80, 2, 79, 0, '07723011214', 'sha256:1000:ZBJRMeE7dlxPJDLjpmjqMs7T++Dswo8A:FVMS4ZnO9NERLEP0gF9UJqxBAmtjjP9Y', 1, '2018-02-10 17:59:26'),
(81, 2, 80, 0, '00586280778', 'sha256:1000:8HRpsWWy23V3iCHKRjJ1ewgk6CwuQH+h:+cVDqtGe8KrMA6uZCdf2HYkV3lGLnuEt', 1, '2018-02-10 17:59:26'),
(82, 2, 81, 0, '00056810799', 'sha256:1000:6kEIgMJKFLGHv8gvOLZc9S6LlBT3NE8o:p50NecnxXyo5PRN4LekeiTiKwkXcnIcU', 1, '2018-02-10 17:59:26'),
(83, 2, 82, 0, '01255560623', 'sha256:1000:vxXV4PwD3bKWiYcYCQwFfxh7DQlFri1x:fug5JjP6/hsxxatsSIzejdXBx9hE5L6U', 1, '2018-02-10 17:59:26'),
(84, 2, 83, 0, '01985560661', 'sha256:1000:TnIARqDgmbHWhbPFqjHtxhYL7X2U9cuT:093H6L02ktZeEuGmFy+hjzpv+NsjqZwW', 1, '2018-02-10 17:59:26'),
(85, 2, 84, 0, '01920060660', 'sha256:1000:IY000ehQjaRZPxna765IWTZ4UNJikLcB:wYmBh9cqKiAR2fix+gIapdTrrqrEKSZ+', 1, '2018-02-10 17:59:26'),
(86, 2, 85, 0, '01534140742', 'sha256:1000:/Rx7nSQ+uMnEhev5oj+9eEG7XrbZdbay:GDlEjn5aS3J8xPdQyOndGT3Tt+XWJkuA', 1, '2018-02-10 17:59:26'),
(87, 2, 86, 0, '07889520727', 'sha256:1000:Urx/4VKm/YYtdxm7+zLo45h8mIxVqqGk:QtIQBdYaKpI6ivY6IaII8MWwkW4lhsso', 1, '2018-02-10 17:59:26'),
(88, 2, 87, 0, '03255450797', 'sha256:1000:6t0MaOb6/SZKB4ih3tkRoz32isfRyr6f:eYtAHaBYggoaV4Xq4YjJZFS2LnpWWbMH', 1, '2018-02-10 17:59:26'),
(89, 2, 88, 0, '09165570962', 'sha256:1000:8tWfhqIpfGNVcC0SXc3PjczwtaFRHaZn:tq322C4BjqweQRQuslMkeTkQ8kFIzLmj', 1, '2018-02-10 17:59:26'),
(90, 2, 89, 0, '00133010736', 'sha256:1000:uQM1NTnYkNVZVR0f93kpCsRriNbSVuYN:NSEkD5ZFS2UDutXDgdcpM1Hy2aND6iPE', 1, '2018-02-10 17:59:26'),
(91, 2, 90, 0, '04576320727', 'sha256:1000:TNZ5kunanFVIAsjiFS3pS/3cC+p6h4uK:+vkRBOYFzTRkyq/azKjP3gBrrS6q46xz', 1, '2018-02-10 17:59:26'),
(92, 2, 91, 0, '04770320754', 'sha256:1000:Iba8lNeGdEC3Zmckfr4Q+Ajg8DkdWkD5:l83CLkN3aatyiNwRm2R/kzBcXBsnUNft', 1, '2018-02-10 17:59:26'),
(93, 2, 92, 0, '02761650650', 'sha256:1000:Qj/1za2sPQ3W9btRlKKBSc1yE96Ou0MQ:3h95EaIqkfsD7FbPAto9QIm6ijxujdaf', 1, '2018-02-10 17:59:26'),
(94, 2, 93, 0, '02924810803', 'sha256:1000:tunRitpOFLMqKLgRR4kX1ICZQqze8yyf:RpAtt9moSrN/36JebKXLOnab0vpDvEnk', 1, '2018-02-10 17:59:26'),
(95, 2, 94, 0, '01242590774', 'sha256:1000:YsAeMScNdMKuVZw8/xQ9jf+S49KWRqT6:Dbxtbhnepv7FvAxDLiqPClFslJnTSPsr', 1, '2018-02-10 17:59:26'),
(96, 2, 95, 0, '00396760779', 'sha256:1000:V8p/3S6LMQcEZG+XdubLILxuONQW/fqc:UN6bi5N9jCC6J/veK2FtjrH8PogvjhZA', 1, '2018-02-10 17:59:26'),
(97, 2, 96, 0, '06490150635', 'sha256:1000:7h3H6xcCAhSgoOBZUYYDA3qXY1S535ll:zP31x7elUk9u7nejOghkE1g95TDIuyxj', 1, '2018-02-10 17:59:26'),
(98, 2, 97, 0, '00071170773', 'sha256:1000:GXuDowMzW2y93MyupLPMZBrhBqJ6Tn//:OwqIKvSMZN+6hBAw9+2a0u+HuZD+efHv', 1, '2018-02-10 17:59:26'),
(99, 2, 98, 0, '02956130732', 'sha256:1000:lRFB0ytwclBBj5il2cxwR5wFPzE1kRoJ:8b7SFt1v54uLyacwc911mpJi3ROwNnnQ', 1, '2018-02-10 17:59:26'),
(100, 2, 99, 0, '07950860721', 'sha256:1000:/OKEQu4ihq/ekav+UG3uMs6RkgTJw7AP:A1BCrGkbhNP9NIxwSYiQO2Dpm8JWx/OX', 1, '2018-02-10 17:59:26'),
(101, 2, 100, 0, '02007870617', 'sha256:1000:GVzs13Fz0AhS/Dds0owU4v+M/Ht6Rj8I:RHgQi2sq1FHmKsUg9FRkzQ61vyAlGqkD', 1, '2018-02-10 17:59:26'),
(102, 2, 101, 0, '01587120534', 'sha256:1000:0tvIqCJrpv1wK6zTu8Y1jhj4HgvgNLJB:TWRmt/Bc97pOfCYp5WjrJqwtvTqfhUcv', 1, '2018-02-10 17:59:26'),
(103, 2, 102, 0, '00010190809', 'sha256:1000:ayvgmhzejjUpN5Z1QtTxYD1V68jW8old:8FaMfofysK0knKtbXBUX7iqc6plCQJfL', 1, '2018-02-10 17:59:26'),
(104, 2, 103, 0, '03022270734', 'sha256:1000:g9kPbTq66evcfzr1kNOOnraC35HmtWdR:1E/4bsgpdvNiPi5haU+6lmNlraoYUErd', 1, '2018-02-10 17:59:26'),
(105, 2, 104, 0, '00763090735', 'sha256:1000:4lkxMfArUuBerkRbUbctRs/7HSR3NzvP:qjtvcizIsJvkgfI2y7Ly/zxyn2m9MSST', 1, '2018-02-10 17:59:26'),
(106, 2, 105, 0, '04998621215', 'sha256:1000:nTg8Kb8ZvCJTAilyo9oU3qQLex7doAdW:QfzN02vzYJcdvz0YpO9uow7A6ajQGx+d', 1, '2018-02-10 17:59:26'),
(107, 2, 106, 0, '02055800730', 'sha256:1000:KCx1DFFM+UOpFbqGgz3/M0/7soPDIcQt:vJ4KlxmOUpKJPNkX7anPU5hsRPS+yeN/', 1, '2018-02-10 17:59:26'),
(108, 2, 107, 0, '08330031215', 'sha256:1000:lj27abpbSPpfv1o5Z/FJRjCFEJyjMhId:zjBH17mpVb9B4oI3dfOI+ajqovBel6Nx', 1, '2018-02-10 17:59:26'),
(109, 2, 108, 0, '02910010806', 'sha256:1000:lBtg18Z2K6HTZeg/lShoJ7YrYYHFs3ZM:H0qn62A9sx4N0bX3KtvX1G3YdYCX/XrQ', 1, '2018-02-10 17:59:26'),
(110, 2, 109, 0, '07522850630', 'sha256:1000:iIuFH8cey2HZAAH3YTc4MJU6obJvc6aF:dNpKz/OPEp1MTOMwmgvQCBO27nNppYL7', 1, '2018-02-10 17:59:26'),
(111, 2, 110, 0, '02625700733', 'sha256:1000:sSNXuKZMtkZcQ86hxKy1UN0POxFuKEJ/:+RS2EZHmr+aLITPy5Tzzn1+lsWIi2pkN', 1, '2018-02-10 17:59:26'),
(112, 2, 111, 0, '01697790762', 'sha256:1000:4oW94f9O8h196DV1FDBZAdqImGnoCdnE:i/ubC3YlVRrygTYKwx++z+koaOTIx1Zx', 1, '2018-02-10 17:59:26'),
(113, 2, 112, 0, '05119401213', 'sha256:1000:jASg1pe1oeB7Mqnp0PTCWOe0KpUgjXAs:WXU2SNXGtjwWZ+dtdFEcRGTShKM/Ku+L', 1, '2018-02-10 17:59:26'),
(114, 2, 113, 0, '01248160796', 'sha256:1000:4DqXRQhViwifRSb/F6tnb+Zy8jCjNcL2:sXciuxy0FRKCCrGX3hnLJQ8senBR3FG2', 1, '2018-02-10 17:59:27'),
(115, 2, 114, 0, '02614720759', 'sha256:1000:gmavXcrOnzBtaA6HAhKy9qUtgtGsD7a1:GKZpbLPyGu1A7cjUU7sdo2yGGqtH3Vrw', 1, '2018-02-10 17:59:27'),
(116, 2, 115, 0, '01162430803', 'sha256:1000:ldnorGa9okGqFwwxRthBQew0m6MWpSlj:COcKZNjMhamKbQwkc7FH+o/E72kZMljY', 1, '2018-02-10 17:59:27'),
(117, 2, 116, 0, '03150830796', 'sha256:1000:kiAVOWaRz3Ks+Dr2rvpbsKJgOM6rU+6A:wfVWdEVlGSNsoBoh8rm2uAdYjCxMAtb/', 1, '2018-02-10 17:59:27'),
(118, 2, 117, 0, '03705170367', 'sha256:1000:BvOZP2gdGNFnxUjpb16Mbkxw0R2PM83Q:v//wbkYqhBCUfi4li7aeKoIXiSGvzcsU', 1, '2018-02-10 17:59:27'),
(119, 2, 118, 0, '01599380621', 'sha256:1000:Y/9Z2BW+5nbc8TXKPn2CFXREqsC8+5xR:P+Y0+uz9GIS0JkoUDbJd4t5MiuYqcf1x', 1, '2018-02-10 17:59:27'),
(120, 2, 119, 0, '01887590766', 'sha256:1000:jNYHA3zHt08O4x5q34gw+va1TeLLMNtu:9AjecjLDU14y9qJlOrxXf6AXjcF7Lwhz', 1, '2018-02-10 17:59:27'),
(121, 2, 120, 0, '03527580793', 'sha256:1000:rUvKWqM1VSBYPIaTcqBjSQw/89eUexB2:olK0b7fZG5wMgnC2UB19a2mid6DGvaO3', 1, '2018-02-10 17:59:27'),
(122, 2, 121, 0, '01706320734', 'sha256:1000:lTw+ZiAe+TBHfrr6+mtwYihvaSBy/94+:ZT8PaugHhAvVSoaiAzEhZ6IPwSSFDjfB', 1, '2018-02-10 17:59:27'),
(123, 2, 122, 0, '02393850793', 'sha256:1000:C0YDv8JSGNxtHOGun/fl//kmlNanni7m:HKRlPCpfYIbFBCVwJPLNKMO5k/yADWaU', 1, '2018-02-10 17:59:27'),
(124, 2, 123, 0, '03113240836', 'sha256:1000:195fiAP0ixLJE5oPACM7xvoGxpnJd88V:Do5hR6+xU9pxfpLW2j5mRP3/56fH401n', 1, '2018-02-10 17:59:27'),
(125, 2, 124, 0, '07745301007', 'sha256:1000:Ky2dLrvPi98h2j5GiLp/WCEqT+i7Js8O:8FG2f2xOtCaj8KbMmfYX4iizvMRSUgKn', 1, '2018-02-10 17:59:27'),
(126, 2, 125, 0, '13901231004', 'sha256:1000:BmEmmdNiEZv9vj53oDO4pKOKU1iCB5KM:xyYBaE/MFSy0vuLEzv0rJYcYHNJmqpRt', 1, '2018-02-10 17:59:27'),
(127, 2, 126, 0, '02846200802', 'sha256:1000:lzTuBWp3PcsYxqC7dwenJHgvDpng87Ro:HxdEujyMghCM4wszGXE5iYHdtROAYgNg', 1, '2018-02-10 17:59:27'),
(128, 2, 127, 0, '05133410968', 'sha256:1000:tZ9BI7TipeTKMpUTCXYShNQzjlkSoxJF:52zDYXoMW3Tf1cne9JlzCpekhLN9LFz2', 1, '2018-02-10 17:59:27'),
(129, 2, 128, 0, '09743431000', 'sha256:1000:sHIP6fli7Hb1DeNjYSsd+iwLMmt4dxXG:RQ+QbMqvuATjIrmnBOL8TfArZlZY+09X', 1, '2018-02-10 17:59:27'),
(130, 2, 129, 0, '03347420782', 'sha256:1000:qvew8QcpjpotGB16FscMoTVv3I5GVKIz:01BcboGBBb71vSx3CyRzJOqIbkPh6MrJ', 1, '2018-02-10 17:59:27'),
(131, 2, 130, 0, '00653040774', 'sha256:1000:NLcxOfw0WlaE352Lm8WeRW28ALuj+Kqc:KFkuBFqPSYe1msXlOI02CwRj9cFG2uWi', 1, '2018-02-10 17:59:27'),
(132, 2, 131, 0, '01269050157', 'sha256:1000:0m9lHb7u5wRMUIpxG7iJzG5zUP1bM9g8:UoDxw3dSJ59CDer+urfQH6FhgGME9LT9', 1, '2018-02-10 17:59:27'),
(133, 2, 132, 0, '06553551216', 'sha256:1000:2vlcRHGAMgLoN9E+loyyuGcex2TcPjUj:uvbLB7rKr40GafqLI8S5MHXBCddYIOyS', 1, '2018-02-10 17:59:27'),
(134, 2, 133, 0, '00211520754', 'sha256:1000:EKqxpDZnFs3qtzUMr3ZjKuMQX9vDXgwQ:i5VB+Sxsb3MCUSBaPX2UnBD33JMcGspf', 1, '2018-02-10 17:59:27'),
(135, 2, 134, 0, '04808140752', 'sha256:1000:pkDY+bcVD8hZK92T8LI69pUa8rmDUACN:B3coP5eChO6JGB/atA8ijMg8Gew4iUDw', 1, '2018-02-10 17:59:27'),
(136, 2, 135, 0, '03273150783', 'sha256:1000:HP4/Oofls5SoXjm9E+RtivNwEOLLs7Ff:dGXCx8o5herIvd7r7qTd2RT4/NvXrzla', 1, '2018-02-10 17:59:27'),
(137, 2, 136, 0, '07566881210', 'sha256:1000:KdKt4zVgCc9Y5r3seMnYa8adOSJEd4/y:FkBFDQ/x5tBxLARsH6UAXfVF6vNqViwB', 1, '2018-02-10 17:59:27'),
(138, 2, 137, 0, '03707760363', 'sha256:1000:M3qKnTXpa+nj9uRpNiLA2PIcX/TaN/8J:1URRQ5HKbaA2wOR41HYFe3k9F57C1145', 1, '2018-02-10 17:59:27'),
(139, 2, 138, 0, '01747780706', 'sha256:1000:aT1Cw1RAilrH4C9CJJ+FCXYhL8afJpio:kqTWjqI367ZZnjJ+VMulGfZdAiaqzv1o', 1, '2018-02-10 17:59:27'),
(140, 2, 139, 0, '04788210757', 'sha256:1000:uWucjzlE+BNsTvAsrkd2d4NbV2naozds:WQoXfIF7kTCtOBImUW5Zd2EwzvvwV3wP', 1, '2018-02-10 17:59:27'),
(141, 2, 140, 0, '01824870461', 'sha256:1000:Tcz2GSmj4PoRJITCLjUdvOE8Jidl9yCx:NlQCKZLueXfOMewrGoJ1fMuB4NkyjvoD', 1, '2018-02-10 17:59:27'),
(142, 2, 141, 0, '01027590668', 'sha256:1000:XhHtwbLvD+2Z+8UzQ3ivC+nCxxIMxUQ8:QxLB5cMEzyn7ItuT1Kp60crCm5YrI9+O', 1, '2018-02-10 17:59:27'),
(143, 2, 142, 0, '03231480710', 'sha256:1000:STpApLgo7zwS1RJ0Q5q/IccP/3uWBG+3:/mgWO6LyUxl1lGDRUkJVptZz1PmvTvDY', 1, '2018-02-10 17:59:27'),
(144, 2, 143, 0, '00299320648', 'sha256:1000:qxq1iJd3khK4SniJD5sJIMRquVAnzfPP:fN4gn886lWCGnC+qWpKQQ3prUyeEViYl', 1, '2018-02-10 17:59:27'),
(145, 2, 144, 0, '01477070781', 'sha256:1000:2/exsCeXyhGt3TzV/bb9mMyCn5zOj7P/:XwvisgprA1ThPg0Twa/bI3lkcxI/vBFO', 1, '2018-02-10 17:59:27'),
(146, 2, 145, 0, '01732370737', 'sha256:1000:uFrtt+rwTUUwYWZcwPYyhLP1l/DFv2J0:3jTm4hyv7+q8xOcuKLFiFhrejtpSaXI+', 1, '2018-02-10 17:59:27'),
(147, 2, 146, 0, '05925571217', 'sha256:1000:zg6fibYDjDBfhPvivZNCYUKO2HEK78sC:vVfedH6eDDYpuu5KGiYHAH0RGou3k6rV', 1, '2018-02-10 17:59:27'),
(148, 2, 147, 0, '03193100785', 'sha256:1000:dQPb/+vZrQMOBgSnhP8tx6tSxfcxWqSD:akWEBQsCKie6mrr2hlcPDq4wyaOoG3Og', 1, '2018-02-10 17:59:27'),
(149, 2, 148, 0, '01259380747', 'sha256:1000:qLCvx53dOGKl+ZZjs2TL/9TaHrZcMFLu:V2SB0Xbcc97Zxme5aV31kDnFhshYyU2R', 1, '2018-02-10 17:59:27'),
(150, 2, 149, 0, '06372751005', 'sha256:1000:FisHVCu34kQa7gaZ+UfKI06tcQoDNL/H:mHNaeK65O8imdxOj4GnwxZiLqk/89JY5', 1, '2018-02-10 17:59:27'),
(151, 2, 150, 0, '02849350729', 'sha256:1000:ExeiY4AdwbDvW2EpIGoXrQU79zy0JgQf:SkWsx9igVzBrIbiQ7OnOkeG1Vf7ADkhj', 1, '2018-02-10 17:59:27'),
(152, 2, 151, 0, '06578900968', 'sha256:1000:KGrx85wvVhaEvSXQyG2oComKBgPJSAOa:dPcnUTk8wqsOhIM8ypPWDniGBTPyYCzd', 1, '2018-02-10 17:59:27'),
(153, 2, 152, 0, '00053810776', 'sha256:1000:weol9X4AzZmfDhVWYcdWgQqlMSTeXUED:jjCseOm7v2rGFIX5zbQOUpiixXesm7Yu', 1, '2018-02-10 17:59:27'),
(154, 2, 153, 0, '05167490654', 'sha256:1000:u8rEBocJyz81d9CHaIcnPXeZH6aAejH0:iftzjGg3MyCFkGoNJ/ERYPkJmDH/j7fN', 1, '2018-02-10 17:59:27'),
(155, 2, 154, 0, '05380610658', 'sha256:1000:g+3l4+nz+r5njqKW+23OcdOtd/dsSr9L:Zrvp/s214g6aia5ZQQ7g/yspnJekS8JP', 1, '2018-02-10 17:59:27'),
(156, 2, 155, 0, '01861750733', 'sha256:1000:PJCcLdOsukoIpuc2pM+NtEGJFa8SNT2R:NvMPGS0HZAg6ClidL0UTIgpBEqIwy1cw', 1, '2018-02-10 17:59:27'),
(157, 2, 156, 0, '02998740738', 'sha256:1000:gRW595QJDJSc/FGy7gZwRzyC3CL+2063:XziupcMz5zynjr/O5QqTPpyogWiJVlsU', 1, '2018-02-10 17:59:27'),
(158, 2, 157, 0, '01033350156', 'sha256:1000:mnaX8hUfxDdZ5qlHHbUN/0rErzxo10Tz:yp1JDpogGHwaEJrXGfiEPIQmcZPYtubq', 1, '2018-02-10 17:59:27'),
(159, 2, 158, 0, '02274390604', 'sha256:1000:QFo9mU/xTHY/RafClZPagCrcnVaZmku8:+tQ81+2TATO7X0fEcWPukKZEanIeVwaB', 1, '2018-02-10 17:59:27'),
(160, 2, 159, 0, '02045910607', 'sha256:1000:8IxkirqADUo+sr1tQ0WifEOFIPdfHgnn:I2WxvPP04EV92Xzi5LIXWDe3FRlmWRHS', 1, '2018-02-10 17:59:27'),
(161, 2, 160, 0, '01018400117', 'sha256:1000:ZgU7NRtuWxVcpKTI6JBTyjOMtZy7BrdR:y9GZAeDV46HxL8OVhxFkpobBGvC1qids', 1, '2018-02-10 17:59:27'),
(162, 2, 161, 0, '03039241215', 'sha256:1000:uyFmoQaMS+kaa58RI5GrMkS1LUPlSHau:/QMxgKcs/oxP2kZfuA05bYjl8FY7XbRA', 1, '2018-02-10 17:59:27'),
(163, 2, 162, 0, '08424991217', 'sha256:1000:r0WUuSmYDUfWLtLSOlI5h1FihlmLTQcc:VknXJaYc51Gkl9Suns9maCJxrE4Y6kLK', 1, '2018-02-10 17:59:27'),
(164, 2, 163, 0, '05463410653', 'sha256:1000:rM0YcL9b8turloRT4+yjMAn41I23Y9SO:nScX0vhoJv+3HkZiS4Vo3NeFuOB4g1YS', 1, '2018-02-10 17:59:27'),
(165, 2, 164, 0, '07241070635', 'sha256:1000:qp1omeRatcFMbQAeMnsBK7g5efqH2bHu:T9Et1xMi01rKX6fbL2mvVaQXH1JheWAR', 1, '2018-02-10 17:59:27'),
(166, 2, 165, 0, '01435170533', 'sha256:1000:NACVcl35JT73wpa+I0xdEz/lu8UK9wyG:/YK/IzOV8AFHVZ3iYpHG5wAFs2TkmUeu', 1, '2018-02-10 17:59:27'),
(167, 2, 166, 0, '02034980736', 'sha256:1000:KuQDK4SE56Pb/E1AEpUSm3lKYmDl5rZQ:oKpNA0v5koM02r2YA2c4PnO70Qaw2DF2', 1, '2018-02-10 17:59:27'),
(168, 2, 167, 0, '13367530154', 'sha256:1000:xv4VTXZpGpwIszJXxk1Wo3VnC53QD5Ri:mO0ZclXA7gYKRXh+zX740RpNU3T2mHH0', 1, '2018-02-10 17:59:27'),
(169, 2, 168, 0, '02409520463', 'sha256:1000:EgK7S3zRp5iAyVh/K4JkBa7w1uWAwYgb:FyD2Q1me+pnU4lsWv5iAifVMXRpHTWdI', 1, '2018-02-10 17:59:27'),
(170, 2, 169, 0, '02345040972', 'sha256:1000:E53Uii6jZGFDHfyokilOTz0BKOwaqhLZ:SExEddKjcYh6ySDSCJ+IYhPbN+JfQMUW', 1, '2018-02-10 17:59:27'),
(171, 2, 170, 0, '07881060722', 'sha256:1000:N3idVdqVnWwTs68f4mHLS6+SlLmXeJgv:16LUQx+rg8VMbZNyRt/JLu4bCvynZ16z', 1, '2018-02-10 17:59:27'),
(172, 2, 171, 0, '03040480737', 'sha256:1000:Qg0ufQu7R5CY05c+jr2nHnWuO3zXHrEI:hucGYY0wfqf7YHTzOQVqxx56sA8pujAg', 1, '2018-02-10 17:59:27'),
(173, 2, 172, 0, '01064380536', 'sha256:1000:KmgCXvgMu1YvSiFbYpMRGOur/H3A+KSf:kHzjagnX2RB0Vp77rT3jEdB4A7ED7C6R', 1, '2018-02-10 17:59:27'),
(174, 2, 173, 0, '05819701003', 'sha256:1000:1hzX141U3ikGgvgxbgFyuRMqsVrdNviE:39T0F5h5WcCta7j0IxGpr7hx2DwS49Ir', 1, '2018-02-10 17:59:27'),
(175, 2, 174, 0, '01812620738', 'sha256:1000:3DdNbkrB9kCvvY5Q0cveTvUP9wnYB3Un:j/lZTN8E01NGF+kUVWPF0NgcD470GgiO', 1, '2018-02-10 17:59:27'),
(176, 2, 175, 0, '05215221218', 'sha256:1000:DgX41rDDwXD2+e+z1wVmPewibiKRr5d3:39G3udPqDjhfpIjiKQNLsZXdNGJ+o2Yr', 1, '2018-02-10 17:59:27'),
(177, 2, 176, 0, '02354650695', 'sha256:1000:xMV2x1VuPXT9Lc5vbBzqIfDNYV0iSTfe:nYPsLHGH6oaReIPkQ/wyy7gHs/QaRzCM', 1, '2018-02-10 17:59:27'),
(178, 2, 177, 0, '00892800673', 'sha256:1000:a14iUasGhnzIwT+ITRkvMY6cQPbPdjOK:6wexTQIASkWZD6hyjBDUrTN3nEHZ6S+e', 1, '2018-02-10 17:59:27'),
(179, 2, 178, 0, '03270610797', 'sha256:1000:ylwDb05HJogox7BqqbWns42RyMpg0lL+:pGFzlHFc3z1ZjBgFm0GvTxxLtgrojpL7', 1, '2018-02-10 17:59:27'),
(180, 2, 179, 0, '03026180731', 'sha256:1000:H7I7JMpHDZHzZ8A4sC4waxJP4stRs/Lf:7bTzTw9clqG85BOYvkVtBX/9NKdVijJW', 1, '2018-02-10 17:59:27'),
(181, 2, 180, 0, '04417020650', 'sha256:1000:EiTAINioKsJKa/cXyDGfADwLWz6Vdkku:pm7WknDaAjAdoFPnLTvolMXzTBYGswaB', 1, '2018-02-10 17:59:27'),
(182, 2, 181, 0, '00129320800', 'sha256:1000:BVTgUHdsD0yXzJ7hLiii6rwLZOX0Q/Q7:h88wvTT0WnvrPdtdFSJFgHemk9DYXwDt', 1, '2018-02-10 17:59:27'),
(183, 2, 182, 0, '01603900646', 'sha256:1000:ae00Tbl+9h4THaLTuZkNtqfjZ18TisgN:EcfcEaG00Qwx9Y72VE8iCKlWmhz3TGjG', 1, '2018-02-10 17:59:27'),
(184, 2, 183, 0, '04133890618', 'sha256:1000:GCc9AE0pQ9XV1l6DX98x1NjwFZaDx0of:AsxEwaDJPY8mAd0gIZh6UTwW0L/hanks', 1, '2018-02-10 17:59:27'),
(185, 2, 184, 0, '01983640515', 'sha256:1000:7kzeCXgO2c2fnbgczZ2VhBwwdFIl6T7D:rDf556IxDGTG0ZXVRSr6UdmWdKTvPUrV', 1, '2018-02-10 17:59:27'),
(186, 2, 185, 0, '03797400615', 'sha256:1000:DosE2D1MEqxUfw5r3r2flWqvNZVvmsCK:hedqw0x8ZB8LcKgso+nFx5J6zB9xAcTq', 1, '2018-02-10 17:59:27'),
(187, 2, 186, 0, '12376240151', 'sha256:1000:3NOIgHQohPXHAev2UJvLFfZyOJji99zV:lKwLJ9kcYFzHZMPJacXRMFG7KYt1n0vb', 1, '2018-02-10 17:59:27'),
(188, 2, 187, 0, '03495180790', 'sha256:1000:ol2ZP0FLIuVqkryYrSQQQz0pAXX6MSPY:3JyOoqJAg5JEDtGXa2UZdzqcBZ+wLhkt', 1, '2018-02-10 17:59:27'),
(189, 2, 188, 0, '02198510618', 'sha256:1000:mNf4WAXclpqLBWR+cynjt6MpAk/u+Y8W:PBFq4DobNsGKo6UDw+mCPnIf6F78sc38', 1, '2018-02-10 17:59:27'),
(190, 2, 189, 0, '00553060773', 'sha256:1000:CpchP8IvWuMe/pKM9M1O+FA1f+f3xutq:WV7W/1luj0U6DWV0i2hRxWGEM93CinuI', 1, '2018-02-10 17:59:27'),
(191, 2, 190, 0, '01743220764', 'sha256:1000:7QUv5J5R2zXh1d/Wh/Jtm5dsFRa07R0x:vQK1vgtDHTndh2OLt8Qwn6FyMtYsf0u8', 1, '2018-02-10 17:59:27'),
(192, 2, 191, 0, '02682790734', 'sha256:1000:ipYQPbo1qtrEKV6N2+SI87dIXWwxiurH:G2kLSjVbt5T007sVr050lR+IohdmZs/w', 1, '2018-02-10 17:59:27'),
(193, 2, 192, 0, '08742290961', 'sha256:1000:clmKKMlDFZ8xHgl3FEmmiUpNKanBuujc:cJ38GQZsjnPns3TfSq4d0zhkeyoVZz7a', 1, '2018-02-10 17:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `app_user_id` int(10) UNSIGNED NOT NULL,
  `ref_app_user_device_type_id` int(11) NOT NULL,
  `app_user_device_unique_id` varchar(500) DEFAULT NULL,
  `app_user_installation_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_user_uninstallation_date_time` datetime DEFAULT NULL,
  `app_user_installing_location_has_value` tinyint(4) DEFAULT '0',
  `app_user_installing_location_lat_value` float(10,6) DEFAULT '0.000000',
  `app_user_installing_location_long_value` float(10,6) DEFAULT '0.000000',
  `app_user_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`app_user_id`, `ref_app_user_device_type_id`, `app_user_device_unique_id`, `app_user_installation_date_time`, `app_user_uninstallation_date_time`, `app_user_installing_location_has_value`, `app_user_installing_location_lat_value`, `app_user_installing_location_long_value`, `app_user_active`) VALUES
(1, 1, 'Shah87', '2018-02-13 18:00:00', NULL, 0, 0.000000, 0.000000, 1),
(2, 2, 'sun25', '2018-02-01 18:00:00', NULL, 0, 0.000000, 0.000000, 1),
(3, 1, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(4, 2, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(5, 1, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(6, 2, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(7, 1, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(8, 2, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(9, 1, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(10, 2, NULL, '2018-02-19 05:36:41', NULL, 0, 0.000000, 0.000000, 1),
(11, 1, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(12, 2, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(13, 1, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(14, 2, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(15, 1, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(16, 2, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(17, 1, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(18, 2, NULL, '2018-02-19 05:37:07', NULL, 0, 0.000000, 0.000000, 1),
(19, 1, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(20, 2, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(21, 1, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(22, 2, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(23, 1, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(24, 2, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(25, 1, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(26, 2, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(27, 1, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(28, 2, NULL, '2018-02-19 05:40:59', NULL, 0, 0.000000, 0.000000, 1),
(29, 2, '4323', '2018-02-21 07:55:49', NULL, 0, 0.000000, 0.000000, 1),
(30, 1, '0E5BD76BA4827D18E80CF79F0A382C59F5526AA4', '2018-02-21 08:28:56', NULL, 0, 0.000000, 0.000000, 1),
(31, 2, '43235', '2018-02-21 12:25:42', NULL, 0, 0.000000, 0.000000, 1),
(32, 2, '432356', '2018-02-21 12:28:43', NULL, 0, 0.000000, 0.000000, 1),
(37, 2, '5323589', '2018-02-21 12:55:38', NULL, 0, 0.000000, 0.000000, 1),
(64, 2, '53235789', '2018-02-21 17:40:11', NULL, 0, 0.000000, 0.000000, 1),
(65, 1, '9BD007729CAE033F61DEF5B69B842D83709ACECC', '2018-02-22 09:49:58', NULL, 0, 0.000000, 0.000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_android`
--

CREATE TABLE `app_user_android` (
  `ref_app_user_android_app_user_id` int(10) UNSIGNED NOT NULL,
  `android_device_push_token` varchar(250) NOT NULL,
  `app_user_android_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user_android`
--

INSERT INTO `app_user_android` (`ref_app_user_android_app_user_id`, `android_device_push_token`, `app_user_android_active`) VALUES
(3, '1', 1),
(5, '65', 1),
(7, '98', 1),
(9, '56', 1),
(11, '10', 1),
(13, '9', 1),
(15, '8', 1),
(17, '7', 1),
(19, '6', 1),
(21, '5', 1),
(23, '4', 1),
(25, '3', 1),
(27, '2', 1),
(30, 'APA91bHsP34YJGj8E7XLmWVdE-JibieOI1Bp2QAQ5WvRnUyV78y2ojj_y2ZIcpT14d__6jEKJprcMDIaeP0_wrn5tmpKTuXVOuZ0aQPs0blxDTjvZ2WZcSCsoK-feGHNXAvaVWHQNtC_', 1),
(65, 'APA91bFW9s5jWLCnYBT57VrN9qGAeNlqO6r1tE17F5e-ERNNd_VfaQk8a6FWiNDd30Gvnyv2NvJxQXLpp4RGWvZvC2CRESqDzrARV9Fsn2r-kL6tiqUAGcjGpSJ3cdilhJWIjaElX9eD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_details`
--

CREATE TABLE `app_user_details` (
  `ref_app_user_details_app_user_id` int(10) UNSIGNED NOT NULL,
  `app_user_ecommerce_user_name_email` varchar(250) DEFAULT NULL,
  `app_user_utente_id` varchar(250) DEFAULT NULL,
  `app_user_first_name` varchar(100) DEFAULT NULL,
  `app_user_last_name` varchar(50) DEFAULT NULL,
  `app_user_birth_date` date DEFAULT NULL,
  `app_user_sex` int(11) DEFAULT '-1',
  `app_user_address` varchar(250) DEFAULT NULL,
  `app_user_city` varchar(250) DEFAULT NULL,
  `app_user_post_code` varchar(20) DEFAULT NULL,
  `app_user_country` varchar(250) DEFAULT NULL,
  `app_user_email` varchar(250) DEFAULT NULL,
  `app_user_cell_phone` varchar(20) DEFAULT NULL,
  `app_user_registration_date_time` datetime NOT NULL,
  `app_user_registration_editing_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user_details`
--

INSERT INTO `app_user_details` (`ref_app_user_details_app_user_id`, `app_user_ecommerce_user_name_email`, `app_user_utente_id`, `app_user_first_name`, `app_user_last_name`, `app_user_birth_date`, `app_user_sex`, `app_user_address`, `app_user_city`, `app_user_post_code`, `app_user_country`, `app_user_email`, `app_user_cell_phone`, `app_user_registration_date_time`, `app_user_registration_editing_date_time`) VALUES
(1, NULL, NULL, 'Shah', 'Faisal', NULL, -1, 'Dhaka', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-02-15 13:44:40'),
(2, NULL, NULL, 'sun', 'moon', '2018-02-08', -1, NULL, NULL, NULL, NULL, 'sun@gmail.com', '6546464646', '0000-00-00 00:00:00', '2018-02-14 13:50:59'),
(3, NULL, NULL, 'Ximena ', 'Watkins', NULL, -1, 'New York, USA', 'New York', NULL, 'USA', NULL, '5685358845', '2018-02-19 00:00:00', '2018-02-19 06:32:43'),
(4, NULL, NULL, 'Pranav ', 'Gonzalez', NULL, -1, 'Dhaka, Bangladesh', 'Dhaka', NULL, 'Bangladesh', NULL, NULL, '2018-02-07 00:00:00', '2018-02-19 06:32:43'),
(5, NULL, NULL, 'Shah', 'Faisal', NULL, -1, 'Dhaka', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-02-15 07:44:40'),
(6, NULL, NULL, 'sun', 'moon', '2018-02-08', -1, NULL, NULL, NULL, NULL, 'sun@gmail.com', '6546464646', '0000-00-00 00:00:00', '2018-02-14 07:50:59'),
(7, NULL, NULL, 'Ximena ', 'Watkins', NULL, -1, 'New York, USA', 'New York', NULL, 'USA', NULL, '5685358845', '2018-02-19 00:00:00', '2018-02-19 00:32:43'),
(8, NULL, NULL, 'Pranav ', 'Gonzalez', NULL, -1, 'Dhaka, Bangladesh', 'Dhaka', NULL, 'Bangladesh', NULL, NULL, '2018-02-07 00:00:00', '2018-02-19 00:32:43'),
(9, NULL, NULL, 'Kolten ', 'Rocha', NULL, -1, 'Haydrabad, INDIA', 'Haydrabad', NULL, 'India', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 00:32:43'),
(10, NULL, NULL, 'King ', 'Vance', NULL, -1, 'washington dc, USA', 'washington dc', NULL, 'USA', NULL, NULL, '2018-02-02 00:00:00', '2018-02-19 00:32:43'),
(11, NULL, NULL, 'Lily ', 'Duarte', NULL, -1, 'Thimpu, Bhutan', 'Thimpu', NULL, 'Bhutan', NULL, NULL, '2018-02-10 00:00:00', '2018-02-19 00:32:43'),
(12, NULL, NULL, 'Jace ', 'Lucero', NULL, -1, 'Kathmundu, Nepal', 'Kathmundu', NULL, 'Nepal', NULL, NULL, '2018-02-14 00:00:00', '2018-02-19 00:32:43'),
(13, NULL, NULL, 'Xiomara ', 'Riley', NULL, -1, 'Perugia, Italy', 'Perugia', NULL, 'Italy', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 00:32:43'),
(14, NULL, NULL, 'Kenyon ', 'Clark', NULL, -1, 'London, England', 'London', NULL, 'England', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 00:32:43'),
(15, NULL, NULL, 'Conner ', 'Chavez', NULL, -1, 'Mumbai, India', 'Mumbai', NULL, 'India', NULL, NULL, '2018-02-01 00:00:00', '2018-02-19 00:32:43'),
(16, NULL, NULL, 'Shah', 'Faisal', NULL, -1, 'Dhaka', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2018-02-15 07:44:40'),
(17, NULL, NULL, 'sun', 'moon', '2018-02-08', -1, NULL, NULL, NULL, NULL, 'sun@gmail.com', '6546464646', '0000-00-00 00:00:00', '2018-02-14 07:50:59'),
(18, NULL, NULL, 'Ximena ', 'Watkins', NULL, -1, 'New York, USA', 'New York', NULL, 'USA', NULL, '5685358845', '2018-02-19 00:00:00', '2018-02-19 00:32:43'),
(19, NULL, NULL, 'Pranav ', 'Gonzalez', NULL, -1, 'Dhaka, Bangladesh', 'Dhaka', NULL, 'Bangladesh', NULL, NULL, '2018-02-07 00:00:00', '2018-02-19 00:32:43'),
(20, NULL, NULL, 'Kolten ', 'Rocha', NULL, -1, 'Haydrabad, INDIA', 'Haydrabad', NULL, 'India', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 00:32:43'),
(21, NULL, NULL, 'King ', 'Vance', NULL, -1, 'washington dc, USA', 'washington dc', NULL, 'USA', NULL, NULL, '2018-02-02 00:00:00', '2018-02-19 00:32:43'),
(22, NULL, NULL, 'Kolten ', 'Rocha', NULL, -1, 'Haydrabad, INDIA', 'Haydrabad', NULL, 'India', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 06:32:43'),
(23, NULL, NULL, 'King ', 'Vance', NULL, -1, 'washington dc, USA', 'washington dc', NULL, 'USA', NULL, NULL, '2018-02-02 00:00:00', '2018-02-19 06:32:43'),
(24, NULL, NULL, 'Lily ', 'Duarte', NULL, -1, 'Thimpu, Bhutan', 'Thimpu', NULL, 'Bhutan', NULL, NULL, '2018-02-10 00:00:00', '2018-02-19 06:32:43'),
(25, NULL, NULL, 'Jace ', 'Lucero', NULL, -1, 'Kathmundu, Nepal', 'Kathmundu', NULL, 'Nepal', NULL, NULL, '2018-02-14 00:00:00', '2018-02-19 06:32:43'),
(26, NULL, NULL, 'Xiomara ', 'Riley', NULL, -1, 'Perugia, Italy', 'Perugia', NULL, 'Italy', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 06:32:43'),
(27, NULL, NULL, 'Kenyon ', 'Clark', NULL, -1, 'London, England', 'London', NULL, 'England', NULL, NULL, '2018-02-15 00:00:00', '2018-02-19 06:32:43'),
(28, NULL, NULL, 'Conner ', 'Chavez', NULL, -1, 'Mumbai, India', 'Mumbai', NULL, 'India', NULL, NULL, '2018-02-01 00:00:00', '2018-02-19 06:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_ios`
--

CREATE TABLE `app_user_ios` (
  `ref_app_user_ios_app_user_id` int(10) UNSIGNED NOT NULL,
  `ios_device_token` varchar(250) NOT NULL,
  `app_user_ios_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user_ios`
--

INSERT INTO `app_user_ios` (`ref_app_user_ios_app_user_id`, `ios_device_token`, `app_user_ios_active`) VALUES
(2, '24', 1),
(4, '11', 1),
(6, '23', 1),
(8, '22', 1),
(10, '21', 1),
(12, '20', 1),
(14, '19', 1),
(16, '18', 1),
(18, '17', 1),
(20, '16', 1),
(22, '15', 1),
(24, '14', 1),
(26, '13', 1),
(28, '12', 1),
(29, '53456689', 1),
(31, '534566899', 1),
(32, '534566869', 1),
(37, '5340566869', 1),
(64, '5340561869', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_pharmacy`
--

CREATE TABLE `app_user_pharmacy` (
  `app_user_pharmacy_id` int(10) UNSIGNED NOT NULL,
  `ref_app_user_pharmacy_app_user_id` int(10) UNSIGNED NOT NULL,
  `ref_app_user_pharmacy_pharmacy_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'NULL MEANS NO PHARMACY IS ASSOCIATED',
  `app_user_pharmachy_add_edit_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_user_pharmacy_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user_pharmacy`
--

INSERT INTO `app_user_pharmacy` (`app_user_pharmacy_id`, `ref_app_user_pharmacy_app_user_id`, `ref_app_user_pharmacy_pharmacy_id`, `app_user_pharmachy_add_edit_date_time`, `app_user_pharmacy_active`) VALUES
(1, 1, 1, '2018-02-07 18:00:00', 1),
(2, 2, 3, '2018-02-18 18:00:00', 1),
(3, 3, 5, '2018-02-19 05:52:01', 1),
(4, 4, 1, '2018-02-19 05:52:01', 1),
(5, 28, 1, '2018-02-19 05:52:01', 1),
(6, 27, 1, '2018-02-19 05:52:01', 1),
(7, 26, 1, '2018-02-19 05:52:01', 1),
(8, 25, 2, '2018-02-19 05:52:01', 1),
(9, 24, 2, '2018-02-19 05:52:01', 1),
(10, 23, 2, '2018-02-19 05:52:01', 1),
(11, 22, 2, '2018-02-19 05:52:01', 1),
(12, 21, 2, '2018-02-19 05:52:01', 1),
(13, 10, 3, '2018-02-19 05:53:29', 1),
(14, 20, 3, '2018-02-19 05:53:29', 1),
(15, 19, 3, '2018-02-19 05:53:29', 1),
(16, 18, 3, '2018-02-19 05:53:29', 1),
(17, 17, 3, '2018-02-19 05:53:29', 1),
(18, 16, 4, '2018-02-19 05:55:20', 1),
(19, 15, 4, '2018-02-19 05:55:20', 1),
(20, 14, 4, '2018-02-19 05:55:20', 1),
(21, 13, 4, '2018-02-19 05:55:20', 1),
(22, 12, 4, '2018-02-19 05:55:20', 1),
(23, 11, 5, '2018-02-19 05:55:20', 1),
(24, 9, 5, '2018-02-19 05:55:20', 1),
(25, 8, 4, '2018-02-19 05:55:20', 1),
(26, 7, 5, '2018-02-19 05:55:20', 1),
(27, 6, 5, '2018-02-19 05:55:20', 1),
(28, 5, 5, '2018-02-19 05:55:30', 1),
(29, 29, 21, '2018-02-21 07:55:49', 1),
(30, 30, 1, '2018-02-21 08:28:56', 1),
(31, 31, 1, '2018-02-21 12:25:42', 1),
(32, 32, 2, '2018-02-21 12:28:43', 1),
(33, 37, 3, '2018-02-21 12:55:38', 1),
(34, 64, 1, '2018-02-21 17:40:11', 1),
(35, 65, 9, '2018-02-22 09:49:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `codice_categoria` varchar(20) NOT NULL,
  `posizione` varchar(20) DEFAULT NULL,
  `livello` varchar(20) DEFAULT NULL,
  `descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`codice_categoria`, `posizione`, `livello`, `descrizione`) VALUES
('1', '2', '2', 'Mamma e Bimbo'),
('10', '1', '1', 'Offerte'),
('2', '3', '2', 'Naturale'),
('3', '4', '2', 'Rimedi di Stagione'),
('4', '5', '2', 'Articoli Sanitari'),
('5', '6', '2', 'Integratori'),
('6', '7', '2', 'Cosmesi'),
('7', '8', '2', 'Personal Care'),
('8', '9', '2', 'Igiene Orale'),
('9', '10', '2', 'Benessere Intimo');

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `device_type_id` int(11) NOT NULL,
  `device_type_name` varchar(30) NOT NULL,
  `device_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`device_type_id`, `device_type_name`, `device_description`) VALUES
(1, 'ANDROID', NULL),
(2, 'IOS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(10) UNSIGNED NOT NULL,
  `ref_events_event_type_id` int(10) UNSIGNED NOT NULL,
  `ref_events_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `events_name` text,
  `events_description` text,
  `event_facebook_address` text,
  `event_other_web_link` text,
  `events_start_date` date NOT NULL,
  `events_start_time` time NOT NULL,
  `events_any_ending_date` tinyint(4) DEFAULT '1',
  `events_end_date` date DEFAULT NULL,
  `events_place` text,
  `events_end_time` time DEFAULT NULL,
  `events_image_location` text,
  `events_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `events_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `ref_events_event_type_id`, `ref_events_pharmacy_id`, `events_name`, `events_description`, `event_facebook_address`, `event_other_web_link`, `events_start_date`, `events_start_time`, `events_any_ending_date`, `events_end_date`, `events_place`, `events_end_time`, `events_image_location`, `events_edited_date_time`, `events_active`) VALUES
(1, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 1', 'ABENAVOLI DR.ROSA ALBA Event 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 06:40:49', 1),
(2, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 2', 'ABENAVOLI DR.ROSA ALBA Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 06:34:18', 1),
(4, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 3', 'ABENAVOLI DR.ROSA ALBA Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 06:36:05', 1),
(5, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 4', 'ABENAVOLI DR.ROSA ALBA Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 06:36:52', 1),
(6, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 6', 'ABENAVOLI DR.ROSA ALBA Event 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 06:37:50', 1),
(7, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 5', 'ABENAVOLI DR.ROSA ALBA Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 06:38:39', 1),
(8, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 7', 'ABENAVOLI DR.ROSA ALBA Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 06:40:25', 1),
(9, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 8', 'ABENAVOLI DR.ROSA ALBA Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 06:44:23', 1),
(10, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 9', 'ABENAVOLI DR.ROSA ALBA Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 06:45:49', 1),
(11, 1, 1, 'ABENAVOLI DR.ROSA ALBA Event 10', 'ABENAVOLI DR.ROSA ALBA Event 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-16', '00:10:00', 0, '2018-02-14', NULL, '00:20:00', 'all_images/image_events/original_image/P11_Gold_Front_img_1_802.png', '2018-02-18 06:46:59', 1),
(12, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 1', 'ADAM FARMA DI ALESSANDRO Event 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 00:40:49', 1),
(13, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 2', 'ADAM FARMA DI ALESSANDRO Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 00:34:18', 1),
(14, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 3', 'ADAM FARMA DI ALESSANDRO Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 00:36:05', 1),
(15, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 4', 'ADAM FARMA DI ALESSANDRO Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:36:52', 1),
(17, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 5', 'ADAM FARMA DI ALESSANDRO Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 00:38:39', 1),
(18, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 7', 'ADAM FARMA DI ALESSANDRO Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 00:40:25', 1),
(19, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 8', 'ADAM FARMA DI ALESSANDRO Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 00:44:23', 1),
(20, 1, 2, 'ADAM FARMA DI ALESSANDRO Event 9', 'ADAM FARMA DI ALESSANDRO Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 00:45:49', 1),
(21, 1, 3, 'ADDANTE DR.NICOLA Event 10', 'ADDANTE DR.NICOLA Event 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-16', '00:10:00', 0, '2018-02-14', NULL, '00:20:00', 'all_images/image_events/original_image/P11_Gold_Front_img_1_802.png', '2018-02-18 00:46:59', 1),
(22, 1, 3, 'ADDANTE DR.NICOLA Event 1', 'ADDANTE DR.NICOLA Event 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 00:40:49', 1),
(23, 1, 3, 'ADDANTE DR.NICOLA Event 2', 'ADDANTE DR.NICOLA Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 00:34:18', 1),
(24, 1, 3, 'ADDANTE DR.NICOLA Event 3', 'ADDANTE DR.NICOLA Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 00:36:05', 1),
(25, 1, 3, 'ADDANTE DR.NICOLA Event 4', 'ADDANTE DR.NICOLA Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:36:52', 1),
(26, 1, 3, 'ADDANTE DR.NICOLA Event 6', 'ADDANTE DR.NICOLA Event 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 00:37:50', 1),
(27, 1, 3, 'ADDANTE DR.NICOLA Event 5', 'ADDANTE DR.NICOLA Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 00:38:39', 1),
(28, 1, 3, 'ADDANTE DR.NICOLA Event 7', 'ADDANTE DR.NICOLA Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 00:40:25', 1),
(29, 1, 3, 'ADDANTE DR.NICOLA Event 8', 'ADDANTE DR.NICOLA Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 00:44:23', 1),
(30, 1, 3, 'ADDANTE DR.NICOLA Event 9', 'ADDANTE DR.NICOLA Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 00:45:49', 1),
(31, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 10', 'AIELLO SAS DI GIUSEPPE AIELLO Event 10  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-16', '00:10:00', 0, '2018-02-14', NULL, '00:20:00', 'all_images/image_events/original_image/P11_Gold_Front_img_1_802.png', '2018-02-18 00:46:59', 1),
(32, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 1', 'AIELLO SAS DI GIUSEPPE AIELLO Event 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 00:40:49', 1),
(33, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 2', 'AIELLO SAS DI GIUSEPPE AIELLO Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 00:34:18', 1),
(34, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 3', 'AIELLO SAS DI GIUSEPPE AIELLO Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 00:36:05', 1),
(35, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 4', 'AIELLO SAS DI GIUSEPPE AIELLO Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:36:52', 1),
(36, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 6', 'AIELLO SAS DI GIUSEPPE AIELLO Event 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 00:37:50', 1),
(37, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 5', 'AIELLO SAS DI GIUSEPPE AIELLO Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 00:38:39', 1),
(38, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 7', 'AIELLO SAS DI GIUSEPPE AIELLO Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 00:40:25', 1),
(39, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 8', 'AIELLO SAS DI GIUSEPPE AIELLO Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 00:44:23', 1),
(40, 1, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Event 9', 'AIELLO SAS DI GIUSEPPE AIELLO Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 00:45:49', 1),
(41, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 10', 'AIELLO SAS DI RIZZA ROSANNA &C Event 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-16', '00:10:00', 0, '2018-02-14', NULL, '00:20:00', 'all_images/image_events/original_image/P11_Gold_Front_img_1_802.png', '2018-02-18 00:46:59', 1),
(42, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 1', 'AIELLO SAS DI RIZZA ROSANNA &C Event 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 00:40:49', 1),
(43, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 2', 'AIELLO SAS DI RIZZA ROSANNA &C Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 00:34:18', 1),
(44, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 3', 'AIELLO SAS DI RIZZA ROSANNA &C Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 00:36:05', 1),
(45, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 4', 'AIELLO SAS DI RIZZA ROSANNA &C Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:36:52', 1),
(46, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 6', 'AIELLO SAS DI RIZZA ROSANNA &C Event 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 00:37:50', 1),
(47, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 5', 'AIELLO SAS DI RIZZA ROSANNA &C Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 00:38:39', 1),
(48, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 7', 'AIELLO SAS DI RIZZA ROSANNA &C Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 00:40:25', 1),
(49, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 8', 'AIELLO SAS DI RIZZA ROSANNA &C Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 00:44:23', 1),
(50, 1, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Event 9', 'AIELLO SAS DI RIZZA ROSANNA &C Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 00:45:49', 1),
(51, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 55', 'ALBRICCI SNC DR.MARIAROSARIA Event 55 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '0', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:20:00', 'all_images/image_events/original_image/b2.jpg', '2018-02-18 00:40:49', 1),
(52, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 2', 'ALBRICCI SNC DR.MARIAROSARIA Event 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/09_08_cvs.jpg', '2018-02-18 00:34:18', 1),
(54, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 3', 'ALBRICCI SNC DR.MARIAROSARIA Event 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:20:00', 0, '2018-02-15', NULL, '00:20:00', 'all_images/image_events/original_image/293677216.jpg', '2018-02-18 00:36:05', 1),
(55, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 4', 'ALBRICCI SNC DR.MARIAROSARIA Event 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:30:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:36:52', 1),
(56, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 6', 'ALBRICCI SNC DR.MARIAROSARIA Event 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 00:37:50', 1),
(57, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 5', 'ALBRICCI SNC DR.MARIAROSARIA Event 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-03', NULL, '00:40:00', 'all_images/image_events/original_image/produred.jpg', '2018-02-18 00:38:39', 1),
(58, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 7', 'ALBRICCI SNC DR.MARIAROSARIA Event 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-10', NULL, '00:00:00', 'all_images/image_events/original_image/images_(7).jpg', '2018-02-18 00:40:25', 1),
(59, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 8', 'ALBRICCI SNC DR.MARIAROSARIA Event 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-16', NULL, '00:30:00', 'all_images/image_events/original_image/images_(5).jpg', '2018-02-18 00:44:23', 1),
(60, 1, 6, 'ALBRICCI SNC DR.MARIAROSARIA Event 9', 'ALBRICCI SNC DR.MARIAROSARIA Event 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:30:00', 'all_images/image_events/original_image/images1.jpg', '2018-02-18 00:45:49', 1),
(61, 2, 2, 'ADAM FARMA DI ALESSANDRO Event 18', 'ADAM FARMA DI ALESSANDRO Event 18 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-16', '00:10:00', 0, '2018-02-14', NULL, '00:20:00', 'all_images/image_events/original_image/P11_Gold_Front_img_1_802.png', '2018-02-18 00:46:59', 1),
(66, 1, 2, 'ADAM FARMA DI ALESSANDRO  Event 89', 'ADAM FARMA DI ALESSANDRO  Event 89 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '', '', '2018-02-01', '00:00:00', 0, '2018-02-02', NULL, '00:10:00', 'all_images/image_events/original_image/images.jpg', '2018-02-18 00:37:50', 1),
(73, 1, NULL, 'Super Admin Event 1', 'Super Admin Event 1    \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '0', '2018-02-01', '00:10:00', 0, '2018-02-02', NULL, '00:30:00', NULL, '2018-02-20 09:54:25', 1),
(74, 1, NULL, 'Super Admin Event 2', 'Super Admin Event 2   \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '0', '2018-02-01', '00:10:00', 0, '2018-02-01', NULL, '00:20:00', 'all_images/image_events/original_image/poison-pill-forte-with-a-skull-as-brand-logo-on-the-remedy-box-it-EHB6FB.jpg', '2018-02-20 09:53:52', 1),
(75, 1, NULL, 'Super Admin Event 3', 'Super Admin Event 3      \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '0', '2018-02-01', '00:10:00', 0, '2018-02-03', NULL, '00:00:00', 'all_images/image_events/original_image/102-imudab-syrup1.jpg', '2018-02-20 10:05:32', 1),
(76, 1, NULL, 'Super Admin Event 4', 'Super Admin Event 4   \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '0', '2018-02-01', '00:10:00', 0, '2018-02-01', NULL, '00:00:00', 'all_images/image_events/original_image/tussitol-cough-syrup-bbptcs100-e1464185257404.jpg', '2018-02-20 09:54:05', 1),
(77, 1, NULL, 'Super Admin Event 5', 'Super Admin Event 5\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '0', '2018-02-03', '00:30:00', 0, '2018-02-17', NULL, '00:10:00', 'all_images/image_events/original_image/images_(1).jpg', '2018-02-20 09:53:18', 1),
(78, 1, NULL, 'Super Admin Event 6', 'Super Admin Event 6\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '', '2018-02-01', '00:00:00', 0, '2018-02-01', NULL, '00:10:00', 'all_images/image_events/original_image/images_(1)1.jpg', '2018-02-20 15:06:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(10) UNSIGNED NOT NULL,
  `event_type_name` varchar(100) NOT NULL,
  `event_description` varchar(500) DEFAULT NULL,
  `event_type_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type_name`, `event_description`, `event_type_active`) VALUES
(1, 'FARMA', NULL, 1),
(2, 'PHARMACY', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmacisti`
--

CREATE TABLE `farmacisti` (
  `farmacisti_id` int(10) UNSIGNED NOT NULL,
  `ref_farmacisti_pharmacy_id` int(10) UNSIGNED NOT NULL,
  `farmacisti_first_name` text,
  `farmacisti_last_name` text,
  `farmacisti_job_position` text,
  `farmacisti_photo_location` text,
  `farmacisti_created_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `farmacisti_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmacisti`
--

INSERT INTO `farmacisti` (`farmacisti_id`, `ref_farmacisti_pharmacy_id`, `farmacisti_first_name`, `farmacisti_last_name`, `farmacisti_job_position`, `farmacisti_photo_location`, `farmacisti_created_edited_date_time`, `farmacisti_active`) VALUES
(1, 1, 'SUN ', 'Andress', 'Farmacisti', 'all_images/image_pharmacist/original_image/images_(8)1.jpg', '2018-02-19 20:14:23', 1),
(2, 2, 'sevilla', 'Dasu', 'Farmasisti', 'all_images/image_pharmacist/original_image/09_08_cvs2.jpg', '2018-02-19 20:34:58', 1),
(3, 2, 'Jhon', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/1281.jpg', '2018-02-19 20:35:10', 1),
(4, 2, 'Jane', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/farmacist-300x140.png', '2018-02-18 06:39:12', 1),
(5, 2, 'Sunny', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/images_(8).jpg', '2018-02-19 20:35:25', 1),
(6, 2, 'Zlatan', 'Amran', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_282704597.jpg', '2018-02-19 20:36:09', 1),
(7, 2, 'Andres', 'Iniesta', 'Farmasisti', 'all_images/image_pharmacist/original_image/farmacisti.jpg', '2018-02-19 20:35:46', 1),
(8, 2, 'Sun', 'Khilji', 'Faram', 'all_images/image_pharmacist/original_image/national-pharmacist-day.jpg', '2018-02-18 06:40:55', 1),
(9, 2, 'Alex', 'Farguson', 'Farmasisti', 'all_images/image_pharmacist/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-19 20:36:44', 1),
(10, 2, 'Jose', 'Morinio', 'Farmasisti', 'all_images/image_pharmacist/original_image/Dollarphotoclub_41148844.jpg', '2018-02-19 20:37:02', 1),
(11, 2, 'Alesandro', 'pirlo', 'Farm', 'all_images/image_pharmacist/original_image/images_(9).jpg', '2018-02-19 20:37:25', 1),
(12, 3, 'ADDANTE', 'Nicola', 'Farmasisti', 'all_images/image_pharmacist/original_image/shutterstock_2827045972.jpg', '2018-02-19 20:56:56', 1),
(13, 3, 'Suvash', 'Hernandez', 'Farmasisti', 'all_images/image_pharmacist/original_image/Dollarphotoclub_411488443.jpg', '2018-02-19 20:57:17', 1),
(14, 3, 'Jhon', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/09_08_cvs.jpg', '2018-02-18 00:38:07', 1),
(15, 3, 'Jane', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/farmacist-300x140.png', '2018-02-18 00:39:12', 1),
(16, 3, 'Sunny', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/images_(8).jpg', '2018-02-19 20:57:29', 1),
(17, 3, 'Zlatan', 'Abram', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_282704597.jpg', '2018-02-19 20:57:46', 1),
(18, 3, 'David', 'Boon', 'Farmasisti', 'all_images/image_pharmacist/original_image/farmacisti.jpg', '2018-02-19 20:57:57', 1),
(19, 3, 'Robin', 'Hood', 'Farmasisti', 'all_images/image_pharmacist/original_image/national-pharmacist-day.jpg', '2018-02-19 20:58:14', 1),
(20, 3, 'Neimar', 'De silva', 'Farmasisti', 'all_images/image_pharmacist/original_image/farmacist-300x1403.png', '2018-02-19 20:58:42', 1),
(31, 5, 'Sun', 'Suvash', 'fara', 'all_images/image_pharmacist/original_image/Dollarphotoclub_41148844.jpg', '2018-02-18 00:42:00', 1),
(32, 5, 'Sun', 'khan', 'Farm', 'all_images/image_pharmacist/original_image/images_(9).jpg', '2018-02-18 00:42:36', 1),
(33, 5, 'Suvash', 'Das', 'DEmo', 'all_images/image_pharmacist/original_image/240_F_174670506_JFxIXKVEd5uziQ0JcttdgxxMO9AZNwzW.jpg', '2018-02-18 00:42:53', 1),
(34, 5, 'Jhon', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/09_08_cvs.jpg', '2018-02-18 00:38:07', 1),
(35, 5, 'Jane', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/farmacist-300x140.png', '2018-02-18 00:39:12', 1),
(36, 5, 'Sun', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/images_(8).jpg', '2018-02-18 00:39:05', 1),
(37, 5, 'Suvash', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_282704597.jpg', '2018-02-18 00:39:39', 1),
(38, 5, 'Sun', 'Huge', 'Farm..', 'all_images/image_pharmacist/original_image/farmacisti.jpg', '2018-02-18 00:40:33', 1),
(39, 5, 'Sun', 'Khilji', 'Faram', 'all_images/image_pharmacist/original_image/national-pharmacist-day.jpg', '2018-02-18 00:40:55', 1),
(40, 5, 'Suvash', 'Dasu', 'Photoshop', 'all_images/image_pharmacist/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:41:27', 1),
(41, 6, 'Sun', 'Suvash', 'fara', 'all_images/image_pharmacist/original_image/Dollarphotoclub_41148844.jpg', '2018-02-18 00:42:00', 1),
(42, 6, 'Sun', 'khan', 'Farm', 'all_images/image_pharmacist/original_image/images_(9).jpg', '2018-02-18 00:42:36', 1),
(43, 6, 'Suvash', 'Das', 'DEmo', 'all_images/image_pharmacist/original_image/240_F_174670506_JFxIXKVEd5uziQ0JcttdgxxMO9AZNwzW.jpg', '2018-02-18 00:42:53', 1),
(44, 6, 'Jhon', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/09_08_cvs.jpg', '2018-02-18 00:38:07', 1),
(45, 6, 'Jane', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/farmacist-300x140.png', '2018-02-18 00:39:12', 1),
(46, 6, 'Sun', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/images_(8).jpg', '2018-02-18 00:39:05', 1),
(47, 6, 'Suvash', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_282704597.jpg', '2018-02-18 00:39:39', 1),
(48, 6, 'Sun', 'Huge', 'Farm..', 'all_images/image_pharmacist/original_image/Group_10.png', '2018-02-18 06:53:51', 1),
(49, 6, 'Sun', 'Khilji', 'Faram', 'all_images/image_pharmacist/original_image/national-pharmacist-day.jpg', '2018-02-18 00:40:55', 1),
(50, 6, 'Suvash', 'Dasu', 'Photoshop', 'all_images/image_pharmacist/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:41:27', 1),
(51, 7, 'Sun', 'Suvash', 'fara', 'all_images/image_pharmacist/original_image/Dollarphotoclub_41148844.jpg', '2018-02-18 00:42:00', 1),
(52, 7, 'Sun', 'khan', 'Farm', 'all_images/image_pharmacist/original_image/images_(9).jpg', '2018-02-18 00:42:36', 1),
(53, 7, 'Suvash', 'Das', 'DEmo', 'all_images/image_pharmacist/original_image/240_F_174670506_JFxIXKVEd5uziQ0JcttdgxxMO9AZNwzW.jpg', '2018-02-18 00:42:53', 1),
(54, 7, 'Jhon', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/09_08_cvs.jpg', '2018-02-18 00:38:07', 1),
(55, 7, 'Jane', 'Doe', 'Farmacist', 'all_images/image_pharmacist/original_image/farmacist-300x140.png', '2018-02-18 00:39:12', 1),
(56, 7, 'Sun', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/images_(8).jpg', '2018-02-18 00:39:05', 1),
(57, 7, 'Suvash', 'Doe', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_282704597.jpg', '2018-02-18 00:39:39', 1),
(58, 7, 'Sun', 'Huge', 'Farm..', 'all_images/image_pharmacist/original_image/farmacisti.jpg', '2018-02-18 00:40:33', 1),
(59, 7, 'Sun', 'Khilji', 'Faram', 'all_images/image_pharmacist/original_image/national-pharmacist-day.jpg', '2018-02-18 00:40:55', 1),
(60, 7, 'Suvash', 'Dasu', 'Photoshop', 'all_images/image_pharmacist/original_image/Cartão_-_Dia_do_Farmaceutico.jpg', '2018-02-18 00:41:27', 1),
(61, 4, 'Rosa', 'Alba', 'Farmasisti', 'all_images/image_pharmacist/original_image/images_(9)1.jpg', '2018-02-19 19:50:46', 1),
(62, 4, 'Alesandro', 'Nicola', 'Farmasisti', 'all_images/image_pharmacist/original_image/farmacisti1.jpg', '2018-02-19 19:51:16', 1),
(63, 4, 'Andres', 'Bartara', 'Farmasisti', 'all_images/image_pharmacist/original_image/national-pharmacist-day1.jpg', '2018-02-19 19:51:41', 1),
(64, 4, 'Gabrial', 'Hernandez', 'Farmasisti', 'all_images/image_pharmacist/original_image/farmacist-300x1401.png', '2018-02-19 19:52:14', 1),
(65, 4, 'Xavi', 'Hernandez', 'Farmasisti', 'all_images/image_pharmacist/original_image/Dollarphotoclub_411488441.jpg', '2018-02-19 19:52:39', 1),
(66, 1, 'ADDANTE', 'NICOLA', 'Farmasist', 'all_images/image_pharmacist/original_image/shutterstock_2827045971.jpg', '2018-02-19 20:15:01', 1),
(67, 1, 'Adam', 'Huge', 'Farmasist', 'all_images/image_pharmacist/original_image/farmacist-300x1402.png', '2018-02-19 20:15:36', 1),
(68, 1, 'Jhon', 'doe', 'Farmasist', 'all_images/image_pharmacist/original_image/Dollarphotoclub_411488442.jpg', '2018-02-19 20:16:02', 1),
(69, 1, 'Suvash', 'Abram', 'Farmacisti', 'all_images/image_pharmacist/original_image/farmacisti2.jpg', '2018-02-19 20:16:37', 1),
(70, 1, 'David', 'Miller', 'Farmacisti', 'all_images/image_pharmacist/original_image/09_08_cvs1.jpg', '2018-02-19 20:17:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_product`
--

CREATE TABLE `final_product` (
  `final_product_id` int(10) UNSIGNED NOT NULL,
  `ref_final_product_product_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_final_product_product_new_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_final_product_product_free_text_id` int(10) UNSIGNED DEFAULT NULL,
  `final_product_created_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `final_product_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_product`
--

INSERT INTO `final_product` (`final_product_id`, `ref_final_product_product_id`, `ref_final_product_product_new_id`, `ref_final_product_product_free_text_id`, `final_product_created_edited_date_time`, `final_product_active`) VALUES
(1, 1, NULL, NULL, '2018-02-14 00:21:37', 1),
(2, 2, NULL, NULL, '2018-02-14 09:13:02', 1),
(3, 3, NULL, NULL, '2018-02-14 09:13:06', 1),
(4, 4, NULL, NULL, '2018-02-14 09:13:11', 1),
(5, 5, NULL, NULL, '2018-02-14 09:13:15', 1),
(6, 6, NULL, NULL, '2018-02-14 09:13:20', 1),
(7, 7, NULL, NULL, '2018-02-14 09:13:24', 1),
(8, 8, NULL, NULL, '2018-02-14 09:13:29', 1),
(32, NULL, 4, NULL, '2018-02-19 19:25:45', 1),
(33, NULL, 5, NULL, '2018-02-19 19:26:42', 1),
(34, NULL, 6, NULL, '2018-02-19 19:31:15', 1),
(35, NULL, 7, NULL, '2018-02-19 19:32:01', 1),
(36, NULL, 8, NULL, '2018-02-19 19:32:47', 1),
(37, NULL, NULL, 21, '2018-02-19 19:34:35', 1),
(38, NULL, NULL, 22, '2018-02-19 19:35:02', 1),
(39, NULL, NULL, 23, '2018-02-19 19:35:22', 1),
(40, NULL, NULL, 24, '2018-02-19 19:35:41', 1),
(41, NULL, NULL, 25, '2018-02-19 19:35:59', 1),
(42, NULL, NULL, 26, '2018-02-19 19:38:08', 1),
(43, NULL, NULL, 27, '2018-02-19 19:40:21', 1),
(44, NULL, NULL, 28, '2018-02-19 19:48:24', 1),
(45, NULL, NULL, 29, '2018-02-19 19:48:24', 1),
(46, NULL, NULL, 30, '2018-02-19 19:48:24', 1),
(47, NULL, NULL, 31, '2018-02-19 19:48:24', 1),
(48, NULL, 9, NULL, '2018-02-19 19:54:12', 1),
(49, NULL, 10, NULL, '2018-02-19 19:55:32', 1),
(50, NULL, 11, NULL, '2018-02-19 19:56:14', 1),
(51, NULL, 12, NULL, '2018-02-19 19:57:01', 1),
(52, NULL, 13, NULL, '2018-02-19 19:57:42', 1),
(53, NULL, 14, NULL, '2018-02-19 19:58:23', 1),
(54, NULL, NULL, 32, '2018-02-19 19:59:24', 1),
(55, NULL, NULL, 33, '2018-02-19 19:59:43', 1),
(56, NULL, NULL, 34, '2018-02-19 20:00:06', 1),
(57, NULL, NULL, 35, '2018-02-19 20:01:18', 1),
(58, NULL, NULL, 36, '2018-02-19 20:01:39', 1),
(59, NULL, NULL, 37, '2018-02-19 20:02:02', 1),
(60, NULL, NULL, 38, '2018-02-19 20:05:08', 1),
(61, NULL, NULL, 39, '2018-02-19 20:12:51', 1),
(62, NULL, NULL, 40, '2018-02-19 20:12:51', 1),
(63, NULL, NULL, 41, '2018-02-19 20:12:51', 1),
(64, NULL, NULL, 42, '2018-02-19 20:12:52', 1),
(65, NULL, NULL, 43, '2018-02-19 20:12:52', 1),
(66, NULL, NULL, 44, '2018-02-19 20:12:52', 1),
(67, NULL, 15, NULL, '2018-02-19 20:19:49', 1),
(68, NULL, NULL, 45, '2018-02-19 20:23:00', 1),
(69, NULL, NULL, 46, '2018-02-19 20:23:23', 1),
(70, NULL, NULL, 47, '2018-02-19 20:23:43', 1),
(71, NULL, NULL, 48, '2018-02-19 20:24:04', 1),
(72, NULL, NULL, 49, '2018-02-19 20:24:31', 1),
(73, NULL, NULL, 50, '2018-02-19 20:27:04', 1),
(74, NULL, NULL, 51, '2018-02-19 20:32:21', 1),
(75, NULL, NULL, 52, '2018-02-19 20:32:21', 1),
(76, NULL, NULL, 53, '2018-02-19 20:32:21', 1),
(77, NULL, 16, NULL, '2018-02-19 20:32:39', 1),
(78, NULL, 17, NULL, '2018-02-19 20:32:54', 1),
(79, NULL, 18, NULL, '2018-02-19 20:33:08', 1),
(80, NULL, 19, NULL, '2018-02-19 20:33:25', 1),
(81, NULL, 20, NULL, '2018-02-19 20:33:40', 1),
(82, NULL, 21, NULL, '2018-02-19 20:39:21', 1),
(83, NULL, 22, NULL, '2018-02-19 20:41:46', 1),
(84, NULL, 23, NULL, '2018-02-19 20:42:03', 1),
(85, NULL, 24, NULL, '2018-02-19 20:42:20', 1),
(86, NULL, 25, NULL, '2018-02-19 20:42:39', 1),
(87, NULL, NULL, 54, '2018-02-19 20:43:29', 1),
(88, NULL, NULL, 55, '2018-02-19 20:43:45', 1),
(89, NULL, NULL, 56, '2018-02-19 20:44:03', 1),
(90, NULL, NULL, 57, '2018-02-19 20:44:25', 1),
(91, NULL, NULL, 58, '2018-02-19 20:44:48', 1),
(92, NULL, NULL, 59, '2018-02-19 20:48:16', 1),
(93, NULL, NULL, 60, '2018-02-19 20:48:16', 1),
(94, NULL, NULL, 61, '2018-02-19 20:51:50', 1),
(95, NULL, NULL, 62, '2018-02-19 20:51:50', 1),
(96, NULL, NULL, 63, '2018-02-19 20:51:50', 1),
(97, NULL, NULL, 64, '2018-02-19 20:51:50', 1),
(98, NULL, NULL, 65, '2018-02-19 20:51:50', 1),
(99, NULL, 26, NULL, '2018-02-19 21:04:31', 1),
(100, NULL, 27, NULL, '2018-02-19 21:05:00', 1),
(101, NULL, 28, NULL, '2018-02-19 21:05:21', 1),
(102, NULL, 29, NULL, '2018-02-19 21:05:33', 1),
(103, NULL, 30, NULL, '2018-02-19 21:05:47', 1),
(104, NULL, 31, NULL, '2018-02-19 21:06:06', 1),
(105, NULL, 32, NULL, '2018-02-19 21:06:18', 1),
(106, NULL, 33, NULL, '2018-02-19 21:06:29', 1),
(107, NULL, 34, NULL, '2018-02-19 21:06:36', 1),
(108, NULL, 35, NULL, '2018-02-19 21:06:49', 1),
(109, NULL, 36, NULL, '2018-02-19 21:07:02', 1),
(110, NULL, NULL, 66, '2018-02-19 21:09:03', 1),
(111, NULL, NULL, 67, '2018-02-19 21:09:17', 1),
(112, NULL, NULL, 68, '2018-02-19 21:09:27', 1),
(113, NULL, NULL, 69, '2018-02-19 21:09:35', 1),
(114, NULL, NULL, 70, '2018-02-19 21:10:18', 1),
(115, NULL, NULL, 71, '2018-02-19 21:14:34', 1),
(116, NULL, NULL, 72, '2018-02-19 21:14:34', 1),
(117, NULL, NULL, 73, '2018-02-19 21:14:35', 1),
(118, NULL, NULL, 74, '2018-02-19 21:20:58', 1),
(119, NULL, NULL, 75, '2018-02-19 21:20:58', 1),
(120, NULL, NULL, 76, '2018-02-19 21:20:58', 1),
(121, NULL, NULL, 77, '2018-02-19 21:20:58', 1),
(122, NULL, NULL, 78, '2018-02-19 21:20:58', 1),
(123, NULL, NULL, 79, '2018-02-19 21:21:40', 1),
(124, NULL, NULL, 80, '2018-02-19 21:22:54', 1),
(125, NULL, NULL, 81, '2018-02-20 07:51:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `gallery_image_id` int(10) UNSIGNED NOT NULL,
  `gallery_image_from_farma` tinyint(4) DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_gallery_image_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `gallery_image_title` text,
  `gallery_image_description` text,
  `gallery_image_storage_path` text,
  `gallery_image_uploading_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gallery_image_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`gallery_image_id`, `gallery_image_from_farma`, `ref_gallery_image_pharmacy_id`, `gallery_image_title`, `gallery_image_description`, `gallery_image_storage_path`, `gallery_image_uploading_time`, `gallery_image_active`) VALUES
(1, 1, NULL, 'Super Admin Gallery 1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130327_CoughMedicine500x500.jpg', '2018-02-20 06:39:11', 1),
(2, 1, NULL, 'Super Admin Gallery 2', 'Super Admin Gallery 2 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130402_51RhVwsqQML.jpg', '2018-02-20 06:40:03', 1),
(3, 1, NULL, 'Super Admin Gallery 3', 'Super Admin Gallery 3 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130424_81hbzoN7gaL.SY355.jpg', '2018-02-20 06:40:25', 1),
(4, 1, NULL, 'Super Admin Gallery 4', 'Super Admin Gallery 4 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130453_102ImudabSyrup.jpg', '2018-02-20 06:40:54', 1),
(5, 1, NULL, 'Super Admin Gallery 5', 'Super Admin Gallery 5 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130474_AyurvedicStoneRemoverSyrup.jpg', '2018-02-20 06:41:15', 1),
(6, 1, NULL, 'Super Admin Gallery 6', 'Super Admin Gallery 6 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130497_AyurvedicStoneRemovingSyrup500x500.jpg', '2018-02-20 06:41:38', 1),
(7, 1, NULL, 'Super Admin Gallery 7', 'Super Admin Gallery 7Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519131383_81hbzoN7gaL.SY355.jpg', '2018-02-20 18:05:56', 1),
(8, 1, NULL, 'Super Admin Gallery 9', 'Super Admin Gallery 9 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130536_ChestalHoneyBottleLeft8001.jpg', '2018-02-20 06:42:17', 1),
(9, 1, NULL, 'Super Admin Gallery 10', 'Super Admin Gallery 10 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130557_HarithaCoughSyrup.jpg', '2018-02-20 06:42:38', 1),
(10, 1, NULL, 'Super Admin Gallery 12', 'Super Admin Gallery 12', 'all_images/image_gallery/original_image/1519130580_Images(2).jpg', '2018-02-20 06:43:02', 1),
(11, 1, NULL, 'Super Admin Gallery 13', 'Super Admin Gallery 13 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock', 'all_images/image_gallery/original_image/1519130601_Images.jpg', '2018-02-20 06:43:22', 1),
(12, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 1', 'ABENAVOLI DR.ROSA ALBA Gallery 1 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131110_WheezalLivcolSyrup450ml.jpg', '2018-02-20 06:51:52', 1),
(13, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 2', 'ABENAVOLI DR.ROSA ALBA Gallery 2 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131131_TussitolCoughSyrupBbptcs100E1464185257404.jpg', '2018-02-20 06:52:12', 1),
(14, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 3', 'ABENAVOLI DR.ROSA ALBA Gallery 3 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131150_SyrupLinctagon500x500.gif', '2018-02-20 06:52:31', 1),
(15, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 4', 'ABENAVOLI DR.ROSA ALBA Gallery 4 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131172_SBLOrthomuvSyrupSugarFree180ml.jpg', '2018-02-20 06:52:53', 1),
(16, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 5', 'ABENAVOLI DR.ROSA ALBA Gallery 5 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131207_PoisonPillForteWithASkullAsBrandLogoOnTheRemedyBoxItEHB6FB.jpg', '2018-02-20 06:53:28', 1),
(17, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 6', 'ABENAVOLI DR.ROSA ALBA Gallery 6 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131225_Images.jpg', '2018-02-20 06:53:46', 1),
(18, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 7', 'ABENAVOLI DR.ROSA ALBA Gallery 7 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131244_Images(2).jpg', '2018-02-20 06:54:05', 1),
(19, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 7', 'ABENAVOLI DR.ROSA ALBA Gallery 7 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131267_Images(1).jpg', '2018-02-20 06:54:28', 1),
(20, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 8', 'ABENAVOLI DR.ROSA ALBA Gallery 8 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131286_51RhVwsqQML.jpg', '2018-02-20 06:55:12', 1),
(21, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 9', 'ABENAVOLI DR.ROSA ALBA Gallery 9 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131331_CoughMedicine500x500.jpg', '2018-02-20 06:55:32', 1),
(22, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 10', 'ABENAVOLI DR.ROSA ALBA Gallery 10 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131348_HarithaCoughSyrup.jpg', '2018-02-20 06:55:50', 1),
(23, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 11', 'ABENAVOLI DR.ROSA ALBA Gallery 11 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131365_AyurvedicStoneRemoverSyrup.jpg', '2018-02-20 06:56:06', 1),
(24, 0, 1, 'ABENAVOLI DR.ROSA ALBA Gallery 12', 'ABENAVOLI DR.ROSA ALBA Gallery 12 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131383_81hbzoN7gaL.SY355.jpg', '2018-02-20 06:56:24', 1),
(25, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 1', 'ADAM FARMA DI ALESSANDRO Gallery 1 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131541_46LargeImage.jpg', '2018-02-20 06:59:02', 1),
(26, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 2', 'ADAM FARMA DI ALESSANDRO Gallery 2 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131563_51RhVwsqQML.jpg', '2018-02-20 06:59:24', 1),
(27, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 3', 'ADAM FARMA DI ALESSANDRO Gallery 3', 'all_images/image_gallery/original_image/1519131576_102ImudabSyrup.jpg', '2018-02-20 06:59:37', 1),
(28, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 4', 'ADAM FARMA DI ALESSANDRO Gallery 4 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131592_PoisonPillForteWithASkullAsBrandLogoOnTheRemedyBoxItEHB6FB.jpg', '2018-02-20 06:59:54', 1),
(29, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 5', 'ADAM FARMA DI ALESSANDRO Gallery 5 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131657_ChestalHoneyBottleLeft8001.jpg', '2018-02-20 07:01:00', 1),
(30, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 6', 'ADAM FARMA DI ALESSANDRO Gallery 6 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131684_Images(1).jpg', '2018-02-20 07:01:25', 1),
(31, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 7', 'ADAM FARMA DI ALESSANDRO Gallery 7 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131711_SBLOrthomuvSyrupSugarFree180ml.jpg', '2018-02-20 07:01:52', 1),
(32, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 7', 'ADAM FARMA DI ALESSANDRO Gallery 7 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131732_Bronchinol1.jpg', '2018-02-20 07:02:13', 1),
(33, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 8', 'ADAM FARMA DI ALESSANDRO Gallery 8 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131780_NewDisprinPackagingDesignIdeas1.jpg', '2018-02-20 07:03:01', 1),
(34, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 9', 'ADAM FARMA DI ALESSANDRO Gallery 9 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131800_Bronchinol1.jpg', '2018-02-20 07:03:21', 1),
(35, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 11', 'ADAM FARMA DI ALESSANDRO Gallery 11 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131847_81hbzoN7gaL.SY355.jpg', '2018-02-20 07:04:08', 1),
(36, 0, 2, 'ADAM FARMA DI ALESSANDRO Gallery 12', 'ADAM FARMA DI ALESSANDRO Gallery 12 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519131871_AyurvedicStoneRemovingSyrup500x500.jpg', '2018-02-20 07:04:32', 1),
(37, 0, 3, 'ADDANTE DR.NICOLA Gallery 1', 'ADDANTE DR.NICOLA Gallery 1 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519132382_46LargeImage.jpg', '2018-02-20 07:13:03', 1),
(38, 0, 3, 'ADDANTE DR.NICOLA Gallery 2', 'ADDANTE DR.NICOLA Gallery 2 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519132400_51RhVwsqQML.jpg', '2018-02-20 07:13:37', 1),
(39, 0, 3, 'ADDANTE DR.NICOLA Gallery 3', 'ADDANTE DR.NICOLA Gallery 3 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519132441_81hbzoN7gaL.SY355.jpg', '2018-02-20 07:14:02', 1),
(40, 0, 3, 'ADDANTE DR.NICOLA Gallery 4', 'ADDANTE DR.NICOLA Gallery 4 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519132460_102ImudabSyrup.jpg', '2018-02-20 07:14:21', 1),
(41, 0, 3, 'ADDANTE DR.NICOLA Gallery 5', 'ADDANTE DR.NICOLA Gallery 5 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested', 'all_images/image_gallery/original_image/1519132477_HarithaCoughSyrup.jpg', '2018-02-20 07:14:38', 1),
(42, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 1', 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 1 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'all_images/image_gallery/original_image/1519132753_WheezalLivcolSyrup450ml.jpg', '2018-02-20 07:19:15', 1),
(43, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 2', 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 2 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'all_images/image_gallery/original_image/1519132804_TussitolCoughSyrupBbptcs100E1464185257404.jpg', '2018-02-20 07:20:08', 1),
(44, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 3', 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 3 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'all_images/image_gallery/original_image/1519132837_SyrupLinctagon500x500.gif', '2018-02-20 07:20:39', 1),
(45, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 4', 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 4 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'all_images/image_gallery/original_image/1519132870_SBLOrthomuvSyrupSugarFree180ml.jpg', '2018-02-20 07:21:12', 1),
(47, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 5', 'AIELLO SAS DI GIUSEPPE AIELLO Gallery 5 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'all_images/image_gallery/original_image/1519132897_46LargeImage.jpg', '2018-02-20 07:21:40', 1),
(48, 0, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 1', 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 1 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1', 'all_images/image_gallery/original_image/1519133138_HarithaCoughSyrup.jpg', '2018-02-20 07:25:41', 1),
(49, 0, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 2', 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 2 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1', 'all_images/image_gallery/original_image/1519133161_AyurvedicStoneRemoverSyrup.jpg', '2018-02-20 07:26:04', 1),
(50, 0, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 3', 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 3 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1', 'all_images/image_gallery/original_image/1519133193_CoughMedicine500x500.jpg', '2018-02-20 07:26:34', 1),
(51, 0, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 4', 'AIELLO SAS DI RIZZA ROSANNA &C Gallery 4 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1', 'all_images/image_gallery/original_image/1519133220_0033673M.jpg', '2018-02-20 07:27:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_message`
--

CREATE TABLE `group_message` (
  `group_message_id` int(10) UNSIGNED NOT NULL,
  `ref_group_message_message_id` int(10) UNSIGNED NOT NULL,
  `is_condition_birth_year` int(11) DEFAULT '0',
  `condition_birth_year` int(11) DEFAULT '0',
  `is_condition_birth_month` int(11) DEFAULT '0',
  `condition_birth_month` int(11) DEFAULT '0',
  `is_condition_age_range` int(11) DEFAULT '0',
  `condition_age_starting_range` int(11) DEFAULT '0',
  `condition_age_ending_range` int(11) DEFAULT '0',
  `is_condition_sex` int(11) DEFAULT '0',
  `condition_sex` int(11) DEFAULT '-1',
  `is_condition_region` int(11) DEFAULT '0',
  `condition_region_name` varchar(250) DEFAULT NULL,
  `is_condition_city` int(11) DEFAULT '0',
  `condition_city_name` varchar(250) DEFAULT NULL,
  `is_condition_post_code` int(11) DEFAULT '0',
  `condition_post_code` varchar(100) DEFAULT NULL,
  `is_condition_or_gate` int(11) DEFAULT '0',
  `is_condition_and_gate` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `ref_message_message_type_id` int(11) NOT NULL,
  `ref_message_message_from_id` int(11) NOT NULL,
  `ref_message_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `message_title` text,
  `message_details` text,
  `message_any_ending_date` int(11) DEFAULT '1',
  `message_ending_date` date DEFAULT NULL,
  `message_ending_time` time DEFAULT NULL,
  `message_is_push_message` tinyint(4) DEFAULT '0',
  `message_created_date_time` datetime NOT NULL,
  `message_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_send_now` tinyint(4) DEFAULT '1',
  `message_send_later` tinyint(4) DEFAULT '0',
  `message_send_later_date_time` datetime DEFAULT NULL,
  `message_is_already_sent` tinyint(4) DEFAULT '1',
  `message_sending_date_time` datetime DEFAULT NULL,
  `message_any_attached_file` tinyint(4) DEFAULT '0',
  `message_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `ref_message_message_type_id`, `ref_message_message_from_id`, `ref_message_pharmacy_id`, `message_title`, `message_details`, `message_any_ending_date`, `message_ending_date`, `message_ending_time`, `message_is_push_message`, `message_created_date_time`, `message_edited_date_time`, `message_send_now`, `message_send_later`, `message_send_later_date_time`, `message_is_already_sent`, `message_sending_date_time`, `message_any_attached_file`, `message_active`) VALUES
(2, 1, 1, NULL, 'Super Admin Message 1', 'Super Admin Message 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 12:58:36', '2018-02-20 00:58:36', 1, 0, NULL, 1, '2018-02-20 12:58:36', 0, 1),
(3, 1, 1, NULL, 'Super Admin Message 2', 'Super Admin Message 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 12:59:05', '2018-02-20 00:59:05', 1, 0, NULL, 1, '2018-02-20 12:59:05', 0, 1),
(4, 1, 1, NULL, 'Super Admin Message 3', 'Super Admin Message 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 12:59:33', '2018-02-20 00:59:33', 1, 0, NULL, 1, '2018-02-20 12:59:33', 0, 1),
(5, 1, 1, NULL, 'Super Admin Message 4', 'Super Admin Message 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 13:00:06', '2018-02-20 01:00:06', 1, 0, NULL, 1, '2018-02-20 13:00:06', 0, 1),
(6, 1, 1, NULL, 'Super Admin Message 5', 'Super Admin Message 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 13:00:36', '2018-02-20 01:00:36', 1, 0, NULL, 1, '2018-02-20 13:00:36', 0, 1),
(7, 1, 1, NULL, 'Super Admin Message 6', 'Super Admin Message 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 13:34:34', '2018-02-20 01:34:34', 1, 0, NULL, 1, '2018-02-20 13:34:34', 0, 1),
(8, 1, 1, NULL, 'Super Admin Message 7', 'Super Admin Message 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 13:34:58', '2018-02-20 01:34:58', 1, 0, NULL, 1, '2018-02-20 13:34:58', 0, 1),
(9, 1, 1, NULL, 'Super Admin Message 7', 'Super Admin Message 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 13:35:18', '2018-02-20 01:35:18', 1, 0, NULL, 1, '2018-02-20 13:35:18', 0, 1),
(10, 1, 1, NULL, 'Super Admin Message 8', 'Super Admin Message 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 13:35:45', '2018-02-20 01:35:45', 1, 0, NULL, 1, '2018-02-20 13:35:45', 0, 1),
(11, 1, 1, NULL, 'Super Admin Message 11', 'Super Admin Message 11 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 13:36:16', '2018-02-20 01:36:16', 1, 0, NULL, 1, '2018-02-20 13:36:16', 0, 1),
(12, 1, 1, NULL, 'Super Admin Message 12', 'Super Admin Message 12', 0, NULL, NULL, 0, '2018-02-20 13:36:31', '2018-02-20 01:36:31', 1, 0, NULL, 1, '2018-02-20 13:36:31', 0, 1),
(13, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 1', 'ABENAVOLI DR.ROSA ALBA  Message 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 1, '2018-02-20 13:46:12', '2018-02-20 01:46:12', 1, 0, NULL, 1, '2018-02-20 13:46:12', 0, 1),
(14, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 2', 'ABENAVOLI DR.ROSA ALBA  Message 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:46:37', '2018-02-20 01:46:37', 1, 0, NULL, 1, '2018-02-20 13:46:37', 0, 1),
(15, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 3', 'ABENAVOLI DR.ROSA ALBA  Message 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 1, '2018-02-20 13:46:57', '2018-02-20 01:46:57', 1, 0, NULL, 1, '2018-02-20 13:46:57', 0, 1),
(16, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 4', 'ABENAVOLI DR.ROSA ALBA  Message 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 1, '2018-02-20 13:47:17', '2018-02-20 01:47:17', 1, 0, NULL, 1, '2018-02-20 13:47:17', 0, 1),
(17, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 5', 'ABENAVOLI DR.ROSA ALBA  Message 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:47:34', '2018-02-20 01:47:34', 1, 0, NULL, 1, '2018-02-20 13:47:34', 0, 1),
(18, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 7', 'ABENAVOLI DR.ROSA ALBA  Message 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 1, '2018-02-20 13:47:54', '2018-02-20 01:47:54', 1, 0, NULL, 1, '2018-02-20 13:47:54', 0, 1),
(19, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 6', 'ABENAVOLI DR.ROSA ALBA  Message 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:48:31', '2018-02-20 01:48:31', 1, 0, NULL, 1, '2018-02-20 13:48:31', 0, 1),
(20, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 8', 'ABENAVOLI DR.ROSA ALBA  Message 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 1, '2018-02-20 13:49:21', '2018-02-20 01:49:21', 1, 0, NULL, 1, '2018-02-20 13:49:21', 0, 1),
(21, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 9', 'ABENAVOLI DR.ROSA ALBA  Message 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:49:41', '2018-02-20 01:49:41', 1, 0, NULL, 1, '2018-02-20 13:49:41', 0, 1),
(22, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 10', 'ABENAVOLI DR.ROSA ALBA  Message 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:50:08', '2018-02-20 01:50:08', 1, 0, NULL, 1, '2018-02-20 13:50:08', 0, 1),
(23, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 11', 'ABENAVOLI DR.ROSA ALBA  Message 11 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:50:26', '2018-02-20 01:50:26', 1, 0, NULL, 1, '2018-02-20 13:50:26', 0, 1),
(24, 1, 2, 1, 'ABENAVOLI DR.ROSA ALBA  Message 12', 'ABENAVOLI DR.ROSA ALBA  Message 12 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 0, NULL, NULL, 0, '2018-02-20 13:50:45', '2018-02-20 01:50:45', 1, 0, NULL, 1, '2018-02-20 13:50:45', 0, 1),
(25, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 1', 'ADAM FARMA DI ALESSANDRO Messaqge 1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:05:45', '2018-02-20 02:05:45', 1, 0, NULL, 1, '2018-02-20 14:05:45', 0, 1),
(26, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 2', 'ADAM FARMA DI ALESSANDRO Messaqge 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:06:08', '2018-02-20 02:06:08', 1, 0, NULL, 1, '2018-02-20 14:06:08', 0, 1),
(27, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 3', 'ADAM FARMA DI ALESSANDRO Messaqge 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:06:24', '2018-02-20 02:06:24', 1, 0, NULL, 1, '2018-02-20 14:06:24', 0, 1),
(28, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 4', 'ADAM FARMA DI ALESSANDRO Messaqge 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:06:47', '2018-02-20 02:06:47', 1, 0, NULL, 1, '2018-02-20 14:06:47', 0, 1),
(29, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 5', 'ADAM FARMA DI ALESSANDRO Messaqge 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:07:18', '2018-02-20 02:07:18', 1, 0, NULL, 1, '2018-02-20 14:07:18', 0, 1),
(30, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 6', 'ADAM FARMA DI ALESSANDRO Messaqge 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:07:41', '2018-02-20 02:07:41', 1, 0, NULL, 1, '2018-02-20 14:07:41', 0, 1),
(31, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 7', 'ADAM FARMA DI ALESSANDRO Messaqge 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:08:00', '2018-02-20 02:08:00', 1, 0, NULL, 1, '2018-02-20 14:08:00', 0, 1),
(32, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 7', 'ADAM FARMA DI ALESSANDRO Messaqge 7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:08:19', '2018-02-20 02:08:19', 1, 0, NULL, 1, '2018-02-20 14:08:19', 0, 1),
(33, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 8', 'ADAM FARMA DI ALESSANDRO Messaqge 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:08:39', '2018-02-20 02:08:39', 1, 0, NULL, 1, '2018-02-20 14:08:39', 0, 1),
(34, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 8', 'ADAM FARMA DI ALESSANDRO Messaqge 8', 0, NULL, NULL, 0, '2018-02-20 14:08:55', '2018-02-20 02:08:55', 1, 0, NULL, 1, '2018-02-20 14:08:55', 0, 1),
(35, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 9', 'ADAM FARMA DI ALESSANDRO Messaqge 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:09:10', '2018-02-20 02:09:10', 1, 0, NULL, 1, '2018-02-20 14:09:10', 0, 1),
(36, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 10', 'ADAM FARMA DI ALESSANDRO Messaqge 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:09:27', '2018-02-20 02:09:27', 1, 0, NULL, 1, '2018-02-20 14:09:27', 0, 1),
(37, 1, 2, 2, 'ADAM FARMA DI ALESSANDRO Messaqge 12', 'ADAM FARMA DI ALESSANDRO Messaqge 12 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:09:57', '2018-02-20 02:09:57', 1, 0, NULL, 1, '2018-02-20 14:09:57', 0, 1),
(38, 1, 2, 3, 'ADDANTE DR.NICOLA Message 1', 'ADDANTE DR.NICOLA Message 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:15:40', '2018-02-20 02:15:40', 1, 0, NULL, 1, '2018-02-20 14:15:40', 0, 1),
(39, 1, 2, 3, 'ADDANTE DR.NICOLA Message 2', 'ADDANTE DR.NICOLA Message 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:16:02', '2018-02-20 02:16:02', 1, 0, NULL, 1, '2018-02-20 14:16:02', 0, 1),
(40, 1, 2, 3, 'ADDANTE DR.NICOLA Message 3', 'ADDANTE DR.NICOLA Message 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:16:27', '2018-02-20 02:16:27', 1, 0, NULL, 1, '2018-02-20 14:16:27', 0, 1),
(41, 1, 2, 3, 'ADDANTE DR.NICOLA Message 4', 'ADDANTE DR.NICOLA Message 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:16:47', '2018-02-20 02:16:47', 1, 0, NULL, 1, '2018-02-20 14:16:47', 0, 1),
(42, 1, 2, 3, 'ADDANTE DR.NICOLA Message 5', 'ADDANTE DR.NICOLA Message 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:17:18', '2018-02-20 02:17:18', 1, 0, NULL, 1, '2018-02-20 14:17:18', 0, 1),
(43, 1, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Message 1', 'AIELLO SAS DI GIUSEPPE AIELLO Message 1  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:22:21', '2018-02-20 02:22:21', 1, 0, NULL, 1, '2018-02-20 14:22:21', 0, 1),
(44, 1, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Message 2', 'AIELLO SAS DI GIUSEPPE AIELLO Message 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:22:50', '2018-02-20 02:22:50', 1, 0, NULL, 1, '2018-02-20 14:22:50', 0, 1),
(45, 1, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Message 3', 'AIELLO SAS DI GIUSEPPE AIELLO Message 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:23:17', '2018-02-20 02:23:17', 1, 0, NULL, 1, '2018-02-20 14:23:17', 0, 1),
(46, 1, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Message 4', 'AIELLO SAS DI GIUSEPPE AIELLO Message 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:23:42', '2018-02-20 02:23:42', 1, 0, NULL, 1, '2018-02-20 14:23:42', 0, 1),
(47, 1, 2, 4, 'AIELLO SAS DI GIUSEPPE AIELLO Message 5', 'AIELLO SAS DI GIUSEPPE AIELLO Message 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:24:09', '2018-02-20 02:24:09', 1, 0, NULL, 1, '2018-02-20 14:24:09', 0, 1),
(48, 1, 2, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Message 1', 'AIELLO SAS DI RIZZA ROSANNA &C Message 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:28:14', '2018-02-20 02:28:14', 1, 0, NULL, 1, '2018-02-20 14:28:14', 0, 1),
(49, 1, 2, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Message 2', 'AIELLO SAS DI RIZZA ROSANNA &C Message 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:28:47', '2018-02-20 02:28:47', 1, 0, NULL, 1, '2018-02-20 14:28:47', 0, 1),
(50, 1, 2, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Message 3', 'AIELLO SAS DI RIZZA ROSANNA &C Message 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:29:09', '2018-02-20 02:29:09', 1, 0, NULL, 1, '2018-02-20 14:29:09', 0, 1),
(51, 1, 2, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Message 4', 'AIELLO SAS DI RIZZA ROSANNA &C Message 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 1, '2018-02-20 14:29:28', '2018-02-20 02:29:28', 1, 0, NULL, 1, '2018-02-20 14:29:28', 0, 1),
(52, 1, 2, 5, 'AIELLO SAS DI RIZZA ROSANNA &C Message 5', 'AIELLO SAS DI RIZZA ROSANNA &C Message 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, NULL, NULL, 0, '2018-02-20 14:29:53', '2018-02-20 02:29:53', 1, 0, NULL, 1, '2018-02-20 14:29:53', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_file`
--

CREATE TABLE `message_file` (
  `message_file_id` int(10) UNSIGNED NOT NULL,
  `ref_message_file_message_id` int(10) UNSIGNED NOT NULL,
  `message_file_type` varchar(250) DEFAULT NULL,
  `message_file_extension` varchar(250) DEFAULT NULL,
  `message_file_storage_location` varchar(500) NOT NULL,
  `message_file_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_from`
--

CREATE TABLE `message_from` (
  `message_from_id` int(11) NOT NULL,
  `message_from_name` varchar(100) NOT NULL,
  `message_from_description` varchar(250) DEFAULT NULL,
  `message_from_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_from`
--

INSERT INTO `message_from` (`message_from_id`, `message_from_name`, `message_from_description`, `message_from_active`) VALUES
(1, 'FARMA/FARVIMA', 'Message from Farma/Farvima', 1),
(2, 'Pharmacy', 'Message From Pharmacy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_type`
--

CREATE TABLE `message_type` (
  `message_type_id` int(11) NOT NULL,
  `message_type_name` varchar(100) NOT NULL,
  `message_type_description` varchar(250) DEFAULT NULL,
  `message_type_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_type`
--

INSERT INTO `message_type` (`message_type_id`, `message_type_name`, `message_type_description`, `message_type_active`) VALUES
(1, 'Normal/Common', 'Normal or Common message', 1),
(2, 'Personal', 'personal message for app users', 1),
(3, 'Group', 'group message based on conditions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_title` text,
  `news_description` text,
  `news_image_location` text,
  `news_created_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_image_location`, `news_created_edited_date_time`, `news_active`) VALUES
(1, 'Super Admin News 3', 'Super Admin News 3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/81hbzoN7gaL._SY355__.jpg', '2018-02-20 05:55:55', 1),
(2, 'Super Admin News 4', 'Super Admin News 4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/Wheezal-Livcol-Syrup-450ml.jpg', '2018-02-20 05:53:51', 1),
(3, 'Super Admin News 5', 'Super Admin News 5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/Ayurvedic-Stone-Remover-Syrup.jpg', '2018-02-20 05:54:31', 1),
(4, 'Super Admin News 6', 'Super Admin News 6 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/0033673_m.jpg', '2018-02-20 06:30:32', 1),
(5, 'Super Admin News 7', 'Super Admin News 7  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/Bronchinol_1.jpg', '2018-02-20 06:30:54', 1),
(6, 'Super Admin News 8', 'Super Admin News 8 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/tussitol-cough-syrup-bbptcs100-e1464185257404.jpg', '2018-02-20 06:31:20', 1),
(7, 'Super Admin News 9', 'Super Admin News 9 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/poison-pill-forte-with-a-skull-as-brand-logo-on-the-remedy-box-it-EHB6FB.jpg', '2018-02-20 06:31:47', 1),
(8, 'Super Admin News 10', 'Super Admin News 10 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/images_(1).jpg', '2018-02-20 06:32:28', 1),
(9, 'Super Admin News 11', 'Super Admin News 11 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/Wheezal-Livcol-Syrup-450ml1.jpg', '2018-02-20 06:32:59', 1),
(10, 'Super Admin News 12', 'Super Admin News 12 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'all_images/image_news/original_image/tussitol-cough-syrup-bbptcs100-e14641852574041.jpg', '2018-02-20 06:33:28', 1),
(11, 'test', 'etertedscdsfdsfd', 'all_images/image_news/original_image/login_page.png', '2018-02-22 23:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_pdf`
--

CREATE TABLE `offer_pdf` (
  `offer_pdf_id` int(10) UNSIGNED NOT NULL,
  `offer_pdf_from_farma` tinyint(4) DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_offer_pdf_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `offer_pdf_title` text,
  `offer_pdf_starting_date_time` datetime DEFAULT NULL,
  `offer_pdf_ending_date_time` datetime DEFAULT NULL,
  `offer_pdf_storage` text,
  `offer_pdf_uploading_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_pdf_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_pdf`
--

INSERT INTO `offer_pdf` (`offer_pdf_id`, `offer_pdf_from_farma`, `ref_offer_pdf_pharmacy_id`, `offer_pdf_title`, `offer_pdf_starting_date_time`, `offer_pdf_ending_date_time`, `offer_pdf_storage`, `offer_pdf_uploading_date_time`, `offer_pdf_active`) VALUES
(112, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  offer 1', '2018-02-01 00:00:00', '2018-02-09 00:00:00', 'all_images/image_offer/original_image/pdf/8199360.pdf', '2018-02-19 19:38:07', 1),
(113, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO offer 2', '2018-02-02 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/333747861.pdf', '2018-02-20 07:41:09', 1),
(114, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO offer 3', '2018-02-02 00:00:00', '2018-02-15 00:00:00', 'all_images/image_offer/original_image/pdf/57412059.pdf', '2018-02-20 07:41:24', 1),
(115, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  offer 4', '2018-02-17 00:00:00', '2018-02-28 00:00:00', 'all_images/image_offer/original_image/pdf/421712491.pdf', '2018-02-20 07:41:33', 1),
(116, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  offer 2', '2018-02-01 00:00:00', '2018-02-02 00:00:00', 'all_images/image_offer/original_image/pdf/191474269.pdf', '2018-02-19 19:43:04', 1),
(117, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 1', '2018-02-01 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/216142489.pdf', '2018-02-19 20:03:46', 1),
(118, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 2', '2018-02-03 00:00:00', '2018-02-07 00:00:00', 'all_images/image_offer/original_image/pdf/423871765.pdf', '2018-02-19 20:05:08', 1),
(119, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 3', '2018-02-01 00:00:00', '2018-02-09 00:00:00', 'all_images/image_offer/original_image/pdf/254424920.pdf', '2018-02-20 08:06:29', 1),
(120, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 4', '2018-02-03 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/457049788.pdf', '2018-02-19 20:06:20', 1),
(121, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 6', '2018-02-03 00:00:00', '2018-02-24 00:00:00', 'all_images/image_offer/original_image/pdf/476083544.pdf', '2018-02-19 20:07:59', 1),
(122, 0, 1, 'ABENAVOLI DR.ROSA ALBA Pdf offer 5', '2018-02-01 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/484050557.pdf', '2018-02-19 20:08:35', 1),
(123, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf Offer 1', '2018-02-08 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/293628105.pdf', '2018-02-19 20:25:53', 1),
(124, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf Offer 2', '2018-02-16 00:00:00', '2018-02-28 00:00:00', 'all_images/image_offer/original_image/pdf/312917419.pdf', '2018-02-19 20:27:04', 1),
(125, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf  Offer 3', '2018-02-01 00:00:00', '2018-02-03 00:00:00', 'all_images/image_offer/original_image/pdf/24207354.pdf', '2018-02-19 20:27:41', 1),
(126, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf Offer 5', '2018-02-03 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/282288260.pdf', '2018-02-20 08:29:17', 1),
(127, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf Offer 4', '2018-02-01 00:00:00', '2018-02-21 00:00:00', 'all_images/image_offer/original_image/pdf/23035228.pdf', '2018-02-19 20:29:08', 1),
(128, 0, 3, 'ADDANTE DR.NICOLA pdf offer 1', '2018-02-01 00:00:00', '2018-02-09 00:00:00', 'all_images/image_offer/original_image/pdf/327470042.pdf', '2018-02-19 20:45:51', 1),
(129, 0, 3, 'ADDANTE DR.NICOLA pdf offer 2', '2018-02-02 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/20712881.pdf', '2018-02-19 20:46:18', 1),
(130, 0, 3, 'ADDANTE DR.NICOLA pdf offer 3', '2018-02-01 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/410716456.pdf', '2018-02-19 20:46:33', 1),
(131, 0, 3, 'ADDANTE DR.NICOLA pdf offer 4', '2018-02-03 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/427810579.pdf', '2018-02-20 08:48:50', 1),
(132, 0, 3, 'ADDANTE DR.NICOLA pdf offer 5', '2018-02-03 00:00:00', '2018-02-09 00:00:00', 'all_images/image_offer/original_image/pdf/67532256.pdf', '2018-02-19 20:48:42', 1),
(133, 1, NULL, 'Super Admin pdf offer 1', '2018-02-01 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/77219930.pdf', '2018-02-19 21:11:40', 1),
(134, 1, NULL, 'Super Admin pdf offer 2', '2018-02-01 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/455678565.pdf', '2018-02-19 21:12:07', 1),
(135, 1, NULL, 'Super Admin pdf offer 3', '2018-02-09 00:00:00', '2018-02-16 00:00:00', 'all_images/image_offer/original_image/pdf/41451896.pdf', '2018-02-19 21:14:33', 1),
(136, 1, NULL, 'Super Admin pdf offer 4', '2018-02-03 00:00:00', '2018-02-08 00:00:00', 'all_images/image_offer/original_image/pdf/143447973.pdf', '2018-02-20 09:15:10', 1),
(137, 1, NULL, 'Super Admin pdf offer 5', '2018-02-02 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/481481424.pdf', '2018-02-19 21:16:05', 1),
(138, 1, NULL, 'Super Admin pdf offer 6', '2018-02-01 00:00:00', '2018-02-03 00:00:00', 'all_images/image_offer/original_image/pdf/46578452.pdf', '2018-02-19 21:16:46', 1),
(139, 1, NULL, 'Super Admin pdf offer 7', '2018-02-01 00:00:00', '2018-02-10 00:00:00', 'all_images/image_offer/original_image/pdf/246617010.pdf', '2018-02-20 09:17:23', 1),
(140, 1, NULL, 'Super Admin pdf offer 8', '2018-02-01 00:00:00', '2018-02-24 00:00:00', 'all_images/image_offer/original_image/pdf/177284842.pdf', '2018-02-19 21:17:39', 1),
(141, 1, NULL, 'New Offer', '2018-02-01 00:00:00', '2018-02-02 00:00:00', 'all_images/image_offer/original_image/pdf/145763117.pdf', '2018-02-20 00:18:37', 1),
(142, 1, NULL, 'SuperAdmin Offer PDF -Anwar', '2018-02-19 00:00:00', '2018-03-31 00:00:00', 'all_images/image_offer/original_image/pdf/383867829.pdf', '2018-02-20 07:51:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
  `offer_products_id` int(10) UNSIGNED NOT NULL,
  `offer_products_from_farma` tinyint(4) DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `offer_products_type` tinyint(4) DEFAULT '0' COMMENT '1 means pdf and 2 means free_text_product ,0 means network product,4 means product_new',
  `ref_offer_products_offerr_pdf_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_offer_products_final_product_id` int(10) UNSIGNED DEFAULT NULL,
  `ref_offer_products_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `offer_products_starting_date_time` datetime DEFAULT NULL,
  `offer_products_ending_date_time` datetime DEFAULT NULL,
  `offer_products_normal_price` text,
  `offer_products_offer_price` text,
  `offer_products_creating_editing_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_products_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_products`
--

INSERT INTO `offer_products` (`offer_products_id`, `offer_products_from_farma`, `offer_products_type`, `ref_offer_products_offerr_pdf_id`, `ref_offer_products_final_product_id`, `ref_offer_products_pharmacy_id`, `offer_products_starting_date_time`, `offer_products_ending_date_time`, `offer_products_normal_price`, `offer_products_offer_price`, `offer_products_creating_editing_date_time`, `offer_products_active`) VALUES
(78, 0, 1, 112, 3, 4, '2018-02-01 00:00:00', '2018-02-16 00:00:00', '19.0000', '15.00', '2018-02-19 19:38:07', 1),
(79, 0, 1, 112, 4, 4, '2018-02-14 00:00:00', '2018-02-15 00:00:00', '12.0000', '10.00', '2018-02-19 19:38:07', 1),
(80, 0, 1, 112, 42, 4, '2018-02-01 00:00:00', '2018-02-16 00:00:00', '36.00', '15.00', '2018-02-19 19:38:08', 1),
(81, 0, 1, 114, 2, 4, '2018-02-10 00:00:00', '2018-02-22 00:00:00', '17.2000', '15.00', '2018-02-19 19:38:58', 1),
(82, 0, 1, 115, 43, 4, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '36.00', '32.00', '2018-02-19 19:40:21', 1),
(83, 0, 1, 116, 6, 4, '2018-02-06 00:00:00', '2018-02-14 00:00:00', '9.8000', '7.00', '2018-02-19 19:43:04', 1),
(84, 0, 1, 116, 2, 4, '2018-02-07 00:00:00', '2018-02-14 00:00:00', '17.2000', '10.00', '2018-02-19 19:43:04', 1),
(85, 0, 1, 116, 5, 4, '2018-02-15 00:00:00', '2018-02-21 00:00:00', '10.8000', '8.00', '2018-02-19 19:43:04', 1),
(86, 0, 0, NULL, 1, 4, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '12.8000', '10.00', '2018-02-20 07:45:06', 1),
(87, 0, 0, NULL, 3, 4, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '19.0000', '15.00', '2018-02-20 07:45:06', 1),
(88, 0, 0, NULL, 7, 4, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '10.5000', '9.00', '2018-02-20 07:45:06', 1),
(89, 0, 0, NULL, 8, 4, '2018-02-01 00:00:00', '2018-02-14 00:00:00', '10.5000', '9.00', '2018-02-20 07:45:40', 1),
(90, 0, 0, NULL, 6, 4, '2018-02-02 00:00:00', '2018-02-16 00:00:00', '9.8000', '6.00', '2018-02-20 07:45:40', 1),
(91, 0, 2, NULL, 44, 4, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '10.00', '6.00', '2018-02-19 19:48:24', 1),
(92, 0, 2, NULL, 45, 4, '2018-02-17 00:00:00', '2018-02-17 00:00:00', '25.00', '20.00', '2018-02-19 19:48:24', 1),
(93, 0, 2, NULL, 46, 4, '2018-03-01 00:00:00', '2018-03-03 00:00:00', '63.00', '60.00', '2018-02-19 19:48:24', 1),
(94, 0, 2, NULL, 47, 4, '2018-02-01 00:00:00', '2018-02-10 00:00:00', '36.00', '36.00', '2018-02-19 19:48:24', 1),
(95, 0, 1, 117, 3, 1, '2018-02-01 00:00:00', '2018-02-02 00:00:00', '19.0000', '15.00', '2018-02-19 20:03:46', 1),
(96, 0, 1, 117, 6, 1, '2018-02-08 00:00:00', '2018-02-08 00:00:00', '9.8000', '6.00', '2018-02-19 20:03:46', 1),
(97, 0, 1, 118, 4, 1, '2018-02-01 00:00:00', '2018-02-10 00:00:00', '12.0000', '50.00', '2018-02-19 20:05:08', 1),
(98, 0, 1, 118, 60, 1, '2018-02-01 00:00:00', '2018-02-10 00:00:00', '56.00', '50.00', '2018-02-19 20:05:08', 1),
(99, 0, 1, 119, 3, 1, '2018-02-01 00:00:00', '2018-02-15 00:00:00', '19.0000', '15.00', '2018-02-19 20:05:57', 1),
(100, 0, 1, 119, 2, 1, '2018-02-28 00:00:00', '2018-02-22 00:00:00', '17.2000', '15.00', '2018-02-19 20:05:57', 1),
(101, 0, 1, 121, 3, 1, '2018-02-01 00:00:00', '2018-02-10 00:00:00', '19.0000', '15.00', '2018-02-19 20:07:59', 1),
(102, 0, 1, 121, 5, 1, '2018-02-01 00:00:00', '2018-02-17 00:00:00', '10.8000', '6.00', '2018-02-19 20:07:59', 1),
(103, 0, 0, NULL, 1, 1, '2018-02-01 00:00:00', '2018-02-21 00:00:00', '12.8000', '10.00', '2018-02-20 08:09:52', 1),
(104, 0, 0, NULL, 2, 1, '2018-02-07 00:00:00', '2018-02-28 00:00:00', '17.2000', '15.00', '2018-02-20 08:09:52', 1),
(105, 0, 0, NULL, 3, 1, '2018-02-14 00:00:00', '2018-02-23 00:00:00', '19.0000', '15.00', '2018-02-20 08:09:52', 1),
(106, 0, 0, NULL, 4, 1, '2018-02-14 00:00:00', '2018-02-24 00:00:00', '12.0000', '10.00', '2018-02-20 08:09:52', 1),
(107, 0, 0, NULL, 5, 1, '2018-02-06 00:00:00', '2018-02-23 00:00:00', '10.8000', '6.00', '2018-02-20 08:09:52', 1),
(108, 0, 0, NULL, 6, 1, '2018-02-01 00:00:00', '2018-02-26 00:00:00', '9.8000', '6.00', '2018-02-20 08:09:52', 1),
(109, 0, 0, NULL, 7, 1, '2018-02-03 00:00:00', '2018-02-25 00:00:00', '10.5000', '6.00', '2018-02-20 08:09:52', 1),
(110, 0, 0, NULL, 8, 1, '2018-02-03 00:00:00', '2018-02-25 00:00:00', '10.5000', '10.00', '2018-02-20 08:09:52', 1),
(111, 0, 2, NULL, 61, 1, '2018-02-16 00:00:00', '2018-02-08 00:00:00', '10.00', '9.00', '2018-02-19 20:12:51', 1),
(112, 0, 2, NULL, 62, 1, '2018-02-10 00:00:00', '2018-02-17 00:00:00', '9.33', '6.00', '2018-02-19 20:12:51', 1),
(113, 0, 2, NULL, 63, 1, '2018-02-01 00:00:00', '2018-02-17 00:00:00', '63.00', '60.33', '2018-02-19 20:12:51', 1),
(114, 0, 2, NULL, 64, 1, '2018-03-02 00:00:00', '2018-03-17 00:00:00', '25.00', '20.00', '2018-02-19 20:12:52', 1),
(115, 0, 2, NULL, 65, 1, '2018-02-02 00:00:00', '2018-02-10 00:00:00', '56.00', '50.00', '2018-02-19 20:12:52', 1),
(116, 0, 2, NULL, 66, 1, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '25.00', '23.00', '2018-02-19 20:12:52', 1),
(117, 0, 1, 123, 3, 2, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '19.0000', '10.00', '2018-02-19 20:25:53', 1),
(118, 0, 1, 124, 73, 2, '2018-02-01 00:00:00', '2018-02-02 00:00:00', '25.00', '20.00', '2018-02-19 20:27:04', 1),
(119, 0, 1, 126, 4, 2, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '12.0000', '15.00', '2018-02-19 20:28:21', 1),
(120, 0, 1, 126, 2, 2, '2018-02-10 00:00:00', '2018-02-22 00:00:00', '17.2000', '15.00', '2018-02-19 20:28:21', 1),
(121, 0, 0, NULL, 2, 2, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '17.2000', '15.00', '2018-02-20 08:30:26', 1),
(122, 0, 0, NULL, 1, 2, '2018-02-02 00:00:00', '2018-02-02 00:00:00', '12.8000', '10.00', '2018-02-20 08:30:26', 1),
(123, 0, 0, NULL, 3, 2, '2018-02-02 00:00:00', '2018-02-08 00:00:00', '19.0000', '15.00', '2018-02-20 08:30:26', 1),
(124, 0, 0, NULL, 4, 2, '2018-02-03 00:00:00', '2018-02-03 00:00:00', '12.0000', '10.00', '2018-02-20 08:30:26', 1),
(125, 0, 0, NULL, 5, 2, '2018-02-02 00:00:00', '2018-02-03 00:00:00', '10.8000', '10.00', '2018-02-20 08:30:26', 1),
(126, 0, 0, NULL, 6, 2, '2018-02-08 00:00:00', '2018-02-15 00:00:00', '9.8000', '6.00', '2018-02-20 08:30:26', 1),
(127, 0, 0, NULL, 7, 2, '2018-02-01 00:00:00', '2018-02-02 00:00:00', '10.5000', '6.00', '2018-02-20 08:30:26', 1),
(128, 0, 0, NULL, 8, 2, '2018-02-06 00:00:00', '2018-02-02 00:00:00', '10.5000', '6.00', '2018-02-20 08:30:26', 1),
(129, 0, 2, NULL, 74, 2, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '10.00', '8.00', '2018-02-19 20:32:21', 1),
(130, 0, 2, NULL, 75, 2, '2018-02-03 00:00:00', '2018-02-10 00:00:00', '25.00', '10.00', '2018-02-19 20:32:21', 1),
(131, 0, 2, NULL, 76, 2, '2018-02-01 00:00:00', '2018-02-01 00:00:00', '25.00', '23.00', '2018-02-19 20:32:21', 1),
(132, 0, 1, 128, 4, 3, '2018-02-01 00:00:00', '2018-02-15 00:00:00', '12.0000', '10.00', '2018-02-19 20:45:51', 1),
(133, 0, 1, 128, 1, 3, '2018-02-09 00:00:00', '2018-02-22 00:00:00', '12.8000', '6.00', '2018-02-19 20:45:51', 1),
(134, 0, 1, 129, 2, 3, '2018-02-01 00:00:00', '2018-02-08 00:00:00', '17.2000', '15.00', '2018-02-19 20:46:18', 1),
(135, 0, 1, 131, 92, 3, '2018-02-10 00:00:00', '2018-02-09 00:00:00', '25.00', '20.00', '2018-02-19 20:48:16', 1),
(136, 0, 1, 131, 93, 3, '2018-02-01 00:00:00', '2018-02-02 00:00:00', '23.00', '22.00', '2018-02-19 20:48:16', 1),
(137, 0, 0, NULL, 2, 3, '2018-02-01 00:00:00', '2018-02-01 00:00:00', '17.2000', '15.00', '2018-02-20 08:49:59', 1),
(138, 0, 0, NULL, 2, 3, '2018-02-01 00:00:00', '2018-02-02 00:00:00', '17.2000', '15.00', '2018-02-20 08:49:59', 1),
(139, 0, 0, NULL, 3, 3, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '19.0000', '15.00', '2018-02-20 08:49:59', 1),
(140, 0, 0, NULL, 4, 3, '2018-02-01 00:00:00', '2018-02-01 00:00:00', '12.0000', '10.00', '2018-02-20 08:49:59', 1),
(141, 0, 0, NULL, 5, 3, '2018-02-01 00:00:00', '2018-02-01 00:00:00', '10.8000', '6.00', '2018-02-20 08:49:59', 1),
(142, 0, 0, NULL, 6, 3, '2018-02-01 00:00:00', '2018-02-15 00:00:00', '9.8000', '6.00', '2018-02-20 08:49:59', 1),
(143, 0, 0, NULL, 7, 3, '2018-02-01 00:00:00', '2018-02-09 00:00:00', '10.5000', '6.00', '2018-02-20 08:49:59', 1),
(144, 0, 0, NULL, 8, 3, '2018-02-01 00:00:00', '2018-02-23 00:00:00', '10.5000', '6.00', '2018-02-20 08:49:59', 1),
(145, 0, 2, NULL, 94, 3, '2018-02-02 00:00:00', '2018-02-03 00:00:00', '10.00', '5.60', '2018-02-19 20:51:50', 1),
(146, 0, 2, NULL, 95, 3, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '56.00', '50.00', '2018-02-19 20:51:50', 1),
(147, 0, 2, NULL, 96, 3, '2018-02-03 00:00:00', '2018-02-10 00:00:00', '25.00', '23.00', '2018-02-19 20:51:50', 1),
(148, 0, 2, NULL, 97, 3, '2018-02-03 00:00:00', '2018-02-14 00:00:00', '12.00', '10.00', '2018-02-19 20:51:50', 1),
(149, 0, 2, NULL, 98, 3, '2018-02-10 00:00:00', '2018-02-23 00:00:00', '65.00', '60.00', '2018-02-19 20:51:50', 1),
(150, 1, 1, 133, 3, NULL, '2018-02-01 00:00:00', '2018-02-14 00:00:00', '19.0000', '15.000', '2018-02-19 21:11:40', 1),
(151, 1, 1, 133, 5, NULL, '2018-02-02 00:00:00', '2018-02-15 00:00:00', '10.8000', '7.000', '2018-02-19 21:11:40', 1),
(152, 1, 1, 133, 7, NULL, '2018-02-03 00:00:00', '2018-02-16 00:00:00', '10.5000', '9.000', '2018-02-19 21:11:40', 1),
(153, 1, 1, 135, 1, NULL, '2018-02-03 00:00:00', '2018-02-10 00:00:00', '12.8000', '9.80', '2018-02-19 21:14:33', 1),
(154, 1, 1, 135, 3, NULL, '2018-02-03 00:00:00', '2018-02-10 00:00:00', '19.0000', '2.00', '2018-02-19 21:14:33', 1),
(155, 1, 1, 135, 8, NULL, '2018-02-16 00:00:00', '2018-02-14 00:00:00', '10.5000', '8.80', '2018-02-19 21:14:33', 1),
(156, 1, 1, 135, 115, NULL, '2018-02-09 00:00:00', '2018-02-10 00:00:00', '10.00', '9.80', '2018-02-19 21:14:34', 1),
(157, 1, 1, 135, 116, NULL, '2018-02-01 00:00:00', '2018-02-10 00:00:00', '5.00', '2.00', '2018-02-19 21:14:34', 1),
(158, 1, 1, 135, 117, NULL, '2018-02-10 00:00:00', '2018-02-14 00:00:00', '10.00', '8.80', '2018-02-19 21:14:35', 1),
(159, 1, 1, 137, 1, NULL, '2018-02-01 00:00:00', '2018-02-16 00:00:00', '12.8000', '9.000', '2018-02-19 21:16:05', 1),
(160, 1, 1, 137, 3, NULL, '2018-02-15 00:00:00', '2018-02-01 00:00:00', '19.0000', '15.000', '2018-02-19 21:16:05', 1),
(161, 1, 1, 137, 4, NULL, '2018-02-15 00:00:00', '2018-02-09 00:00:00', '12.0000', '9.000', '2018-02-19 21:16:05', 1),
(162, 1, 1, 138, 1, NULL, '2018-02-02 00:00:00', '2018-02-03 00:00:00', '12.8000', '9.000', '2018-02-19 21:16:46', 1),
(163, 1, 1, 138, 2, NULL, '2018-02-16 00:00:00', '2018-02-15 00:00:00', '17.2000', '15.000', '2018-02-19 21:16:46', 1),
(164, 1, 1, 138, 3, NULL, '2018-02-15 00:00:00', '2018-02-23 00:00:00', '19.0000', '15.000', '2018-02-19 21:16:46', 1),
(165, 1, 1, 139, 2, NULL, '2018-02-15 00:00:00', '2018-02-21 00:00:00', '17.2000', '15.000', '2018-02-19 21:17:11', 1),
(166, 1, 0, NULL, 1, NULL, '2018-02-01 00:00:00', '2018-02-28 00:00:00', '12.8000', '15.000', '2018-02-20 09:18:50', 1),
(167, 1, 0, NULL, 2, NULL, '2018-02-02 00:00:00', '2018-02-27 00:00:00', '17.2000', '9.000', '2018-02-20 09:18:50', 1),
(168, 1, 0, NULL, 3, NULL, '2018-02-03 00:00:00', '2018-02-26 00:00:00', '19.0000', '15.000', '2018-02-20 09:18:50', 1),
(169, 1, 0, NULL, 4, NULL, '2018-02-04 00:00:00', '2018-02-25 00:00:00', '12.0000', '9.000', '2018-02-20 09:18:50', 1),
(170, 1, 0, NULL, 5, NULL, '2018-02-05 00:00:00', '2018-02-24 00:00:00', '10.8000', '9.25', '2018-02-20 09:18:50', 1),
(171, 1, 0, NULL, 6, NULL, '2018-02-06 00:00:00', '2018-02-23 00:00:00', '9.8000', '9.000', '2018-02-20 09:18:50', 1),
(172, 1, 0, NULL, 7, NULL, '2018-02-07 00:00:00', '2018-02-22 00:00:00', '10.5000', '9.000', '2018-02-20 09:18:50', 1),
(173, 1, 0, NULL, 8, NULL, '2018-02-08 00:00:00', '2018-02-21 00:00:00', '10.5000', '9.000', '2018-02-20 09:18:50', 1),
(174, NULL, 2, NULL, 118, NULL, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '10.00', '9.00', '2018-02-19 21:20:58', 1),
(175, NULL, 2, NULL, 119, NULL, '2018-02-03 00:00:00', '2018-02-06 00:00:00', '10.00', '9.00', '2018-02-19 21:20:58', 1),
(176, NULL, 2, NULL, 120, NULL, '2018-02-03 00:00:00', '2018-02-15 00:00:00', '13.00', '12.00', '2018-02-19 21:20:58', 1),
(177, NULL, 2, NULL, 121, NULL, '2018-04-12 00:00:00', '2018-02-24 00:00:00', '85.00', '68.00', '2018-02-19 21:20:58', 1),
(178, NULL, 2, NULL, 122, NULL, '2018-02-09 00:00:00', '2018-02-11 00:00:00', '36.00', '35.00', '2018-02-19 21:20:58', 1),
(179, NULL, 2, NULL, 123, NULL, '2018-02-01 00:00:00', '2018-02-03 00:00:00', '50', '45', '2018-02-20 09:22:15', 0),
(180, NULL, 2, NULL, 124, NULL, '2018-02-02 00:00:00', '2018-02-03 00:00:00', '10.00', '10.00', '2018-02-19 21:22:54', 1),
(181, 1, 1, 142, 1, NULL, '2018-02-20 00:00:00', '2018-03-31 00:00:00', '12.8000', '1', '2018-02-20 07:51:56', 1),
(182, 1, 1, 142, 7, NULL, '2018-02-20 00:00:00', '2018-03-31 00:00:00', '10.5000', '1', '2018-02-20 07:51:56', 1),
(183, 1, 1, 142, 125, NULL, '2018-02-20 00:00:00', '2018-03-31 00:00:00', '1', '1', '2018-02-20 07:51:56', 1),
(184, 1, 0, NULL, 1, NULL, '2018-02-20 00:00:00', '2018-02-28 00:00:00', '12.8000', '23', '2018-02-20 20:03:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_message`
--

CREATE TABLE `personal_message` (
  `personal_message_id` int(10) UNSIGNED NOT NULL,
  `ref_personal_message_message_id` int(10) UNSIGNED NOT NULL,
  `ref_personal_message_app_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmacy_id` int(10) UNSIGNED NOT NULL,
  `ragione_sociale` text NOT NULL,
  `indirizzo` text,
  `cap` varchar(150) DEFAULT NULL,
  `citta` varchar(250) DEFAULT NULL,
  `provincia` varchar(250) DEFAULT NULL,
  `piva` varchar(250) DEFAULT NULL,
  `longitudine` varchar(100) DEFAULT '0',
  `latitudine` varchar(100) DEFAULT '0',
  `telefono` text,
  `fax` text,
  `email` text,
  `url` text,
  `url_app` text,
  `ecommerce_locale` text,
  `pharmacy_from_json` tinyint(2) DEFAULT '1' COMMENT '1 means existing pharmacy from system',
  `pharmacy_added_by_super_admin` tinyint(2) DEFAULT '0' COMMENT '1 means pharmacy ic created by super admin and 0 means coming from json',
  `pharmacy_active` tinyint(2) DEFAULT '1',
  `pharmacy_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pharmacy_logo_storage_path` varchar(500) DEFAULT NULL,
  `pharmacy_facebook_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`pharmacy_id`, `ragione_sociale`, `indirizzo`, `cap`, `citta`, `provincia`, `piva`, `longitudine`, `latitudine`, `telefono`, `fax`, `email`, `url`, `url_app`, `ecommerce_locale`, `pharmacy_from_json`, `pharmacy_added_by_super_admin`, `pharmacy_active`, `pharmacy_updated_date_time`, `pharmacy_logo_storage_path`, `pharmacy_facebook_url`) VALUES
(1, 'ABENAVOLI DR.ROSA ALBA', 'VIA RIPARO N.77-CANNAVO\'', '89133', 'REGGIO CALABRIA', 'RC', '00519170807', '15.688561400000026', '38.1012226', '0965 673777', NULL, 'sergiogiuseppeabenavoli@virgilio.it', 'http://www.accentosalute.it/A10', 'http://www.accentosalute.it/A10/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(2, 'ADAM FARMA DI ALESSANDRO', 'VIA SOLFATARA 4D/4E', '80078', 'POZZUOLI', 'NA', '08113401213', '14.126241299999947', '40.8253235', '081 5262364', NULL, 'adamfarma@outlook.com', 'http://www.accentosalute.it/A24', 'http://www.accentosalute.it/A24/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(3, 'ADDANTE DR.NICOLA', 'VIA BARI 19', '70010', 'VALENZANO', 'BA', '07404850724', '16.88446490000001', '41.0431588', '080 4671426', NULL, 'adnicola@libero.it', 'http://www.accentosalute.it/A269', 'http://www.accentosalute.it/A269/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(4, 'AIELLO SAS DI GIUSEPPE AIELLO', 'P.ZZA DE GRAZIA 17', '88838', 'MESORACA', 'KR', '03435160795', '16.788873500000022', '39.081264', '096245210', NULL, 'farmaciaaiellosas2@libero.it', 'http://www.accentosalute.it/A15', 'http://www.accentosalute.it/A15/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(5, 'AIELLO SAS DI RIZZA ROSANNA &C', 'P.ZZA FILOTTETE 37', '88837', 'PETILIA POLICASTRO', 'KR', '03485240794', '16.79075039999998', '39.1111918', '0962-431021', NULL, 'info@sefarm.it', 'http://www.accentosalute.it/A27', 'http://www.accentosalute.it/A27/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(6, 'ALBRICCI SNC DR.MARIAROSARIA', 'C.SO GARIBALDI 88', '85040', 'RIVELLO', 'PZ', '01732350762', '15.759318000000007', '40.079253', '0973 46639', NULL, 'farmacia-albricci@hotmail.it', 'http://www.accentosalute.it/A305', 'http://www.accentosalute.it/A305/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(7, 'ALOE DR.ANTONIO VICENTE', 'Centro commerciale Due Mari', '88025', 'Maida', 'CZ', '00440740793', '16.350504755973816', '38.900222174558415', '0968 1945622', '', 'aloeant@libero.it', 'http://www.accentosalute.it/A344', 'http://www.accentosalute.it/A344/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(8, 'AMATO D.SSA IMMA', 'VIA ROMA 12', '80045', 'POMPEI', 'NA', '08236831213', '14.498200300000008', '40.7495898', '0818507264', NULL, 'maxdea@tin.it', 'http://www.accentosalute.it/A36', 'http://www.accentosalute.it/A36/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(9, 'AMENDOLA DI LIMARDI FOCA & C.', 'CORSO CASTELMONARDO 82', '89814', 'FILADELFIA', 'VV', '03427100791', '16.29237999999998', '38.783682', '0968-724547', NULL, 'farmaciaamendola@tiscali.it', 'http://www.accentosalute.it/A348', 'http://www.accentosalute.it/A348/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(10, 'ANCONA DEI DOTT.RI GENTILE-', 'C.SO AMENDOLA 5/D', '60123', 'ANCONA', 'AN', '02284270424', '13.520564599999943', '43.6175111', '071 204142', NULL, 'farmaciaancona@tin.it', 'http://www.accentosalute.it/A42', 'http://www.accentosalute.it/A42/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(11, 'ANFUSO D.SSA ANGELA*DISP.', 'LOCALITA\' FAVACO', '89040', 'STIGNANO', 'RC', '00709750806', '16.485498300000017', '38.3592098', '0964 773034', NULL, 'farmacia.anfuso@virgilio.it', 'http://www.accentosalute.it/A363', 'http://www.accentosalute.it/A363/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(12, 'ANTICA FARMACIA G.CASTELLANI', 'VIA G.DEL PAPA,24', '50053', 'EMPOLI', 'FI', '05483670484', '10.947811999999999', '43.719309', '0571-72039', NULL, 'info@farmaciacastellani.com', 'http://www.accentosalute.it/A366', 'http://www.accentosalute.it/A366/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(13, 'ANTONIO JORIO & C. SAS', 'VIA VOLTA 31/37', '87036', 'RENDE', 'CS', '00385910781', '16.24388769999996', '39.3517946', '0984839215', NULL, 'farmaciajorio@alice.it', 'http://www.accentosalute.it/A333', 'http://www.accentosalute.it/A333/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(14, 'APPIA DR.CENICCOLA JOHN', 'C.SO ITALIA 89', '04022', 'FONDI', 'LT', '01589520590', '13.431557699999985', '41.3546191', '0771-500958', NULL, '10296@pec2.federfarma.it', 'http://www.accentosalute.it/A53', 'http://www.accentosalute.it/A53/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(15, 'ARPINO SAS', 'VIA DOMENICO COLASANTO N.14C', '80026', 'CASORIA', 'NA', '06119241211', '14.308018199999992', '40.8787744', '081-5848913', NULL, 'farmaciaarpino@virgilio.it', 'http://www.accentosalute.it/A272', 'http://www.accentosalute.it/A272/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(16, 'ASCIUTTI DR.SSA MARIA TERESA', 'VIA CROCE, 33', '89024', 'POLISTENA', 'RC', '01569640806', '16.079672200000005', '38.4056424', '0966/932157', NULL, 'farmacia_asciutti@virgilio.it', 'http://www.accentosalute.it/A34', 'http://www.accentosalute.it/A34/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(17, 'BAGNATO DR.CONCETTO', 'VIA NAZIONALE,115-PLAESANO', '89050', 'FEROLETO DELLA CHIESA', 'RC', '00124010802', '16.08037330000002', '38.4723313', '0966/996064', NULL, 'farmacia.bagnato@tiscali.it', 'http://www.accentosalute.it/A14', 'http://www.accentosalute.it/A14/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(18, 'BARTONE - ROTIROTI SNC DI', 'VIA GENERALE FILARDO 78', '89832', 'ARENA', 'VV', '03215150792', '16.21107380000001', '38.5622143', '0963355600', NULL, 'giovanni.rotiroti@live.it', 'http://www.accentosalute.it/A376', 'http://www.accentosalute.it/A376/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(19, 'BATTAGLIA DR. ANTONIO', 'VIA CARDISCO, 33', '89014', 'MESSIGNADI', 'RC', '00621740802', '15.99877200000003', '38.297938', '096686260', NULL, '14310@pec.federfarma.it', 'http://www.accentosalute.it/A50', 'http://www.accentosalute.it/A50/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(20, 'BELARDINELLI DURANTE RICCIARDA', 'VIA GOBETTI 4', '74121', 'TARANTO', 'TA', '02559350737', '17.440671599999973', '40.53681539999999', '099 7795106', NULL, 'farm_belardinelli@libero.it', 'http://www.accentosalute.it/A306', 'http://www.accentosalute.it/A306/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(21, 'BIANCHI SAS DR.MARIALUIGIA BIA', 'VIA G.DA FIORE', '88900', 'CROTONE', 'KR', '03138150796', '17.113642099999993', '39.0699954', '0962-964762', NULL, 'farmaciabianchisas.kr@gmail.com', 'http://www.accentosalute.it/A16', 'http://www.accentosalute.it/A16/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(22, 'BIANCO-CURTO SNC - D.SSE ANNA', 'P.ZZA ARGENTO 4', '73100', 'LECCE', 'LE', '04060890755', '18.170749999999998', '40.34650999999999', '0832307950', NULL, 'farmbianco@tin.it', 'http://www.accentosalute.it/A54', 'http://www.accentosalute.it/A54/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(23, 'BIMBI S.A.S.', 'VIA LOGHETTO N.8', '55033', 'CASTIGLIONE DI GARFAGNANA', 'LU', '02131520468', '10.412788999999975', '44.150014', '0583-68156', NULL, '07532@PEC.FEDERFARMA.IT', 'http://www.accentosalute.it/A302', 'http://www.accentosalute.it/A302/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(24, 'BOCCUNI D.SSA MARIA ADELE', 'VIA MARTINA, 18', '74012', 'CRISPIANO', 'TA', '02058620739', '17.235656199999994', '40.6049144', '099/612950', NULL, 'info@farmaciaboccuni.it', 'http://www.accentosalute.it/A313', 'http://www.accentosalute.it/A313/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(25, 'BORSO\' DR.MASETTI FRANCO', 'VIA CARLO ALBERTO N.3', '04016', 'SABAUDIA', 'LT', '02090950599', '13.03159149999999', '41.29965240000001', '0773 517218', NULL, 'looganit@yahoo.it', 'http://www.accentosalute.it/A327', 'http://www.accentosalute.it/A327/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(26, 'BOSSIO DR.DOMENICO', 'CORSO ALDO MORO,173', '87020', 'MARINA DI TORTORA', 'CS', '00925280786', '15.771580500000027', '39.9111754', '098572388', NULL, 'damibossio@libero.it', 'http://www.accentosalute.it/A371', 'http://www.accentosalute.it/A371/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(27, 'BRUNO DOTT. MARTINO & C. S.A.S', 'VIA E. RUGGIERO, 74', '81100', 'CASERTA', 'CE', '02101490619', '14.338913400000024', '41.081502', '0823325337', NULL, 'FARMBRU@TIN.IT', 'http://www.accentosalute.it/A351', 'http://www.accentosalute.it/A351/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(28, 'BRUNO SNC DI PATRIZIA E', 'VIA MARCHESIELLO PARCO SCALA', '81100', 'CASERTA', 'CE', '04074360613', '14.357765599999993', '41.0785503', '0823343493', NULL, 'farmaciabrunocaserta@gmail.com', 'http://www.accentosalute.it/A352', 'http://www.accentosalute.it/A352/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(29, 'BRUSUGLIO DR. PONTAROLLO ELENA', 'VIA VITTORIO VENETO, 27', '20032', 'CORMANO', 'MI', '04329610960', '9.176233899999943', '45.5395867', '02 6151781', NULL, 'FARMACIABRUSUGLIO@HOTMAIL.COM', 'http://www.accentosalute.it/A55', 'http://www.accentosalute.it/A55/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(30, 'CATERA-BOSSIO DI BOSSIO V. E', 'VIA P.ROSSI 3', '87100', 'COSENZA', 'CS', '03193290784', '16.247663500000044', '39.3028166', '0984 75881', NULL, 'bossiocatera@libero.it', 'http://www.accentosalute.it/A370', 'http://www.accentosalute.it/A370/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(31, 'CENTRALE DR.ADRIANO MONTELEONE', 'C.SO VITTORIO EMANUELE III 99', '89900', 'VIBO VALENTIA', 'VV', '03367560798', '16.101067599999965', '38.6738723', '0963 42042', NULL, '14213@pec.federfarma.it', 'http://www.accentosalute.it/A368', 'http://www.accentosalute.it/A368/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(32, 'CENTRALE DR.ANTONIO SCHIAPPA', 'VIA GARIBALDI,2', '00028', 'SUBIACO', 'RM', '07908661007', '13.096089600000028', '41.9241365', '0774-85521', NULL, 'a.schiappa@libero.it', 'http://www.accentosalute.it/A338', 'http://www.accentosalute.it/A338/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(33, 'CENTRALE DR.CALOGERO RAFFAELE', 'VIA CAVOUR,33', '04014', 'PONTINIA', 'LT', '01086560594', '13.04609000000005', '41.40855', '0773.86029', NULL, 'rafcal.rc54@gmail.com', 'http://www.accentosalute.it/A281', 'http://www.accentosalute.it/A281/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(34, 'CENTRALE DR.POZZUOLI FAUSTO', 'PIAZZA GIOVANNI XXIII', '81056', 'SPARANISE', 'CE', '03849860618', '14.095985100000007', '41.1905455', '0823 874057', NULL, 'farmacentral@tiscali.it', 'http://www.accentosalute.it/A39', 'http://www.accentosalute.it/A39/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(35, 'CINQUE GIORNATE S.N.C. DEL DR.', 'PIAZZA 5 GIORNATE, 7', '20129', 'MILANO', 'MI', '07111920968', '9.207896600000026', '45.4625064', '02/55184483', NULL, 'farmacinquegiornate@libero.it', 'http://www.accentosalute.it/A18', 'http://www.accentosalute.it/A18/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(36, 'COBELLI S.A.S DEL DR. CERIMELE', 'VIA MAZZINI 10', '38068', 'ROVERETO', 'TN', '02218940225', '11.043200299999967', '45.8900374', '0464 421270', NULL, 'farmaciacobelli@gmail.com', 'http://www.accentosalute.it/A56', 'http://www.accentosalute.it/A56/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(37, 'COLLEMARINO DELLA DR.SSA', 'P.ZZA GALILEO GALILEI 4', '60126', 'COLLEMARINO DI ANCONA', 'AN', '02516810427', '13.42801380000003', '43.6126786', '071 882210', NULL, 'farmaciacollemarino@live.it', 'http://www.accentosalute.it/A43', 'http://www.accentosalute.it/A43/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(38, 'CONTE DR.ANGELALBA', 'C.SO GARIBALDI 127', '70038', 'TERLIZZI', 'BA', '03711740724', '16.54024490000006', '41.1299838', '080 3516271', NULL, 'contefarma@gmail.com', 'http://www.accentosalute.it/A311', 'http://www.accentosalute.it/A311/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(39, 'CORBO DOTT.SSA SIMONETTA', NULL, '81037', 'SESSA AURUNCA', 'CE', '03398250617', '13.894450600000027', '41.1147543', '0823 937223', NULL, 'farmaciacorbo@alice.it', 'http://www.accentosalute.it/A359', 'http://www.accentosalute.it/A359/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(40, 'CORRADO DR.SSA ALIDA', 'C/SO GARIBALDI N.37', '87010', 'FIRMO', 'CS', '03344160787', '16.175880000000006', '39.722248', '0981.940017', NULL, 'farmacia.cellie@live.it', 'http://www.accentosalute.it/A57', 'http://www.accentosalute.it/A57/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(41, 'CORSARO DR.MICHELE GRAZZINI', 'Via Lucchese, 180', '51010', 'Uzzano', 'PT', '01585950478', '10.703248400000007', '43.8833148', '0572/444356', '', 'farmaciacorsaro@alice.it', 'http://www.accentosalute.it/A297', 'http://www.accentosalute.it/A297/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(42, 'COSTABILE ANTONIO', 'VIA POSIDONIA,272', '84100', 'Salerno', 'SA', '00666670658', '14.792567700000063', '40.665794', '089 725012', '', 'fcostabile1@virgilio.it', 'http://www.accentosalute.it/A309', 'http://www.accentosalute.it/A309/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(43, 'COSTABILE ANTONIO DI PIETRO', 'Via Silvio Baratta, 2', '84100', 'Salerno', 'SA', '02138230657', '14.776479999999992', '40.6771621', '089 791401', '', 'antonello.costabile@email.it', 'http://www.accentosalute.it/A303', 'http://www.accentosalute.it/A303/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(44, 'D\'ALESSANDRO D.SSA FLAVIA', 'V.LE MARTIRI, 119', '70022', 'ALTAMURA', 'BA', '04507280727', '16.559553999999935', '40.823602', '080/311.41.52', NULL, 'flaviadalessandro@libero.it', 'http://www.accentosalute.it/A372', 'http://www.accentosalute.it/A372/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(45, 'D\'ALOJA & C. SNC', 'C.SO UMBERTO 142', '74021', 'CAROSINO', 'TA', '02810580734', '17.396556799999985', '40.4634279', '099 5929351', NULL, 'elio.farma@libero.it', 'http://www.accentosalute.it/A2', 'http://www.accentosalute.it/A2/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(46, 'D\'AMBRA PASQUALINO', NULL, '81030', 'CASTEL VOLTURNO', 'CE', '00000000001', '13.942284800000039', '41.03478519999999', '', NULL, 'pasqualinodambra@gmail.com', 'http://www.accentosalute.it/A1', 'http://www.accentosalute.it/A1/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(47, 'D\'ATRI DOTT.ARMANDO', 'VIA ROMA,27', '87012', 'CASTROVILLARI', 'CS', '02594430783', '16.203026200000068', '39.8122529', '0981-21078', NULL, 'armando.datri@tin.it', 'http://www.accentosalute.it/A292', 'http://www.accentosalute.it/A292/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(48, 'D\'ERRICO MICHELE', 'CORSO UMBERTO, N.108', '82034', 'GUARDIA SANFRAMONDI', 'BN', '00726870629', '14.597212600000034', '41.2556689', '0824817828', NULL, 'farmacia_derrico@pec.federfarmabenevento.it', 'http://www.accentosalute.it/A61', 'http://www.accentosalute.it/A61/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(49, 'D\'ONGHIA DR.FRANCESCO ANTONIO', 'C.SO VITTORIO EMANUELE 70', '74017', 'MOTTOLA', 'TA', '00310180732', '17.03919510000003', '40.63363469999999', '099 886 3046', NULL, 'farmaciadonghiadr.francesco@tin.it', 'http://www.accentosalute.it/A300', 'http://www.accentosalute.it/A300/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(50, 'DE BIASI D.SSA MARTA', 'P ZZA GARIBALDI 102', '80142', 'NAPOLI', 'NA', '07592070630', '14.270625699999982', '40.8517547', '081 266331', NULL, 'farmaciadebiasi@virgilio.it', 'http://www.accentosalute.it/A310', 'http://www.accentosalute.it/A310/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(51, 'DE CHIARA DI DR.SSA GIUSEPPINA', 'VIA FELICE DE STEFANO', '83029', 'SOLOFRA', 'AV', '02815140641', '14.849480299999982', '40.8310505', '0825 581092', NULL, 'farmaciadechiara@gmail.com', 'http://www.accentosalute.it/A322', 'http://www.accentosalute.it/A322/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(52, 'DE CHIARA SAS', 'VIA FELICE DE STEFANO', '83029', 'SOLOFRA', 'AV', '02815140641', '14.849480299999982', '40.8310505', '0825581092', NULL, 'farmaciadechiara@gmail.com', 'http://www.accentosalute.it/A8', 'http://www.accentosalute.it/A8/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(53, 'DE FALCO DOTT  GIOVANNI', 'VIA PROVINCIALE, 20', '80100', 'NAPOLI', 'NA', '07498970636', '14.171420000000012', '40.86046', '081/7261372', NULL, 'farmaciagiannidefalco@gmail.com', 'http://www.accentosalute.it/A58', 'http://www.accentosalute.it/A58/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(54, 'DE SALVIA DR.ADRIAN.DI RUBERTO', 'C.SO SKANDEMBERG,64', '71030', 'CASALVECCHIO DI PUGLIA', 'FG', '03464660715', '15.111037899999928', '41.5947572', '0881-553001', NULL, 'farmacia.desalvia@gmail.com', 'http://www.accentosalute.it/A350', 'http://www.accentosalute.it/A350/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(55, 'DE VITA DI DE VITA PIETRO & C.', 'CORSO VITTORIO EMANUELE III 46', '80021', 'AFRAGOLA', 'NA', '07795591218', '14.305083299999978', '40.9228528', '081 8525903', NULL, 'farm.devita@alice.it', 'http://www.accentosalute.it/A22', 'http://www.accentosalute.it/A22/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(56, 'DEFILIPPO DOTT.PIETRO SNC', 'VIA A.MIGLIACCIO 33', '88024', 'GIRIFALCO', 'CZ', '01938100797', '16.42512099999999', '38.82421', '0968 749224', NULL, '14114@PEC.FEDERFARMA.IT', 'http://www.accentosalute.it/A276', 'http://www.accentosalute.it/A276/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(57, 'DEGLI ULIVI DEI D.RI NAGLIERI', 'VIA G.GARIBALDI 34/B', '70020', 'TORITTO', 'BA', '07885890728', '16.676733300000024', '40.99622979999999', '', NULL, 'farmaciailivi@gmail.com', 'http://www.accentosalute.it/A375', 'http://www.accentosalute.it/A375/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(58, 'DEL BENESSERE DI DELL\'ORCO', 'VIA MONFALCONE 19', '70124', 'BARI', 'BA', '07551100725', '16.871617300000025', '41.1110563', '0805424704', NULL, 'farmaciadelbenesserebari@gmail.com', 'http://www.accentosalute.it/A334', 'http://www.accentosalute.it/A334/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(59, 'DEL GESU\' DR.SA MARUGY M.BENED', 'VIA PIGNA 20', '80020', 'CRISPANO', 'NA', '05817991218', '14.28895179999995', '40.951814', '081.8302200', NULL, 'farmaciadelgesu@tiscali.it', 'http://www.accentosalute.it/A355', 'http://www.accentosalute.it/A355/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(60, 'DEL LEONE DOTT. FULVIO CORVINO', 'CORSO UMBERTO I, 333/335', '81033', 'CASAL DI PRINCIPE', 'CE', '02407820618', '14.126548700000058', '41.0063085', '081 8921049', NULL, 'farmaciadelleone@tin.it', 'http://www.accentosalute.it/A354', 'http://www.accentosalute.it/A354/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(61, 'DEL MARE DE FALCO&C.SAS(V.EMA)', 'C.SO VITTORIO EMANUELE 474/476', '80121', 'NAPOLI/VIA EMANUELE', 'NA', '05636891219', '14.221479999999929', '40.83629', '081 5493400', NULL, 'farmaciadefalcosimon@gmail.com', 'http://www.accentosalute.it/A60', 'http://www.accentosalute.it/A60/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(62, 'DEL MARE DE FALCO&C.SAS-NAPOLI', 'VIA MATTEO REN.IMBRIANI 89/90', '80136', 'NAPOLI', 'NA', '05636891219', '14.241071899999952', '40.854666', '081.5441414', NULL, 'farmaciadefalcosimon@alice.it', 'http://www.accentosalute.it/A49', 'http://www.accentosalute.it/A49/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(63, 'DEL PANDA SAS DR.BARDARO TEODO', 'VIA NAZIONALE 673', '80059', 'TORRE DEL GRECO', 'NA', '06633611212', '14.410238599999957', '40.7678849', '081 8831891', NULL, 'farmacia.delpanda@libero.it', 'http://www.accentosalute.it/A314', 'http://www.accentosalute.it/A314/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(64, 'DEL PONTE DI PANSINI MARIA E', 'VIA ARISTOSSENO 3', '70126', 'BARI', 'BA', '07734770725', '16.887297200000035', '41.1150062', '080 5539659', NULL, 'farmaciadelponte@fastwebnet.it', 'http://www.accentosalute.it/A290', 'http://www.accentosalute.it/A290/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(65, 'DEL PRETE DR.AGUSTO CORRADO', 'P.ZZA S.GIOVANNI 4', '74028', 'SAVA', 'TA', '02687010732', '17.557398000000035', '40.404175', '099 9747144', NULL, 'info@farmaciadelprete.it', 'http://www.accentosalute.it/A266', 'http://www.accentosalute.it/A266/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(66, 'DEL PRETE SNC DI M.GABRIELLA &', 'C.SO UMBERTO 42', '74020', 'SAN MARZANO DI S.GIUSEPPE', 'TA', '01903010732', '17.50498600000003', '40.450407', '099 9574210', NULL, 'info@farmaciadelprete.net', 'http://www.accentosalute.it/A277', 'http://www.accentosalute.it/A277/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(67, 'DEL ROSARIO DR.SSA STEARDO', 'VIA MESSIGNO,146', '80045', 'POMPEI', 'NA', '01120721210', '14.504201999999964', '40.736236', '081-8507333', NULL, 'farmaciadelrosario@tiscali.it', 'http://www.accentosalute.it/A282', 'http://www.accentosalute.it/A282/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(68, 'DELL\'IMMACOLATA D.SSA IODICE', 'V.LE KENNEDY,58', '81055', 'SANTA MARIA CAPUA VETERE', 'CE', '02037520612', '14.26357489999998', '41.0803005', '0823589137', NULL, 'farmaiodice@gmail.com', 'http://www.accentosalute.it/A343', 'http://www.accentosalute.it/A343/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(69, 'DELLA VILLA S.N.C.', 'VIA PAPA PIO XII 59', '70013', 'CASTELLANA GROTTE', 'BA', '07885050729', '17.165614699999992', '40.8785563', '3487500440', NULL, 'leonardopetrelli@alice.it', 'http://www.accentosalute.it/A379', 'http://www.accentosalute.it/A379/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(70, 'DI BONASSOLA DR.SSA MIRIAM', 'VIA DANERI 38', '19011', 'BONASSOLA', 'SP', '02432750467', '9.583058299999948', '44.1841651', '0187813669', NULL, 'farmaciabonassola@pec.it', 'http://www.accentosalute.it/A23', 'http://www.accentosalute.it/A23/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(71, 'DI PRIMA DR.DI PRIMA ALESSANDR', 'VIA GENOVA 186', '19100', 'LA SPEZIA', 'SP', '01290480118', '9.802923299999975', '44.1185171', '0187-702585', NULL, 'farmacia.diprima@gmail.com', 'http://www.accentosalute.it/A32', 'http://www.accentosalute.it/A32/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(72, 'DI RUBERTO DR. ROSA ANNA', 'VIA LEONE XIII, 185', '71100', 'FOGGIA', 'FG', '02398380713', '15.566469200000029', '41.4630587', '0881727667', NULL, 'diruberto.rosanna@libero.it', 'http://www.accentosalute.it/A349', 'http://www.accentosalute.it/A349/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(73, 'DONADIO DR.MARIA TERESA', 'VIA ALDO MORO 12', '74014', 'LATERZA', 'TA', '02668920784', '16.799075899999934', '40.6294309', '099-8297405', NULL, 'mariateresadonadio@tiscali.it', 'http://www.accentosalute.it/A294', 'http://www.accentosalute.it/A294/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(74, 'EREDI TAMBURRINO DR.PROVEZZA', 'P.ZZA LIBERTA\' 14/C', '63064', 'CUPRA MARITTIMA', 'AP', '02109900445', '13.8588704', '43.0249202', '0735 777151', NULL, 'farmaciatamburrino@tiscali.it', 'http://www.accentosalute.it/A342', 'http://www.accentosalute.it/A342/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(75, 'FARMACIA BORGONUOVO S.N.C DI', 'VIA ALESSANDRO SCARLATTI,3/C', '59100', 'PRATO', 'PO', '02376640971', '11.072009999999977', '43.89179', '0574/663125', NULL, 'farmaciaborgonuovo@hotmail.com', 'http://www.accentosalute.it/A48', 'http://www.accentosalute.it/A48/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(76, 'FARMACIA D.SSA IMMA AMATO', 'VIA ROMA 12', '80045', 'POMPEI', 'NA', '08236831213', '14.498200300000008', '40.7495898', '0818507264', NULL, 'maxdea@tin.it', 'http://www.accentosalute.it/A382', 'http://www.accentosalute.it/A382/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(77, 'FARMACIA MORGANTI', 'VIA LUCCHESE 60', '51010', 'Pescia', 'PT', '01317920476', '10.677361700000006', '43.8868887', '0572.429007', '', 'info@farmaciamorganti.it', 'http://www.accentosalute.it/farmavaleri', 'http://www.accentosalute.it/farmavaleri/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(78, 'FARMACIA SNC DI FANELLI FONTE-', 'VIA P.TOGLIATTI 55', '70014', 'CONVERSANO', 'BA', '07884900726', '17.108956600000056', '40.9613593', '0804957732', NULL, 'farmaciafari16@gmail.com', 'http://www.accentosalute.it/A380', 'http://www.accentosalute.it/A380/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(79, 'FARMACIE DE FALCO S.A.S. DEL', 'VIA SIMONE MARTINI N.37', '80131', 'NAPOLI', 'NA', '07723011214', '14.223198499999967', '40.8500585', '081 5794233', NULL, 'farmacierenatodefalco@gmail.com', 'http://www.accentosalute.it/A59', 'http://www.accentosalute.it/A59/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(80, 'FESTA RAFFAELE', 'C.SO MUSACCHIO 16', '75022', 'IRSINA', 'MT', '00586280778', '16.242762999999968', '40.745177', '0835629048', NULL, 'farmacia.festa@tiscali.it', 'http://www.accentosalute.it/A320', 'http://www.accentosalute.it/A320/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(81, 'FIAMINGO DR.FRANCESCO-', 'VIA DELLA REPUBBLICA 21', '89841', 'ROMBIOLO', 'VV', '00056810799', '16.00446999999997', '38.59677', '0963 367081', NULL, 'easydb2@tiscali.it', 'http://www.accentosalute.it/A360', 'http://www.accentosalute.it/A360/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(82, 'FILIPPI DR.FUSCHINO ANGELITA', 'VIA AURELIA 257', '19034', 'ORTONOVO', 'SP', '01255560623', '10.030985699999974', '44.06646600000001', '0187-690013', NULL, 'farmacia.filippi@virgilio.it', 'http://www.accentosalute.it/A383', 'http://www.accentosalute.it/A383/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(83, 'FONTE PHARMA S.A.S DI SCHIASSI', 'VIA ROMA 29', '67020', 'Fontecchio', 'AQ', '01985560661', '13.606270399999971', '42.2306765', '086285118', '', 'farmaciafontecchio@gmail.com', 'http://www.accentosalute.it/A62', 'http://www.accentosalute.it/A62/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(84, 'FRAGI PHARMA SAS DI SCHIASSI', 'S.S.17 KM.24,500-GALL.LONGARA', '67019', 'SCOPPITO', 'AQ', '01920060660', '13.255997900000011', '42.3727738', '0862 452274', NULL, 'fragifarma@pec.it', 'http://www.accentosalute.it/A280', 'http://www.accentosalute.it/A280/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(85, 'FRANZOSO D.SSA ANNABELLA', 'VIA S.PANCRAZIO', '72028', 'TORRE SANTA SUSANNA', 'BR', '01534140742', '17.74509480000006', '40.4645381', '0831746014', NULL, 'franzosoannabella@hotmail.com', 'http://www.accentosalute.it/A317', 'http://www.accentosalute.it/A317/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(86, 'FRIULI SNC DI CAMPAGNA S. E', 'V.LE FRIULI 75', '70033', 'CORATO', 'BA', '07889520727', '16.401655000000005', '41.154504', '', NULL, 'farmaciafriuli@libero.it', 'http://www.accentosalute.it/A378', 'http://www.accentosalute.it/A378/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(87, 'FUSCA DR.PRINZI SIMONE', 'VIA M.BIANCHI 112', '89831', 'GEROCARNE', 'VV', '03255450797', '16.21864119999998', '38.5874342', '0963-356030', NULL, '14168@pec.federfarma.it', 'http://www.accentosalute.it/A328', 'http://www.accentosalute.it/A328/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(88, 'FUTURA DI VALLE RHO SAS DI', 'VIA XX SETTEMBRE 4', '20834', 'NOVA MILANESE', 'MB', '09165570962', '9.196460699999989', '45.5889792', '0362451380', NULL, 'farmaciavallerho@gmail.com', 'http://www.accentosalute.it/A28', 'http://www.accentosalute.it/A28/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(89, 'GALBIATI DOTT.GIANFRANCO', 'VIA EMILIA 18', '74100', 'TARANTO', 'TA', '00133010736', '17.257104000000027', '40.4594092', '099 331429', NULL, 'farmaciagalbiati@alice.it', 'http://www.accentosalute.it/A267', 'http://www.accentosalute.it/A267/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(90, 'GIACOVAZZO DR.SSA M.GIUSEPPINA', 'VIA CISTERNINO 100', '70010', 'LOCOROTONDO', 'BA', '04576320727', '17.330105900000035', '40.7545521', '080.431.12.03', NULL, 'farmagiacovazzo@virgilio.it', 'http://www.accentosalute.it/A315', 'http://www.accentosalute.it/A315/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(91, 'GIANNELLI DOTT. VITTORIO', 'VIA FERRUCCIO 5', '73052', 'PARABITA', 'LE', '04770320754', '18.127212999999983', '40.046963', '0833594776', NULL, 'farmaciagiannelli@tiscali.it', 'http://www.accentosalute.it/A365', 'http://www.accentosalute.it/A365/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(92, 'GINETTI MARIA', 'VIA GIANTURCO ,13', '84010', 'RAITO', 'SA', '02761650650', '14.716187200000036', '40.6680238', '089 761633', NULL, 'farmaciaginetti@libero.it', 'http://www.accentosalute.it/A51', 'http://www.accentosalute.it/A51/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(93, 'GIOFFRE\' DI CARBONE DANIELA E', 'VIA XXIV MAGGIO 12', '89011', 'BAGNARA CALABRA', 'RC', '02924810803', '15.809753', '38.28794', '0966371387', NULL, 'farmaciagioffreadalgisa@virgilio.it', 'http://www.accentosalute.it/A63', 'http://www.accentosalute.it/A63/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(94, 'GRASSANO DOTT.ANTONIO', 'P.ZZA VITTORIA N.2', '75010', 'GROTTOLE', 'MT', '01242590774', '16.384357000000023', '40.60109200000001', '0835758469', NULL, 'nello.grassano@gmail.com', 'http://www.accentosalute.it/A9', 'http://www.accentosalute.it/A9/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(95, 'GRASSANO DR.ROCCO', 'VIA GENTILE 7/9', '70022', 'ALTAMURA', 'BA', '00396760779', '16.54445199999998', '40.815335', '080-3102712', NULL, 'roccoinnocenzo.grassano@virgilio.it', 'http://www.accentosalute.it/A335', 'http://www.accentosalute.it/A335/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(96, 'IORIO RICCARDO MARIA', 'VIA A.LABRIOLA', '80100', 'NAPOLI-SECONDIGLIANO', 'NA', '06490150635', '14.239881700000069', '40.8971464', '081 5434561', NULL, 'riccaior@tin.it', 'http://www.accentosalute.it/A46', 'http://www.accentosalute.it/A46/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(97, 'LA GUARDIA ANTONIO', 'VIA COLOMBO 34', '75020', 'SCANZANO JONICO', 'MT', '00071170773', '16.699028', '40.2468578', '0835 953580', NULL, '13692@pec.federfarma.it', 'http://www.accentosalute.it/A275', 'http://www.accentosalute.it/A275/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(98, 'LA MADDALENA DELLA DOTT.SSA', 'VIA RISORGIMENTO 2', '74023', 'GROTTAGLIE', 'TA', '02956130732', '17.429112000000032', '40.534484', '099 5661702', NULL, 'farmacia.lamaddalena@arubapec.it', 'http://www.accentosalute.it/A298', 'http://www.accentosalute.it/A298/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(99, 'LA MADDALENA DI BURDI ROSA', 'VIA RISORGIMENTO 2', '74023', 'GROTTAGLIE', 'TA', '07950860721', '17.429042200000026', '40.534398', '0995661702', NULL, 'farmacia.lamaddalena@yahoo.it', 'http://www.accentosalute.it/A6', 'http://www.accentosalute.it/A6/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(100, 'LA POSTA DR.ORNELLA', 'VIA S.DEL MONACO N.4', '81024', 'MADDALONI', 'CE', '02007870617', '14.38178629999993', '41.03699049999999', '0823434140', NULL, 'farmacialaposta@libero.it', 'http://www.accentosalute.it/A40', 'http://www.accentosalute.it/A40/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(101, 'LA RUGGINOSA SNC DI DR.ALFREDO', 'VIA AURELIA NORD 217/A', '58100', 'GROSSETO', 'GR', '01587120534', '11.09725800000001', '42.7833708', '0564451193', NULL, 'farmacialarugginosa@gmail.com', 'http://www.accentosalute.it/A11', 'http://www.accentosalute.it/A11/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(102, 'LAGANA\' DR.ALBERTO', 'C.SO GARIBALDI,573', '89100', 'REGGIO CALABRIA', 'RC', '00010190809', '15.637870499999963', '38.1031136', '0965-812090', NULL, 'farmacialagana@alice.it', 'http://www.accentosalute.it/A12', 'http://www.accentosalute.it/A12/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(103, 'LAMENDOLA DOTT.ANTONIO & FIGLI', 'VIA D\'AOSTA 12', '74020', 'FAGGIANO', 'TA', '03022270734', '17.386844999999994', '40.420375', '0995912121', NULL, 'farmacialamendola@libero.it', 'http://www.accentosalute.it/A278', 'http://www.accentosalute.it/A278/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(104, 'LATRECCHINA DOTT. ANTONIO', 'C.SO VITTORIO EMANUELE 75', '74020', 'LIZZANO', 'TA', '00763090735', '17.47553300000004', '40.432605', '0999552031', NULL, 'farmacialatrecchina1@libero.it', 'http://www.accentosalute.it/A64', 'http://www.accentosalute.it/A64/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(105, 'LAURO DR.STEFANO', 'VIA GALANTE,17/19', '80046', 'SAN GIORGIO A CREMANO', 'NA', '04998621215', '14.335548199999948', '40.8268971', '081-276360', NULL, 'farmacielauro@libero.it', 'http://www.accentosalute.it/A65', 'http://www.accentosalute.it/A65/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(106, 'LECCESE D.SSA IRENE', 'VIA PIAVE 92', '74020', 'AVETRANA', 'TA', '02055800730', '17.72770539999999', '40.3542478', '099 9707901', NULL, 'farmleccese@libero.it', 'http://www.accentosalute.it/A299', 'http://www.accentosalute.it/A299/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(107, 'LIGUORI S.A.S. DELLA DOTT.SSA', 'VIA MARCONI N.9', '80026', 'CASORIA', 'NA', '08330031215', '14.287335299999995', '40.9007444', '0817362879', NULL, 'amministrazionem@farmaciesalus.it', 'http://www.accentosalute.it/A353', 'http://www.accentosalute.it/A353/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(108, 'LONGO GIUSEPPINA & C. S.A.S.', 'VIA TERNICOLA SNC', '89034', 'BOVALINO', 'RC', '02910010806', '16.173689299999978', '38.1580198', '0964670248', NULL, 'rosymacri19@gmail.com', 'http://www.accentosalute.it/A66', 'http://www.accentosalute.it/A66/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(109, 'M.R. PETRONE S.A.S.', 'CORSO GARIBALDI, 285', '80142', 'NAPOLI', 'NA', '07522850630', '14.26712950000001', '40.8577984', '081 450409', NULL, 'info@farmaciapetrone.com', 'http://www.accentosalute.it/A13', 'http://www.accentosalute.it/A13/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(110, 'MALATO DR.FRANCESCO', 'VIA PRINCIPE DI PIEMONTE 17', '74010', 'STATTE', 'TA', '02625700733', '17.20574499999998', '40.563507', '099 4743565', NULL, 'farmaciamalato@alice.it', 'http://www.accentosalute.it/A274', 'http://www.accentosalute.it/A274/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(111, 'MANFREDI SAS DEL DOTTORE', 'C.SO MANFREDI N.84', '65026', 'PALAZZO SAN GERVASIO', 'PZ', '01697790762', '15.986635100000058', '40.9312692', '097244232', NULL, 'farm.manfredi@gmail.com', 'http://www.accentosalute.it/A345', 'http://www.accentosalute.it/A345/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(112, 'MARASCO D.SSA TIZIANA', 'VIA SALVATORE TOMMASI,52', '80100', 'NAPOLI', 'NA', '05119401213', '14.24855930000001', '40.8521277', '081-5498819', NULL, 'farmarasco@virgilio.it', 'http://www.accentosalute.it/A67', 'http://www.accentosalute.it/A67/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(113, 'MARASCO ROSARIO FELICE', 'VIA V.VENETO 4', '88041', 'DECOLLATURA', 'CZ', '01248160796', '16.357420000000047', '39.04594', '0968 61864', NULL, 'farmaciamarasco@gmail.com', 'http://www.accentosalute.it/A347', 'http://www.accentosalute.it/A347/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(114, 'MARZO DR.VETRUGNO OSCAR', 'P.ZZA R.MARGHERITA 7', '73051', 'NOVOLI', 'LE', '02614720759', '18.049992900000007', '40.3761977', '0832 712049', NULL, 'info@pec.farmaciamarzo.it', 'http://www.accentosalute.it/A270', 'http://www.accentosalute.it/A270/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(115, 'MASTROENI DR.BEATRICE', 'VIA VITTORIO EMANUELE 91', '89020', 'SINOPOLI', 'RC', '01162430803', '15.933517800000004', '38.2459761', '3387987486', NULL, 'farmaciamastroeni@libero.it', 'http://www.accentosalute.it/A361', 'http://www.accentosalute.it/A361/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(116, 'MEDMA SNC DI LAVIGNA A. E MATA', 'VIA III RIONE MARGHERITA 16', '89844', 'NICOTERA', 'VV', '03150830796', '15.93842840000002', '38.5538745', '0963 81224', NULL, 'farmaciamedma@tiscali.it', 'http://www.accentosalute.it/A358', 'http://www.accentosalute.it/A358/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(117, 'MEDOLLA DEI DOTT. BIANCHI', 'VIA BRUINO 34', '41036', 'Medolla', 'MO', '03705170367', '11.07354799999996', '44.850425', '053551287', '', 'farmaciamedolla@libero.it', 'http://www.accentosalute.it/A3', 'http://www.accentosalute.it/A3/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(118, 'MELE D.SSA ASSUNTA', 'VIA ANNUNZIATA 15', '82030', 'LIMATOLA', 'BN', '01599380621', '14.403279999999995', '41.13625', '0823 481170', NULL, 'farmaciamele@virgilio.it', 'http://www.accentosalute.it/A356', 'http://www.accentosalute.it/A356/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(119, 'MELE DOTT.GIANNICOLA', 'C.SO VITTORIO EMANUELE N.113', '85038', 'SENISE', 'PZ', '01887590766', '16.28753710000001', '40.1439183', '0973 683541', NULL, 'farmaciamele@gmail.com', 'http://www.accentosalute.it/A324', 'http://www.accentosalute.it/A324/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(120, 'MENGA DOTT.SANTO', 'VIA G. AMENDOLA 6', '87011', 'CASSANO ALLO IONIO', 'CS', '03527580793', '16.320117500000038', '39.7809566', '098176619', NULL, 'farmaciadrsmenga@gmail.com', 'http://www.accentosalute.it/A52', 'http://www.accentosalute.it/A52/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(121, 'MENZA DOTT.ROBERTO', 'P.ZZA VITTORIO EMANUELE II,19', '74024', 'MANDURIA', 'TA', '01706320734', '17.636755900000026', '40.3979682', '0999711153', NULL, 'farm.menza@alice.it', 'http://www.accentosalute.it/A301', 'http://www.accentosalute.it/A301/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(122, 'MERCURI DOTT.SA MANNY', 'VIA DIAZ 4', '88020', 'SAN PIETRO A MAIDA', 'CZ', '02393850793', '16.342848000000004', '38.846357', '096879192', NULL, 'farmaciamercuri@libero.it', 'http://www.accentosalute.it/A35', 'http://www.accentosalute.it/A35/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(123, 'MILIOTI DR.SALVATORE', 'VIA DEL PARLAMENTO', '84099', 'SAN CIPRIANO PICENTINO', 'SA', '03113240836', '14.869609500000024', '40.6974883', '089 882657', NULL, 'farmaciamilioti@gmail.com', 'http://www.accentosalute.it/A337', 'http://www.accentosalute.it/A337/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(124, 'MINELLI SNC', 'P.ZZA RIVAROLA 8', '00019', 'TIVOLI', 'RM', '07745301007', '12.799354200000039', '41.9657747', '0774 335213', NULL, 'farmaciaminelli@alice.it', 'http://www.accentosalute.it/A307', 'http://www.accentosalute.it/A307/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(125, 'MOCCIA SNC DI CAPONE ROBERTA &', 'VIA TERME DI TRAIANO N.74', '00053', 'CIVITAVECCHIA', 'RM', '13901231004', '11.805130400000053', '42.1023817', '076620933', NULL, 'farmaciamocciacivitavecchia@gmail.com', 'http://www.accentosalute.it/A68', 'http://www.accentosalute.it/A68/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(126, 'MOLLICA DR.DOMENICO ANTONIO', 'VIA ROMA 101', '89040', 'AGNANA CALABRA', 'RC', '02846200802', '16.22478000000001', '38.30245', '0964323375', NULL, 'mollica-domenico@alice.it', 'http://www.accentosalute.it/A26', 'http://www.accentosalute.it/A26/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(127, 'MONTEGANI S.A.S.', 'VIA ANTON GIULIO BARRILI 20', '20141', 'MILANO', 'MI', '05133410968', '9.17751670000007', '45.43387209999999', '02 89500813', NULL, 'mont915@yahoo.it', 'http://www.accentosalute.it/A289', 'http://www.accentosalute.it/A289/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(128, 'MORSILLI DR.ALESSANDRO', 'Viale segni', '03043', 'Cassino', 'FR', '09743431000', '13.85842839999998', '41.4908039', '0776 24686', '', 'amorsilli@libero.it', 'http://www.accentosalute.it/A265', 'http://www.accentosalute.it/A265/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(129, 'MORTATI DOTT. ANGELO DI FLAVIA', 'VIA NAZIONALE 200', '87019', 'SPEZZANO ALBANESE', 'CS', '03347420782', '16.311181900000065', '39.6701226', '0981953020', NULL, 'farmaciamortati@gmail.com', 'http://www.accentosalute.it/A38', 'http://www.accentosalute.it/A38/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(130, 'MOTTA D.SSA ANTONIETTA', 'VIA DANTE, 33', '75100', 'MATERA', 'MT', '00653040774', '16.601346700000022', '40.6686892', '0835.330751', NULL, 'antonietta.motta@virgilio.it', 'http://www.accentosalute.it/A287', 'http://www.accentosalute.it/A287/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(131, 'N.S.DI MONTALLEGRO DR.MARCO', 'VIA BARI 11/A', '20143', 'MILANO', 'MI', '01269050157', '9.14932239999996', '45.4387444', '02/40091576', NULL, 'marcoantonio.cattaneo@crs.lombardia.it', 'http://www.accentosalute.it/A374', 'http://www.accentosalute.it/A374/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(132, 'NAPOLITANO SNC', 'CORSO RESINA 32', '80056', 'ERCOLANO', 'NA', '06553551216', '14.345780200000036', '40.8094419', '081 7390224', NULL, 'farmacianapolitano@fontelnet.it', 'http://www.accentosalute.it/A285', 'http://www.accentosalute.it/A285/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(133, 'NESTOLA DOTT.GIUSEPPE', 'VIA MARGHERITA DI SAVOIA 7', '73043', 'COPERTINO', 'LE', '00211520754', '18.04817939999998', '40.272673', '0832 947610', NULL, 'farmacia.nestola@libero.it', 'http://www.accentosalute.it/A319', 'http://www.accentosalute.it/A319/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(134, 'NESTOLA DOTT.MADDALENA', 'VIA MARGHERITA DI SAVOIA 7', '73043', 'COPERTINO', 'LE', '04808140752', '18.048176199999943', '40.2726587', '0832947610', NULL, 'farmacia.nestola@libero.it', 'http://www.accentosalute.it/A7', 'http://www.accentosalute.it/A7/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(135, 'NOTO SNC DEL DOTT. GIOVANNI', 'V.LE SANT\'ANGELO 7/9', '87067', 'ROSSANO', 'CS', '03273150783', '16.638459499999954', '39.6034253', '0983-512227', NULL, 'farmanoto@tiscali.it', 'http://www.accentosalute.it/A340', 'http://www.accentosalute.it/A340/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(136, 'NOVA PHARMA SAS DI SCHIASSI', 'P.ZZA DELLA REPUBBLICA 42', '80029', 'Sant\'Antimo', 'NA', '07566881210', '14.236986600000023', '40.9427957', '081 8332855', '', 'farmaciaschiassi@gmail.com', 'http://www.accentosalute.it/A279', 'http://www.accentosalute.it/A279/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(137, 'NUOVA MODENESE DEI DOTTORI', 'VIA WAGNER 27/29', '41122', 'MODENA', 'MO', '03707760363', '10.973184299999957', '44.632441', '059283484', NULL, 'farmacianuovamodenese@aruba.it', 'http://www.accentosalute.it/A29', 'http://www.accentosalute.it/A29/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(138, 'OCCHIONERO D.SSA PAOLA', 'VIA PROVINCIALE 61', '86049', 'URURI', 'CB', '01747780706', '15.013002000000029', '41.815995', '0874830190', NULL, 'farmaciaocchionero@virgilio.it', 'http://www.accentosalute.it/A332', 'http://www.accentosalute.it/A332/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(139, 'OLIMPICA TRICASE SNC DEI D.RI', 'VIA OLIMPICA 15', '73039', 'TRICASE', 'LE', '04788210757', '18.348962700000016', '39.932394', '0833772226', NULL, 'farmaciaolimpica@libero.it', 'http://www.accentosalute.it/A377', 'http://www.accentosalute.it/A377/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(140, 'OLIVARI DR.FRANCESCO', 'VIA SARZANESE 110', '55040', 'CAPEZZANO PIANORE', 'LU', '01824870461', '10.264616199999978', '43.9260213', '0584-914126', NULL, 'info@farmaciaolivari.it', 'http://www.accentosalute.it/A316', 'http://www.accentosalute.it/A316/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(141, 'PACE Dr.ssa NADIA LUCIA', 'Via Roma, 29', '67020', 'FONTECCHIO', 'AQ', '01027590668', '13.606270399999971', '42.2306765', '0862/85245', NULL, 'nadialuciapace@virgilio.it', 'http://www.accentosalute.it/A357', 'http://www.accentosalute.it/A357/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(142, 'PADRE PIO-DR.RAFFAE.DI RUBERTO', 'VIA GISSI,53', '71100', 'FOGGIA', 'FG', '03231480710', '15.552834500000017', '41.4543104', '0881-634411', NULL, 'farmaciapadrepiofg@gmail.com', 'http://www.accentosalute.it/A288', 'http://www.accentosalute.it/A288/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(143, 'PAGLIARULO DR ORESTE', 'VIA NAZIONALE DELLE PUGLIE 145', '80038', 'POMIGLIANO D\'ARCO', 'NA', '00299320648', '14.374252500000011', '40.9070571', '081-8035220', NULL, 'farmaciapagliarulo@tiscali.it', 'http://www.accentosalute.it/A304', 'http://www.accentosalute.it/A304/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(144, 'PERSIANI DR.MICHELE', 'VIA NAZIONALE-SIBARI', '87070', 'CASSANO ALLO IONIO-SIBARI', 'CS', '01477070781', '16.32101650000004', '39.784712', '0981 74041', NULL, 'persianimichele@alice.it', 'http://www.accentosalute.it/A367', 'http://www.accentosalute.it/A367/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(145, 'PITRELLI DR.GIUSEPPE', 'VIA GALESO,52', '74100', 'TARANTO', 'TA', '01732370737', '17.22950000000003', '40.48822', '099/4713012', NULL, 'farmaciapitrelli@alice.it', 'http://www.accentosalute.it/A5', 'http://www.accentosalute.it/A5/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(146, 'PLINIO DOTT.MASSIMO DE ANGELIS', 'VIA PLINIO IL VECCHIO 62', '80053', 'CASTELLAMMARE DI STABIA', 'NA', '05925571217', '14.48524969999994', '40.7002161', '081 8701077', NULL, 'maxdea@tin.it', 'http://www.accentosalute.it/A381', 'http://www.accentosalute.it/A381/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(147, 'POLICICCHIO DI PIA POLICICCHIO', 'VIA DEI MARTIRI 42', '87100', 'COSENZA', 'CS', '03193100785', '16.26316750000001', '39.2894278', '0984 77726', NULL, '13892@pec.federfarma.it', 'http://www.accentosalute.it/A37', 'http://www.accentosalute.it/A37/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(148, 'PONZIO D.SSA ELENA RITA', 'LARGO COSTANTINI 10', '72025', 'SAN DONACI', 'BR', '01259380747', '17.923419999999965', '40.44792', '0831635851', NULL, '12900@pec.federfarma.it', 'http://www.accentosalute.it/A323', 'http://www.accentosalute.it/A323/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(149, 'QUARTA D.SSA ANNA', 'VIA FOSSIGNANO 218', '04011', 'APRILIA', 'LT', '06372751005', '12.54863929999999', '41.5962366', '0692981107', NULL, 'farmaciaquarta@gmail.com', 'http://www.accentosalute.it/A41', 'http://www.accentosalute.it/A41/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(150, 'RAGONE D.SSA LUCIA', 'VIA BORGO S. ROCCO, 6', '70010', 'ADELFIA', 'BA', '02849350729', '16.86846860000003', '41.0035625', '0804592810', NULL, 'farm.ragonelucia@tin.it', 'http://www.accentosalute.it/A384', 'http://www.accentosalute.it/A384/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(151, 'RAVIZZA SAS DELLA DR.SSA', 'VIA MARGHERA 18', '20149', 'MILANO', 'MI', '06578900968', '9.153148699999974', '45.4673357', '02 48006429', NULL, 'farmacia.ravizza@tiscali.it', 'http://www.accentosalute.it/A44', 'http://www.accentosalute.it/A44/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(152, 'RECCHIA D.SSA MARIA', 'P.ZZA GARIBALDI 19', '73019', 'TRICARICO', 'MT', '00053810776', '16.144792999999936', '40.62273', '0835723216', NULL, '', 'http://www.accentosalute.it/A336', 'http://www.accentosalute.it/A336/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(153, 'ROBERTAZZI D.SSA MARIA', 'C.SO UMBERTO I 114', '84098', 'PONTECAGNANO FAIANO', 'SA', '05167490654', '14.874474100000043', '40.6451912', '089 382638', NULL, 'fcia.robertazzi@tiscali.it', 'http://www.accentosalute.it/A291', 'http://www.accentosalute.it/A291/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(154, 'ROCCO DEL DOTT. ORAZIO ROCCO', 'VIA ROMA N.102', '84091', 'BATTIPAGLIA', 'SA', '05380610658', '14.98091629999999', '40.6085783', '0828 303462', NULL, 'farmaroccosas@libero.it', 'http://www.accentosalute.it/A284', 'http://www.accentosalute.it/A284/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL);
INSERT INTO `pharmacy` (`pharmacy_id`, `ragione_sociale`, `indirizzo`, `cap`, `citta`, `provincia`, `piva`, `longitudine`, `latitudine`, `telefono`, `fax`, `email`, `url`, `url_app`, `ecommerce_locale`, `pharmacy_from_json`, `pharmacy_added_by_super_admin`, `pharmacy_active`, `pharmacy_updated_date_time`, `pharmacy_logo_storage_path`, `pharmacy_facebook_url`) VALUES
(155, 'ROSSETTI DR. GIOVANNI', 'VIA MAZZINI, 95', '74100', 'TARANTO', 'TA', '01861750733', '17.24575930000003', '40.4682735', '099/4533092', NULL, 'farmaciarossetti@gmail.com', 'http://www.accentosalute.it/A268', 'http://www.accentosalute.it/A268/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(156, 'RUBINO D.SSA MARCELLA', 'C.SO REPUBBLICA 1', '75024', 'MONTESCAGLIOSO', 'MT', '02998740738', '16.66523719999998', '40.5559208', '0835203080', NULL, 'rubinomarcella@libero.it', 'http://www.accentosalute.it/A318', 'http://www.accentosalute.it/A318/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(157, 'S. ELENA BONZAGNI DR.GABRIELE', 'VIA FRATELLI ZOIA, 84/2', '20100', 'MILANO', 'MI', '01033350156', '9.109166500000015', '45.4715565', '02/40910051', NULL, 'farmacia.santelena@tiscali.it', 'http://www.accentosalute.it/A321', 'http://www.accentosalute.it/A321/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(158, 'S. ERASMO DI RIZZI ANNA', 'VIA OLIVETANI,22', '04023', 'FORMIA', 'LT', '02274390604', '13.598384399999986', '41.2558549', '0771700614', NULL, 'farmrizzi@libero.it', 'http://www.accentosalute.it/A4', 'http://www.accentosalute.it/A4/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(159, 'S.ANNA SNC.', 'CORSO DELLA REPUB.70', '03043', 'CASSINO', 'FR', '02045910607', '13.830355000000054', '41.4910636', '0776 311450', NULL, 'infofarmaciasantanna@gmail.com', 'http://www.accentosalute.it/A69', 'http://www.accentosalute.it/A69/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(160, 'S.BARBARA DI BOTTI STEFANIA E', 'VIA SARDEGNA 19/C', '19126', 'LA SPEZIA', 'SP', '01018400117', '9.851438199999961', '44.1191177', '0187 516500', NULL, 'santabarbara.sp515@libero.it', 'http://www.accentosalute.it/A286', 'http://www.accentosalute.it/A286/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(161, 'S.MARCO DR.GRECO FILOME.&C SNC', 'VIA S.MARCO 62', '80021', 'AFRAGOLA', 'NA', '03039241215', '14.337109999999939', '40.9104439', '081 8691380', NULL, '', 'http://www.accentosalute.it/A283', 'http://www.accentosalute.it/A283/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(162, 'S.MARIA DEL POZZO DI EREDI', 'VIA S.MARIA DEL POZZO 178', '80049', 'SOMMA VESUVIANA', 'NA', '08424991217', '14.433269999999993', '40.88279', '0815317744', NULL, 'farmsantamariadelpozzo@gmail.com', 'http://www.accentosalute.it/A50', 'http://www.accentosalute.it/A50/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(163, 'SALERNITANA SAS DEL DOTT.', 'VIA COSIMO VESTUTI 11/A', '84134', 'SALERNO', 'SA', '05463410653', '14.785538900000006', '40.6728529', '089750651', NULL, 'farmaciasalernitana@gmail.com', 'http://www.accentosalute.it/A21', 'http://www.accentosalute.it/A21/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(164, 'SALVATI VERONICA', 'CORSO MARIANELLA, 25/E', '80145', 'Napoli', 'NA', '07241070635', '14.230466100000058', '40.8886181', '081 7403715', '', 'salvativ@farmaciasalvati.191.it', 'http://www.accentosalute.it/A47', 'http://www.accentosalute.it/A47/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(165, 'SAN BIAGIO SAS DR.BRIGNALI & C', 'VIA CECIONI 32', '58015', 'ORBETELLO SCALO', 'GR', '01435170533', '11.24833799999999', '42.448892', '0564 862009', NULL, 'info@farmaciasanbiagio.it', 'http://www.accentosalute.it/A329', 'http://www.accentosalute.it/A329/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(166, 'SAN CAMILLO DR.RECCHIA MICHELE', 'VIA QUASIMODO, 64', '74019', 'PALAGIANO', 'TA', '02034980736', '17.040384000000017', '40.5770553', '099/888.56.56', NULL, 'recchia.mic@gmail.com', 'http://www.accentosalute.it/A271', 'http://www.accentosalute.it/A271/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(167, 'SAN PAOLO S.A.S. DEI DOTTORI', 'VIA PORDENONE, 1', '20132', 'MILANO', 'MI', '13367530154', '9.233867400000008', '45.4900736', '02/2152424', NULL, 'mi01630@pec1.federfarma.lombardia.it', 'http://www.accentosalute.it/A33', 'http://www.accentosalute.it/A33/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(168, 'SAN PAOLO S.N.C.', 'VIA DI TIGLIO 41/B', '55012', 'CAPANNORI-PIEVE SAN PAOLO', 'LU', '02409520463', '10.54257640000003', '43.83409530000001', '0583980875', NULL, 'farmaciasanpaolo2016@gmail.com', 'http://www.accentosalute.it/A330', 'http://www.accentosalute.it/A330/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(169, 'SAN PAOLO SNC DEI DR. FALCO', 'VIA MUZIO CLEMENTI 11', '59100', 'PRATO', 'PO', '02345040972', '11.073446399999966', '43.8884465', '057438278', NULL, 'farmaciapratosanpaolo@gmail.com', 'http://www.accentosalute.it/A373', 'http://www.accentosalute.it/A373/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(170, 'SAN SEBASTIANO SNC', 'VIA SAN SEBASTIANO 118', '70024', 'GRAVINA IN PUGLIA', 'BA', '07881060722', '16.417222700000025', '40.8132537', '0803268165', NULL, 'farmaciasansebastiano@gmail.com', 'http://www.accentosalute.it/A17', 'http://www.accentosalute.it/A17/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(171, 'SANGERMANO DOTT.MARCO', 'VIA DANTE ALIGHIERI 88', '74121', 'TARANTO', 'TA', '03040480737', '17.251350000000002', '40.46521', '099 4795250', NULL, 'marco.sangermano@hotmail.it', 'http://www.accentosalute.it/A70', 'http://www.accentosalute.it/A70/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(172, 'SANT\'ANTONIO SNC', 'VIA COLOMBO 39', '58022', 'FOLLONICA', 'GR', '01064380536', '10.755303599999934', '42.9251023', '0566-40084', NULL, 'farmaciasantantonio@gmail.com', 'http://www.accentosalute.it/A326', 'http://www.accentosalute.it/A326/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(173, 'SANTA LUCIA DR.GUALANO & C.SNC', 'VIALE ROMA 49/51', '00049', 'VELLETRI', 'RM', '05819701003', '12.770866999999953', '41.694128', '06/9633744', NULL, 'farmasantalucia@alice.it', 'http://www.accentosalute.it/A273', 'http://www.accentosalute.it/A273/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(174, 'SASSO D.SSA ROCCA', 'P.ZZA GARIBALDI 32', '74016', 'MASSAFRA', 'TA', '01812620738', '17.11235690000001', '40.5886049', '099-8801071', NULL, 'rina.90@libero.it', 'http://www.accentosalute.it/A308', 'http://www.accentosalute.it/A308/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(175, 'SCHETTINO DR.GIOVANNI', 'VIA ROMA,502', '66054', 'SANT\'ANTONIO ABATE', 'NA', '05215221218', '14.545330000000035', '40.723793', '081-8796010', NULL, '12173@pec2.federfarma.it', 'http://www.accentosalute.it/A331', 'http://www.accentosalute.it/A331/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(176, 'SCHIAPPA DOTT.ANTONIO SCHIAPPA', 'VIA ARNIENSE 64', '66100', 'CHIETI', 'CH', '02354650695', '14.1697719', '42.3520817', '0871 334988', NULL, 'a.schiappa@libero.it', 'http://www.accentosalute.it/A339', 'http://www.accentosalute.it/A339/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(177, 'SCIARRETTA DR.ALFEO CANDELORI', 'VIA SEBASTIANO 53', '64024', 'GUARDIA VOMANO NOTARESCO', 'TE', '00892800673', '13.883113200000025', '42.6365618', '085 898101', NULL, 'candelori.alfeo@tiscali.it', 'http://www.accentosalute.it/A31', 'http://www.accentosalute.it/A31/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(178, 'SCIGLIANO D.SSA FRANCESCA', 'VIA SCALARETTO 6', '88811', 'CIRO\' MARINA', 'KR', '03270610797', '17.133888299999967', '39.3738962', '0962 371177', NULL, 'farmaciascigliano@gmail.com', 'http://www.accentosalute.it/A369', 'http://www.accentosalute.it/A369/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(179, 'SEMERARO D.SSA MARIA GABRIELLA', 'VIA ROMA 24', '74011', 'CASTELLANETA', 'TA', '03026180731', '16.932334800000035', '40.6316109', '099 8491152', NULL, 'farmacia.semeraro@gmail.com', 'http://www.accentosalute.it/A293', 'http://www.accentosalute.it/A293/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(180, 'SOGLIA DR.ALIBERTI ANTONIETTA', 'PIAZZA XXIV MAGGIO', '84100', 'SALERNO', 'SA', '04417020650', '14.766027000000008', '40.6776873', '089-225880', NULL, 'farmaciasoglia@alice.it', 'http://www.accentosalute.it/A312', 'http://www.accentosalute.it/A312/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(181, 'SORGONA\' DR. LEONARDO', 'VIA SBARRE CENTRALI, 312', '89132', 'REGGIO CALABRIA', 'RC', '00129320800', '15.644387599999959', '38.090439', '0965/52114', NULL, 'farmacia.sorgona@libero.it', 'http://www.accentosalute.it/A20', 'http://www.accentosalute.it/A20/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(182, 'SORRENTINO DR.RAFFAELINA', 'VIA FONSECA 18/20', '80023', 'CAIVANO', 'NA', '01603900646', '14.308535200000051', '40.9601107', '081-8369554', NULL, 'farmacia.sorrentino@libero.it', 'http://www.accentosalute.it/A45', 'http://www.accentosalute.it/A45/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(183, 'SORRISO DR.IEMMA VALENTINA', 'VIA ROMA 39', '81010', 'CIORLANO', 'CE', '04133890618', '14.160667999999987', '41.450107', '0823948115', NULL, 'farmasorriso@libero.it', 'http://www.accentosalute.it/A364', 'http://www.accentosalute.it/A364/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(184, 'STEFANELLI D.SSA E.FONDELLI', 'V.LE CENTOFIORI 23', '50056', 'MONTELUPO FIORENTINO', 'FI', '01983640515', '11.020193000000063', '43.73017', '0571 51006', NULL, 'farmacia.stefanelli@libero.it', 'http://www.accentosalute.it/A296', 'http://www.accentosalute.it/A296/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(185, 'STORACE DI PERRINO MARIA MICHE', 'VIA SESSA-LAURO N.25', '81037', 'SESSA AURUNCA-FRAZ.LAURO', 'CE', '03797400615', '13.932586799999967', '41.2383257', '0823-707015', NULL, 'storacefarmacia@libero.it', 'http://www.accentosalute.it/A362', 'http://www.accentosalute.it/A362/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(186, 'SUSA S.A.S. DI LIBERO ANTONIO', 'P.LE SUSA 6', '20133', 'MILANO', 'MI', '12376240151', '9.223050000000057', '45.46769', '02 45487920', NULL, 'liberobuccarelli@libero.it', 'http://www.accentosalute.it/A19', 'http://www.accentosalute.it/A19/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(187, 'TACCONE - GESTIONE EREDITARIA', NULL, '89861', 'PARGHELIA', 'VV', '03495180790', '15.922168800000009', '38.681777', '0963600172', NULL, 'farmataccone@gmail.com', 'http://www.accentosalute.it/A25', 'http://www.accentosalute.it/A25/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(188, 'TANCREDI DOTT SSA EMILIA', 'VIA ROMA, 49', '81036', 'S.CIPRIANO D\'AVERSA', 'CE', '02198510618', '14.131809599999997', '41.0034129', '081 8921308', NULL, 'emifoc@yahoo.it', 'http://www.accentosalute.it/A30', 'http://www.accentosalute.it/A30/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(189, 'TORTORELLI NICOLA & FRATELLI', 'PIAZZETTA MACINOLA 8', '75014', 'GRASSANO', 'MT', '00553060773', '16.28145489999997', '40.6324321', '0835721048', NULL, 'farmaciatortorelli@virgilio.it', 'http://www.accentosalute.it/A341', 'http://www.accentosalute.it/A341/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(190, 'TRAVAGLINI SAS DR.GIANPAOLO', 'VIA VITTORIO VENETO 2', '85026', 'PALAZZO SAN GERVASIO', 'PZ', '01743220764', '15.985082000000034', '40.930492', '0972 44114', NULL, 'farmacia.travaglini@libero.it', 'http://www.accentosalute.it/A346', 'http://www.accentosalute.it/A346/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(191, 'TURI DEL DR.C.TURI E FIGLI SNC', 'C.SO VITT.EMANUELE 185', '74013', 'GINOSA', 'TA', '02682790734', '16.755807799999957', '40.5774031', '099-8294516', NULL, 'turifarma@virgilio.it', 'http://www.accentosalute.it/A295', 'http://www.accentosalute.it/A295/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL),
(192, 'VALLEAMBROSIA SNC DR.I CHIESA', 'VIA VALLEAMBROSIA 45', '20089', 'ROZZANO', 'MI', '08742290961', '9.154788000000053', '45.3997618', '02 8259203', NULL, 'ma12258mi1622@pec.fofi.it', 'http://www.accentosalute.it/A311', 'http://www.accentosalute.it/A311/appServiceRouting', 'N', 1, 0, 1, '2018-02-14 00:23:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `codice_catena` text,
  `codice_sito` text,
  `codinterno` text,
  `codminsan` text,
  `codean` text,
  `descrizione_ricerca` text,
  `descrizione_ecommerce` text,
  `descrizione_h1` text,
  `descrizione_h2` text,
  `descrizione_ditta` text,
  `prezzo_web_netto` text,
  `prezzo_web_lordo` text,
  `sconto_web` text,
  `iva` text,
  `visualizzazione_home_page` text,
  `visualizzazione_civetta` text,
  `codice_monografia` text,
  `codice_testo_immagine` text,
  `linkImmagineProdotto` text,
  `linkPaginaProdotto` text,
  `tree_id_label` varchar(20) DEFAULT NULL,
  `tree_label` text,
  `product_from_json` tinyint(4) DEFAULT '1',
  `product_added_by_super_admin` tinyint(4) DEFAULT '0',
  `product_active` tinyint(4) DEFAULT '1',
  `product_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `codice_catena`, `codice_sito`, `codinterno`, `codminsan`, `codean`, `descrizione_ricerca`, `descrizione_ecommerce`, `descrizione_h1`, `descrizione_h2`, `descrizione_ditta`, `prezzo_web_netto`, `prezzo_web_lordo`, `sconto_web`, `iva`, `visualizzazione_home_page`, `visualizzazione_civetta`, `codice_monografia`, `codice_testo_immagine`, `linkImmagineProdotto`, `linkPaginaProdotto`, `tree_id_label`, `tree_label`, `product_from_json`, `product_added_by_super_admin`, `product_active`, `product_updated_date_time`) VALUES
(1, '007', '', '0119943', '973729775', '', 'FARMA\' - FERMENTI 10FLACONI MONODOSE - FERMENTI 10FLACONI MONODOSE - 973729775 - 0119943 - FERMENTI LATTICI - INTEGRATORI ALIMENTARI - APPARATO DIGERENTE', NULL, 'One', ' ', 'farma\'', '12.8000', '12.8000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729775.jpg&minsan=973729775', 'http://www.accentosalute.it/Dettaglio?catalogo=FERMENT%CC+-+integratore+alimentare+a+base+di+Fermenti+lattici&kcm=0119943', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:04'),
(2, '007', '', '0119944', '973729799', '', 'FARMA\' - CISTE\'N 20CAPSULE - CISTE\'N 20CAPSULE - 973729799 - 0119944 - APPARATO URO-GENITALE - INTEGRATORI ALIMENTARI', NULL, 'Two', '', 'farma\'', '17.2000', '17.2000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729799.jpg&minsan=973729799', 'http://www.accentosalute.it/Dettaglio?catalogo=CIST%C8N+-+integratore+alimentare+per+le+vie+urinarie&kcm=0119944', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:09'),
(3, '007', '', '0119945', '973729864', '', 'FARMA\' - COLESTA\' 30COMPRESSE - COLESTA\' 30COMPRESSE - 973729864 - 0119945 - INTEGRATORI - CONTROLLO COLESTEROLO - INTEGRATORI ALIMENTARI', NULL, 'Three', '  ', 'farma\'', '19.0000', '19.0000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729864.jpg&minsan=973729864', 'http://www.accentosalute.it/Dettaglio?catalogo=COLEST%C0+-+integratore+alimentare+per+il+colesterolo&kcm=0119945', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:13'),
(4, '007', '', '0119948', '973729876', '', 'FARMA\' - VENI\' 30CAPSULE - VENI\' 30CAPSULE - 973729876 - 0119948 - CIRCOLAZIONE - INTEGRATORI ALIMENTARI', NULL, 'Four', ' ', 'farma\'', '12.0000', '12.0000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729876.jpg&minsan=973729876', 'http://www.accentosalute.it/Dettaglio?catalogo=VEN%CC+-+integratore+alimentare+per+la+circolazione+sanguigna&kcm=0119948', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:17'),
(5, '007', '', '0119949', '973729888', '', 'FARMA\' - LAXA\' 30COMPRESSE - LAXA\' 30COMPRESSE - 973729888 - 0119949 - STIPSI E TRANSITO INTESTINALE - INTEGRATORI ALIMENTARI - APPARATO DIGERENTE - LASSATIVI', NULL, 'Five', ' ', 'farma\'', '10.8000', '10.8000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729888.jpg&minsan=973729888', 'http://www.accentosalute.it/Dettaglio?catalogo=LAX%C0+-+integratore+alimentare+per+la+regolarit%E0+intestinale&kcm=0119949', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:23'),
(6, '007', '', '0119950', '973729890', '', 'FARMA\' - BMI\'X 30CAPSULE - BMI\'X 30CAPSULE - 973729890 - 0119950 - CONTROLO PESO - INTEGRATORI ALIMENTARI - PRODOTTI PER DIMAGRIRE - PRIMAVERA/ESTATE - CURA DEL CORPO', NULL, 'Six', ' ', 'farma\'', '9.8000', '9.8000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729890.jpg&minsan=973729890', 'http://www.accentosalute.it/Dettaglio?catalogo=B-M%CCX+-+integratore+alimentare+per+il+sistema+immunitario&kcm=0119950', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:28'),
(7, '007', '', '0119951', '973729902', '', 'FARMA\' - CARBO\' 40CAPSULE - CARBO\' 40CAPSULE - 973729902 - 0119951 - CONTROLO PESO - INTEGRATORI ALIMENTARI - PRODOTTI PER DIMAGRIRE - PRIMAVERA/ESTATE - CURA DEL CORPO', NULL, 'Seven', ' ', 'farma\'', '10.5000', '10.5000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729902.jpg&minsan=973729902', 'http://www.accentosalute.it/Dettaglio?catalogo=CARB%D2+-+integratore+alimentare+per+il+gas+intestinale&kcm=0119951', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:36'),
(8, '007', '', '0119952', '973729914', '', 'FARMA\' - DITRE\' 60COMPRESSE - DITRE\' 60COMPRESSE - 973729914 - 0119952 - TOSSE - INTEGRATORI ALIMENTARI - APPARATO RESPIRATORIO - AUTUNNO/INVERNO', NULL, 'Eight', ' ', 'farma\'', '10.5000', '10.5000', '0.000', '10.00', 'N', 'N', NULL, NULL, 'http://www.accentosalute.it/image?f=imgEcommerce/custom/ftp/000101/973729914.jpg&minsan=973729914', 'http://www.accentosalute.it/Dettaglio?catalogo=DITR%C8+-+integratore+alimentare+per+ossa+e+denti&kcm=0119952', '5', 'Integratori', 1, 0, 1, '2018-02-14 09:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_free_text`
--

CREATE TABLE `product_free_text` (
  `product_free_text_id` int(10) UNSIGNED NOT NULL,
  `product_free_text_from_farma` tinyint(4) DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `ref_product_free_text_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `product_free_text_name` text,
  `product_free_text_description` text,
  `product_free_text_price` text,
  `product_free_text_image_storage_path` text,
  `product_free_text_created_edited_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_free_text_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_free_text`
--

INSERT INTO `product_free_text` (`product_free_text_id`, `product_free_text_from_farma`, `ref_product_free_text_pharmacy_id`, `product_free_text_name`, `product_free_text_description`, `product_free_text_price`, `product_free_text_image_storage_path`, `product_free_text_created_edited_date_time`, `product_free_text_active`) VALUES
(21, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 1', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 1', '25.00', 'all_images/image_products/original_image/46-large-image.jpg', '2018-02-19 19:34:35', 1),
(22, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 2', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 2', '65.00', 'all_images/image_products/original_image/51RhVwsqQML.jpg', '2018-02-19 19:35:02', 1),
(23, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 3', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 3', '96.20', 'all_images/image_products/original_image/81hbzoN7gaL._SY355__.jpg', '2018-02-19 19:35:22', 1),
(24, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 4', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 4', '25.00', 'all_images/image_products/original_image/Bronchinol_1.jpg', '2018-02-19 19:35:41', 1),
(25, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 5', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 5', '96.00', 'all_images/image_products/original_image/0033673_m.jpg', '2018-02-19 19:35:59', 1),
(26, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  offer free text 1', ' AIELLO SAS DI GIUSEPPE AIELLO  offer free text 1', '36.00', 'all_images/image_offer/original_image/56857584.jpeg', '2018-02-19 19:38:08', 1),
(27, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text 3', ' AIELLO SAS DI GIUSEPPE AIELLO  Free text 3', '36.00', 'all_images/image_offer/original_image/36674317.jpeg', '2018-02-19 19:40:21', 1),
(28, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 1', ' AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 1', '10.00', 'all_images/image_offer/original_image/21596925.jpeg', '2018-02-19 19:48:24', 1),
(29, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 2', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 2', '25.00', 'all_images/image_offer/original_image/57776987.jpeg', '2018-02-19 19:48:24', 1),
(30, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 3', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 3', '63.00', 'all_images/image_offer/original_image/4475875.jpeg', '2018-02-19 19:48:24', 1),
(31, 0, 4, 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 4', 'AIELLO SAS DI GIUSEPPE AIELLO  Free text offer 4', '36.00', 'all_images/image_offer/original_image/57606338.jpeg', '2018-02-19 19:48:24', 1),
(32, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 1', 'ABENAVOLI DR.ROSA ALBA free text product 1', '65.00', 'all_images/image_products/original_image/tussitol-cough-syrup-bbptcs100-e1464185257404.jpg', '2018-02-19 19:59:24', 1),
(33, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 2', 'ABENAVOLI DR.ROSA ALBA free text product 2', '25.00', 'all_images/image_products/original_image/syrup_linctagon-500x500.gif', '2018-02-19 19:59:43', 1),
(34, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 3', 'ABENAVOLI DR.ROSA ALBA free text product 3', '96.00', 'all_images/image_products/original_image/cough-medicine-500x500.jpg', '2018-02-19 20:00:06', 1),
(35, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 4', 'ABENAVOLI DR.ROSA ALBA free text product 4', '56.00', 'all_images/image_products/original_image/poison-pill-forte-with-a-skull-as-brand-logo-on-the-remedy-box-it-EHB6FB.jpg', '2018-02-19 20:01:18', 1),
(36, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 5', 'ABENAVOLI DR.ROSA ALBA free text product 5', '12.00', 'all_images/image_products/original_image/haritha_cough_syrup.jpg', '2018-02-19 20:01:39', 1),
(37, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text product 6', 'ABENAVOLI DR.ROSA ALBA free text product 6', '63.00', 'all_images/image_products/original_image/51RhVwsqQML1.jpg', '2018-02-19 20:02:02', 1),
(38, 0, 1, 'ABENAVOLI DR.ROSA ALBA free text offer product 2', ' ABENAVOLI DR.ROSA ALBA free text offer product 2', '56.00', 'all_images/image_offer/original_image/35988750.jpeg', '2018-02-19 20:05:08', 1),
(39, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 1', ' ABENAVOLI DR.ROSA ALBA Free text offer product 1', '10.00', 'all_images/image_offer/original_image/61570115.jpeg', '2018-02-19 20:12:51', 1),
(40, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 2', 'ABENAVOLI DR.ROSA ALBA Free text offer product 2', '9.33', 'all_images/image_offer/original_image/69853860.jpeg', '2018-02-19 20:12:51', 1),
(41, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 3', 'ABENAVOLI DR.ROSA ALBA Free text offer product 3', '63.00', 'all_images/image_offer/original_image/19160058.jpeg', '2018-02-19 20:12:51', 1),
(42, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 4', 'ABENAVOLI DR.ROSA ALBA Free text offer product 4', '25.00', 'all_images/image_offer/original_image/37217110.jpeg', '2018-02-19 20:12:52', 1),
(43, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 5', 'ABENAVOLI DR.ROSA ALBA Free text offer product 5', '56.00', 'all_images/image_offer/original_image/78280180.jpeg', '2018-02-19 20:12:52', 1),
(44, 0, 1, 'ABENAVOLI DR.ROSA ALBA Free text offer product 6', 'ABENAVOLI DR.ROSA ALBA Free text offer product 6', '25.00', 'all_images/image_offer/original_image/47034978.jpeg', '2018-02-19 20:12:52', 1),
(45, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Product 1', 'ADAM FARMA DI ALESSANDRO Free text Product 1', '41.00', 'all_images/image_products/original_image/Bronchinol_11.jpg', '2018-02-19 20:23:00', 1),
(46, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Product 2', 'ADAM FARMA DI ALESSANDRO Free text Product 2', '12.00', 'all_images/image_products/original_image/haritha_cough_syrup1.jpg', '2018-02-19 20:23:23', 1),
(47, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Product 3', 'ADAM FARMA DI ALESSANDRO Free text Product 3', '52.00', 'all_images/image_products/original_image/SBL-Orthomuv-Syrup-Sugar-Free-180ml.jpg', '2018-02-19 20:23:43', 1),
(48, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Product 4', 'ADAM FARMA DI ALESSANDRO Free text Product 4', '8.00', 'all_images/image_products/original_image/images.jpg', '2018-02-19 20:24:04', 1),
(49, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Product 5', 'ADAM FARMA DI ALESSANDRO Free text Product 5', '15.00', 'all_images/image_products/original_image/601_0.jpg', '2018-02-19 20:24:31', 1),
(50, 0, 2, 'ADAM FARMA DI ALESSANDRO pdf free text Offer 2', ' ADAM FARMA DI ALESSANDRO pdf free text Offer 2', '25.00', 'all_images/image_offer/original_image/28025126.jpeg', '2018-02-19 20:27:04', 1),
(51, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Offer 1', ' ADAM FARMA DI ALESSANDRO Free text Offer 1', '10.00', 'all_images/image_offer/original_image/17060862.jpeg', '2018-02-19 20:32:21', 1),
(52, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Offer 2', 'ADAM FARMA DI ALESSANDRO Free text Offer 2', '25.00', 'all_images/image_offer/original_image/10515823.jpeg', '2018-02-19 20:32:21', 1),
(53, 0, 2, 'ADAM FARMA DI ALESSANDRO Free text Offer 3', 'ADAM FARMA DI ALESSANDRO Free text Offer 3', '25.00', 'all_images/image_offer/original_image/8569230.jpeg', '2018-02-19 20:32:21', 1),
(54, 0, 3, 'ADDANTE DR.NICOLA Free Text Product 1', 'ADDANTE DR.NICOLA Free Text Product 1', '14.00', 'all_images/image_products/original_image/102-imudab-syrup.jpg', '2018-02-19 20:43:29', 1),
(55, 0, 3, 'ADDANTE DR.NICOLA Free Text Product 2', 'ADDANTE DR.NICOLA Free Text Product 2', '25.00', 'all_images/image_products/original_image/81hbzoN7gaL._SY355__1.jpg', '2018-02-19 20:43:45', 1),
(56, 0, 3, 'ADDANTE DR.NICOLA Free Text Product 3', 'ADDANTE DR.NICOLA Free Text Product 3', '12.00', 'all_images/image_products/original_image/0033673_m1.jpg', '2018-02-19 20:44:03', 1),
(57, 0, 3, 'ADDANTE DR.NICOLA Free Text Product 4', 'ADDANTE DR.NICOLA Free Text Product 4', '16.00', 'all_images/image_products/original_image/cough-medicine-500x5001.jpg', '2018-02-19 20:44:25', 1),
(58, 0, 3, 'ADDANTE DR.NICOLA Free Text Product 5', 'ADDANTE DR.NICOLA Free Text Product 5', '12.00', 'all_images/image_products/original_image/Wheezal-Livcol-Syrup-450ml.jpg', '2018-02-19 20:44:48', 1),
(59, 0, 3, 'ADDANTE DR.NICOLA pdf offer 5', ' ADDANTE DR.NICOLA pdf offer 5', '25.00', 'all_images/image_offer/original_image/71665893.jpeg', '2018-02-19 20:48:16', 1),
(60, 0, 3, 'ADDANTE DR.NICOLA pdf offer free text 6', 'ADDANTE DR.NICOLA pdf offer free text 6', '23.00', 'all_images/image_offer/original_image/32989856.jpeg', '2018-02-19 20:48:16', 1),
(61, 0, 3, 'ADDANTE DR.NICOLA  offer free text 1', ' ADDANTE DR.NICOLA  offer free text 1', '10.00', 'all_images/image_offer/original_image/44002423.jpeg', '2018-02-19 20:51:50', 1),
(62, 0, 3, 'ADDANTE DR.NICOLA  offer free text 2', 'ADDANTE DR.NICOLA  offer free text 2', '56.00', 'all_images/image_offer/original_image/35008927.jpeg', '2018-02-19 20:51:50', 1),
(63, 0, 3, 'ADDANTE DR.NICOLA  offer free text 3', 'ADDANTE DR.NICOLA  offer free text 3', '25.00', 'all_images/image_offer/original_image/38477691.jpeg', '2018-02-19 20:51:50', 1),
(64, 0, 3, 'ADDANTE DR.NICOLA  offer free text 4', 'ADDANTE DR.NICOLA  offer free text 4', '12.00', 'all_images/image_offer/original_image/96744067.jpeg', '2018-02-19 20:51:50', 1),
(65, 0, 3, 'ADDANTE DR.NICOLA  offer free text 5', 'ADDANTE DR.NICOLA  offer free text 5', '65.00', 'all_images/image_offer/original_image/34482328.jpeg', '2018-02-19 20:51:50', 1),
(66, 1, NULL, 'Super Admin Free text product 1', 'Super Admin Free text product 1', '10.00', 'all_images/image_products/original_image/ChestalHoney-Bottle-left-8001.jpg', '2018-02-19 21:09:03', 1),
(67, 1, NULL, 'Super Admin Free text product 3', 'Super Admin Free text product 3', '13.00', 'all_images/image_products/original_image/images_(1).jpg', '2018-02-19 21:09:17', 1),
(68, 1, NULL, 'Super Admin Free text product 4', 'Super Admin Free text product 4', '96.00', 'all_images/image_products/original_image/haritha_cough_syrup2.jpg', '2018-02-19 21:09:27', 1),
(69, 1, NULL, 'Super Admin Free text product 5', 'Super Admin Free text product 5', '17.00', 'all_images/image_products/original_image/Ayurvedic-Stone-Remover-Syrup.jpg', '2018-02-19 21:09:35', 1),
(70, 1, NULL, 'Super Admin Free text product 2', 'Super Admin Free text product 2', '52.00', 'all_images/image_products/original_image/102-imudab-syrup1.jpg', '2018-02-19 21:10:18', 1),
(71, 1, NULL, 'Super Admin Free text product with pdf offer 3', ' Super Admin Free text product with pdf offer 3', '10.00', 'all_images/image_offer/original_image/27849386.jpeg', '2018-02-19 21:14:34', 1),
(72, 1, NULL, 'Super Admin Free text product with pdf offer 4', 'Super Admin Free text product with pdf offer 4', '5.00', 'all_images/image_offer/original_image/10088674.jpeg', '2018-02-19 21:14:34', 1),
(73, 1, NULL, 'Super Admin Free text product with pdf offer 5', 'Super Admin Free text product with pdf offer 5', '10.00', 'all_images/image_offer/original_image/36386780.jpeg', '2018-02-19 21:14:35', 1),
(74, NULL, NULL, 'Super Admin Free text Offer 1', 'Super Admin Free text Offer 1 ', '10.00', 'all_images/image_offer/original_image/54879117.jpeg', '2018-02-19 21:20:58', 1),
(75, NULL, NULL, 'Super Admin Free text Offer 2', 'Super Admin Free text Offer 2', '10.00', 'all_images/image_offer/original_image/42688559.jpeg', '2018-02-19 21:20:58', 1),
(76, NULL, NULL, 'Super Admin Free text Offer 3', 'Super Admin Free text Offer 3', '13.00', 'all_images/image_offer/original_image/19656332.jpeg', '2018-02-19 21:20:58', 1),
(77, NULL, NULL, 'Super Admin Free text Offer 4', 'Super Admin Free text Offer 4', '85.00', 'all_images/image_offer/original_image/74604727.jpeg', '2018-02-19 21:20:58', 1),
(78, NULL, NULL, 'Super Admin Free text Offer 5', 'Super Admin Free text Offer 5', '36.00', 'all_images/image_offer/original_image/39240340.gif', '2018-02-19 21:20:58', 1),
(79, NULL, NULL, 'Super Admin Free text Offer 1', 'Super Admin Free text Offer 1', '50', 'all_images/image_offer/original_image/49020473.jpeg', '2018-02-19 21:21:40', 1),
(80, NULL, NULL, 'Super Admin Free text Offer 9', 'Super Admin Free text Offer 9 ', '10.00', 'all_images/image_offer/original_image/59301546.jpeg', '2018-02-19 21:22:54', 1),
(81, 1, NULL, 'Free Text Product Anwar01', ' Description 001', '1', 'all_images/image_offer/original_image/54810420.png', '2018-02-20 07:51:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_new`
--

CREATE TABLE `product_new` (
  `product_new_id` int(10) UNSIGNED NOT NULL,
  `product_new_codice_catena` text,
  `product_new_codice_sito` text,
  `product_new_codinterno` text,
  `product_new_codminsan` text,
  `product_new_codean` text,
  `product_new_descrizione_ricerca` text,
  `product_new_descrizione_ecommerce` text,
  `product_new_descrizione_h1` text,
  `product_new_descrizione_h2` text,
  `product_new_descrizione_ditta` text,
  `product_new_prezzo_web_netto` text,
  `product_new_prezzo_web_lordo` text,
  `product_new_sconto_web` text,
  `product_new_iva` text,
  `product_new_visualizzazione_home_page` text,
  `product_new_visualizzazione_civetta` text,
  `product_new_codice_monografia` text,
  `product_new_codice_testo_immagine` text,
  `product_new_linkImmagineProdotto` text,
  `product_new_linkPaginaProdotto` text,
  `product_new_tree_id_label` varchar(20) DEFAULT NULL,
  `product_new_tree_label` text,
  `product_new_added_by_super_admin` tinyint(4) DEFAULT '0',
  `product_new_ref_pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `product_new_active` tinyint(4) DEFAULT '1',
  `product_new_updated_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_new`
--

INSERT INTO `product_new` (`product_new_id`, `product_new_codice_catena`, `product_new_codice_sito`, `product_new_codinterno`, `product_new_codminsan`, `product_new_codean`, `product_new_descrizione_ricerca`, `product_new_descrizione_ecommerce`, `product_new_descrizione_h1`, `product_new_descrizione_h2`, `product_new_descrizione_ditta`, `product_new_prezzo_web_netto`, `product_new_prezzo_web_lordo`, `product_new_sconto_web`, `product_new_iva`, `product_new_visualizzazione_home_page`, `product_new_visualizzazione_civetta`, `product_new_codice_monografia`, `product_new_codice_testo_immagine`, `product_new_linkImmagineProdotto`, `product_new_linkPaginaProdotto`, `product_new_tree_id_label`, `product_new_tree_label`, `product_new_added_by_super_admin`, `product_new_ref_pharmacy_id`, `product_new_active`, `product_new_updated_date_time`) VALUES
(4, '1', '1', '1', '1', '1', '', '', 'AIELLO SAS DI GIUSEPPE AIELLO  product 1', 'AIELLO SAS DI GIUSEPPE AIELLO  product 1', '', '10.00', '12.00', '', '', '', '', '', '', 'https://forthemommas.com/wp-content/uploads/2015/08/PediaCare-Cough-Syrup.jpg', '', '7', 'Personal Care', 0, 4, 1, '2018-02-19 19:32:59'),
(5, '2', '2', '2', '2', '2', '', '', 'AIELLO SAS DI GIUSEPPE AIELLO  product 2', 'AIELLO SAS DI GIUSEPPE AIELLO  product 2', '', '15.00', '16.00', '', '', '', '', '', '', 'https://www.mims.com/resources/drugs/Malaysia/packshot/Mucosolvan6001PPS0.JPG', '', '2', 'Naturale', 0, 4, 1, '2018-02-19 19:33:10'),
(6, '3', '3', '3', '3', '3', '', '', 'AIELLO SAS DI GIUSEPPE AIELLO  product 3', '', '', '20.00', '', '', '', '', '', '', '', 'https://ruarrijoseph.com/images/dom-i-semya/lekarstvo-lazolvan-detskij-sirop-instrukciya-po-primeneniyu.jpg', '', '9', 'Benessere Intimo', 0, 4, 1, '2018-02-19 19:33:18'),
(7, '4', '4', '4', '4', '', '', '', 'AIELLO SAS DI GIUSEPPE AIELLO  product 4', 'AIELLO SAS DI GIUSEPPE AIELLO  product 4', '', '25.00', '', '', '', '', '', '', '', 'https://www.herbalremediesadvice.org/images/Elecampane-Syrup.jpg', '', '5', 'Integratori', 0, 4, 1, '2018-02-19 19:33:27'),
(8, '5', '5', '5', '5', '5', '', '', 'AIELLO SAS DI GIUSEPPE AIELLO  product 5', 'AIELLO SAS DI GIUSEPPE AIELLO  product 5', '', '36.00', '', '', '', '', '', '', '', 'https://www.shophomeo.com/wp-content/uploads/2016/11/Haslab-Livotex-Syrup-450ml-1.jpg', '', '1', 'Mamma e Bimbo', 0, 4, 1, '2018-02-19 19:33:35'),
(9, '1', '1', '1', '1', '1', '', '', 'ABENAVOLI DR.ROSA ALBA Product 1', 'ABENAVOLI DR.ROSA ALBA Product 1', '', '25.00', '', '', '', '', '', '', '', 'http://5.imimg.com/data5/OG/SJ/MY-24626981/20171127_184003-500x500.jpg', '', '10', 'Offerte', 0, 1, 1, '2018-02-19 19:54:12'),
(10, '2', '2', '2', '2', '2', '', '', 'ABENAVOLI DR.ROSA ALBA product 2', 'ABENAVOLI DR.ROSA ALBA product 2', '', '36.00', '', '', '', '', '', '', '', 'http://cdn2.stylecraze.com/wp-content/uploads/2014/01/Himalaya-Koflet.jpg', '', '4', 'Articoli Sanitari', 0, 1, 1, '2018-02-19 19:55:32'),
(11, '3', '3', '3', '3', '3', '3', '3', 'ABENAVOLI DR.ROSA ALBA product 3', 'ABENAVOLI DR.ROSA ALBA product 3', '', '78.00', '', '', '', '', '', '', '', 'http://cdn2.stylecraze.com/wp-content/uploads/2014/01/Charak-Kofol.jpg', '', '5', 'Integratori', 0, 1, 1, '2018-02-19 19:56:14'),
(12, '4', '4', '4', '4', '4', '', '', 'ABENAVOLI DR.ROSA ALBA product 4', '', '', '36.00', '', '', '', '', '', '', '', 'http://cdn2.stylecraze.com/wp-content/uploads/2014/01/Himani-Fast-Relief-Herbal-Cough-And-Cold-Triple-Action-Syrup.jpg', '', '4', 'Articoli Sanitari', 0, 1, 1, '2018-02-19 19:57:01'),
(13, '5', '5', '5', '5', '5', '', '', 'ABENAVOLI DR.ROSA ALBA product 5', 'ABENAVOLI DR.ROSA ALBA product 5', '', '25.00', '', '', '', '', '', '', '', 'http://cdn2.stylecraze.com/wp-content/uploads/2014/01/Hamdard-Joshina.jpg', '', '4', 'Articoli Sanitari', 0, 1, 1, '2018-02-19 19:57:42'),
(14, '6', '6', '6', '6', '6', '', '', 'ABENAVOLI DR.ROSA ALBA product 6', 'ABENAVOLI DR.ROSA ALBA product 6', '', '20.00', '', '', '', '', '', '', '', 'http://cdn2.stylecraze.com/wp-content/uploads/2014/01/Dabur-Honitus.jpg', '', '2', 'Naturale', 0, 1, 1, '2018-02-19 19:58:23'),
(15, '1', '1', '1', '1', '1', '', '', 'ADAM FARMA DI ALESSANDRO Product 1', 'ADAM FARMA DI ALESSANDRO Product 1', '', '12.00', '', '', '', '', '', '', '', 'http://www.designbolts.com/wp-content/uploads/2014/03/Tesalon-Medicine-Packaging-designs-3.jpg', '', '10', 'Offerte', 0, 2, 1, '2018-02-19 20:19:49'),
(16, '2', '2', '2', '2', '2', '', '', 'ADAM FARMA DI ALESSANDRO Product 2', 'ADAM FARMA DI ALESSANDRO Product 2', '', '96.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Benadryl-Cough-Syrups.jpg', '', '5', 'Integratori', 0, 2, 1, '2018-02-19 20:32:39'),
(17, '3', '3', '3', '3', '3', '', '', 'ADAM FARMA DI ALESSANDRO Product 3', 'ADAM FARMA DI ALESSANDRO Product 3', '', '56.00', '', '', '', '', '', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51bxrS9W3nL._SY355_.jpg', '', '5', 'Integratori', 0, 2, 1, '2018-02-19 20:32:54'),
(18, '4', '4', '4', '4', '4', '', '', 'ADAM FARMA DI ALESSANDRO Product 4', 'ADAM FARMA DI ALESSANDRO Product 4', '', '36.00', '', '', '', '', '', '', '', 'https://4.imimg.com/data4/JL/IS/MY-8043155/honey-cough-syrup-500x500.jpg', '', '6', 'Cosmesi', 0, 2, 1, '2018-02-19 20:33:08'),
(19, '5', '5', '5', '5', '5', '', '', 'ADAM FARMA DI ALESSANDRO Product 5', 'ADAM FARMA DI ALESSANDRO Product 5', '', '23.00', '', '', '', '', '', '', '', 'https://5.imimg.com/data5/OB/IW/MY-25062655/torex-cough-syrup-500x500.jpg', '', '9', 'Benessere Intimo', 0, 2, 1, '2018-02-19 20:33:25'),
(20, '6', '6', '6', '6', '6', '', '', 'ADAM FARMA DI ALESSANDRO Product 6', 'ADAM FARMA DI ALESSANDRO Product 6', '', '14.00', '', '', '', '', '', '', '', 'https://4.imimg.com/data4/CJ/FF/GLADMIN-11534708/23-250x250.jpg', '', '7', 'Personal Care', 0, 2, 1, '2018-02-19 20:33:40'),
(21, '1', '1', '1', '1', '1', '', '', 'ADDANTE DR.NICOLA Product 1', 'ADDANTE DR.NICOLA Product 1', '', '25.00', '', '', '', '', '', '', '', 'http://www.reckeweg.pk/content/images/thumbs/0000185_dr-reckeweg-r-8-jutussin-cough-syrup-150ml_300.gif', '', '7', 'Personal Care', 0, 3, 1, '2018-02-19 20:39:21'),
(22, '4', '4', '4', '4', '4', '', '', 'ADDANTE DR.NICOLA Product 4', 'ADDANTE DR.NICOLA Product 4', '', '23.00', '', '', '', '', '', '', '', 'https://target.scene7.com/is/image/Target/14087349?wid=520&hei=520&fmt=pjpeg', '', '5', 'Integratori', 0, 3, 1, '2018-02-19 20:41:46'),
(23, '2', '2', '2', '2', '2', '', '', 'ADDANTE DR.NICOLA Product 2', 'ADDANTE DR.NICOLA Product 2', '', '12.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Corex-Cough-Syrup.jpg', '', '10', 'Offerte', 0, 3, 1, '2018-02-19 20:42:03'),
(24, '3', '3', '3', '3', '3', '3', '', 'ADDANTE DR.NICOLA Product 3', 'ADDANTE DR.NICOLA Product 3', '', '65.00', '', '', '', '', '', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51bxrS9W3nL._SY355_.jpg', '', '6', 'Cosmesi', 0, 3, 1, '2018-02-19 20:42:20'),
(25, '5', '5', '5', '5', '5', '5', '', 'ADDANTE DR.NICOLA Product 5', 'ADDANTE DR.NICOLA Product 5', '', '14.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Benadryl-Cough-Syrups.jpg', '', '6', 'Cosmesi', 0, 3, 1, '2018-02-19 20:42:39'),
(26, '1', '1', '1', '1', '1', '', '', 'Super Admin product 1', 'Super Admin product 1', '', '11.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Benadryl-Cough-Syrups.jpg', '', '5', 'Integratori', 1, NULL, 1, '2018-02-19 21:04:31'),
(27, '10', '10', '10', '10', '10', '10', '', 'Super Admin product 10', 'Super Admin product 10', '', '55.00', '', '', '', '', '', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51bxrS9W3nL._SY355_.jpg', '', '7', 'Personal Care', 1, NULL, 1, '2018-02-19 21:05:00'),
(28, '2', '2', '2', '2', '2', '', '', 'Super Admin product 2', 'Super Admin product 2', '', '21.00', '', '', '', '', '', '', '', 'https://4.imimg.com/data4/JL/IS/MY-8043155/honey-cough-syrup-500x500.jpg', '', '5', 'Integratori', 1, NULL, 1, '2018-02-19 21:05:21'),
(29, '3', '3', '3', '3', '3', '3', '', 'Super Admin product 3', 'Super Admin product 3', '', '33.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Corex-Cough-Syrup.jpg', '', '6', 'Cosmesi', 1, NULL, 1, '2018-02-19 21:05:33'),
(30, '4', '4', '4', '4', '4', '', '', 'Super Admin product 4', 'Super Admin product 4', '', '14.00', '', '', '', '', '', '', '', 'https://5.imimg.com/data5/OB/IW/MY-25062655/torex-cough-syrup-500x500.jpg', '', '2', 'Naturale', 1, NULL, 1, '2018-02-19 21:05:47'),
(31, '5', '5', '5', '5', '5', '', '', 'Super Admin product 5', 'Super Admin product 5', '', '35.00', '', '', '', '', '', '', '', 'http://www.reckeweg.pk/content/images/thumbs/0000185_dr-reckeweg-r-8-jutussin-cough-syrup-150ml_300.gif', '', '8', 'Igiene Orale', 1, NULL, 1, '2018-02-19 21:06:06'),
(32, '6', '6', '6', '6', '6', '', '', 'Super Admin product 6', 'Super Admin product 6', '', '7.00', '', '', '', '', '', '', '', 'https://4.imimg.com/data4/CJ/FF/GLADMIN-11534708/23-250x250.jpg', '', '10', 'Offerte', 1, NULL, 1, '2018-02-19 21:06:18'),
(33, '7', '7', '7', '7', '7', '7', '', 'Super Admin product 7', 'Super Admin product 7', '', '7.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Corex-Cough-Syrup.jpg', '', '3', 'Rimedi di Stagione', 1, NULL, 1, '2018-02-19 21:07:12'),
(34, '8', '8', '8', '8', '8', '8', '8', 'Super Admin product 8', 'Super Admin product 8', '', '36.00', '', '', '', '', '', '', '', 'https://target.scene7.com/is/image/Target/14087349?wid=520&hei=520&fmt=pjpeg', '', '1', 'Mamma e Bimbo', 1, NULL, 1, '2018-02-19 21:06:36'),
(35, '9', '9', '9', '9', '9', '9', '', 'Super Admin product 9', 'Super Admin product 9', '', '8.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Benadryl-Cough-Syrups.jpg', '', '6', 'Cosmesi', 1, NULL, 1, '2018-02-19 21:06:49'),
(36, '9', '9', '9', '9', '9', '', '', 'Super Admin product 9', 'Super Admin product 9', '', '32.00', '', '', '', '', '', '', '', 'http://stylesatlife.com/wp-content/uploads/2017/03/Corex-Cough-Syrup.jpg', '', '8', 'Igiene Orale', 1, NULL, 1, '2018-02-19 21:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `push_information`
--

CREATE TABLE `push_information` (
  `push_information_id` int(11) NOT NULL,
  `push_information_android_server_url` varchar(1000) NOT NULL DEFAULT 'https://android.googleapis.com/gcm/send',
  `push_information_android_gcm_api_key` varchar(1000) NOT NULL,
  `push_information_android_project_number` varchar(1000) NOT NULL,
  `push_information_ios_development_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.sandbox.push.apple.com:2195',
  `push_information_ios_distribution_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.push.apple.com:2195',
  `push_information_ios_current_gateway_ssl` varchar(1000) NOT NULL DEFAULT 'ssl://gateway.push.apple.com:2195',
  `push_information_ios_local_cert_pem_file_name` varchar(1000) NOT NULL,
  `push_information_ios_passphrase` varchar(1000) NOT NULL,
  `push_information_activation` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `user_orders_id` int(10) UNSIGNED NOT NULL,
  `ref_user_orders_app_user_id` int(10) UNSIGNED DEFAULT '1' COMMENT '1 means from Farma and 0 means from Pharmacy',
  `user_orders_is_delivered` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 MEANS DELIVERED,0 MEANS IS NOT DELIVERED',
  `user_orders_is_seen_super_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 means seen,0 means not seen',
  `user_orders_is_active` tinyint(4) NOT NULL DEFAULT '1',
  `user_orders_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_orders_delivery_date_time` timestamp NULL DEFAULT NULL,
  `user_orders_delivery_text` text,
  `user_orders_is_seen_pharmacy_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`user_orders_id`, `ref_user_orders_app_user_id`, `user_orders_is_delivered`, `user_orders_is_seen_super_admin`, `user_orders_is_active`, `user_orders_date_time`, `user_orders_delivery_date_time`, `user_orders_delivery_text`, `user_orders_is_seen_pharmacy_admin`) VALUES
(65, 1, 0, 1, 1, '2018-02-20 16:02:41', NULL, NULL, 1),
(66, 28, 0, 0, 1, '2018-02-20 16:06:15', NULL, NULL, 0),
(67, 25, 0, 0, 1, '2018-02-20 16:07:43', NULL, NULL, 0),
(68, 24, 0, 0, 1, '2018-02-20 16:09:15', NULL, NULL, 0),
(69, 20, 0, 0, 1, '2018-02-20 16:11:05', NULL, NULL, 0),
(70, 10, 0, 0, 1, '2018-02-20 16:12:23', NULL, NULL, 0),
(71, 15, 0, 0, 1, '2018-02-20 16:14:12', NULL, NULL, 0),
(72, 16, 0, 0, 1, '2018-02-20 16:15:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders_product`
--

CREATE TABLE `user_orders_product` (
  `user_orders_product_id` int(10) UNSIGNED NOT NULL,
  `ref_user_orders_product_user_orders_id` int(10) UNSIGNED NOT NULL,
  `ref_user_orders_product_final_product_id` int(10) UNSIGNED NOT NULL,
  `user_orders_product_quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_orders_product_per_price` varchar(10) NOT NULL,
  `user_orders_product_is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders_product`
--

INSERT INTO `user_orders_product` (`user_orders_product_id`, `ref_user_orders_product_user_orders_id`, `ref_user_orders_product_final_product_id`, `user_orders_product_quantity`, `user_orders_product_per_price`, `user_orders_product_is_active`) VALUES
(134, 65, 50, 10, '15', 1),
(135, 65, 3, 15, '12', 1),
(136, 66, 49, 15, '10', 1),
(137, 66, 55, 15, '10', 1),
(138, 67, 69, 15, '6', 1),
(139, 67, 80, 25, '4', 1),
(140, 68, 79, 15, '12', 1),
(141, 68, 115, 98, '20', 1),
(142, 69, 82, 12, '12', 1),
(143, 69, 87, 10, '25', 1),
(144, 70, 83, 88, '12', 1),
(145, 70, 99, 35, '12', 1),
(146, 70, 3, 14, '12', 1),
(147, 71, 36, 25, '65', 1),
(148, 71, 32, 10, '12', 1),
(149, 72, 2, 65, '65', 1),
(150, 72, 1, 25, '15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(100) NOT NULL,
  `user_type_description` varchar(250) DEFAULT NULL,
  `user_type_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`, `user_type_description`, `user_type_active`) VALUES
(1, 'SUPER_ADMIN', 'Who can maintain everything.', 1),
(2, 'PHARMACY', 'Who can maintain everything with switchy_admin permission.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`),
  ADD UNIQUE KEY `admin_user_name` (`admin_user_name`),
  ADD KEY `admin_user_ref_pharmacy_id` (`admin_user_ref_pharmacy_id`),
  ADD KEY `admin_user_ref_user_type_id` (`admin_user_ref_user_type_id`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`app_user_id`),
  ADD UNIQUE KEY `app_user_device_unique_id` (`app_user_device_unique_id`),
  ADD KEY `ref_app_user_device_type_id` (`ref_app_user_device_type_id`);

--
-- Indexes for table `app_user_android`
--
ALTER TABLE `app_user_android`
  ADD PRIMARY KEY (`ref_app_user_android_app_user_id`),
  ADD UNIQUE KEY `android_device_push_token` (`android_device_push_token`);

--
-- Indexes for table `app_user_details`
--
ALTER TABLE `app_user_details`
  ADD PRIMARY KEY (`ref_app_user_details_app_user_id`);

--
-- Indexes for table `app_user_ios`
--
ALTER TABLE `app_user_ios`
  ADD PRIMARY KEY (`ref_app_user_ios_app_user_id`),
  ADD UNIQUE KEY `ios_device_token` (`ios_device_token`);

--
-- Indexes for table `app_user_pharmacy`
--
ALTER TABLE `app_user_pharmacy`
  ADD PRIMARY KEY (`app_user_pharmacy_id`),
  ADD KEY `ref_app_user_pharmacy_app_user_id` (`ref_app_user_pharmacy_app_user_id`),
  ADD KEY `ref_app_user_pharmacy_pharmacy_id` (`ref_app_user_pharmacy_pharmacy_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`codice_categoria`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`device_type_id`),
  ADD UNIQUE KEY `device_type_name` (`device_type_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`),
  ADD KEY `ref_events_event_type_id` (`ref_events_event_type_id`),
  ADD KEY `ref_events_pharmacy_id` (`ref_events_pharmacy_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `farmacisti`
--
ALTER TABLE `farmacisti`
  ADD PRIMARY KEY (`farmacisti_id`),
  ADD KEY `ref_farmacisti_pharmacy_id` (`ref_farmacisti_pharmacy_id`);

--
-- Indexes for table `final_product`
--
ALTER TABLE `final_product`
  ADD PRIMARY KEY (`final_product_id`),
  ADD KEY `ref_final_product_product_id` (`ref_final_product_product_id`),
  ADD KEY `ref_final_product_product_new_id` (`ref_final_product_product_new_id`),
  ADD KEY `ref_final_product_product_free_text_id` (`ref_final_product_product_free_text_id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`gallery_image_id`),
  ADD KEY `ref_gallery_image_pharmacy_id` (`ref_gallery_image_pharmacy_id`);

--
-- Indexes for table `group_message`
--
ALTER TABLE `group_message`
  ADD PRIMARY KEY (`group_message_id`),
  ADD KEY `ref_group_message_message_id` (`ref_group_message_message_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `ref_message_message_type_id` (`ref_message_message_type_id`),
  ADD KEY `ref_message_message_from_id` (`ref_message_message_from_id`),
  ADD KEY `ref_message_pharmacy_id` (`ref_message_pharmacy_id`);

--
-- Indexes for table `message_file`
--
ALTER TABLE `message_file`
  ADD PRIMARY KEY (`message_file_id`),
  ADD KEY `ref_message_file_message_id` (`ref_message_file_message_id`);

--
-- Indexes for table `message_from`
--
ALTER TABLE `message_from`
  ADD PRIMARY KEY (`message_from_id`),
  ADD UNIQUE KEY `message_from_name` (`message_from_name`);

--
-- Indexes for table `message_type`
--
ALTER TABLE `message_type`
  ADD PRIMARY KEY (`message_type_id`),
  ADD UNIQUE KEY `message_type_name` (`message_type_name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `offer_pdf`
--
ALTER TABLE `offer_pdf`
  ADD PRIMARY KEY (`offer_pdf_id`),
  ADD KEY `ref_offer_pdf_pharmacy_id` (`ref_offer_pdf_pharmacy_id`);

--
-- Indexes for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD PRIMARY KEY (`offer_products_id`),
  ADD KEY `ref_offer_products_offerr_pdf_id` (`ref_offer_products_offerr_pdf_id`),
  ADD KEY `ref_offer_products_final_product_id` (`ref_offer_products_final_product_id`),
  ADD KEY `ref_offer_products_pharmacy_id` (`ref_offer_products_pharmacy_id`);

--
-- Indexes for table `personal_message`
--
ALTER TABLE `personal_message`
  ADD PRIMARY KEY (`personal_message_id`),
  ADD KEY `ref_personal_message_message_id` (`ref_personal_message_message_id`),
  ADD KEY `ref_personal_message_app_user_id` (`ref_personal_message_app_user_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_free_text`
--
ALTER TABLE `product_free_text`
  ADD PRIMARY KEY (`product_free_text_id`),
  ADD KEY `ref_product_free_text_pharmacy_id` (`ref_product_free_text_pharmacy_id`);

--
-- Indexes for table `product_new`
--
ALTER TABLE `product_new`
  ADD PRIMARY KEY (`product_new_id`),
  ADD KEY `product_new_ref_pharmacy_id` (`product_new_ref_pharmacy_id`);

--
-- Indexes for table `push_information`
--
ALTER TABLE `push_information`
  ADD PRIMARY KEY (`push_information_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`user_orders_id`),
  ADD KEY `ref_user_orders_app_user_id` (`ref_user_orders_app_user_id`);

--
-- Indexes for table `user_orders_product`
--
ALTER TABLE `user_orders_product`
  ADD PRIMARY KEY (`user_orders_product_id`),
  ADD KEY `ref_user_orders_product_user_orders_id` (`ref_user_orders_product_user_orders_id`),
  ADD KEY `ref_user_orders_product_final_product_id` (`ref_user_orders_product_final_product_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`),
  ADD UNIQUE KEY `user_type_name` (`user_type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_us_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `app_user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `app_user_pharmacy`
--
ALTER TABLE `app_user_pharmacy`
  MODIFY `app_user_pharmacy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `device_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `farmacisti`
--
ALTER TABLE `farmacisti`
  MODIFY `farmacisti_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `final_product`
--
ALTER TABLE `final_product`
  MODIFY `final_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `gallery_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `group_message`
--
ALTER TABLE `group_message`
  MODIFY `group_message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;
--
-- AUTO_INCREMENT for table `message_file`
--
ALTER TABLE `message_file`
  MODIFY `message_file_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_from`
--
ALTER TABLE `message_from`
  MODIFY `message_from_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message_type`
--
ALTER TABLE `message_type`
  MODIFY `message_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `offer_pdf`
--
ALTER TABLE `offer_pdf`
  MODIFY `offer_pdf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `offer_products_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `personal_message`
--
ALTER TABLE `personal_message`
  MODIFY `personal_message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmacy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `product_free_text`
--
ALTER TABLE `product_free_text`
  MODIFY `product_free_text_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `product_new`
--
ALTER TABLE `product_new`
  MODIFY `product_new_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `push_information`
--
ALTER TABLE `push_information`
  MODIFY `push_information_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `user_orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user_orders_product`
--
ALTER TABLE `user_orders_product`
  MODIFY `user_orders_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`admin_user_ref_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`),
  ADD CONSTRAINT `admin_user_ibfk_2` FOREIGN KEY (`admin_user_ref_user_type_id`) REFERENCES `user_type` (`user_type_id`);

--
-- Constraints for table `app_user`
--
ALTER TABLE `app_user`
  ADD CONSTRAINT `app_user_ibfk_1` FOREIGN KEY (`ref_app_user_device_type_id`) REFERENCES `device_type` (`device_type_id`);

--
-- Constraints for table `app_user_android`
--
ALTER TABLE `app_user_android`
  ADD CONSTRAINT `app_user_android_ibfk_1` FOREIGN KEY (`ref_app_user_android_app_user_id`) REFERENCES `app_user` (`app_user_id`);

--
-- Constraints for table `app_user_details`
--
ALTER TABLE `app_user_details`
  ADD CONSTRAINT `app_user_details_ibfk_1` FOREIGN KEY (`ref_app_user_details_app_user_id`) REFERENCES `app_user` (`app_user_id`);

--
-- Constraints for table `app_user_ios`
--
ALTER TABLE `app_user_ios`
  ADD CONSTRAINT `app_user_ios_ibfk_1` FOREIGN KEY (`ref_app_user_ios_app_user_id`) REFERENCES `app_user` (`app_user_id`);

--
-- Constraints for table `app_user_pharmacy`
--
ALTER TABLE `app_user_pharmacy`
  ADD CONSTRAINT `app_user_pharmacy_ibfk_1` FOREIGN KEY (`ref_app_user_pharmacy_app_user_id`) REFERENCES `app_user` (`app_user_id`),
  ADD CONSTRAINT `app_user_pharmacy_ibfk_2` FOREIGN KEY (`ref_app_user_pharmacy_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ref_events_event_type_id`) REFERENCES `event_type` (`event_type_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`ref_events_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `farmacisti`
--
ALTER TABLE `farmacisti`
  ADD CONSTRAINT `farmacisti_ibfk_1` FOREIGN KEY (`ref_farmacisti_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `final_product`
--
ALTER TABLE `final_product`
  ADD CONSTRAINT `final_product_ibfk_1` FOREIGN KEY (`ref_final_product_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `final_product_ibfk_2` FOREIGN KEY (`ref_final_product_product_new_id`) REFERENCES `product_new` (`product_new_id`),
  ADD CONSTRAINT `final_product_ibfk_3` FOREIGN KEY (`ref_final_product_product_free_text_id`) REFERENCES `product_free_text` (`product_free_text_id`);

--
-- Constraints for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD CONSTRAINT `gallery_image_ibfk_1` FOREIGN KEY (`ref_gallery_image_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `group_message`
--
ALTER TABLE `group_message`
  ADD CONSTRAINT `group_message_ibfk_1` FOREIGN KEY (`ref_group_message_message_id`) REFERENCES `message` (`message_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ref_message_message_type_id`) REFERENCES `message_type` (`message_type_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`ref_message_message_from_id`) REFERENCES `message_from` (`message_from_id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`ref_message_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `message_file`
--
ALTER TABLE `message_file`
  ADD CONSTRAINT `message_file_ibfk_1` FOREIGN KEY (`ref_message_file_message_id`) REFERENCES `message` (`message_id`);

--
-- Constraints for table `offer_pdf`
--
ALTER TABLE `offer_pdf`
  ADD CONSTRAINT `offer_pdf_ibfk_1` FOREIGN KEY (`ref_offer_pdf_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD CONSTRAINT `offer_products_ibfk_1` FOREIGN KEY (`ref_offer_products_offerr_pdf_id`) REFERENCES `offer_pdf` (`offer_pdf_id`),
  ADD CONSTRAINT `offer_products_ibfk_2` FOREIGN KEY (`ref_offer_products_final_product_id`) REFERENCES `final_product` (`final_product_id`),
  ADD CONSTRAINT `offer_products_ibfk_3` FOREIGN KEY (`ref_offer_products_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `personal_message`
--
ALTER TABLE `personal_message`
  ADD CONSTRAINT `personal_message_ibfk_1` FOREIGN KEY (`ref_personal_message_message_id`) REFERENCES `message` (`message_id`),
  ADD CONSTRAINT `personal_message_ibfk_2` FOREIGN KEY (`ref_personal_message_app_user_id`) REFERENCES `app_user` (`app_user_id`);

--
-- Constraints for table `product_free_text`
--
ALTER TABLE `product_free_text`
  ADD CONSTRAINT `product_free_text_ibfk_1` FOREIGN KEY (`ref_product_free_text_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `product_new`
--
ALTER TABLE `product_new`
  ADD CONSTRAINT `product_new_ibfk_1` FOREIGN KEY (`product_new_ref_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`ref_user_orders_app_user_id`) REFERENCES `app_user` (`app_user_id`);

--
-- Constraints for table `user_orders_product`
--
ALTER TABLE `user_orders_product`
  ADD CONSTRAINT `user_orders_product_ibfk_1` FOREIGN KEY (`ref_user_orders_product_user_orders_id`) REFERENCES `user_orders` (`user_orders_id`),
  ADD CONSTRAINT `user_orders_product_ibfk_2` FOREIGN KEY (`ref_user_orders_product_final_product_id`) REFERENCES `final_product` (`final_product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
