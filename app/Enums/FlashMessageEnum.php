<?php
namespace App\Enums;

enum FlashMessageEnum: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
    case WARNING = 'warning';
    case INFORMATION = 'info';

    public function class(): string
    {
        return match($this)
        {
            FlashMessageEnum::SUCCESS => 'bg-success',
            FlashMessageEnum::ERROR => 'bg-danger',
            FlashMessageEnum::INFORMATION => 'bg-primary',
            FlashMessageEnum::WARNING => 'bg-warning',

        };
    }

    public function icon(): string
    {
        return match($this)
        {
            FlashMessageEnum::SUCCESS => 'bg-success',
            FlashMessageEnum::ERROR => 'bg-danger',
            FlashMessageEnum::INFORMATION => 'bg-primary',
            FlashMessageEnum::WARNING => 'bg-warning',

        };
    }


}