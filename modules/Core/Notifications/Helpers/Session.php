<?php


namespace Modules\Core\Notifications\Helpers;

use Illuminate\Session\Store;

class Session
{
    /**
     * Session storage.
     *
     * @var Store
     */
    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Set a session key and value.
     *
     * @param  mixed $key
     * @param  string $data
     */
    public function flash($key, $data = null)
    {
        $this->session->flash($key, $data);
    }
}

