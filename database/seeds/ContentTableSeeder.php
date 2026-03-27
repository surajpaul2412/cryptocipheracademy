<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// engineering CourseModule
        $numberOfCourseModule = \DB::table('engineering_course_modules')->count();
    	if($numberOfCourseModule == 0)
    	{
    		DB::table('engineering_course_modules')->insert([
	        	'icon' => 'record.svg',
	        	'image' => 'img1.svg',
	        	'heading' => 'Studio Recordings',
	        	'content' => '<span class="bold">Vision -</span> Understanding Sound by practically recording variety of sources in studio environment.<br>
                        <span class="bold">Application -</span> Recording & Dubbing Engineer.<br><br>
                        Learning theory of recording equipments and its signal flow is must but to attain professional recording candidate has to record variety of sources with different microphones with different microphone techniques. Doing this practically also helps in understanding behaviour of sound in acoustic domain, electrical domain as well in digital domain.<br><br>
                        Candidate will learn about rooms, recording precautions, signal flow from source to speakers and to listening perception, candidate will also get exposure to various equipments used in professional recording equipments and how to produce best results within limited amount of decent equipments.<br><br>
                        Candidate will perform Mono recordings, various stereo recordings and also multi-microphone techniques with various performers and sources.',
	        ]);
    	}

    	// engineering_course_overviews
    	$numberOfCourseOverview = \DB::table('engineering_course_overviews')->count();
    	if($numberOfCourseOverview == 0)
    	{
    		DB::table('engineering_course_overviews')->insert([
	        	'content' => '<strong class="uppercase font-bold text-grey2 font-14 lh-2">Fundamentals of Audio Engineering & Applications</strong><br>Vision & Application Of Module : Practical Application of Studio Recordings using professional equipment and various performance Artist. This module will come with many excited surprises and candidate will be doing everything within computers and few theory lectures will help candidate in understanding the music production process with a technical aspect. Many Concepts will be revealed using renowned digital audio workstations Logic Pro X & Ableton Live. <br><span class="bold">Examination Pattern -</span>  Practical & Theory Exam<br><br>
                        <span class="bold">Logic Pro X  Course Structure</span><br>
                        <span class="bold">Ableton Live Course Structure</span><br><br>
                    We will uncover the Fundamentals of Digital Audio and dig deeper into the concepts such as Sampling Rate, Bit depth, Head Room, Signal to noise ratio, Frequency, Pitch, Amplitude, Volume, Harmonics. Discussion about Analog to digital conversion and vice versa. This will lay the the strong foundation of whatever we will discuss in the course duration.<br>We will discuss about the whole signal chain of the studio and with the strong concepts of digital audio discussed earlier, we will understand how we can practically make clean and professional sounding recordings keeping all the fundamentals of audio in our mind. This will also help to make good decisions when it comes to buying a professional sounding equipment for yourself.',
	        ]);
	        DB::table('engineering_course_overviews')->insert([
	        	'content' => '<strong class="uppercase font-bold text-grey2 font-14 lh-2">Recording/Microphones Techniques</strong><br>Now we are in good shape to understand about Sound Capturing/Recording techniques. We will discuss about various Microphone types, their Polar Patterns, understanding mono and stereo recordings and how they can be done creatively using various microphone techniques to get the desired sound.<br>We will straight jump to practically doing studio recordings of different musical instruments in mono and stereo with different microphone types and techniques.<br>Once we capture our recordings in digital medium, we will deeply analyse what we have recorded and understand how to capture recordings in different frequency ranges, how we can avoid common phase issues during recordings and taking care of other audio related problems. We will uncover various techniques like Layering, Double tracking, Ad-Libs and many other to achieve the desired sound. Mastering all this will gradually get you to produce professional sounding tracks.',
	        ]);
	        DB::table('engineering_course_overviews')->insert([
	        	'content' => '<strong class="uppercase font-bold text-grey2 font-14 lh-2">Audio Editing Techniques</strong><br>While working with audio it is very important that along with relying on ears for editing decisions, as a sound engineer its very important that our two faculties, the power of hearing and viewing audio go hand in hand to make audio editing decisions. In short, we will learn how to view and read audio waveforms.<br>We will understand what is Pre-noise, Transients and Zero crossings and other terms which will help in understanding audio in depth. This knowledge will help one to edit effectively and make good audio editing decisions while working.<br>We will uncover various editing techniques using various advance tools and various audio editing softwares and plugins.',
	        ]);
	        DB::table('engineering_course_overviews')->insert([
	        	'content' => '<strong class="uppercase font-bold text-grey2 font-14 lh-2">The Art and Physics Behind Musical Instrument Development</strong><br>The real power of the Producer/Engineer comes when someone understands deeply about the sound sources he is capturing. We will uncover the art of development of musical instrument.<br>Understanding what Intonations are. Exploring the differences between Equal Temperament Tuning and Natural Tuning of an instrument and how one can build his own instrument with the desired tuning to make music out of it.<br>After expounding on the theory, we will have workshop sessions with renowned musical instrument developer from India who will make you understand how to practically do it.',
	        ]);
	        DB::table('engineering_course_overviews')->insert([
	        	'content' => '<strong class="uppercase font-bold text-grey2 font-14 lh-2">The Power Of MIDI (Musical Instrument Digital Interface)</strong><br>Understanding what is MIDI, The word MIDI programming, Software Instrument and MIDI Interface. We will explore the power of MIDI and its role in the context of producing music.<br>Understanding the MIDI Note Events and Continuous Controller Events and how to use different types of MIDI events while producing music. This knowledge will guide you to make right decisions when it comes to buying the right interface for yourself.<br>Exploring the different ways of Recording and Editing of MIDI performances in DAW. This will uncover various techniques of making music.<br>Using DAW Midi features, we will learn how to program music using different software instruments and getting into the nitty gritty of programming keeping certain intricacies in mind.<br>Learning how to program drums using Ableton Live &  Logic Pro X Drumming technology. This will allow you to Program and produce organic sounding acoustic and electronic drums and beats.<br>Delving into various midi effects like Arpeggiator, Chord Trigger, Modifier, Note Repeater, Randomizer, Scripter, Transposer, Velocity Processor and exploring how we can use them creatively during midi programming.<br>Finally, using all this knowledge we will understand how to record ultra realistic performances from software instruments no matter you want to play simple guitar or Hollywood sounding strings, Epic percussions or anything you can think of in terms of programming.',
	        ]);
    	}

    	// engineering logic_abletons
        $numberOfCourseLogicAbleton = \DB::table('engineering_course_logic_abletons')->count();
    	if($numberOfCourseLogicAbleton == 0)
    	{
    		DB::table('engineering_course_logic_abletons')->insert([
	        	'content' => '<p class="font-regular font-13 text-grey2">
                    This module will come with many excited surprises and candidate will be doing everything within computers and few theory lectures will help candidate in understanding the music production process with a technical aspect. Many Concepts will be revealed using renowned digital audio workstations Logic Pro X & Ableton Live. <br>
                    <span class="bold">Examination Pattern -</span> Practical & Theory Exam
                </p>
                <div class="mobile-center">
                    <a href="">
                        <span class="font-regular mb-2 mt-4 page-10-btn">
                            Logic Pro X  Course Structure
                        </span>
                    </a>
                    <br class="desktop-d-none">
                    <br class="desktop-d-none">
                    <a href="" class="pl-3 media-pl-0">
                        <span class="font-regular mb-2 mt-4 page-10-btn">
                            Ableton Live Course Structure
                        </span>
                    </a>
                </div>',
	        ]);
    	}


        // FAQ //////////////////////////////////////////////////////////////////////////////////

        // faqs top
        $numberOfFaqs = \DB::table('faqs')->count();
        if($numberOfFaqs == 0)
        {
            DB::table('faqs')->insert([
                'image' => 'course.svg',
                'heading' => 'Music Production Course : Foundation of Music Technology',
                'content' => '<strong class="bold">SHORT TERM COURSE :</strong> 2 MONTHS , ALTERNATE DAYS LECTURES , 2 HOURS OFFICIAL LECTURE DURATION BUT CAN EXTEND UPTO 4 HOURS DEPENDING ON TOPICS. <br><br>
                        <strong class="bold">COURSE MODULES :</strong> ADVANCED LOGIC PRO X, ABLETON LIVE, FOUNDATIONAL MIXING CONCEPTS. <br><br>
                        VARIOUS SPECIALISED FACULTY IS ASSIGNED TO THIS COURSE. <br><br>
                        EACH LECTURES IS WELL PLANNED & COURSE IS PROPERLY STRUCTURED <br><br>
                        EXAMINATION & CRYPTO CIPHER MUSIC PRODUCTION CERTIFICATION <br><br>
                        COURSE FEE : 60,000 + GST',
            ]);
            DB::table('faqs')->insert([
                'image' => 'mix.svg',
                'heading' => 'Sound Engineering Diploma : Complete Production Course',
                'content' => '<strong class="bold">LONG TERM ADVANCE COURSE :</strong> 10 MONTHS , ALTERNATE DAYS LECTURES UPTO 3 MONTHS, TWICE A WEEK ADVANCE LECTURES FOR REST OF THE COURSE, 2 MONTHS PROJECT <br><br>
                        <strong class="bold">COURSE MODULES :</strong> ADVANCED LOGIC PRO X, ABLETON LIVE, RECORDINGS, MUSIC THEORY, MUSIC ARRANGEMENTS, AUDIO UNIT MEASUREMENTS, STUDIO INTERCONNECTIONS, SOUND DESIGN & SYNTHESIS, MIXING & MASTERING, SOUND PROOFING & STUDIO ACOUSTICS,ANALOGUE & DIGITAL MIXERS  <br><br>
                        <strong class="bold">SUBMISSION.</strong> 2 HOURS OFFICIAL LECTURE DURATION BUT CAN EXTEND UPTO 4 HOURS DEPENDING ON TOPICS.  <br><br>
                        VARIOUS SPECIALISED FACULTY IS ASSIGNED TO THIS COURSE.<br>
                        WORKSHOPS, PRACTICALS & HOME EXERCISE WILL BE PROVIDED FOR ALL MODULES.<br>
                        EACH LECTURES IS WELL PLANNED & COURSE IS PROPERLY STRUCTURED EXAMINATION & CRYPTO CIPHER SOUND ENGINEERING DIPLOMA CERTIFICATION <br><br>
                        COURSE FEE : 180,000 + GST',
            ]);
        }
        // course related queries
        $numberOfFaqCourses = \DB::table('faq_courses')->count();
        if($numberOfFaqCourses == 0)
        {
            DB::table('faq_courses')->insert([
                'heading' => 'Whats the difference in Music Production Course & Sound Engineering Course at Crypto Cipher.',
                'content' => 'A) Crypto Cipher Programmes named Music Production Course & Sound Engineering Diploma both focus on learning Audio Technologies.Crypto Cipher offers basically offers two courses short term course and long term course.
                    Short Term Music Production course covers deep understanding of D.A.W’s ( Logic Pro X & Ableton Live and Its application ) on the other hand long term course
                    Sound Engineering Diploma is more focused on complete education on various domains where sound can exist. Whether it is Acoustic Domain, Electrical Domain or Digital Domain. In long term course you automatically diving deep into advance Music Production Course along with knowledge of behaviour and application of sound in Electrical Domain & Acoustic Domain. Understanding and learning of various digital
                    workstation, arrangements, Music Theory, Sound Design, Synthesis, Mixing & Mastering is just a good beginning. A deep understanding of how sounds behave acoustically and in analogue domain helps a lot in making final product decisions perfect.',
            ]);
            DB::table('faq_courses')->insert([
                'heading' => 'Whats the difference in Music Production Course & Sound Engineering Course at Crypto Cipher.',
                'content' => 'A) Crypto Cipher Programmes named Music Production Course & Sound Engineering Diploma both focus on learning Audio Technologies.Crypto Cipher offers basically offers two courses short term course and long term course.
                    Short Term Music Production course covers deep understanding of D.A.W’s ( Logic Pro X & Ableton Live and Its application ) on the other hand long term course
                    Sound Engineering Diploma is more focused on complete education on various domains where sound can exist. Whether it is Acoustic Domain, Electrical Domain or Digital Domain. In long term course you automatically diving deep into advance Music Production Course along with knowledge of behaviour and application of sound in Electrical Domain & Acoustic Domain. Understanding and learning of various digital
                    workstation, arrangements, Music Theory, Sound Design, Synthesis, Mixing & Mastering is just a good beginning. A deep understanding of how sounds behave acoustically and in analogue domain helps a lot in making final product decisions perfect.',
            ]);
            DB::table('faq_courses')->insert([
                'heading' => 'Whats the difference in Music Production Course & Sound Engineering Course at Crypto Cipher.',
                'content' => 'A) Crypto Cipher Programmes named Music Production Course & Sound Engineering Diploma both focus on learning Audio Technologies.Crypto Cipher offers basically offers two courses short term course and long term course.
                    Short Term Music Production course covers deep understanding of D.A.W’s ( Logic Pro X & Ableton Live and Its application ) on the other hand long term course
                    Sound Engineering Diploma is more focused on complete education on various domains where sound can exist. Whether it is Acoustic Domain, Electrical Domain or Digital Domain. In long term course you automatically diving deep into advance Music Production Course along with knowledge of behaviour and application of sound in Electrical Domain & Acoustic Domain. Understanding and learning of various digital
                    workstation, arrangements, Music Theory, Sound Design, Synthesis, Mixing & Mastering is just a good beginning. A deep understanding of how sounds behave acoustically and in analogue domain helps a lot in making final product decisions perfect.',
            ]);
        }

        // Pros
        $numberOfPros = \DB::table('pros')->count();
        if($numberOfPros == 0)
        {
            DB::table('pros')->insert([
                'name' => 'A.R. Rahman',
                'brief' => 'OSCARS, BAFTA, GOLDEN GLOBES, SLUMDOG MILLIONAIRE, 76 wins and 68 Academy Awards Nomination',
                'description' => 'Am very intrigued by this .wishing you the best Crypto Cipher products have been used many times on AR Rahman projects, not just this the man himself supported "Crypto Cipher mission to bring rare virtual instruments and published a tweet in front of millions of his fan following.',
                'image' => '1731026049.png',
            ]);
            DB::table('pros')->insert([
                'name' => 'Shankar Thakur',
                'brief' => 'Music Producer/Artist Over 14000 Subscribers On YouTube',
                'description' => 'Good Job Crypto Cipher Please keep making cool libraries specially loop libraries at the level of quality that you used for Dholak Loops and Im definitely be getting the next one for Dholak Loops and Im definitely be getting the next one.',
                'image' => '1731026049.png',
            ]);
            DB::table('pros')->insert([
                'name' => 'Nainita Desai',
                'brief' => 'Composer For Countless BAFTA EMMY & OSCAR Winning/Nominated Films & TV Series',
                'description' => 'Crypto Cipher is using great Indian talent from all over the country. There is no other company out there which is doing quite what you do. So, please keep up the good work in producing more unusual libraries that are so inspiring to us, Film and Television Composers specially out here in the West.',
                'image' => '1785142521.png',
            ]);
        }

        // Banner
        $numberOfBanners = \DB::table('banners')->count();
        if($numberOfBanners == 0)
        {
            DB::table('banners')->insert([
                'image' => 'a.jpg',
            ]);
            DB::table('banners')->insert([
                'image' => 'b.jpg',
            ]);
            DB::table('banners')->insert([
                'image' => 'c.jpg',
            ]);
            DB::table('banners')->insert([
                'image' => 'd.jpg',
            ]);
        }
        // home content
        $numberOfHomeContent = \DB::table('home_contents')->count();
        if($numberOfHomeContent == 0)
        {
            DB::table('home_contents')->insert([
                'heading' => 'Crypto Cipher is Known Worldwide for Their Work.',
                'content' => 'Before you zero down on one of our Crypto Cipher Courses, please check out what Crypto cipher has done to attract countless OSCAR/GRAMMY/BAFTA award winning guys.',
                'url' => '/about_us',
                'button' => 'View Performance'
            ]);
            DB::table('home_contents')->insert([
                'heading' => 'Crypto Cipher Never Forgets to Promote Indian Culture Worldwide.',
                'content' => 'Check out the artist Videos done by Crypto Cipher inside Ancient Monument Qutab Minar. All the audio recordings are done outdoor live- Promoting Indian Musical Art Worldwide.',
                'url' => '/about_us',
                'button' => 'Visit Online Store'
            ]);
        }

        // About us //////////////////////////////////////////////////////////////////////////////////

        // About Us
        $numberOfAbout = \DB::table('about_us')->count();
        if($numberOfAbout == 0)
        {
            DB::table('about_us')->insert([
                'image' => 'about_us.png',
                'heading' => 'Indian Sample Library Development, Advanced Audio Technology Education, and Global Promotion of Indian Artists.',
                'content' => 'Crypto Cipher is successfully globalising Indian art in amazingly unique ways through technology.<br>
                    Crypto Cipher dynamically accentuate India’s sample library development industry and its artistes. Alongside, the company engage in providing quality advanced education to people aspiring to become working professionals in the music industry. Crypto Cipher continuously and relentlessly propagates the course of Indian artists all over the world.<br>
                    Crypto Cipher has stayed true to its core values and mission statement, and for over 10 years, it has grown to become the only company that is most sought-after in Hollywood/Bollywood and all around the globe for its Indian Software Instruments and Products.<br>
                    Also, Crypto Cipher is developing opportunities for Musicians, Composers and Students worldwide through its range of dynamic and amazing programs, features and products. With a proven track record of professionalism, quality delivery and integrity, Crypto Cipher has attracted international recognition and still continues to passionately deliver sustainable high-tech products and solutions across the globe.<br>
                    Crypto Cipher has been proudly endorsed and supported by famous multi award-winning (Oscar/Bafta/Grammy awards) and Nomination centric artistes including the names AR Rahman, BT, John Swihart, Pete Lockett, Nainita Desai, Jorg Huttner, Laurent Zillani, K.J Singh, David Buckley and many more talented and renowned artists for their works all over the world.',
            ]);
        }

        // about us library
        $numberOfAboutUsLibrary = \DB::table('about_us_libraries')->count();
        if($numberOfAboutUsLibrary == 0)
        {
            DB::table('about_us_libraries')->insert([
                'heading' => 'Indian Sample Library Development',
                'content' => 'Revolutionising the sample library development in India. Crypto Cipher is constantly working in development of advanced ancient Indian Kontakt Instruments which also include some extinct and rare instruments of India, Creating Innovative Indian Playable software instruments for Modern Music Composers.'
            ]);
        }

        // about us library image
        // $numberOfAboutUsLibraryImage = \DB::table('about_us_library_images')->count();
        // if($numberOfAboutUsLibraryImage == 0)
        // {
        //     DB::table('about_us_library_images')->insert([
        //         'image' => '',
        //         'url' => ''
        //     ]);
        // }

        // about us Technology
        $numberOfAboutUsTechnology = \DB::table('about_us_technologies')->count();
        if($numberOfAboutUsTechnology == 0)
        {
            DB::table('about_us_technologies')->insert([
                'heading' => 'Advanced Audio Technology Education',
                'content' => '<div class="row">
                <div class="col-md-12 col-12 pt-3">
                    <div class="font-regular text-grey2 font-13">
                        Advances in Audio technology has evolved in the music industry and Crypto Cipher is dedicated to educating Musicians, Composers , Music Students and Music Aspirants on latest trends in audio technology and their applications through its various advanced education programmes in line with the education system of India. Crypto Cipher seeks to develop interest, capacity and expertise in the use of latest audio technology tools by Sound Engineers, Musicians and Students.
                    </div>
                </div>
                <div class="col-md-6 col-12 pt-3">
                    <div class="font-regular text-grey2 font-13">
                        Crypto Cipher Mission is provide most advance audio technology education in India. Making our student powerhouse of knowledge by giving them most involving & informative process, finally developing an audio researching attitude in their practice.<br><br>
                        This proven process develops most fundamental concepts strong to stay updated with ever evolving Audio Technology. This one complete process is developed & trained by Industry  successful experts with international standards of course structure for most rewarding career in the field of audio.<br><br>
                        Crypto Cipher Audio Lab Provides you with sound proof classrooms for theory sessions & all practical sessions will be done inside the professional studio. A separate control room & recording studio set is just dedicated for student practice so that they do enough practice before they enter professional industry. Candidate after completing the Sound Engineering Diploma will be able to work in studio with all digital technologies related to music production and also will be able to construct complete professional studio single handily.
                    </div>
                </div>
                <div class="col-md-6 col-12 pt-3">
                    <div class="font-regular text-grey2 font-13">
                        Crypto Cipher Future Vision, plans to launch India’s first Audio Research library where all our student after classes can practice endlessly in a library environment under various knowledgeable mentors trained in D.A.W ( Logic Pro X, Ableton Live, Fruity Loops etc ), Audio Electronics, Acoustics, EDM, Acoustics and various audio technology Dimensions.<br><br>
                        Crypto Cipher also has vision of developing a professional career for students under same roof by giving ample career Opportunities by developing a separate professional studio where industry commercial work will be offered to students. Students will get chance of working with clients under guidance of studio experts before they enter professional industry creating a strong portfolio beforehand. 
                    </div>
                </div>
            </div>'
            ]);
        }

        // about us technology image
        // $numberOfAboutUsTechnologyImage = \DB::table('about_us_technology_images')->count();
        // if($numberOfAboutUsTechnologyImage == 0)
        // {
        //     DB::table('about_us_technology_images')->insert([
        //         'image' => '',
        //         'url' => ''
        //     ]);
        // }

        // about us Promotion
        $numberOfAboutUsPromotion = \DB::table('about_us_promotions')->count();
        if($numberOfAboutUsPromotion == 0)
        {
            DB::table('about_us_promotions')->insert([
                'heading' => 'Global Promotion of Indian Artists',
                'content' => 'Crypto Cipher prioritizes global promotion of Indian Classical Artists in the international scene. With its multi-dynamic promotion features, Crypto Cipher catalyzes the acceptance and recognition of Indian artists while also making their works recognized across the globe.'
            ]);
        }

        // about us promotions image
        // $numberOfAboutUsPromotionImage = \DB::table('about_us_promotion_images')->count();
        // if($numberOfAboutUsPromotionImage == 0)
        // {
        //     DB::table('about_us_promotion_images')->insert([
        //         'image' => '',
        //         'url' => ''
        //     ]);
        // }


        // home notifications
        $numberOfHomeNotification = \DB::table('home_notifications')->count();
        if($numberOfHomeNotification == 0)
        {
            DB::table('home_notifications')->insert([
                'date' => '28',
                'seat' => '8',
                'batch' => 'April, 2021',
            ]);
        }


        // exam structure
        $numberOfExams = \DB::table('exams')->count();
        if($numberOfExams == 0)
        {
            DB::table('exams')->insert([
                'module' => 'Music Production',
                'structure' => 'Written Exam',
                'marks' => '150 Marks',
                'credits' => '6 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Music Theory & Arrangements',
                'structure' => 'Written Exam',
                'marks' => '100 Marks',
                'credits' => '4 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Recording',
                'structure' => 'Practical Workshop',
                'marks' => '100 Marks<br>(Based on Attendance)',
                'credits' => '4 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Audio System Design',
                'structure' => 'Written Exam + 2 Assignments',
                'marks' => '100 Marks (Written Exam) +<br>50 Marks (Assignments)',
                'credits' => '4 Credits + 2 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Studio Interconnections',
                'structure' => '8 Assignments',
                'marks' => '100 Marks',
                'credits' => '4 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Mixers',
                'structure' => 'Written Exam + 1 Assignment',
                'marks' => '100 Marks',
                'credits' => '2 Credits + 2 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Synthesis',
                'structure' => 'Preset Submission +<br>Kontakt Instrument Submission',
                'marks' => '200 Marks (Preset Submission) +<br>100 Marks (Kontakt Instrument<br>Submission)',
                'credits' => '8 Credits + 4 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Mixing & Mastering',
                'structure' => 'Assignments',
                'marks' => '500 Marks',
                'credits' => '20 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('exams')->insert([
                'module' => 'Acoustics',
                'structure' => 'Thesis Submission',
                'marks' => '100 Marks',
                'credits' => '4 Credits',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
