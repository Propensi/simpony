<?php

Route::auth();
	
Route::get('/', function () {
    	// return view('blank');
	return redirect('/home');
});


Route::get('assignments/pinjamriset','AssignmentsController@pinjamriset');
Route::get('plansched/programs','ProgramsController@indexps');
Route::get('plansched/programs/{Prog_ID}','ProgramsController@showps');
Route::post('jadwaltayangs2', 'JadwaltayangsController@jadwaltayangs2');
Route::patch('assignments2/update/{Assn_ID}','Assignments2Controller@update');
Route::get('assignments2/membuatriset','Assignments2Controller@membuatriset');
Route::post('assignments2','Assignments2Controller@store');

Route::get('assignments2/pelacakan','Assignments2Controller@pelacakan');
Route::get('assignments2/index','Assignments2Controller@index');
Route::get('assignments2/indexditolak','Assignments2Controller@indexditolak');

Route::get('assignments2/{Assn_ID}/staff','Assignments2Controller@staff');
Route::get('assignments2/{Assn_ID}/klien','Assignments2Controller@klien');

Route::patch('rpm/edits2/{Rpm_ID}', 'RpmController@edit2');
Route::patch('rpm/update2/{Rpm_ID}', 'RpmController@update2');


// harus login
Route::group(['middleware' => 'user'], function () {

	Route::get('/home', function () {
    	return view('blank');
	});
	Route::get('assignments/{Assn_ID}/melihat', 'AssignmentsController@melihat');	
	Route::get('assignments/pelacakan', 'AssignmentsController@pelacakan');
	Route::get('assignments/pekerjaanstaff', 'AssignmentsController@pekerjaanstaff');
	Route::delete('rpmsum/{Rpm_ID}', 'RpmController@delete');
	Route::get('jadwalharian/', 'JadwalTayangsController@jadwalharian');
});

// minimal staff
Route::group(['middleware' => 'Staff'], function () {
	Route::post('files/create', 'FilesController@handleUpload');
	Route::post('comments/create','CommentsController@create');
	Route::get('assignments/staffpekerjaan', 'AssignmentsController@staffpekerjaan');
	Route::get('assignments/{Assn_ID}/pekerjaanstaff', 'AssignmentsController@staffview');
	Route::get('assignments/staffpekerjaan', 'AssignmentsController@staffpekerjaan');
	Route::post('artists/save', 'ArtistsController@save');
	Route::post('artprogs/store', 'ArtprogsController@store');
	Route::get('summary/rpm/{Sum_ID}','SummaryController@rpm');
});

// minimal HG
Route::group(['middleware' => 'HG'], function () {
	Route::get('hg', 'DashboardController@hg');
	Route::get('assignments/hgstaff', 'AssignmentsController@hgstaff');
	Route::get('assignments/{Assn_ID}/managerview', 'AssignmentsController@managerview');
	Route::get('assignments/{Assn_ID}/assignStaff', 'AssignmentsController@assignStaff');
	Route::get('assignments/listAssigned', 'AssignmentsController@listAssigned');
	Route::get('assignments/listAccepted', 'AssignmentsController@listAccepted');
	Route::get('assignments/pekerjaanDept', 'AssignmentsController@pekerjaanDept');

	// flagged
	Route::get('assignments/departmentsAssn', 'AssignmentsController@departmentAssn');
	Route::patch('assignments/update2/{Assn_ID}', 'AssignmentsController@update2');
	Route::resource('steps', 'StepsController');
});

// minimal HoD
Route::group(['middleware' => 'HoD'], function () {
	Route::get('assignments/rejected', 'AssignmentsController@rejected');
	Route::get('assignments/{Assn_ID}/assign', 'AssignmentsController@assign');
	Route::get('programs/jadwalharian', 'ProgramsController@jadwalharian');

});

// minimal GM
Route::group(['middleware' => 'GM'], function () {
	Route::get('dashboard/gm', 'DashboardController@gm');
});

// Admin
Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', 'UsersController');
	Route::resource('departments', 'DepartmentsController');
});

Route::group(['middleware' => ['user']], function () {
	Route::resource('artprogs','ArtprogsController');
	Route::resource('jadwaltayangs', 'JadwaltayangsController');
	Route::resource('comments', 'CommentsController');
	Route::resource('notifikasis', 'NotifikasisController');
	Route::resource('assignments', 'AssignmentsController');
	Route::resource('artists', 'ArtistsController');
	Route::resource('programs', 'ProgramsController');
	Route::resource('summary', 'SummaryController');
	Route::resource('rpm', 'RpmController');
});