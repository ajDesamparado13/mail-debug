<?php
namespace App\Subsystem\MailDebug\Traits;

use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;


trait HasDebugMail{

    protected $template_id="";

    /**
     * Send the message using the given mailer.
     *
     * @param  \Illuminate\Contracts\Mail\Mailer  $mailer
     * @return void
     */
    public function send(MailerContract $mailer)
    {
        Container::getInstance()->call([$this, 'build']);
        $debug = new \stdClass();
        $debug->view = $this->view;
        $debug->from = implode(',',Arr::pluck($this->from,'address'));
        $debug->to = implode(',',Arr::pluck($this->to,'address'));
        $debug->template_id = $this->template_id;
        $debug->mailable = get_class($this);
        $this->with('debug',$debug);

        $mailer->send($this->buildView(), $this->buildViewData(), function ($message) {
            $this->buildFrom($message)
                 ->buildRecipients($message)
                 ->buildSubject($message)
                 ->buildAttachments($message)
                 ->runCallbacks($message);
        });
    }

    public function templateId($name){
        return $this->setTemplateId($name);
    }

    public function setTemplateId($name){
        $this->template_id = $name;
        return $this;
    }

}