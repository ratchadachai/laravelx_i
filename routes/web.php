<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Covid19Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('active/index');
});
// Route Template Inheritance
Route::get("/teacher/inheritance", function () {
    return view("teacher-inheritance");
});
Route::get("/student/inheritance", function () {
    return view("student");
});

// Route Template Inheritance
Route::get("/teacher", function () {
    return view("teacher");
});



Route::middleware(['auth', 'role:admin,teacher,student'])->group(function () {
    Route::get("/teacher", function () {
        return view("teacher");
    });

    Route::get("/student", function () {
        return view("student");
    });
});



Route::get("/theme", function () {
    return view("theme");
});

// Route Template Component
Route::get("/teacher/component", function () {
    return view("teacher-component");
});
Route::get("/student/component", function () {
    return view("student-component");
});




Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});
Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/coronavirus', function () {
    $reports = [
        (object) ["country" => "China", "date" => "2020-04-19", "total" => "2765", "active" => "790", "death" => "47", "recovered" => "1928"],
        (object) ["country" => "Thailand", "date" => "2020-04-18", "total" => "2733", "active" => "899", "death" => "47", "recovered" => "1787"],
        (object) ["country" => "Thailand", "date" => "2020-04-17", "total" => "2700", "active" => "964", "death" => "47", "recovered" => "1689"],
        (object) ["country" => "Thailand", "date" => "2020-04-16", "total" => "2672", "active" => "1033", "death" => "46", "recovered" => "1593"],
        (object) ["country" => "Thailand", "date" => "2020-04-15", "total" => "2643", "active" => "1103", "death" => "43", "recovered" => "1497"],
    ];
    return view("coronavirus", compact("reports"));
})->name('coronavirus');

Route::get('/active/teacher', function () {
    $teachers = json_decode(file_get_contents('https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'));
    return view("active.teacher", compact("teachers"));
})->name('active.teacher');

//Route::get('/category/sport', function () {
// return "<h1>This is sport Category Page</h1>";
//});
//Route::get('/category/politic', function () {
// return "<h1>This is politic Category Page</h1>";
//});
//Route::get('/category/entertain', function () {
// return "<h1>This is entertain Category Page</h1>";
//});
//Route::get('/category/auto', function () {
// return "<h1>This is auto Category Page</h1>";
//});


Route::get('/category/sport', [CategoryController::class, "sport"]);
Route::get('/category/politic', [CategoryController::class, "politic"]);
Route::get('/category/entertain', [CategoryController::class, "entertain"]);
Route::get('/category/auto', [CategoryController::class, "auto"]);


Route::get('/active/index', function () {
    return view('active/index');
    // return "555";
})->name('index');

Route::get('/active/about', function () {
    return view('active/about');
    // return "555";
})->name('about');

Route::get('/active/services', function () {
    return view('active/services');
})->name('services');

Route::get('/active/portfolio', function () {
    return view('active/portfolio');
})->name('portfolio');

Route::get('/active/team', function () {
    return view('active/team');
})->name('team');

Route::get('/active/blog', function () {
    return view('active/blog');
})->name('blog');

Route::get('/active/contact', function () {
    return view('active/contact');
})->name('contact');

Route::get('/covid19', [Covid19Controller::class, "index"]);


//Route::get("/product", [ProductController::class, "index"])->name('product.index');
//Route::get("/product/create", [ProductController::class, "create"])->name('product.create');
//Route::post("/product", [ProductController::class, "store"])->name('product.store');
//Route::get('/product/{id}', [ProductController::class, "show"])->name('product.show');
//Route::get("/product/{id}/edit", [ProductController::class, "edit"])->name('product.edit');
//Route::patch("/product/{id}", [ProductController::class, "update"])->name('product.update');
//Route::delete("/product/{id}", [ProductController::class, "destroy"])->name('product.destroy');

Route::resource('/product', ProductController::class);



//Route::resource('/Staff', StaffController::class);
Route::get("//staff", [StaffController::class, "index"])->name('staff.index');
Route::get("//staff/create", [StaffController::class, "create"])->name('staff.create');
Route::post("/staff", [StaffController::class, "store"])->name('staff.store');
Route::get('/staff/{id}', [StaffController::class, "show"])->name('staff.show');
Route::get("/staff/{id}/edit", [StaffController::class, "edit"])->name('staff.edit');
Route::patch("/staff/{id}", [StaffController::class, "update"])->name('staff.update');
Route::delete("/staff/{id}", [StaffController::class, "destroy"])->name('staff.destroy');

Route::resource('/Staff', StaffController::class);


Route::get('/dashboard', function () {
    //return view('dashboard');
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
