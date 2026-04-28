<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // ── Admins ──
        $this->forge->addField([
            'id'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'username'   => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admins', true);

        // ── Village Profiles ──
        $this->forge->addField([
            'id'           => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'motto'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'  => ['type' => 'TEXT'],
            'history'      => ['type' => 'TEXT'],
            'vision'       => ['type' => 'TEXT'],
            'mission'      => ['type' => 'TEXT'],
            'area_size'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'population'   => ['type' => 'INT', 'default' => 0],
            'family_count' => ['type' => 'INT', 'default' => 0],
            'hamlets'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'district'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'regency'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'province'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 50],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'address'      => ['type' => 'TEXT'],
            'postal_code'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'latitude'     => ['type' => 'VARCHAR', 'constraint' => 20],
            'longitude'    => ['type' => 'VARCHAR', 'constraint' => 20],
            'logo_url'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'service_hours'=> ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'Senin - Jumat: 08.00 - 16.00 WIB'],
            'created_at'   => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'   => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('village_profiles', true);

        // ── Officials ──
        $this->forge->addField([
            'id'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'position'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'photo_url'  => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => ''],
            'nip'        => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'order_num'  => ['type' => 'INT', 'default' => 0],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('officials', true);

        // ── Budgets ──
        $this->forge->addField([
            'id'          => ['type' => 'VARCHAR', 'constraint' => 30],
            'year'        => ['type' => 'INT'],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'amount'      => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'type'        => ['type' => 'VARCHAR', 'constraint' => 20],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'  => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('budgets', true);

        // ── Services ──
        $this->forge->addField([
            'id'           => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'description'  => ['type' => 'TEXT'],
            'icon'         => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'FileText'],
            'requirements' => ['type' => 'TEXT', 'null' => true],
            'procedure'    => ['type' => 'TEXT', 'null' => true],
            'order_num'    => ['type' => 'INT', 'default' => 0],
            'is_active'    => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'   => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'   => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('services', true);

        // ── Tourism Spots ──
        $this->forge->addField([
            'id'          => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'image_url'   => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => ''],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Alam'],
            'location'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'order_num'   => ['type' => 'INT', 'default' => 0],
            'created_at'  => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'  => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tourism_spots', true);

        // ── News ──
        $this->forge->addField([
            'id'           => ['type' => 'VARCHAR', 'constraint' => 30],
            'title'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'      => ['type' => 'TEXT'],
            'excerpt'      => ['type' => 'TEXT'],
            'image_url'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'is_published' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'date'         => ['type' => 'DATE'],
            'created_at'   => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'   => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('news', true);

        // ── Population Stats ──
        $this->forge->addField([
            'id'           => ['type' => 'VARCHAR', 'constraint' => 30],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'male_count'   => ['type' => 'INT', 'default' => 0],
            'female_count' => ['type' => 'INT', 'default' => 0],
            'year'         => ['type' => 'INT'],
            'created_at'   => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'   => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('population_stats', true);

        // ── Infrastructure ──
        $this->forge->addField([
            'id'        => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'category'  => ['type' => 'VARCHAR', 'constraint' => 50],
            'quantity'  => ['type' => 'INT', 'default' => 0],
            'unit'      => ['type' => 'VARCHAR', 'constraint' => 20],
            'condition' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'created_at'=> ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'=> ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('infrastructure', true);

        // ── Gallery ──
        $this->forge->addField([
            'id'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'image_url'  => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => ''],
            'category'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'order_num'  => ['type' => 'INT', 'default' => 0],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery', true);

        // ── Contact Messages ──
        $this->forge->addField([
            'id'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'message'    => ['type' => 'TEXT'],
            'is_read'    => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_messages', true);
    }

    public function down()
    {
        $this->forge->dropTable('contact_messages', true);
        $this->forge->dropTable('gallery', true);
        $this->forge->dropTable('infrastructure', true);
        $this->forge->dropTable('population_stats', true);
        $this->forge->dropTable('news', true);
        $this->forge->dropTable('tourism_spots', true);
        $this->forge->dropTable('services', true);
        $this->forge->dropTable('budgets', true);
        $this->forge->dropTable('officials', true);
        $this->forge->dropTable('village_profiles', true);
        $this->forge->dropTable('admins', true);
    }
}
