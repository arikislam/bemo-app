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
        try {
            \Spatie\DbDumper\Databases\MySql::create()
                ->setDbName($databaseName)
                ->setUserName($userName)
                ->setPassword($password)
                ->includeTables(['card_lists', 'card'])
                ->useCompressor(new GzipCompressor())
                ->dumpToFile(public_path('db-dumps/' . $databaseName . '.sql.gz'));
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }


    }
}
