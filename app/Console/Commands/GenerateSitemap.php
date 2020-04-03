<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    CONST FILE_PATH = 'public_html/sitemap.xml';

    protected $signature = 'sitemap:create';
    protected $description = 'Create a sitemap.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        SitemapGenerator::create(env('APP_URL'))->writeToFile(base_path(self::FILE_PATH));
    }
}
