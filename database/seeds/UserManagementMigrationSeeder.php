
<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserManagementMigrationSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Please wait updating the data...');
        $idMenu=DB::table('cb_menus')->insertGetId(['name'=>'User Manajement','icon'=>'fa fa-users','path'=>'users','type'=>'path','sort_number'=>0,'cb_modules_id'=>NULL,'parent_cb_menus_id'=>NULL,'editable'=>false]);
        $dataRole=DB::table('cb_roles')->get();
        foreach($dataRole as $item){
            DB::table('cb_role_privileges')->insert([
                ['cb_roles_id'=>$item->id,'cb_menus_id'=>$idMenu,'can_browse'=>0,'can_create'=>0,'can_read'=>0,'can_update'=>0,'can_delete'=>0]]
            );
        }
		$this->command->info('Updating the data completed !');
    }
}	