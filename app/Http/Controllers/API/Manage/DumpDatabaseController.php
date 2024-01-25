<?php

namespace App\Http\Controllers\API\Manage;

use App\Http\Controllers\Controller;
use Spatie\DbDumper\Compressors\GzipCompressor;

class DumpDatabaseController extends Controller
{
    public function __invoke()
    {
        $databaseName = config('database.connections.mysql.database');
        $userName = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $dumpPath = public_path('db-dumps/' . $databaseName . '.sql.gz');
        try {
            \Spatie\DbDumper\Databases\MySql::create()
                ->setDbName($databaseName)
                ->setUserName($userName)
                ->setPassword($password)
                ->includeTables(['card_lists', 'cards'])
                ->dumpToFile($dumpPath);
            return response()->file($dumpPath);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }


    }
}
