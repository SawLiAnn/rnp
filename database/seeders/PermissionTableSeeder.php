<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        //    'role-list',
        //    'role-create',
        //    'role-edit',
        //    'role-delete',
        //    'product-list',
        //    'product-create',
        //    'product-edit',
        //    'product-delete',
        //    'project-list',
        //    'project-create',
        //    'project-edit',
        //    'project-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
                // 'project.project_type',
                // 'project.project_name',
                // 'project.student',
                // 'project.supervisor',
                // 'project.examiner1',
                // 'project.examiner2',
                // 'project.start_date',
                // 'project.end_date',
                // 'project.duration',
                // 'project.project_progress',
                // 'project.project_status',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}