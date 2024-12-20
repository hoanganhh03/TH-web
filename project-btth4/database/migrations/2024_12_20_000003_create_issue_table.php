<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Mã vấn đề
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade'); // Khóa ngoại
            $table->string('reported_by', 50)->nullable(); // Người báo cáo
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả vấn đề
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
