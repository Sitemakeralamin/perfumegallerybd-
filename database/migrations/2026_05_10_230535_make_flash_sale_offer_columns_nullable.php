<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakeFlashSaleOfferColumnsNullable extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE flash_sale_offers MODIFY featured VARCHAR(255) NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY background_color VARCHAR(255) NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY text_color VARCHAR(255) NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY banner VARCHAR(255) NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE flash_sale_offers MODIFY featured VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY background_color VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY text_color VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE flash_sale_offers MODIFY banner VARCHAR(255) NOT NULL');
    }
}
