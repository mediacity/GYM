<?php
Route::get('locker/index', 'Recycle\LockerController@index')->name('recycle.index');
Route::get('locker/restore/{id}', 'Recycle\LockerController@restore')->name('recycle.restore');
Route::delete('locker/destroy/{id}', 'Recycle\LockerController@destroy')->name('recycle.delete');
Route::get('package/index', 'Recycle\PackageController@index')->name('pack.index');
Route::get('package/restore/{id}', 'Recycle\PackageController@restore')->name('pack.restore');
Route::delete('package/destroy/{id}', 'Recycle\PackageController@destroy')->name('pack.delete');
Route::get('appointment/index', 'Recycle\AppointmentController@index')->name('app.index');
Route::get('appointment/restore/{id}', 'Recycle\AppointmentController@restore')->name('app.restore');
Route::delete('appointment/destroy/{id}', 'Recycle\AppointmentController@destroy')->name('app.delete');
Route::get('blog/index', 'Recycle\BlogController@index')->name('blo.index');
Route::get('blog/restore/{id}', 'Recycle\BlogController@restore')->name('blo.restore');
Route::delete('blog/destroy/{id}', 'Recycle\BlogController@destroy')->name('blo.delete');
Route::get('blogcategory/index', 'Recycle\BlogcategoryController@index')->name('blocat.index');
Route::get('blogcategory/restore/{id}', 'Recycle\BlogcategoryController@restore')->name('blocat.restore');
Route::delete('blogcategory/destroy/{id}', 'Recycle\BlogcategoryController@destroy')->name('blocat.delete');
Route::get('cost/index', 'Recycle\CostController@index')->name('cos.index');
Route::get('cost/restore/{id}', 'Recycle\CostController@restore')->name('cos.restore');
Route::delete('cost/destroy/{id}', 'Recycle\CostController@destroy')->name('cos.delete');
Route::get('dietcontents/index', 'Recycle\DietcontentController@index')->name('dietcont.index');
Route::get('dietcontents/restore/{id}', 'Recycle\DietcontentController@restore')->name('dietcont.restore');
Route::delete('dietcontents/destroy/{id}', 'Recycle\DietcontentController@destroy')->name('dietcont.delete');
Route::get('diet/index', 'Recycle\DietController@index')->name('die.index');
Route::get('diet/restore/{id}', 'Recycle\DietController@restore')->name('die.restore');
Route::delete('diet/destroy/{id}', 'Recycle\DietController@destroy')->name('die.delete');
Route::get('diethascontent/index', 'Recycle\DiethasController@index')->name('diethas.index');
Route::get('diethascontent/restore/{id}', 'Recycle\DiethasController@restore')->name('diethas.restore');
Route::delete('diethascontent/destroy/{id}', 'Recycle\DiethasController@destroy')->name('diethas.delete');
Route::get('enquiries/index', 'Recycle\EnquiryController@index')->name('enq.index');
Route::get('enquiries/restore/{id}', 'Recycle\EnquiryController@restore')->name('enq.restore');
Route::delete('enquiries/destroy/{id}', 'Recycle\EnquiryController@destroy')->name('enq.delete');
Route::get('exercisenames/index', 'Recycle\ExercisenameController@index')->name('exn.index');
Route::get('exercisenames/restore/{id}', 'Recycle\ExercisenameController@restore')->name('exn.restore');
Route::delete('exercisenames/destroy/{id}', 'Recycle\ExercisenameController@destroy')->name('exn.delete');
Route::get('exercise/index', 'Recycle\ExerciseController@index')->name('ex.index');
Route::get('exercise/restore/{id}', 'Recycle\ExerciseController@restore')->name('ex.restore');
Route::delete('exercise/destroy/{id}', 'Recycle\ExerciseController@destroy')->name('ex.delete');
Route::get('faq/index', 'Recycle\FaqController@index')->name('faqs.index');
Route::get('faq/restore/{id}', 'Recycle\FaqController@restore')->name('faqs.restore');
Route::delete('faq/destroy/{id}', 'Recycle\FaqController@destroy')->name('faqs.delete');
Route::get('fees/index', 'Recycle\FeesController@index')->name('fee.index');
Route::get('fees/restore/{id}', 'Recycle\FeesController@restore')->name('fee.restore');
Route::delete('fees/destroy/{id}', 'Recycle\FeesController@destroy')->name('fee.delete');
Route::get('goal/index', 'Recycle\GoalController@index')->name('goa.index');
Route::get('goal/restore/{id}', 'Recycle\GoalController@restore')->name('goa.restore');
Route::delete('goal/destroy/{id}', 'Recycle\GoalController@destroy')->name('goa.delete');
Route::get('group/index', 'Recycle\GoalController@index')->name('goa.index');
Route::get('goal/destroy/{id}', 'Recycle\GoalController@destroy')->name('goa.delete');
Route::get('group/index', 'Recycle\GroupController@index')->name('gro.index');
Route::get('group/restore/{id}', 'Recycle\GroupController@restore')->name('gro.restore');
Route::delete('group/destroy/{id}', 'Recycle\GroupController@destroy')->name('gro.delete');
Route::get('level/index', 'Recycle\GoalController@index')->name('lev.index');
Route::get('level/restore/{id}', 'Recycle\LevelController@restore')->name('lev.restore');
Route::delete('level/destroy/{id}', 'Recycle\LevelController@destroy')->name('lev.delete');
Route::get('measurements/index', 'Recycle\MeasurementController@index')->name('mea.index');
Route::get('measurements/restore/{id}', 'Recycle\MeasurementController@restore')->name('mea.restore');
Route::delete('measurements/destroy/{id}', 'Recycle\MeasurementController@destroy')->name('mea.delete');
Route::get('memberattendance/index', 'Recycle\MemberattendanceController@index')->name('mem.index');
Route::get('memberattendance/restore/{id}', 'Recycle\MemberattendanceController@restore')->name('mem.restore');
Route::delete('memberattendance/destroy/{id}', 'Recycle\MemberattendanceController@destroy')->name('mem.delete');
Route::get('quotation/index', 'Recycle\QuotationController@index')->name('quo.index');
Route::get('quotation/restore/{id}', 'Recycle\QuotationController@restore')->name('quo.restore');
Route::delete('quotation/destroy/{id}', 'Recycle\QuotationController@destroy')->name('quo.delete');
Route::get('religions/index', 'Recycle\ReligionController@index')->name('rel.index');
Route::get('religions/restore/{id}', 'Recycle\ReligionController@restore')->name('rel.restore');
Route::delete('religions/destroy/{id}', 'Recycle\ReligionController@destroy')->name('rel.delete');

Route::get('occupation/index', 'Recycle\OccupationController@index')->name('occ.index');
Route::get('occupation/restore/{id}', 'Recycle\OccupationController@restore')->name('occ.restore');
Route::delete('occupation/destroy/{id}', 'Recycle\OccupationController@destroy')->name('occ.delete');
Route::get('pages/index', 'Recycle\PageController@index')->name('pag.index');
Route::get('pages/restore/{id}', 'Recycle\PageController@restore')->name('pag.restore');
Route::delete('pages/destroy/{id}', 'Recycle\PageController@destroy')->name('pag.delete');



Route::get('roles/index', 'Recycle\RoleController@index')->name('rol.index');
Route::get('roles/restore/{id}', 'Recycle\RoleController@restore')->name('rol.restore');
Route::delete('roles/destroy/{id}', 'Recycle\RoleController@destroy')->name('rol.delete');
Route::get('service/index', 'Recycle\ServiceController@index')->name('ser.index');
Route::get('service/restore/{id}', 'Recycle\ServiceController@restore')->name('ser.restore');
Route::delete('service/destroy/{id}', 'Recycle\ServiceController@destroy')->name('ser.delete');


Route::get('slider/index', 'Recycle\SliderController@index')->name('sli.index');
Route::get('slider/restore/{id}', 'Recycle\SliderController@restore')->name('sli.restore');
Route::delete('slider/destroy/{id}', 'Recycle\SliderController@destroy')->name('sli.delete');
Route::get('staffattendance/index', 'Recycle\StaffattendanceController@index')->name('sta.index');
Route::get('staffattendance/restore/{id}', 'Recycle\StaffattendanceController@restore')->name('sta.restore');
Route::delete('staffattendance/destroy/{id}', 'Recycle\StaffattendanceController@destroy')->name('sta.delete');

Route::get('supplement/index', 'Recycle\SupplementController@index')->name('sup.index');
Route::get('supplement/restore/{id}', 'Recycle\SupplementController@restore')->name('sup.restore');
Route::delete('supplement/destroy/{id}', 'Recycle\SupplementController@destroy')->name('sup.delete');
Route::get('todo/index', 'Recycle\TodoController@index')->name('tod.index');
Route::get('todo/restore/{id}', 'Recycle\TodoController@restore')->name('tod.restore');
Route::delete('todo/destroy/{id}', 'Recycle\TodoController@destroy')->name('tod.delete');


Route::get('user/index', 'Recycle\UserController@index')->name('use.index');
Route::get('user/restore/{id}', 'Recycle\UserController@restore')->name('use.restore');
Route::delete('user/destroy/{id}', 'Recycle\UserController@destroy')->name('use.delete');




