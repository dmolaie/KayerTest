<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SmsRegisterStatus extends Migration
{
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $smsRegisters =\Domains\SmsRegister\Entities\SmsRegister::
            where('third_request_content','exists',true)
            ->where('status' . 'not_complete')->get();
            foreach ($smsRegisters as $smsRegister) {
                $smsRegister->status = 'complete';
                if ($smsRegister->getDirty()) {
                    $smsRegister->save();
                }
            }
            return;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::connection($this->connection)->drop('sms_registers');
    }
}
