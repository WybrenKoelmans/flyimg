<?php

namespace Tests\Core\Service;

use Core\Entity\Image\OutputImage;
use Tests\Core\BaseTest;

/**
 * Class ImageHandlerTest
 */
class ImageHandlerTest extends BaseTest
{
    /**
     */
    public function testProcessPNG()
    {
        $image = $this->imageHandler->processImage(parent::CROP_OPTION_URL, parent::PNG_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::PNG_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessWebpFromPng()
    {
        $image = $this->imageHandler->processImage(parent::OPTION_URL.',o_webp', parent::PNG_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::WEBP_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessJpgFromPng()
    {
        $image = $this->imageHandler->processImage(parent::OPTION_URL.',o_jpg', parent::PNG_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::JPEG_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessGifFromPng()
    {
        $image = $this->imageHandler->processImage(parent::OPTION_URL.',o_gif', parent::PNG_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::GIF_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessJpg()
    {
        $image = $this->imageHandler->processImage(parent::OPTION_URL, parent::JPG_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
    }

    /**
     */
    public function testProcessGif()
    {
        $image = $this->imageHandler->processImage(parent::GIF_OPTION_URL, parent::GIF_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::GIF_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessPngFromGif()
    {
        $image = $this->imageHandler->processImage(parent::GIF_OPTION_URL.',o_png', parent::GIF_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::PNG_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessJpgFromGif()
    {
        $image = $this->imageHandler->processImage(parent::GIF_OPTION_URL.',o_jpg', parent::GIF_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::JPEG_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     */
    public function testProcessWebpFromGif()
    {
        $image = $this->imageHandler->processImage(parent::GIF_OPTION_URL.',o_webp', parent::GIF_TEST_IMAGE);
        $this->generatedImage[] = $image;
        $this->assertFileExists($image->getOutputImagePath());
        $this->assertEquals(OutputImage::WEBP_MIME_TYPE, $this->getFileMimeType($image->getOutputImagePath()));
    }

    /**
     * @param $filePath
     *
     * @return mixed
     */
    protected function getFileMimeType($filePath)
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $filePath);
    }
}
