<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInforController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/blog', function () {
//     return view('frontend.blog');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Portfolio Details
Route::get('/portfolio-details/{id}', [HomeController::class, 'show_portfolio'])->name('show.portfolio');
// Blog Details
Route::get('/blog-details/{id}', [HomeController::class, 'show_blog'])->name('show.blog');
// Blogs
Route::get('/blogs', [HomeController::class, 'blog'])->name('blog');

// Admin Routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Hero route
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);
    // Services route
    Route::resource('service', ServiceController::class);
    // About route
    Route::get('/resume/download', [AboutController::class, 'resume_download'])->name('resume.download');
    Route::resource('about', AboutController::class);
    // Category route
    Route::resource('category', CategoryController::class);
    // Portfolio item route
    Route::resource('portfolio-item', PortfolioItemController::class);
    // Portfolio Section Setting route
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);
    // Skill Section Setting route
    Route::resource('skill-section-setting', SkillSectionSettingController::class);
    // Skill Items route
    Route::resource('skill-item', SkillItemController::class);
    // Experience route
    Route::resource('experience', ExperienceController::class);
    // Feedback route
    Route::resource('feedback', FeedbackController::class);
    // Feedback Section Setting route
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);
    // Blog Category route
    Route::resource('blog-category', BlogCategoryController::class);
    // Blog route
    Route::resource('blog', BlogController::class);
    // Blog Section Setting route
    Route::resource('blog-section-setting', BlogSectionSettingController::class);
    // Footer Social Link route
    Route::resource('footer-social', FooterSocialLinkController::class);
    // Footer Information route
    Route::resource('footer-info', FooterInforController::class);
    // Footer Contact Information route
    Route::resource('footer-contact-info', FooterContactInfoController::class);
    // Footer Useful Links route
    Route::resource('footer-useful-links', FooterUsefulLinkController::class);
    // Footer Help Links route
    Route::resource('footer-help-links', FooterHelpLinkController::class);
    // Setting route
    Route::get('settings', SettingController::class)->name('settings.index');
    // General Setting route
    Route::resource('general-setting', GeneralSettingController::class);
    // SEO Setting route
    Route::resource('seo-setting', SeoSettingController::class);

});
