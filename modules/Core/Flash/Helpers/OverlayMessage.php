<?php


namespace Modules\Core\Flash\Helpers;


class OverlayMessage extends Message
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title = 'Notice';

    /**
     * Whether the message is an overlay.
     *
     * @var bool
     */
    public $overlay = true;
}
