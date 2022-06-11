<?php

namespace App\Console\Commands;

use App\Models\Server;
use Illuminate\Console\Command;

class CheckStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all server status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $servers = Server::all();
        foreach ($servers as $server) {
            // check if difference between last check and now is more then 1 minute
            if ($server->last_check->diffInMinutes(now()) > 1) {
                $wait = 1; // wait Timeout In Seconds

                $fp = @fsockopen(
                    $server->ip,
                    $server->port,
                    $errCode,
                    $errStr,
                    $wait
                );
                echo "Ping $server->id:$server->port ==> ";
                if ($fp) {
                    echo 'SUCCESS';
                    $server->status = 'online';
                    fclose($fp);
                } else {
                    echo "ERROR: $errCode - $errStr";
                    $server->status = 'offline';
                }
                $server->last_check = now();
                $server->save();
            }
        }
        return 0;
    }
}
