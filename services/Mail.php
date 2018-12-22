<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/22
 * Time: 14:29
 */

namespace Services;

use Nette\Mail\Message;
use Psr\Log\InvalidArgumentException;

class Mail extends Message
{
    public $config;
    protected $from;
    protected $to;
    protected $title;
    protected $body;

    public function __construct($to)
    {
        $this->config = require BASE_PATH . '/config/mail.php';
        $this->setFrom($this->config['username']);
        if (is_array($to)) {
            foreach ($to as $email) {
                $this->addTo($email);
            }
        } else {
            $this->addTo($to);
        }
    }

    public static function to($to = null)
    {
        if (!$to) {
            throw new InvalidArgumentException("邮件接收地址不能为空！");
        }

        return new Mail($to);
    }

    public function from($from = null)
    {
        if (!$from) {
            throw new InvalidArgumentException("邮件发送地址不能为空！");
        }
        $this->setFrom($from);

        return $this;
    }

    public function title($title = null)
    {
        if (!$title) {
            throw new InvalidArgumentException("邮件标题不能为空！");
        }
        $this->setSubject($title);

        return $this;
    }

    public function content($content = null)
    {
        if (!$content) {
            throw new InvalidArgumentException("邮件内容不能为空！");
        }
        $this->setHtmlBody($content);

        return $this;
    }
}