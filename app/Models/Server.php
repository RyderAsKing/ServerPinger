<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ip', 'port', 'status', 'last_check'];

    private static function pingDomain($domain)
    {
        $starttime = microtime(true);
        $file = fsockopen($domain, 80, $errno, $errstr, 10);
        $stoptime = microtime(true);
        $status = 0;

        if (!$file) {
            $status = -1;
        }
        // Site is down
        else {
            fclose($file);
            $status = ($stoptime - $starttime) * 1000;
            $status = floor($status);
        }
        die($status);
        return $status;
    }

    public function checkStatus()
    {
        // ping the server and update the status
        $status = self::pingDomain($this->ip . ':' . $this->port);
        $this->status = $status;

        // update the last_check timestamp
        $this->last_check = now();
    }
}
