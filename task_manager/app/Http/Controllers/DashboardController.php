<?php

    namespace App\Http\Controllers;

    use App\Models\Project;

    class DashboardController extends Controller {
        public function index() {
            $projects = Project::with('tasks')->orderBy('title')->take(10)->get();

            return view('dashboard', compact('projects'));
        }
    }
