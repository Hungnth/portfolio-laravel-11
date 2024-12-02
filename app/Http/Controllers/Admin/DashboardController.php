<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\SkillItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blog_count = Blog::count();
        $skill_count = SkillItem::count();
        $portfolio_count = PortfolioItem::count();
        $feedback_count = Feedback::count();
        return view('admin.dashboard', compact(
            'blog_count',
            'skill_count',
            'portfolio_count',
            'feedback_count'
        ));
    }
}
