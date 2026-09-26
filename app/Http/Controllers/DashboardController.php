<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'stats' => [
                ['label' => 'Total projects', 'value' => '128', 'change' => '+12 this year'],
                ['label' => 'Approved projects', 'value' => '86', 'change' => '67% of catalog'],
                ['label' => 'Pending review', 'value' => '14', 'change' => '6 need attention'],
                ['label' => 'Active students', 'value' => '342', 'change' => '+28 this term'],
            ],
            'recentProjects' => [
                ['title' => 'CampusCare: Student wellness companion', 'slug' => 'campuscare', 'team' => 'BSIT 4-1', 'tech' => 'Laravel', 'status' => 'Approved', 'updated' => '2h ago'],
                ['title' => 'RouteWise logistics platform', 'slug' => 'routewise', 'team' => 'BSCS 4-2', 'tech' => 'React', 'status' => 'For review', 'updated' => '5h ago'],
                ['title' => 'OLFU Library resource hub', 'slug' => 'library-resource-hub', 'team' => 'BSIT 4-1', 'tech' => 'PHP', 'status' => 'Revision required', 'updated' => 'Yesterday'],
                ['title' => 'AgriSense crop monitoring', 'slug' => 'agrisense', 'team' => 'BSCS 4-1', 'tech' => 'Python', 'status' => 'Approved', 'updated' => '2d ago'],
            ],
        ]);
    }
}
