<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typer_titles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolio_title = PortfolioSectionSetting::first();
        $portfolio_categories = Category::all();
        $portfolio_items = PortfolioItem::all();
        $skill = SkillSectionSetting::first();
        $skill_items = SkillItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedback_title = FeedbackSectionSetting::first();
        $blogs = Blog::latest()->take(5)->get();
        $blog_title = BlogSectionSetting::first();

        return view('frontend.home', compact(
            'hero',
            'typer_titles',
            'services',
            'about',
            'portfolio_title',
            'portfolio_categories',
            'portfolio_items',
            'skill',
            'skill_items',
            'experience',
            'feedbacks',
            'feedback_title',
            'blogs',
            'blog_title',
        ));
    }

    public function show_portfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function show_blog($id)
    {
        $blog = Blog::findOrFail($id);
        $previous_post = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next_post = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('blog', 'previous_post', 'next_post'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog', compact('blogs'));
    }

    public function contact(Request $request) {

    }
}
