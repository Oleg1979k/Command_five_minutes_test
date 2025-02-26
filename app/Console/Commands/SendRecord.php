<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Record;

class SendRecord extends Command
{
    protected $signature = 'send:record';
    protected $description = 'Fetch records from Redis and insert them into MySQL';

    public function handle()
    {
        $redis = Redis::connection();
        $records =  json_decode($redis->get('1')); // Получаем все записи

        if (empty($records)) {
            $this->info('No records found in Redis.');
            return;
        }
        foreach ($records as $record) {
            Record::create([
                'name' => $record->name,
                'last_name' => $record->last_name,
                'description' => $record->description,
            ]);
        }

        // Очистим список после обработки
       $redis->del('1');

        $this->info('Records successfully saved to MySQL.');
    }
}
