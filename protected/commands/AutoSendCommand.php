<?php
/**
 * Created by JetBrains PhpStorm.
 * User: luckymancvp
 * Date: 2/15/13
 * Time: 8:50 PM
 * To change this template use File | Settings | File Templates.
 */
class AutoSendCommand extends CConsoleCommand
{
    public function run($args)
    {
        // Do task 1
        $this->doTask1();

        // Do task 2
        $this->doTask2();
    }

    /**
     * Check if have latter mail in current time
     */
    private function doTask1() {
        // get today send later mail
        $mails = Mails::getNowLaterMail();

        foreach ($mails as $mail){
            MailService::sendMail($mail);
        }

        echo "done";
        echo "\n";
    }

    /**
     * Loop foreach users
     * Check if today user did not send any mail then generate mail content & send it
     */
    private function doTask2()
    {
        // Get all users
        $users = User::model()->findAll();

        /** @var $user User */
        foreach ($users as $user){
            if ($user->notSentMailBeforeLimitedTime())
                $user->sendTodayMissMail();
        }
    }
}