<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'article_category_create',
            ],
            [
                'id'    => 18,
                'title' => 'article_category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'article_category_show',
            ],
            [
                'id'    => 20,
                'title' => 'article_category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'article_category_access',
            ],
            [
                'id'    => 22,
                'title' => 'article_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'ingredient_create',
            ],
            [
                'id'    => 24,
                'title' => 'ingredient_edit',
            ],
            [
                'id'    => 25,
                'title' => 'ingredient_show',
            ],
            [
                'id'    => 26,
                'title' => 'ingredient_delete',
            ],
            [
                'id'    => 27,
                'title' => 'ingredient_access',
            ],
            [
                'id'    => 28,
                'title' => 'allergence_master_create',
            ],
            [
                'id'    => 29,
                'title' => 'allergence_master_edit',
            ],
            [
                'id'    => 30,
                'title' => 'allergence_master_show',
            ],
            [
                'id'    => 31,
                'title' => 'allergence_master_delete',
            ],
            [
                'id'    => 32,
                'title' => 'allergence_master_access',
            ],
            [
                'id'    => 33,
                'title' => 'diet_master_create',
            ],
            [
                'id'    => 34,
                'title' => 'diet_master_edit',
            ],
            [
                'id'    => 35,
                'title' => 'diet_master_show',
            ],
            [
                'id'    => 36,
                'title' => 'diet_master_delete',
            ],
            [
                'id'    => 37,
                'title' => 'diet_master_access',
            ],
            [
                'id'    => 38,
                'title' => 'tag_create',
            ],
            [
                'id'    => 39,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 40,
                'title' => 'tag_show',
            ],
            [
                'id'    => 41,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 42,
                'title' => 'tag_access',
            ],
            [
                'id'    => 43,
                'title' => 'constituent_master_create',
            ],
            [
                'id'    => 44,
                'title' => 'constituent_master_edit',
            ],
            [
                'id'    => 45,
                'title' => 'constituent_master_show',
            ],
            [
                'id'    => 46,
                'title' => 'constituent_master_delete',
            ],
            [
                'id'    => 47,
                'title' => 'constituent_master_access',
            ],
            [
                'id'    => 48,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 49,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 50,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 51,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 52,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 53,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 54,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 55,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 56,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 57,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 58,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 59,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 60,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 61,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 62,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 63,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 64,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 65,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 66,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 67,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 68,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 69,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 70,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 71,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 72,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 73,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 74,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 75,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 76,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 77,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 78,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 79,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 80,
                'title' => 'product_create',
            ],
            [
                'id'    => 81,
                'title' => 'product_edit',
            ],
            [
                'id'    => 82,
                'title' => 'product_show',
            ],
            [
                'id'    => 83,
                'title' => 'product_delete',
            ],
            [
                'id'    => 84,
                'title' => 'product_access',
            ],
            [
                'id'    => 85,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 86,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 87,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 88,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 89,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 90,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 91,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 92,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 93,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 94,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 95,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 96,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 97,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 98,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 99,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 100,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 101,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 102,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 103,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 104,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 105,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 106,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 107,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 108,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 109,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 110,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 111,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 112,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 113,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 114,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 115,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 116,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 117,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 118,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
