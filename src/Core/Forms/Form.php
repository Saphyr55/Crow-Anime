<?php

namespace CrowAnime\Core\Forms;

abstract class Form
{

    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public static function check(array $data): bool
    {
        $i = 0;
        foreach ($data as $key => $value) {
            if (
                strcmp($key, 'manga_volumes') !== 0  ||
                strcmp($key, 'manga_synopsis') !== 0 ||
                strcmp($key, 'anime_synopsis') !== 0
            )
            {
                if (isset($value)) {
                    if (is_string($value)) {
                        if (empty($value) || strlen(trim($value)) == 0)
                            return false;
                    }
                }
            }
            $i++;
        }
        return $i === count($data) && $i !== 0;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public static function upload_file(string $name_file, array $allowed, string $upload_file): void
    {
        foreach ($allowed as $value) {
            if ($_FILES[$name_file]['type'] === $value) {
                move_uploaded_file($_FILES[$name_file]["tmp_name"], $upload_file);
                break;
            }
        }
    }

}