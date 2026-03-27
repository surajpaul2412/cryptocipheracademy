<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::resource('/', 'WelcomeController');
Route::resource('/welcome', 'WelcomeController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/composers-review', 'ProController');
Route::resource('/download', 'DownloadController');
Route::get('/newsroom/{$slug}','NewsController@show')->name('newsroom.show');
Route::post('/newsroom/search', 'NewsController@search')->name('newsroom.search');
Route::get('/newsroom/search/{tag}', 'NewsController@searchBy')->name('newsroom.searchBy');
Route::resource('/newsroom', 'NewsController');
Route::resource('/music-production-course', 'ProductionCourseController');
Route::resource('/sound-engineering-diploma-course', 'EngineeringCourseController');//left
Route::resource('/sound-engineering-course', 'EngineeringCourseController');//deleted
Route::resource('/music-production-diploma-course', 'MusicProductionDiplomaController');
Route::resource('/live-sound-engineering-course', 'LiveSoundEngineeringController');

Route::resource('/music-production-online', 'MusicProductionOnlineController');
Route::resource('/contact-us', 'ContactController');
Route::resource('/studio-equipment', 'GalleryController');
Route::resource('/our-courses', 'AcademyCourseController');
Route::resource('/jobs', 'VacancyController');
Route::resource('/faq', 'FaqController');
Route::resource('/music-production-faculty', 'TeamController');
Route::resource('/register', 'RegisterController');
Route::resource('/about-us', 'AboutUsController');
Route::get('/student-work/{slug}', 'StudentWorkController@show')->name('student_work.show');
Route::resource('/student-work', 'StudentWorkController');
Route::resource('/exam-schedule', 'ExamStructureController');
Route::resource('/video-gallery', 'VideoGalleryController');
Route::get('/payment1', function () {
    return view('frontend.payment');
});

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('manager','ManagerController');
    Route::resource('faculty','FacultyController');
    Route::resource('student','StudentController');
    Route::resource('download','DownloadController');
    Route::get('/downloaderList','DownloadController@list')->name('downloader.list');
    Route::delete('/downloaderList/{id}/delete','DownloadController@delete')->name('downloader.delete');
    Route::resource('newsroom','NewsroomController');
    Route::resource('menu','MenuController');
    Route::resource('submenu','SubmenuController');
    Route::resource('pros','ProController');
    Route::resource('engineeringCourse','EngineeringCourseController');
    Route::resource('engineeringCourseSound','EngineeringCourseSoundController');
    Route::resource('engineeringCourseSoftware','EngineeringCourseSoftwareController');
    Route::resource('engineeringCourseHardware','EngineeringCourseHardwareController');
    Route::resource('engineeringCourseModule','EngineeringCourseModuleController');
    Route::resource('engineeringCourseOverview','EngineeringCourseOverviewController');
    Route::resource('engineeringCourseLogicAbleton','EngineeringCourseLogicAlbetonController');

    Route::resource('musicProductionDiploma','MusicProductionDiplomaController');
    Route::resource('musicProductionDiplomaQuick','MusicProductionDiplomaQuicksController');
    Route::resource('musicProductionDiplomaLogic','MusicProductionDiplomaLogicController');

    Route::resource('musicProductionDiplomaSound','MusicProductionDiplomaSoundController');
    Route::resource('musicProductionDiplomaModule','MusicProductionDiplomaModuleController');
    Route::resource('musicProductionDiplomaOverview','MusicProductionDiplomaOverviewController');
    Route::resource('musicProductionDiplomaLogicAbleton', MusicProductionDiplomaLogicAlbetonController::class)
    ->parameters([
        'musicProductionDiplomaLogicAbleton' => 'logicAbleton'
    ]);

    Route::resource('liveSoundEngineeringDiploma','LiveSoundEngineeringController', [
        'parameters' => ['liveSoundEngineeringDiploma' => 'diploma']
    ]);

    Route::resource('liveSoundEngineeringDiplomaQuick','LiveSoundEngineeringQuicksController', [
        'parameters' => ['liveSoundEngineeringDiplomaQuick' => 'quick']
    ]);

    Route::resource('liveSoundEngineeringDiplomaLogic','LiveSoundEngineeringLogicController', [
        'parameters' => ['liveSoundEngineeringDiplomaLogic' => 'logic']
    ]);

    Route::resource('liveSoundEngineeringDiplomaSound','LiveSoundEngineeringSoundController', [
        'parameters' => ['liveSoundEngineeringDiplomaSound' => 'sound']
    ]);

    Route::resource('liveSoundEngineeringDiplomaModule', 'LiveSoundEngineeringModuleController', [
        'parameters' => ['liveSoundEngineeringDiplomaModule' => 'module']
    ]);

    Route::resource('liveSoundEngineeringDiplomaOverview','LiveSoundEngineeringOverviewController', [
        'parameters' => ['liveSoundEngineeringDiplomaOverview' => 'overview']
    ]);



    Route::resource('contact','ContactController');
    Route::resource('productionCourse','ProductionCourseController');
    Route::resource('productionCourseQuick','ProductionCourseQuicksController');
    Route::resource('productionCourseLogic','ProductionCourseLogicController');
    Route::resource('productionCoursePro','ProductionCourseProController');
    Route::resource('gallery','GalleryController');
    Route::resource('studioEquipmentHardwareImage','StudioEquipmentHardwareImageController');
    Route::resource('studioEquipmentSoftwareImage','StudioEquipmentSoftwareImageController');
    Route::resource('studioEquipmentHardware','StudioEquipmentHardwareController');
    Route::resource('studioEquipmentSoftware','StudioEquipmentSoftwareController');
    Route::resource('academyCourse','AcademyCourseController');
    Route::resource('vacancy','VacancyController');
    Route::resource('faq','FaqController');
    Route::resource('faqCareer','FaqCareerController');
    Route::resource('faqCourse','FaqCourseController');
    Route::resource('faqGeneral','FaqGeneralController');
    Route::resource('faqHostel','FaqHostelController');
    Route::resource('team','TeamController');
    Route::resource('teamProduction','TeamProductionController');
    Route::resource('banner','BannerController');
    Route::resource('homeContent','HomeContentController');
    Route::resource('aboutUs','AboutUsController');
    Route::resource('aboutUsLibrary','AboutUsLibraryController');
    Route::resource('aboutUsLibraryImage','AboutUsLibraryImageController');
    Route::resource('aboutUsTechnology','AboutUsTechnologyController');
    Route::resource('aboutUsTechnologyImage','AboutUsTechnologyImageController');
    Route::resource('aboutUsPromotion','AboutUsPromotionController');
    Route::resource('aboutUsPromotionImage','AboutUsPromotionImageController');
    Route::resource('homeNotification','HomeNotificationController');
    Route::post('/studentsWork/{id}/enable','StudentWorkController@enable')->name('studentsWork.enable');
    Route::post('/studentsWork/{id}/disable','StudentWorkController@disable')->name('studentsWork.disable');
    Route::resource('studentsWork','StudentWorkController');
    Route::resource('exam','ExamController');    
    Route::post('/modules/{id}/usermodule','ModuleController@usermodule')->name('modules.usermodule');
    Route::get('/modules/{id}/showStudents','ModuleController@showStudents')->name('modules.showStudents');
    Route::resource('modules','ModuleController');
    Route::resource('videos','VideoController');
    Route::resource('desktopMenu','DesktopMainMenuController');    
    Route::resource('desktopMenuMain','DesktopMainMenuSectionController');    
    Route::resource('desktopMenuSub','DesktopMainSubSectionController');
    Route::resource('videoGallery','VideoGalleryController');
    Route::resource('videoGalleryUrl','VideoGalleryUrlController');
    Route::resource('musicProductionOnline','MusicProductionOnlineController');
    Route::resource('musicProductionOnlineSound','MusicProductionOnlineSoundController');
    Route::resource('musicProductionOnlineOverview','MusicProductionOnlineOverviewController');
    Route::resource('musicProductionOnlineModule','MusicProductionOnlineModuleController');
});

Route::group(['as'=>'manager.','prefix'=>'manager','namespace'=>'Manager','middleware'=>['auth','manager']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'faculty.','prefix'=>'faculty','namespace'=>'Faculty','middleware'=>['auth','faculty']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});

Route::group(['as'=>'student.','prefix'=>'student','namespace'=>'Student','middleware'=>['auth','student']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('profile','ProfileController');
    Route::resource('modules','ModuleController');
    Route::resource('invoice','InvoiceController');
});



// 301 redirection
Route::get('engineering-course', function(){return Redirect::to('/sound-engineering-course', 301);});
Route::get('academy_courses', function(){return Redirect::to('/our_courses', 301);});
Route::get('gallery', function(){return Redirect::to('/studio_equipment', 301);});
Route::get('crypto_celeb', function(){return Redirect::to('/composers_review', 301);});
Route::get('faculty', function(){return Redirect::to('/music_production_faculty', 301);});


Route::get('composers_review', function(){return Redirect::to('/composers-review', 301);});
Route::get('contact_us', function(){return Redirect::to('/contact-us', 301);});
Route::get('contact-crypto-cipher', function(){return Redirect::to('/contact-us', 301);});
Route::get('studio_equipment', function(){return Redirect::to('/studio-equipment', 301);});
Route::get('our_courses', function(){return Redirect::to('/our-courses', 301);});
Route::get('music_production_faculty', function(){return Redirect::to('/music-production-faculty', 301);});
Route::get('about_us', function(){return Redirect::to('/about-us', 301);});
Route::get('student_work', function(){return Redirect::to('/student-work', 301);});
Route::get('exam_schedule', function(){return Redirect::to('/exam-schedule', 301);});
Route::get('video_gallery', function(){return Redirect::to('/video-gallery', 301);});
Route::get('sound_engineering_course', function(){return Redirect::to('/sound-engineering-course', 301);});
