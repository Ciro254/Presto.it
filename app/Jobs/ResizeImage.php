<?php

namespace App\Jobs;

use App\Models\Image as ModelsImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;
use Spatie\Image\Image;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     private $w;
     private $h;
     private $fileName;
     private $path;

    public function __construct($filePath,$w,$h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w= $this->w;
        $h= $this->h;

        $srcPath=storage_path() .'/app/public/'. $this->path.'/'.$this->fileName;
        $destPath=storage_path() . '/app/public/'. $this->path."/crop_{$w}x{$h}_".$this->fileName;
        
        $croppedImage = Image::load($srcPath)

                     ->crop(Manipulations::CROP_CENTER,$w,$h)
                     ->watermark(base_path('resources\img\logo-provvisorio.JPG'))
                     ->watermarkOpacity(60)
                     ->watermarkPosition(Manipulations::POSITION_TOP_RIGHT)
                     ->watermarkFit(Manipulations::FIT_CROP)
                     ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
                     ->watermarkWidth(200, Manipulations::UNIT_PIXELS)
                     ->watermarkHeight(50, Manipulations::UNIT_PIXELS)


                     ->save($destPath);
    }
}
