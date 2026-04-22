<?php

class sapp_Utils
{
    /** @var bool */
    private static $phpExcelLoaded = false;

    /** @var bool */
    private static $mPdfLoaded = false;

    public static function loadPHPExcel()
    {
        if (self::$phpExcelLoaded) {
            return;
        }

        $phpExcelPath = 'Classes/PHPExcel.php';
        $ioFactoryPath = 'Classes/PHPExcel/IOFactory.php';

        if (!is_readable($phpExcelPath) || !is_readable($ioFactoryPath)) {
            throw new RuntimeException('Excel utility libraries are not available.');
        }

        require_once $phpExcelPath;
        require_once $ioFactoryPath;
        self::$phpExcelLoaded = true;
    }

    public static function createExcelWorkbook()
    {
        self::loadPHPExcel();
        return new PHPExcel();
    }

    public static function createExcelReaderForFile($filePath)
    {
        self::loadPHPExcel();
        return PHPExcel_IOFactory::createReaderForFile($filePath);
    }

    public static function createExcelWriter(PHPExcel $workbook, $format = 'Excel2007')
    {
        self::loadPHPExcel();
        return PHPExcel_IOFactory::createWriter($workbook, $format);
    }

    public static function loadMPdf()
    {
        if (self::$mPdfLoaded) {
            return;
        }

        $mPdfPath = 'MPDF57/mpdf.php';
        if (!is_readable($mPdfPath)) {
            throw new RuntimeException('PDF utility libraries are not available.');
        }

        require_once $mPdfPath;
        self::$mPdfLoaded = true;
    }

    public static function createZipArchive($zipFilePath, $flags = null)
    {
        $zip = new ZipArchive();
        $openFlags = $flags === null ? (ZipArchive::CREATE | ZipArchive::OVERWRITE) : $flags;
        $openResult = $zip->open($zipFilePath, $openFlags);

        if ($openResult !== true) {
            throw new RuntimeException('Unable to create ZIP archive: ' . $zipFilePath);
        }

        return $zip;
    }
}
