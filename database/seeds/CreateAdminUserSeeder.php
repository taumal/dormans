<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id'            => 1,
            'name'          => 'MR Taumal',
            'email'         => 'mr.taumal@gmail.com',
            'password'      => bcrypt('Te$t1234'),
            'nid'           => '0695113198343',
            'address'       => 'South Alekanda, Barishal',
            'district_id'   => 33,
            'division_id'   => 4,
            'occupation'    => 'Full Stack Software Developer',
            'organization'  => 'Quantum Foundation',
            'phone'         => '+8801819014240',
            'seat_taken'    => 2,
            'arrival_date'  => Carbon::parse('2012-01-07')
        ]);

        $role = Role::create([
            'name'          => 'Admin'
        ]);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
