-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 04:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `image` varchar(40) NOT NULL,
  `contact` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `contact`) VALUES
(3, 'Fayeq', 'fayeq@gmail.com', 'fayeq123', '', '0799225732');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `Question_id` int(11) DEFAULT NULL,
  `Student_id` int(11) DEFAULT NULL,
  `answer_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer`, `Question_id`, `Student_id`, `answer_date`) VALUES
(17, 'Syntax: function function_name(argument){ your code } ', 25, NULL, '2018-02-20'),
(18, 'it easy man:\r\nfunction myfunction()\r\n{\r\n........\r\n\r\n}\r\n', 25, 68, '2018-02-20'),
(19, 'by using insert query\r\nINSERT INTO TABLENAME () VALUSE();', NULL, 68, '2018-02-21'),
(20, 'by using insert query', NULL, 68, '2018-02-21'),
(21, 'use $_FILES global Veraible ', 24, NULL, '2018-02-22'),
(22, '$.ajax(\r\n   method:"POST",\r\n   actions:"your page",\r\n   data:"your date which u want send",\r\n   success:fucntion(data)\r\n{\r\n  ..code\r\n}\r\n);', 34, NULL, '2018-02-23'),
(23, 'USE DELTE QUERY', 35, 68, '2018-02-25'),
(24, 'by using bootstrap platform u can easly make your website responsive', 37, NULL, '2018-03-10'),
(25, 'well simply we can say it is used to hold information and transfer it from one page to another page .', 44, 69, '2019-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Article_id` int(11) NOT NULL,
  `Author_name` varchar(30) NOT NULL,
  `Article_title` varchar(200) NOT NULL,
  `Article_body` text NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `uploadDate` date NOT NULL,
  `Article_status` enum('aproved','notaproved') NOT NULL DEFAULT 'notaproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Article_id`, `Author_name`, `Article_title`, `Article_body`, `Teacher_id`, `uploadDate`, `Article_status`) VALUES
(4, 'panelYao-TingSung', 'The effects of integrating mobile devices with teaching and learning', '  Mobile devices such as laptops, personal digital assistants, and mobile phones have become a learning tool with great potential in both classrooms and outdoor learning. Although there have been qualitative analyses of the use of mobile devices in education, systematic quantitative analyses of the effects of mobile-integrated education are lacking. This study performed a meta-analysis and research synthesis of the effects of integrated mobile devices in teaching and learning, in which 110 experimental and quasiexperimental journal articles published during the period 1993â€“2013 were coded and analyzed. Overall, there was a moderate mean effect size of 0.523 for the application of mobile devices to education. The effect sizes of moderator variables were analyzed and the advantages and disadvantages of mobile learning in different levels of moderator variables were synthesized based on content analyses of individual studies. The results of this study and their implications for both research and practice are discussed.', 9, '2018-02-05', 'aproved'),
(5, 'By Neal Leavitt', 'Technology Helping Firefighters Tackle Wildfires', ' The Lilac Fire, which started as a small brushfire on Interstate 15 in San Diego County earlier that day, had quickly grown to over 4,000 acres.  And we were now in the fireâ€™s crosshairs.\n \nWith ash and embers swirling around us, it was time to go.  Put the suitcases in the car, grabbed our Yorkie, said a brief prayer and left.  On our way out, one of the firefighters at the gate leading out to the street told us he expected the fire to be in our area within 15 minutes.\n \nFortunately, thanks to the superhuman efforts of the firefighters, many of whom camped out in our back yard and in the yards of many of our neighbors for two straight nights, all of the homes in our immediate neighborhood were spared.  \n \nIt was a close call; many of the surrounding hillsides now resemble a lunar landscape and dozens of the lovely old oaks along Olive Hill Road (one of the Lilac Fireâ€™s epicenters) were burned.  \n \nBut weâ€™re thankful this holiday season that we have a house to come home to.\n \nNow that things are somewhat settling down, it got me to thinking about how technology is giving firefighters an extra edge. With the Lilac Fire, helicopters carried iPads that displayed critical information; the firefighters also had custom cell phone apps that gave them up-to-the-second status reports.\n \nAnd thatâ€™s just the tip of the proverbial iceberg as firefighters are rapidly adapting new technologies to further combat seemingly larger and deadlier wildfires each season (and here in California, it has pretty much become year-round).\n \nHere are a few examples:\n \nAt UC-Berkeley, astrophysicist Carlton Pennypacker and a team of researchers have been developing a system called the Fire Urgency Estimator in Geosynchronous Orbit (FUEGO).  In brief, FUEGO uses satellite and drone technology to monitor wildfires in their early stages.  FUEGO is currently testing various parts of the system.\n \nâ€œItâ€™s probably five years before weâ€™ll have a huge effectiveness,â€ Pennypacker says.  â€œI think we can have some modest effectiveness almost immediately. Weâ€™re not going to stop all fires, but the future is optimistic on this.â€\n \nBack in August, San Diego Fire Rescue began a trial test on aircraft equipped with radar and high-tech sensors that tells them if fires are moving into residential areas.  According to FireRescue 1 News, â€œthe radar technology gives firefighters the ability to draw a perimeter around the fire and change it continuously based on what direction it is moving.  Firefighters also will be able to see how the fire changes once water is dropped onto it, and the technology will help them see through smoke better.â€\n \nIn Sweden, a futuristic firefighting helmet called â€˜C-Thruâ€™ uses cloud computing to send and receive data. Data is projected onto the helmet lens â€“ this provides a heads-up display that includes vitals like temperature, remaining oxygen and CO2 levels. A thermo-optic camera enables firefighters to see even in thick smoke.\n \nAnd firefighting robots will become ubiquitous over the next few years. Maine-based Howe and Howe Technologies has developed Thermite, a firefighting robot that can withstand extreme heat and winds.\n \nVirtual Reality (VR) is also becoming an important firefighting tool.  Orange Business Services, a global telecommunications operator and IT services company, said the US Forest Service is currently employing VR to train smokejumpers who parachute into remote areas to fight wildfires.\n \nâ€œThe VR simulators create 3D representations of the fire scenario, with trainers able to change physical characteristics like wind direction and speed, to prepare smokejumpers for real life engagements in truly dangerous conditions,â€ notes the company.\n \nOrange Business Services also reports that low-powered Internet of Things (IoT) connected sensors are being used to gather data from remote areas that are potential hotspots.\n \nâ€œSensors can be used to detect and measure the level of CO2 and check for unseasonably high temperatures, indicating the possible presence of fires in the area.  Given that these connected devices require minimal power, a Low-Power Wide-Area Network (LPWAN) is ideal here,â€ says the company.\n \nFire season length has increased almost 20 percent in one generation not only in California, but throughout North America. And with more people living in areas affected by wildfires, itâ€™s critical that firefighters have access to more than just a hose. Sensor technology, drones, data analytics, and more, are providing firefighters with the tools they need.\n \nThese technologies may just help save your house too.', 9, '2018-02-11', 'notaproved'),
(6, ' Lori Cameron', 'The Most Sought-After Computing Careers of 2017', '    It''s the holidays, folks, and hopefully you''re taking a break from the job hunt.\r\n \r\nYou''ve earned it.\r\n \r\nNow that the year is almost over, it''s time to take a look back and see what employment opportunities trended well on our jobs board in 2017 [https://computer.org/jobs].\r\n \r\nThe results of our informal survey of the top 50 most popular job searches reflect a healthy interest in academic and industry positions, as well as insight into what types of positions our community is looking for.\r\n \r\nThe most sought-after position in industry was overwhelmingly software engineer, which comprised roughly 17% of the top 50 searches.\r\n \r\nEarlier this year, we interviewed George Hurlburt, chief scientist at STEMCorp, and Jeffrey Voas, computer scientist at the National Institute of Standards and Technology, about which software engineering careers will see the most growth in the next few years. \r\n \r\nHurlburt mentioned how networks permeate physics, chemistry, biology, psychology, sociology, economics, and mathematics, making applied network science a demanding field. \r\n \r\nVoas mentioned three areas artificial intelligence, algorithms, and understanding how data/data analytics feed business and economic decisions.\r\n \r\nâ€œUnderstanding the three areas together make for a very valuable software engineer for todayâ€™s world of Internet of Things, Blockchain, Mobile Apps, Big Data, and Cloud Computing,â€ Voas said.\r\n \r\nIf your interest lies in software engineering, Hurlburt says, learning should be lifelong. \r\n \r\nâ€œChange continues to accelerate at unprecedented rates requiring acquisition of new skills with the passage of time,â€ Hurlburt said.\r\n \r\nVoas added, â€œI only hired those who had a passion for solving hard problems and were willing to work until a problem was solved.â€\r\n \r\nBeyond software engineering, our jobs board visitors gravitated toward positions in computer programming, software architecture, and information technology, each comprising about 7-8% of searches. \r\n \r\nFrom there, interest focused on openings for database developers, research analysts, application developers and engineers, business and data analysts, and network engineers.\r\n \r\nThe only positions that gave software engineering a run for its money were academic positionsâ€”from lecturers all the way to full professors and administrators. Searches came in at a whopping 20%. The No. 1 search was for a continuing lecturer position at Purdue University. The eighth highest search was for numerous faculty positions at the University of South Floridaâ€™s College of Engineering.\r\n \r\nWhat kind of computing career are you looking for?\r\n \r\nThe CS jobs board lists full-time and part-time jobs, summer research positions, and internshipsâ€”a one-stop job-hunting source for computer and software professionals everywhere.', 1, '2018-02-21', 'aproved'),
(7, 'Farhad Farhady', 'What I Wish I Could Tell Them About Teaching in a Title I School ', 'Iâ€™m in my fifth year of teaching English at a Title I middle school. Title I schools are public schools that receive special grants because of their high number of students who have been identified as at-risk. I adore my students and my teaching team. I love teaching. Iâ€™m really good at it. I respect my administration and feel valued by them.\r\n\r\nBut at the end of this year, Iâ€™m leaving. Iâ€™m not sure if Iâ€™ll continue teaching elsewhere or start a new career. If I do leave, Iâ€™ll be one of the 40-50% of teachers who leave during their first five years. A drop in the bucket.\r\n\r\nTo other teachers, Iâ€™m sure this isnâ€™t surprising. Without knowing me or where I teach, they can probably easily guess why someone who loves her job and is good at it would be leaving.\r\n\r\nBut itâ€™s not teachers who need to know what itâ€™s like. Itâ€™s everyone else. People who have no idea what itâ€™s like teaching in a Title I school. Some of these people are even making important decisions about education.\r\n\r\nThere are so many things I would tell them.\r\n\r\n\r\n\r\nI would tell them about the bright bulletin boards, posters, and student work that are either taken down or covered with white butcher paper for most of the spring semester, because the state mandates that there can be no words of any kind on the walls during one of the 14 standardized tests.\r\n\r\nI would tell them about the 35 desks I have in my classroom, and how in two of my classes, all the desks are filled.\r\n\r\nI would tell them about the hours Iâ€™ve spent outside of class time writing grants to get novels because my school doesnâ€™t have the money for them.\r\n\r\nI would tell them that I get to school about two hours before the first bell every day, but I still spend less time at school than most of my colleagues.\r\n\r\nI would tell them about how Iâ€™m not allowed to fail a student without turning in a form to the front office that specifies all instances of parent contact, describing in detail the exact accommodations and extra instruction that the child was given.  I would tell them about how impossible this form is to complete, when leaving a voicemail doesnâ€™t count as contact and many parentsâ€™ numbers change or are disconnected during the school year. I would tell them how unrealistic it is to document every time you help a child when you have a hundred of them, and how this results in so many teachers passing students who should be failing.\r\n\r\nI would tell them how systems that have been put in place to not leave children behind are allowing them to fall even further behind.\r\n\r\nI would tell them that even though I love my job and work harder at it than Iâ€™ve ever worked for anything, the loudest voice in my head is the one that is constantly saying youâ€™re not doing enough. I hear it all the time.\r\n\r\nI would tell them about the student in one of my classes who in August of last year, flat-out refused to do any work because of how much he hated reading. I would tell them that today, when he found out we werenâ€™t going to be doing book groups, I heard him mutter, â€œOh, man. I wanted to keep reading,â€ and I said, â€œWHAT DID YOU SAY?â€ really loud and shook his shoulders jokingly. We laughed together and I had to change the subject quickly because I choked up thinking of how much work it has taken both of us to get to this place, and of how badly I hope that his high school teachers donâ€™t give up on him.\r\n\r\nI would tell them that if I could compartmentalize things so that teaching was simply instructing a reasonable number of students and grading and planning lessons and visiting studentsâ€™ families, I would be a teacher forever. No question.\r\n\r\nI would tell them that I teach the honors section of my grade level, but only about 70% of my honors students had even passed the standardized test the year before they came to me. My colleagues who teach the non-honors classes inherit students with a passing rate of 30-40%.\r\n\r\nI would tell them that almost all my students passed after being in my class, and that Iâ€™ve worked really, really hard to find a way of getting my kids to excel without â€œteaching to the test,â€ but that instead of being proud of this, I think of the handful who didnâ€™t pass, and how I could have done more for them.\r\n\r\nI would tell them about my pencil cup that I keep filled from donations and out of my own pocket. I donâ€™t ask for collateral or even for students to return them because it would take up too much instructional time. I once had a student refuse to do work because he didnâ€™t have a pencil, and I said, Donâ€™t you know that youâ€™ll have to do the work so that you can go on to the next grade with your friends? And he said, without skipping a beat, Iâ€™ve failed almost all my classes since third grade and I always promote. I donâ€™t even go to summer school. I stood there, dumbfounded, knowing he was right, but surprised heâ€™d figured out the system so easily. The next day, I had the pencil cup.\r\n\r\nI would tell them about how policies that have been designed to not leave children behind are also teaching them that hard work doesnâ€™t matter.\r\n\r\nI would tell them about David, a severely dyslexic student my second year of teaching who made my teaching life miserable early on with his constant defiance and disrespect. I would tell them about the day he came in early before school and asked if I could type out a poem that heâ€™d written and memorized in his head, and as he recited it I started crying, then he started crying too, and I would tell them how everything was different between David and me after that.\r\n\r\nI would tell them about how I try to divide my time between everybody when my students are working in groups, but I almost always end up spending more time with my struggling students. I know that my students who are behind need me, but that doesnâ€™t mean that my advanced students donâ€™t need me just as much. I always feel torn. In an effort to not leave five students behind, Iâ€™m leaving behind 30 others.\r\n\r\nI would tell them about my studentsâ€™ parents, and about the dreams they have for their children. I would tell them about the single mom whose husband died last year and left behind two children with learning disabilities, and how sheâ€™s now working two jobs to make ends meet. I would tell them about how the dad of one of my students who took me aside at Parent Night and said to me, with tears in his eyes, â€œI didnâ€™t get past the fifth grade. But Carmen, sheâ€™s going places. I know it.â€\r\n\r\nI would tell them that students who break rules at our school often donâ€™t receive consequences. Last year our school had a higher number of office referrals and in-school suspensions, so this year teachers have been â€œstrongly encouragedâ€ to deal with discipline problems themselves. That means that unless the offense is severe or dangerous, students remain in class, whether or not their behavior is blatantly defiant.\r\n\r\nI would tell them what a difficult situation this creates for the brand-new teachers, who are learning for the first time how to manage a classroom in an environment with so little disciplinary support. I would tell them how many teachersâ€”good teachersâ€”I know who have walked away during or after their first year because of this.\r\n\r\nI would tell them about how a few weeks ago, I told another teacherâ€™s student I would be escorting her to the office for her behavior, and she replied, â€œWhy the f**k would that matter?â€ This student was back in that teacherâ€™s class five minutes later with candy she received in the office.\r\n\r\nI would tell them how hard it is to not feel hopeless when you realize that systems are teaching students that not only does it not matter if you do work at school, but it also doesnâ€™t matter how you behave. \r\n\r\nI would tell them about my quietest student, Isobel, and how, on the day of our poetry slam, she stood up in front of the class and, in a voice that was loud and confident, recited every word of Amy Gerstlerâ€™s â€œTouring the Doll Hospitalâ€ by memory, and how all of us gave her a standing ovation and ran to hug her afterwards, and how it made me think of the quote from a character in Wonder by R.J. Palacio, â€œEveryone deserves a standing ovation because we all overcometh the world.â€ It was one of those weird moments where literature and life and beauty crash into you together at a thousand miles an hour and it knocks the wind out of you, but you look around and youâ€™re alive, more than ever.\r\n\r\nI would tell them how my personality has changed under the stress of the past five years. I used to be fun. I used to be a bright and warm person who would go out of her way to help people or make them laugh. Now, if I can manage to act like myself during the school day, the second the bell rings Iâ€™m withdrawn, snappish, and moody.\r\n\r\nI would tell them how this stress has started to overrun the part of teaching I love so fiercely.\r\n\r\nI would tell them that it feels like I have three choices: 1) stay where I am, continue working hard and destroy myself, 2) stay and protect myself by putting in less effort, or 3) leave and abandon a profession and kids I care about.\r\n\r\nI would tell them how much I hate all of those choices.\r\n\r\nI would tell them that Iâ€™m not alone; that my story is all too common, and that I know far too many teachers who have it worse than I do.\r\n\r\nI would tell them about when I interviewed recently at a private school on the other side of town, and how it went really well and the interviewer said she wished she could scoop me up right then and there, and how I got back in my car and put my head on the steering wheel and wept.\r\n\r\n\r\n\r\n\r\nWhy do I want them to know these things?\r\n\r\nCertainly not for the glory. If Iâ€™ve learned anything in my time as a teacher, itâ€™s that the only heroes in this story are kids who go to school and do their best despite the systems that are keeping them down.\r\n\r\nIâ€™m also not writing this for proof or validation that I work hard. I donâ€™t have anything to prove about my work ethic or value as a teacher, to myself or anyone else, and this is not meant to initiate a game of â€œwho has it worse.â€\r\n\r\nIâ€™m also not writing this to incriminate my school administrators or my district. If I thought the problem was confined to my school, I would not be sharing this publicly. The problem is nation-wide.\r\n\r\nNo. Iâ€™m writing this because I care about what happens to my students, and other children like them in Title I schools across this country whose needs are not being met, and who are learning harmful lessons from the larger systems in place that are supposed to help them. I am writing this to give others a picture of the type of learning and teaching environments that are being created by these systems.  Iâ€™m writing because itâ€™s 2015, and far too many children in this country are still receiving a lower quality education because of the neighborhood into which they were born.\r\n\r\nI donâ€™t know what to do about it. I have some ideas, but I donâ€™t have nearly enough knowledge of policy to even know where to begin. All I know is what I and others see at the front lines every day, and I just know that itâ€™s not workingâ€”for students or their teachers.  \r\n\r\n\r\nThis is what I would tell them. I may have burned out in the process, but I will never stop fighting for these kids, their families, or the teachers who care about them. \r\n\r\nLove,\r\n\r\nTeach\r\n\r\n', 1, '2018-02-19', 'aproved'),
(9, 'Jo Earp', 'Upgrading your skills and supporting others', 'Taking a postgraduate qualification is an opportunity to not only upgrade your personal skill-set, but also add to the collective staff expertise in your school community.\r\n\r\nMarilyn Faithfull was leader of the Mathematics Domain at Melbourneâ€™s Koonung Secondary College, teaching across all year levels, when she enrolled in a Graduate Certificate of Education â€“ Assessment of Student Learning. The online course, delivered by the Australian Council for Educational Research (ACER), explores new ways of thinking about assessment and how different techniques can be best used in your own context to monitor and improve student learning progress.\r\nFaithfull says sheâ€™d been teaching for a while and recognised that she needed to update her knowledge and understanding of developments in education. â€˜Assessment is an area of particular interest and I could see that building skills in analysing the performance of students was something that teachers needed to improve on.â€™\r\n\r\nReflecting on her return to study, the educator says the coursework on peer assessment was a particular highlight as it took her into a new sphere that she hadnâ€™t explored. â€˜The Grad Cert has invigorated my work and given a great foundation for the next stage in my career in education.\r\n\r\nâ€˜Iâ€™ve been able to support others in building their assessment practice. I added a data role to my Maths Domain leadership role and also had the opportunity to act as Assistant Principal for a number of weeks. I really grew in knowledge, understanding and skills in both assessment and communication through the coursework.â€™\r\n\r\nSince graduating at the end of 2016 (winning the Academic Medal for her cohort), Faithfull has been appointed Director of Learning â€“ Data and Performance at Koonung. This new leading teacher role means sheâ€™s now working with data across all subject areas, supporting staff in assessment practices and measuring student progress.\r\n\r\nHolly Rose is a Year 7-12 science teacher and Assistant Director of Studies at Christ Church Grammar School, an independent K-12 boys school in Perth. â€˜As the Assistant Director of Studies, a large part of my role is to oversee the use of assessment and data within the senior school â€“ both to make sure we comply with our regulatory body and also to make sure we are delivering the most effective programs for enhancing and enriching our studentsâ€™ learning journeys.â€™\r\n\r\nShe started ACERâ€™s Graduate Certificate of Education â€“ Assessment of Student Learning in January 2017 and completed the course in December. â€˜I had always been interested in the use of data and assessment in my own classroom but had not been actively considering current research. When I took on my new role in the school, which involved using and analysing data and assisting other staff members to do the same, I knew that it would be important to ensure I upgraded my skills and develop a good understanding of the current research to be able to put it into practice.â€™\r\n\r\nLike Faithfull, the driver was also a desire to learn practical techniques that she could apply in the classroom and in her role supporting colleagues. â€˜The coursework required you to analyse assessments you already did and consider how you could do things differently. We also needed to collect and analyse our own data, which made it very applicable to my current situation. I worked with two early career teachers to develop assessments that allowed us to collect data and then used this to develop and modify learning progressions for Year 7 Science. The data collected really helped to consolidate this practice and also identified some areas where we were not meeting the learning needs of the students and we needed to improve our practice.â€™\r\n\r\nFor Rose, studying with teachers from a range of school contexts and with different experiences was a real bonus. â€˜Those conversations became really important and effective as a learning tool. Knowing that we were all on the same journey of wanting to improve our skills for the benefit of our students and schools, but with each being able to bring such different things to the conversations, made it really worthwhile.â€™', 1, '2018-02-23', 'aproved'),
(10, 'test', 'test', 'lwjtlwjtlwjtlwjetlw', 13, '2022-03-05', 'notaproved');

-- --------------------------------------------------------

--
-- Table structure for table `articles_comments`
--

CREATE TABLE `articles_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `userid` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `Article_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles_comments`
--

INSERT INTO `articles_comments` (`comment_id`, `comment_body`, `userid`, `role`, `Article_id`) VALUES
(17, 'wow amazing', 9, 'teacher', 4),
(18, 'it was worderfull', 67, 'student', 4),
(23, 'thanks u so much', 67, 'student', 9),
(24, 'wow ', 67, 'student', 4),
(25, 'tanks', 67, 'student', 4),
(26, 'oh yes', 69, 'student', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(30) NOT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `contact_massege` text NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_name`, `contact_email`, `subject`, `contact_massege`, `contact_date`) VALUES
(40, 'alex khan', 'ali@gmail.com', 'admission', 'i want ask for UMS  admission', '0000-00-00'),
(41, 'khodabkahs ramzanzada', 'khodabakhsh@gmail.com', 'computer', 'if want to join in your university ', '2018-02-14'),
(43, 'rsdf sfdsdf', 'ali@gmail.com', 'dfdsf', 'sfsdf', '2018-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_id` int(11) NOT NULL,
  `Department_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_id`, `Department_name`) VALUES
(1, 'Computer Science'),
(2, 'Maths'),
(3, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`) VALUES
(3, 'Bsc sem-6'),
(4, 'B B sem-1');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `Faculty_id` int(11) NOT NULL,
  `Faculty_name` varchar(30) NOT NULL,
  `Department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`Faculty_id`, `Faculty_name`, `Department_id`) VALUES
(1, 'PHP Pro Language', 1),
(2, 'JAVA Pro Language', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `feedback_id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `User_name` varchar(15) NOT NULL,
  `feedback_date` date NOT NULL,
  `massege` text NOT NULL,
  `rate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`feedback_id`, `Name`, `User_name`, `feedback_date`, `massege`, `rate`) VALUES
(1, 'Alex', 'alex@gamil.com', '0000-00-00', 'thank to all of you', 'average'),
(3, 'ahmed', 'ali@gmail.com', '0000-00-00', 'thanks yyyy', 'average'),
(4, 'khodabakhsh', 'khodabakhsh@gma', '2018-02-07', 'amazing', 'good'),
(5, 'sultan', 'ali@gmail.com', '0000-00-00', 'if you provide online result for student it would be the best', 'average'),
(6, 'try', 'ali@gmail.com', '0000-00-00', 'try try', 'average'),
(7, 'ali', 'ali@gmail.com', '0000-00-00', 'thanks for proving such amazing info', 'average'),
(8, 'jawed', 'jawed@gmail.com', '2018-02-17', 'thank to all the memebers of this site\r\nfor providing such good info', 'good'),
(9, 'farzan', 'farzan@gmail.co', '0000-00-00', 'i really apraciating you to provide such amazing information for your student ', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `upload_date`) VALUES
(2, '20th Graduation party of Computer science and civil Engineering', 'gallary/about.jpg', '2018-03-06'),
(4, ' Make the best choice for your education', 'gallary/gg5.jpg', '2018-03-06'),
(5, 'Civil Engineering new class room', 'gallary/p4.jpg', '2018-03-06'),
(6, 'Computer science sport team', 'gallary/sport.jpg', '2018-03-06'),
(7, 'computer science students 2016', 'gallary/topeducation.jpg', '2018-03-06'),
(9, 'Computer Engineering Semester 3 computer lab', 'gallary/omputer-lab.jpg', '2018-03-06'),
(10, 'final presentation of students sem 6', 'gallary/images.jpg', '2018-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `Material_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  `File_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`Material_id`, `title`, `Teacher_id`, `File_path`) VALUES
(8, 'Super Keyword in java', 1, 'materials/Super Keyword in Java- Javatpoint.rar'),
(9, 'JVM Java Virtual  machine', 1, 'materials/JVM _ Java Virtual Machine - Javatpoint.rar'),
(10, 'Static KeyWord in JAVA', 1, 'materials/Static keyword in Java - Javatpoint.rar'),
(11, 'This Keyword in java', 1, 'materials/this keyword in java - javatpoint.rar'),
(12, 'Super Keyword in java', 1, 'materials/Super Keyword in Java- Javatpoint.rar'),
(13, 'Methos overloading in java', 9, 'materials/Method Overloading in Java - Javatpoint.rar'),
(14, 'php', 11, 'materials/php.rar'),
(15, 'PHP', 12, 'materials/binal_recom.pdf'),
(16, 'test', 13, 'materials/Super Keyword in Java- Javatpoint.rar');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `body`, `post_date`) VALUES
(7, 'UK Tuition Fees Could Be Reduced to 3,4000 $', 'images/uk-university.jpg', 'Tuition fees in the UK could be slashed to Â£7,500 a year, creating a saving of at least Â£5,000 over a three-year period, according to The Sunday Times. The proposed cap, which is to be revealed in the governmentâ€™s Autumn Budget in November, comes amid increasing concerns that universities may not be offering students value for money, with students graduating with the burden of huge debts.\r\nAdvertisement\r\n\r\nThe news is a surprising U-turn for the Conservative government, given previous announcements pledged to increase domestic university tuition fees in the UK to Â£9,250 a year from this academic year, and Â£9,500 the year after, provoking fears students would be deterred from attending university.\r\n\r\nHowever, student finance has become a key priority since Juneâ€™s general election, which saw Jeremy Corbynâ€™s Labour party attract a significant number of younger voters thanks to a promise to scrap tuition fees altogether and reinstate maintenance grants.\r\nWould the cap really make a difference?\r\n\r\nWhile fees decreasing would undoubtedly be great news for students, the change would likely only benefit the very richest graduates, as they will now be able to end their student loan repayments earlier in their careers. Currently, three-quarters of graduates will never pay off their student loan.\r\n\r\nHowever, The Times reports chancellor Philip Hammond is also considering raising the threshold at which graduates start to repay their student loans, from the current Â£21,000 up to Â£25,000 in line with inflation. This would ensure anyone earning under Â£25,000 as a graduate would not need to repay any of their loans. Cuts to the interest rate on student loans are also being considered, although the chancellor is thought to be dismissive of the idea.\r\n\r\nDifferent fee levels for certain subjects are also reportedly being considered, in order to reflect the differing costs of running particular courses. Arts and humanities degrees, for instance, require universities to spend less than science or engineering degrees. If tuition fees in the UK are lowered, the government would also provide institutions with a top up payment of up to Â£1,500 to help cover the higher costs of running STEM or similar courses. \r\nWhat next?\r\n\r\nAccording to The Sunday Times, these changes could be delivered within a year or less, making it increasingly unlikely fees will rise to Â£9,500 in 2018/19 as previously expected. It remains to be seen whether Mr Hammond and the government will follow through with these suggestions though, which have been criticized by both the Labour party and the National Union of Students (NUS), whose president, Shakira Martin, said: â€œWhile reducing tuition fees would represent a step in the right direction, the Government is not going far enough.\r\n\r\nâ€œThere has been no commitment to bringing back maintenance grants which would support the poorest students through their study. We also hold strong reservations about creating differential tiers of tuition fees which wrongfully imply a gulf of difference between institutions based on flawed metrics of quality.â€', '2018-03-10'),
(8, 'UK Tuition Fees Could Be Reduced to 3,4000 $', 'images/uk-university.jpg', 'Tuition fees in the UK could be slashed to Â£7,500 a year, creating a saving of at least Â£5,000 over a three-year period, according to The Sunday Times. The proposed cap, which is to be revealed in the governmentâ€™s Autumn Budget in November, comes amid increasing concerns that universities may not be offering students value for money, with students graduating with the burden of huge debts.\r\nAdvertisement\r\n\r\nThe news is a surprising U-turn for the Conservative government, given previous announcements pledged to increase domestic university tuition fees in the UK to Â£9,250 a year from this academic year, and Â£9,500 the year after, provoking fears students would be deterred from attending university.\r\n\r\nHowever, student finance has become a key priority since Juneâ€™s general election, which saw Jeremy Corbynâ€™s Labour party attract a significant number of younger voters thanks to a promise to scrap tuition fees altogether and reinstate maintenance grants.\r\nWould the cap really make a difference?\r\n\r\nWhile fees decreasing would undoubtedly be great news for students, the change would likely only benefit the very richest graduates, as they will now be able to end their student loan repayments earlier in their careers. Currently, three-quarters of graduates will never pay off their student loan.\r\n\r\nHowever, The Times reports chancellor Philip Hammond is also considering raising the threshold at which graduates start to repay their student loans, from the current Â£21,000 up to Â£25,000 in line with inflation. This would ensure anyone earning under Â£25,000 as a graduate would not need to repay any of their loans. Cuts to the interest rate on student loans are also being considered, although the chancellor is thought to be dismissive of the idea.\r\n\r\nDifferent fee levels for certain subjects are also reportedly being considered, in order to reflect the differing costs of running particular courses. Arts and humanities degrees, for instance, require universities to spend less than science or engineering degrees. If tuition fees in the UK are lowered, the government would also provide institutions with a top up payment of up to Â£1,500 to help cover the higher costs of running STEM or similar courses. \r\nWhat next?\r\n\r\nAccording to The Sunday Times, these changes could be delivered within a year or less, making it increasingly unlikely fees will rise to Â£9,500 in 2018/19 as previously expected. It remains to be seen whether Mr Hammond and the government will follow through with these suggestions though, which have been criticized by both the Labour party and the National Union of Students (NUS), whose president, Shakira Martin, said: â€œWhile reducing tuition fees would represent a step in the right direction, the Government is not going far enough.\r\n\r\nâ€œThere has been no commitment to bringing back maintenance grants which would support the poorest students through their study. We also hold strong reservations about creating differential tiers of tuition fees which wrongfully imply a gulf of difference between institutions based on flawed metrics of quality.â€', '2018-03-10'),
(9, 'UK Tuition Fees Could Be Reduced to 3,4000 $', 'images/main.jpg', 'Tuition fees in the UK could be slashed to Â£7,500 a year, creating a saving of at least Â£5,000 over a three-year period, according to The Sunday Times. The proposed cap, which is to be revealed in the governmentâ€™s Autumn Budget in November, comes amid increasing concerns that universities may not be offering students value for money, with students graduating with the burden of huge debts.\r\nAdvertisement\r\n\r\nThe news is a surprising U-turn for the Conservative government, given previous announcements pledged to increase domestic university tuition fees in the UK to Â£9,250 a year from this academic year, and Â£9,500 the year after, provoking fears students would be deterred from attending university.\r\n\r\nHowever, student finance has become a key priority since Juneâ€™s general election, which saw Jeremy Corbynâ€™s Labour party attract a significant number of younger voters thanks to a promise to scrap tuition fees altogether and reinstate maintenance grants.\r\nWould the cap really make a difference?\r\n\r\nWhile fees decreasing would undoubtedly be great news for students, the change would likely only benefit the very richest graduates, as they will now be able to end their student loan repayments earlier in their careers. Currently, three-quarters of graduates will never pay off their student loan.\r\n\r\nHowever, The Times reports chancellor Philip Hammond is also considering raising the threshold at which graduates start to repay their student loans, from the current Â£21,000 up to Â£25,000 in line with inflation. This would ensure anyone earning under Â£25,000 as a graduate would not need to repay any of their loans. Cuts to the interest rate on student loans are also being considered, although the chancellor is thought to be dismissive of the idea.\r\n\r\nDifferent fee levels for certain subjects are also reportedly being considered, in order to reflect the differing costs of running particular courses. Arts and humanities degrees, for instance, require universities to spend less than science or engineering degrees. If tuition fees in the UK are lowered, the government would also provide institutions with a top up payment of up to Â£1,500 to help cover the higher costs of running STEM or similar courses. \r\nWhat next?\r\n\r\nAccording to The Sunday Times, these changes could be delivered within a year or less, making it increasingly unlikely fees will rise to Â£9,500 in 2018/19 as previously expected. It remains to be seen whether Mr Hammond and the government will follow through with these suggestions though, which have been criticized by both the Labour party and the National Union of Students (NUS), whose president, Shakira Martin, said: â€œWhile reducing tuition fees would represent a step in the right direction, the Government is not going far enough.\r\n\r\nâ€œThere has been no commitment to bringing back maintenance grants which would support the poorest students through their study. We also hold strong reservations about creating differential tiers of tuition fees which wrongfully imply a gulf of difference between institutions based on flawed metrics of quality.â€', '2018-03-10'),
(10, 'students final presentation', 'images/images2.jpg', 'to all the studenst of sem 6 have their final presentation', '2018-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `Question_id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Student_id` int(11) DEFAULT NULL,
  `question_date` date NOT NULL,
  `question_status` enum('noaprove','aproved') NOT NULL DEFAULT 'noaprove'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`Question_id`, `Question`, `Student_id`, `question_date`, `question_status`) VALUES
(24, 'How To upload File using PHP?', NULL, '2018-02-20', 'aproved'),
(25, 'How Make UserDefine Function in PHP?', NULL, '2018-02-20', 'aproved'),
(34, 'How to use Ajax() method with PHP and mysqli?', 68, '2018-02-21', 'noaprove'),
(35, 'How to use Insert and delete query in php?', 68, '2018-02-21', 'aproved'),
(36, 'How to have a Complete Validation Form using Jquery?', NULL, '2018-02-23', 'aproved'),
(37, 'how to create a responsive website?', NULL, '2018-02-23', 'aproved'),
(38, 'how to create a responsive website?', NULL, '2018-02-23', 'noaprove'),
(40, 'how to send variable between pages in php?', 68, '2018-02-25', 'noaprove'),
(41, 'how to give a good representation?', NULL, '2018-03-11', 'aproved'),
(42, 'how to do the jquery with php?', 69, '2018-07-04', 'aproved'),
(43, 'how to connect mysql with php?', 69, '2018-12-06', 'aproved'),
(44, 'can u explain the session for me?', 69, '2019-03-09', 'aproved');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_setno` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `subject1` float NOT NULL,
  `subject1_id` int(11) NOT NULL,
  `subject2` float NOT NULL,
  `subject2_id` int(11) NOT NULL,
  `subject3` float NOT NULL,
  `subject3_id` int(11) NOT NULL,
  `subject4` float NOT NULL,
  `subject4_id` int(11) NOT NULL,
  `subject5` float NOT NULL,
  `subject5_id` int(11) NOT NULL,
  `subject6` float NOT NULL,
  `subject6_id` int(11) NOT NULL,
  `average` float NOT NULL,
  `grade` varchar(5) NOT NULL,
  `result` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_setno`, `student_name`, `subject1`, `subject1_id`, `subject2`, `subject2_id`, `subject3`, `subject3_id`, `subject4`, `subject4_id`, `subject5`, `subject5_id`, `subject6`, `subject6_id`, `average`, `grade`, `result`, `department_id`, `exam_id`) VALUES
(2, 1002, 'Farhod', 56, 1, 67, 2, 45, 3, 50, 4, 56, 5, 67, 6, 56.8333, 'C', 'pass', 1, 3),
(7, 1003, 'Qurban', 70, 1, 67, 2, 34, 3, 23, 5, 67, 4, 56, 6, 4, 'D', 'Failed', 1, 3),
(8, 1004, 'fatima', 79, 7, 78, 2, 89, 2, 78, 5, 90, 6, 89, 6, 5, 'D', 'Failed', 1, 4),
(9, 1005, 'Reza Khan', 89, 2, 87, 4, 89, 4, 78, 6, 90, 5, 100, 3, 89, 'A', 'first Class', 2, 3),
(10, 2460, 'Alex Hulk', 60, 1, 70, 2, 65, 6, 70, 5, 55, 3, 45, 4, 61, 'C', 'pass', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(11) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `User_name` varchar(35) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `image` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Department_id` int(11) NOT NULL,
  `token` varchar(11) DEFAULT NULL,
  `status` enum('block','unblock') NOT NULL DEFAULT 'unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `First_name`, `Last_name`, `User_name`, `Password`, `image`, `Address`, `Gender`, `Phone`, `DOB`, `Department_id`, `token`, `status`) VALUES
(68, 'farhod', 'farhodi', 'farhod@gmail.com', '$2y$10$x/WUvRfymbCHx4ebLoDtPezOyhSLTdlK1I8pXPoJWIi1d.tuXgB7y', 'farhod.jpg', 'herat', 'male', '1234567764', '2/12/2002', 1, ' ', 'unblock'),
(69, 'alex', 'hulk', 'hulk22@yahoo.com', '$2y$10$sP6.6reTfQWZGDLsZFuGl.BPErJpREOTnegwz3XMHWJY7OkKtALly', 'user2-160x160.jpg', 'Laldarwaja /Ahmedabad / India', 'male', '9876543210', '4/12/2005', 1, ' ', 'unblock'),
(70, 'ali', 'jan', 'ali@gmail.com', '$2y$10$l87YYAzZ/glvZCSdMwHKMOL/4ve1H9HBm.FVLr1SDBAbBfCHZXVTu', '070372.jpg', 'kabul/Afghanistan', 'male', '0799225732', '3/12/2003', 1, NULL, 'unblock'),
(71, 'test', 'test', 'test@gmail.com', '$2y$10$i8VZg/K13TLV0w4L6eqxsuEOaVL9SBzaVe.6.XpVKfhtQ5PnncSJG', 'Rahmatullah.jpg', 'tew', 'male', '+93799225732', '1/12/2001', 1, NULL, 'unblock');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_code`) VALUES
(1, 'Java Programming ln -1', 'com-101'),
(2, 'php programming ln', 'com-102'),
(3, 'maths-1', 'com-103'),
(4, 'physic-1', 'com-104'),
(5, 'english', 'com-105'),
(6, 'C programming ln', 'com-106');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Teacher_id` int(11) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `User_name` varchar(20) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `image` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `Address` text NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Faculty_id` int(11) DEFAULT NULL,
  `token` varchar(11) DEFAULT NULL,
  `status` enum('block','unblock') NOT NULL DEFAULT 'unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Teacher_id`, `First_name`, `Last_name`, `User_name`, `Password`, `image`, `Gender`, `DOB`, `Address`, `Phone`, `Faculty_id`, `token`, `status`) VALUES
(1, 'Ahmed', 'ahmedy', 'ahmed@gmail.com', '$2y$10$ECVXXuCVYlSNKV7H7eZYA.KQNVJrsDnLnzIjCcAWZ1A4yld1e3ZCe', 'teacher2.jpg', 'male', '2/12/2003', 'Mazar sharif', '8756898755', 1, '', 'unblock'),
(9, 'reza', 'rezay', 'reza@gmail.com', '$2y$10$y9QPh90y0joiOuwsoNI2E.JJ4Amg9BDIK64I4tzKYJDmzHXGJ.gPC', 'teacher3.jpg', 'male', '3/12/2003', 'Ghor,Lal Va Sar Jangle', '2134565544', 2, NULL, 'unblock'),
(11, 'reza', 'Rezay', 'rezaRezay@gmail.com', '$2y$10$6adqZ0a98rcGbv2mCV6CIOUV0Zi4Fhs409RMOEHPe4V/r7hAMZ/ui', 'images1.jpg', 'male', '2/12/2002', 'sdfhggffds', '1234655433', 1, '', 'unblock'),
(12, 'peter', 'chohan', 'peter@gmail.com', '$2y$10$z4b/UKC9voLL0.m9RHIYp.KrWUhozMRP./LOXUt3OvFzWmjF/IB7C', 'avatar5.png', 'male', '1/12/2001', 'Laldarwaja /Ahmedabad / India', '0987654321', 1, '', 'unblock'),
(13, 'test', 'test', 'test@gmail.com', '$2y$10$rTLUayFVKH1uXQBxkp7KVOI1xGy/OigP990IwYgH/vk3kJtAHAzfm', 'Rahmatullah.jpg', 'male', '1/12/2001', 'tew', '+93799225732', 1, NULL, 'unblock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Article_id`);

--
-- Indexes for table `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `Article_id` (`Article_id`),
  ADD KEY `Article_id_2` (`Article_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`Faculty_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`Material_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Question_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `Department_id` (`Department_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `Article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `articles_comments`
--
ALTER TABLE `articles_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `Faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `Material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `Question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Student_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`Question_id`) REFERENCES `questions` (`Question_id`) ON DELETE SET NULL;

--
-- Constraints for table `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD CONSTRAINT `articles_comments_ibfk_1` FOREIGN KEY (`Article_id`) REFERENCES `articles` (`Article_id`) ON DELETE SET NULL;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `department` (`Department_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Student_id`) ON DELETE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `department` (`Department_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
