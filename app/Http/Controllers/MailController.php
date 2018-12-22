<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/22
 * Time: 14:52
 */

namespace App\Http\Controllers;

use Nette\Mail\SmtpMailer;
use Services\Mail;

class MailController
{
    public function mail()
    {
        $mail = Mail::to('heng8050lee@qq.com')
            ->from('DowneyL <heng8050lee@foxmail.com>')
            ->title('test')
            ->content('This is a test content');

        $mailer = new SmtpMailer($mail->config);
        $mailer->send($mail);
    }
}