<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Role;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $roles = collect([['name' => 'administrator', 'label' => 'Administrator'], ['name' => 'faculty', 'label' => 'Faculty / Reviewer'], ['name' => 'student', 'label' => 'Student']])->mapWithKeys(fn (array $role) => [$role['name'] => Role::updateOrCreate(['name' => $role['name']], $role)]);
        $admin = User::updateOrCreate(['email' => 'admin@olfu.edu.ph'], ['name' => 'Maria Clara', 'role_id' => $roles['administrator']->id, 'password' => Hash::make('password')]);
        $faculty = User::updateOrCreate(['email' => 'faculty@olfu.edu.ph'], ['name' => 'Prof. Miguel Santos', 'role_id' => $roles['faculty']->id, 'password' => Hash::make('password')]);
        $student = User::updateOrCreate(['email' => 'student@olfu.edu.ph'], ['name' => 'Juan Dela Cruz', 'role_id' => $roles['student']->id, 'program' => 'BSIT', 'section' => '4-1', 'password' => Hash::make('password')]);
        $categories = collect(['Health & Wellness', 'Business Systems', 'Education', 'Agriculture'])->mapWithKeys(fn (string $name) => [$name => Category::updateOrCreate(['slug' => Str::slug($name)], ['name' => $name])]);
        $technologies = collect(['Laravel', 'Tailwind CSS', 'MySQL', 'React', 'Node.js', 'PostgreSQL', 'PHP', 'Python', 'IoT', 'Vue'])->mapWithKeys(fn (string $name) => [$name => Technology::firstOrCreate(['name' => $name])]);
        $projects = [
            ['title' => 'CampusCare: Student wellness companion', 'description' => 'A private, accessible support platform that helps students find campus resources and build healthier routines.', 'abstract' => 'CampusCare brings wellbeing resources, peer support, and appointment discovery into one calm digital experience for the OLFU community.', 'team' => 'BSIT 4-1', 'year' => '2025-2026', 'category' => 'Health & Wellness', 'tech' => ['Laravel', 'Tailwind CSS', 'MySQL'], 'status' => 'approved'],
            ['title' => 'RouteWise logistics platform', 'description' => 'A route planning and delivery coordination system designed for small local businesses.', 'abstract' => 'RouteWise reduces delivery friction with intelligent route planning and a clear operations dashboard.', 'team' => 'BSCS 4-2', 'year' => '2025-2026', 'category' => 'Business Systems', 'tech' => ['React', 'Node.js', 'PostgreSQL'], 'status' => 'submitted'],
            ['title' => 'OLFU Library resource hub', 'description' => 'A searchable digital catalog that makes academic resources easier to discover and share.', 'abstract' => 'The Library Resource Hub modernizes resource discovery for students and faculty with a responsive, accessible catalog.', 'team' => 'BSIT 4-1', 'year' => '2025-2026', 'category' => 'Education', 'tech' => ['PHP', 'Laravel', 'MySQL'], 'status' => 'revision_required'],
            ['title' => 'AgriSense crop monitoring', 'description' => 'A sensor-backed crop monitoring dashboard for small and mid-sized farms.', 'abstract' => 'AgriSense turns field data into practical signals so growers can make timely, evidence-led decisions.', 'team' => 'BSCS 4-1', 'year' => '2024-2025', 'category' => 'Agriculture', 'tech' => ['Python', 'IoT', 'Vue'], 'status' => 'approved'],
        ];
        foreach ($projects as $data) {
            $project = Project::updateOrCreate(['slug' => Str::slug($data['title'])], ['owner_id' => $student->id, 'category_id' => $categories[$data['category']]->id, 'title' => $data['title'], 'description' => $data['description'], 'abstract' => $data['abstract'], 'program' => Str::before($data['team'], ' '), 'section' => Str::after($data['team'], ' '), 'academic_year' => $data['year'], 'adviser' => $faculty->name, 'status' => $data['status'], 'submitted_at' => now()]);
            $project->members()->syncWithoutDetaching([$student->id => ['role' => 'Project lead']]);
            $project->technologies()->sync($technologies->only($data['tech'])->pluck('id'));
        }
    }
}
