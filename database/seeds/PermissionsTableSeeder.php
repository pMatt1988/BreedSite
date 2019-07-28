<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-07-22 18:36:17',
            'updated_at' => '2019-07-22 18:36:17',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '17',
                'title'      => 'dog_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '18',
                'title'      => 'dog_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '19',
                'title'      => 'dog_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '20',
                'title'      => 'dog_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '21',
                'title'      => 'dog_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '22',
                'title'      => 'litter_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '23',
                'title'      => 'litter_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '24',
                'title'      => 'litter_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '25',
                'title'      => 'litter_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '26',
                'title'      => 'litter_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '27',
                'title'      => 'content_management_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '28',
                'title'      => 'content_category_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '29',
                'title'      => 'content_category_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '30',
                'title'      => 'content_category_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '31',
                'title'      => 'content_category_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '32',
                'title'      => 'content_category_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '33',
                'title'      => 'content_tag_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '34',
                'title'      => 'content_tag_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '35',
                'title'      => 'content_tag_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '36',
                'title'      => 'content_tag_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '37',
                'title'      => 'content_tag_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '38',
                'title'      => 'content_page_create',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '39',
                'title'      => 'content_page_edit',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '40',
                'title'      => 'content_page_show',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '41',
                'title'      => 'content_page_delete',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ],
            [
                'id'         => '42',
                'title'      => 'content_page_access',
                'created_at' => '2019-07-22 18:36:17',
                'updated_at' => '2019-07-22 18:36:17',
            ]];

        Permission::insert($permissions);
    }
}
