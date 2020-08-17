@if(isset($debug) && \Config::get('mail.debug'))
<br>
<br>
<br>
<br>
ーーーーーーーーーーーーーーーーーーーーーーーーーーーー
<br>
 FOR MAIL DEBUGGING PURPOSE ONLY
<br>
 WILL ONLY BE SHOWN IF MAIL DEBUG IS TRUE
<br>
ーーーーーーーーーーーーーーーーーーーーーーーーーーーー
<br>
MAILABLE FILE: {{ $debug->mailable }}
<br>
VIEW File: {{ $debug->view }}
<br>
TEMPLATE ID: {{ $debug->template_id }}
<br>
FROM:  {{ $debug->from }}
<br>
RECIPIENT:  {{ $debug->to }}
<br>
@endif