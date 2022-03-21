<?php

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');

        // $searchLocations = Location::pluck('name', 'id');
        // $searchCategories = Category::pluck('name', 'id');
        // $searchByCategory = Category::withCount('jobs')
        //     ->orderBy('jobs_count', 'desc')
        //     ->take(5)
        //     ->pluck('name', 'id');
        // $jobs = Job::with('company')
        //     ->orderBy('id', 'desc')
        //     ->take(7)
        //     ->get();

        // return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs']));


    }

    public function show()
    {
        return Inertia::render('Listing');
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
