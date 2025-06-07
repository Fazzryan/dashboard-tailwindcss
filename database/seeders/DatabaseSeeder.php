<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('projects')->insert([
            [
                'name' => 'Website Redesign',
                'status' => 'Active',
                'progress' => 60,
                'client' => 'PT ABC',
                'priority' => 'High',
                'deadline' => '2025-01-01',
            ],
            [
                'name' => 'Mobile App',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Startup XYZ',
                'priority' => 'Medium',
                'deadline' => '2024-12-31',
            ],
            [
                'name' => 'Marketing Campaign',
                'status' => 'On Hold',
                'progress' => 40,
                'client' => 'Agency 123',
                'priority' => 'Low',
                'deadline' => '2025-03-15',
            ],
            [
                'name' => 'Database Migration',
                'status' => 'Active',
                'progress' => 20,
                'client' => 'PT DataCorp',
                'priority' => 'High',
                'deadline' => '2025-04-20',
            ],
            [
                'name' => 'Security Audit',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Secure Ltd.',
                'priority' => 'Medium',
                'deadline' => '2024-11-30',
            ],
            [
                'name' => 'SEO Optimization',
                'status' => 'Active',
                'progress' => 70,
                'client' => 'SEO Experts',
                'priority' => 'Medium',
                'deadline' => '2025-02-10',
            ],
            [
                'name' => 'Customer Portal',
                'status' => 'Cancelled',
                'progress' => 10,
                'client' => 'Client Co.',
                'priority' => 'High',
                'deadline' => '2025-05-05',
            ],
            [
                'name' => 'Inventory System',
                'status' => 'On Hold',
                'progress' => 30,
                'client' => 'Retail Corp',
                'priority' => 'Low',
                'deadline' => '2025-06-12',
            ],
            [
                'name' => 'Internal Tools',
                'status' => 'Active',
                'progress' => 55,
                'client' => 'IT Dept.',
                'priority' => 'Medium',
                'deadline' => '2025-07-01',
            ],
            [
                'name' => 'Cloud Integration',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Cloud Solutions',
                'priority' => 'High',
                'deadline' => '2024-10-15',
            ],
            [
                'name' => 'API Development',
                'status' => 'Active',
                'progress' => 65,
                'client' => 'API Hub',
                'priority' => 'High',
                'deadline' => '2025-03-25',
            ],
            [
                'name' => 'UX Research',
                'status' => 'On Hold',
                'progress' => 50,
                'client' => 'Design Team',
                'priority' => 'Medium',
                'deadline' => '2025-08-10',
            ],
            [
                'name' => 'Performance Testing',
                'status' => 'Active',
                'progress' => 75,
                'client' => 'QA Group',
                'priority' => 'Medium',
                'deadline' => '2025-01-20',
            ],
            [
                'name' => 'Social Media App',
                'status' => 'Cancelled',
                'progress' => 5,
                'client' => 'Social Corp',
                'priority' => 'Low',
                'deadline' => '2025-09-30',
            ],
            [
                'name' => 'Data Analytics',
                'status' => 'Active',
                'progress' => 80,
                'client' => 'Analytics LLC',
                'priority' => 'High',
                'deadline' => '2025-04-01',
            ],
            [
                'name' => 'Website Redesign',
                'status' => 'Active',
                'progress' => 60,
                'client' => 'PT ABC',
                'priority' => 'High',
                'deadline' => '2025-01-01',
            ],
            [
                'name' => 'Mobile App',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Startup XYZ',
                'priority' => 'Medium',
                'deadline' => '2024-12-31',
            ],
            [
                'name' => 'Marketing Campaign',
                'status' => 'On Hold',
                'progress' => 40,
                'client' => 'Agency 123',
                'priority' => 'Low',
                'deadline' => '2025-03-15',
            ],
            [
                'name' => 'Database Migration',
                'status' => 'Active',
                'progress' => 20,
                'client' => 'PT DataCorp',
                'priority' => 'High',
                'deadline' => '2025-04-20',
            ],
            [
                'name' => 'Security Audit',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Secure Ltd.',
                'priority' => 'Medium',
                'deadline' => '2024-11-30',
            ],
            [
                'name' => 'SEO Optimization',
                'status' => 'Active',
                'progress' => 70,
                'client' => 'SEO Experts',
                'priority' => 'Medium',
                'deadline' => '2025-02-10',
            ],
            [
                'name' => 'Customer Portal',
                'status' => 'Cancelled',
                'progress' => 10,
                'client' => 'Client Co.',
                'priority' => 'High',
                'deadline' => '2025-05-05',
            ],
            [
                'name' => 'Inventory System',
                'status' => 'On Hold',
                'progress' => 30,
                'client' => 'Retail Corp',
                'priority' => 'Low',
                'deadline' => '2025-06-12',
            ],
            [
                'name' => 'Internal Tools',
                'status' => 'Active',
                'progress' => 55,
                'client' => 'IT Dept.',
                'priority' => 'Medium',
                'deadline' => '2025-07-01',
            ],
            [
                'name' => 'Cloud Integration',
                'status' => 'Completed',
                'progress' => 100,
                'client' => 'Cloud Solutions',
                'priority' => 'High',
                'deadline' => '2024-10-15',
            ],
            [
                'name' => 'API Development',
                'status' => 'Active',
                'progress' => 65,
                'client' => 'API Hub',
                'priority' => 'High',
                'deadline' => '2025-03-25',
            ],
            [
                'name' => 'UX Research',
                'status' => 'On Hold',
                'progress' => 50,
                'client' => 'Design Team',
                'priority' => 'Medium',
                'deadline' => '2025-08-10',
            ],
            [
                'name' => 'Performance Testing',
                'status' => 'Active',
                'progress' => 75,
                'client' => 'QA Group',
                'priority' => 'Medium',
                'deadline' => '2025-01-20',
            ],
            [
                'name' => 'Social Media App',
                'status' => 'Cancelled',
                'progress' => 5,
                'client' => 'Social Corp',
                'priority' => 'Low',
                'deadline' => '2025-09-30',
            ],
            [
                'name' => 'Data Analytics',
                'status' => 'Active',
                'progress' => 80,
                'client' => 'Analytics LLC',
                'priority' => 'High',
                'deadline' => '2025-04-01',
            ],
        ]);
    }
}
