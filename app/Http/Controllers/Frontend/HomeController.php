<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
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

        return view('frontend.home', compact(
            'hero',
            'typer_titles',
            'services',
            'about',
            'portfolio_title',
            'portfolio_categories',
            'portfolio_items',
        ));
    }

    public function show_portfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }
}
