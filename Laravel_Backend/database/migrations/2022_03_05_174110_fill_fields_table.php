<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Field;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = ['Accountancy, banking and finance', 'Business, consulting and management', 'Charity and voluntary work',
        'Creative arts and design', 'Energy and utilities', 'Engineering and manufacturing', 'Environment and agriculture',
        'Healthcare', 'Hospitality and events management', 'Information technology', 'Law', 'Law enforcement and security',
        'Leisure, sport and tourism', 'Marketing, advertising and PR', 'Media and internet', 'Property and construction',
        'Public services and administration', 'Recruitment and HR', 'Retail','Sales', 'Science and pharmaceuticals', 'Social care', 
        'Teacher training and education', 'Transport and logistics'];

        foreach($data as $d) {
            $field = new Field();
            $field->field = $d;
            $field->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
