<?php

include_once 'DataBase.php';

class File
{
    private $storageDirectory;
    private $fileName;
    private $fileExtension;
    private $fileSize;
    private $fileTmpName;

    public function __construct(string $storagePath, array $uploadedFile)
    {
        $this->storageDirectory = $storagePath;
        $this->fileName = $uploadedFile['name'];
        $this->fileExtension = pathinfo($this->fileName, PATHINFO_EXTENSION);
        $this->fileSize = $uploadedFile['size'];
        $this->fileTmpName = $uploadedFile['tmp_name'];
    }

    /**
     * Check if file is an image
     *
     * @return boolean
     */
    public function isImage(): bool
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($this->fileExtension, $allowedExtensions)) {
            return false;
        }
        return true;
    }

    /**
     * Check if file size is less than 2MB
     *
     * @return boolean
     */
    public function sizeFits(): bool
    {
        if ($this->fileSize > 2000000) {
            return false;
        }
        return true;
    }

    /**
     * Upload file
     *
     * @return boolean
     */
    public function uploadFile(): bool
    {
        $this->fileName = sha1(rand()) . '.' . $this->fileExtension;
        if (!move_uploaded_file($this->fileTmpName, $this->storageDirectory . $this->fileName)) {
            return false;
        }
        return true;
    }

    /**
     * File name getter
     *
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }
}
