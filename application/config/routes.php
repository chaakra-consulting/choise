<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']                                            = 'home';
$route['404_override']                                                  = '';
$route['translate_uri_dashes']                                          = TRUE;
$route['sso_login']                                                     = 'Login/sso_login';
$route['talent-test/login']                                             = 'Home/talent_test_login';
$route['talent-test/daftar/(:num)']                                     = 'Home/talent_test_daftar/$1';
$route['talent-test/pembayaran/(:any)']                                 = 'Home/talent_test_pembayaran/$1';
$route['talent-test/checkout/(:any)']                                   = 'Home/talent_test_checkout/$1';
$route['talent-test/payment-callback']                                  = 'Home/talent_test_callback';
$route['talent-test/success/(:any)']                                    = 'Home/talent_test_success/$1';
$route['talent-test/pending/(:any)']                                    = 'Home/talent_test_pending/$1';
$route['talent-test/error/(:any)']                                      = 'Home/talent_test_error/$1';
$route['talent-test/dashboard']                                         = 'TalentTest/dashboard';
$route['talent-test/exam-list']                                         = 'TalentTest/exam_list';
$route['talent-test/start-exam/(:any)']                                 = 'TalentTest/start_exam/$1';
$route['talent-test/exam/(:any)/panel']                                 = 'TalentTest/exam_panel/$1';
$route['talent-test/exam/(:any)/frame/(:num)']                          = 'TalentTest/exam_frame/$1/$2';
$route['talent-test/exam/(:any)/confirmation']                          = 'TalentTest/exam_confirmation/$1';
$route['talent-test/panduan_cepat']                                     = 'TalentTest/panduan_cepat';
$route['talent-test/exam/(:any)/training']                              = 'TalentTest/training/$1';
$route['talent-test/training/(:any)/(:num)']                            = 'TalentTest/training/$1/$2';
$route['talent-test/submit-training/(:any)']                            = 'TalentTest/submit_training/$1';
$route['talent-test/exam/(:any)/result']                                = 'TalentTest/exam_result/$1';
$route['talent-test/exam-results']                                      = 'TalentTest/exam_results';
$route['talent-test/save-answer']                                       = 'TalentTest/save_answer';
$route['talent-test/berkas']                                            = 'TalentTest/berkas';
$route['talent-test/upload-berkas']                                     = 'TalentTest/upload_berkas';
$route['talent-test/download-berkas/(:num)']                            = 'TalentTest/download_berkas/$1';
$route['talent-test/preview-berkas/(:num)']                             = 'TalentTest/preview_berkas/$1';
$route['talent-test/check-admin-files']                                 = 'TalentTest/check_admin_files';
$route['talent-test/check-exam-time']                                   = 'TalentTest/check_exam_time';
$route['talent-test/logout']                                            = 'TalentTest/logout';
$route['Home/logout_talent_test']                                       = 'Home/logout_talent_test';
$route['administrator/paket']                                           = 'Administrator/Paket';
$route['administrator/paket/ujian/(:num)']                              = 'Administrator/Paket/ujian/$1';
$route['administrator/paket/tambah_ujian/(:num)']                       = 'Administrator/Paket/tambah_ujian/$1';
$route['administrator/paket/hapus_ujian/(:num)/(:num)']                 = 'Administrator/Paket/hapus_ujian/$1/$2';
$route['administrator/paket/kepentingan/(:num)']                        = 'Administrator/Paket/kepentingan/$1';
$route['administrator/paket/tambah_kepentingan_paket/(:num)']           = 'Administrator/Paket/tambah_kepentingan_paket/$1';
$route['administrator/paket/hapus_kepentingan_paket/(:num)/(:num)']     = 'Administrator/Paket/hapus_kepentingan_paket/$1/$2';
$route['administrator/talent-test/pendaftaran']                         = 'administrator/Data_Pelatihan/pendaftar_talent_test';
$route['administrator/talent-test/admin-berkas']                        = 'Administrator/TalentTest/admin_berkas';
$route['administrator/talent-test/admin-upload-berkas']                 = 'Administrator/TalentTest/admin_upload_berkas';
$route['administrator/talent-test/admin-edit-berkas/(:num)']            = 'Administrator/TalentTest/admin_edit_berkas/$1';
$route['administrator/talent-test/admin-delete-berkas/(:num)']          = 'Administrator/TalentTest/admin_delete_berkas/$1';
$route['administrator/talent-test/admin-download-berkas/(:num)']        = 'Administrator/TalentTest/admin_download_berkas/$1';
$route['administrator/talent-test/admin-preview-berkas/(:num)']         = 'Administrator/TalentTest/admin_preview_berkas/$1';
$route['administrator/login']                                           = 'Administrator/login';
$route['administrator/talent-test/get-berkas-detail/(:num)']            = 'Administrator/TalentTest/get_berkas_detail/$1';
$route['administrator/quiz']                                            = 'Administrator/Quiz/index';
$route['administrator/quiz/add']                                        = 'Administrator/Quiz/add';
$route['administrator/quiz/edit/(:num)']                                = 'Administrator/Quiz/edit/$1';
$route['administrator/quiz/pendaftar_quiz']                            = 'Administrator/Quiz/pendaftar_quiz';
$route['administrator/quiz/delete/(:num)']                              = 'Administrator/Quiz/delete/$1';
$route['quiz/holland-quiz']                                             = 'Quiz/holland_quiz';
$route['quiz/submit_form']                                              = 'Quiz/submit_form';
$route['quiz/result']                                                   = 'Quiz/result';
$route['quiz']                                                          = 'Quiz/landing';